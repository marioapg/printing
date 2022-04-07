@extends('layouts.master')
@section('page-css')

<link rel="stylesheet" href="{{asset('assets/styles/vendor/datatables.min.css')}}">
@endsection

@section('main-content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="col-md-6">
                    <button style="float:right;" onclick="history.back()" class="btn btn-primary"> < Atrás </button>
                </div>
                <div class="tab-content" id="myTabContent">
                    <div class="row" id="invoice" role="tabpanel" aria-labelledby="invoice-tab">
                        {{-- <div class="d-sm-flex mb-5" data-view="print">
                            <span class="m-auto"></span>
                            <button class="btn btn-primary mb-sm-0 mb-3 print-invoice">Print Invoice</button>
                        </div> --}}

                        <div class="col-md-6">
                            <div class="row col-md-12">
                                <div class="col-md-12">
                                    <h4 class="font-weight-bold">Trabajo #{{ $job->id }}</h4>
                                    <p><strong>Fecha de creación: </strong>{{ $job->created_at }}</p>
                                </div>
                                <div class="col-md-12 text-sm-right">
                                    <p><strong>Estatus: </strong>
                                        <span class="badge badge-pill badge-{{ $job->statusColor() }} p-2 m-1">{{ $job->statusName() }}</span>
                                    </p>
                                    <p><strong>Fecha entrega: </strong>{{ $job->delivery_date }}</p>
                                </div>
                            </div>
                            <div class="row col-md-12" style="display: inline-block;">
                                <a href="{{ route('jobs.edit', $job->id) }}" class="btn btn-light">Editar</a>
                                <button style="float: right !important;" type="button" class="btn btn-info" data-toggle="modal" data-target="#modalComment">
                                    Agregar comentario
                                </button>
                            </div>
                            <div class="mt-3 mb-4 border-top col-md-12"></div>
                            <div class="row mb-5 col-md-12">
                                {{-- PRIORIDAD --}}
                                <div class="col-md-6 mb-3 mb-sm-0">
                                    <h5 class="font-weight-bold">Prioridad</h5>
                                    {{-- <p><span class="badge r-badge badge-outline-{{ $job->jobPriorityColor() }} p-2 m-1">{{ $job->priority }}</span></p> --}}
                                    <p><button type="button" class="btn btn-{{ $job->jobPriorityColor() }} btn-rounded m-1">{{ $job->priority }}</button></p>
                                    {{-- <span style="white-space: pre-line">
                                        rodriguez.trent@senger.com
                                        61 Johnson St. Shirley, NY 11967.

                                        +202-555-0170
                                    </span> --}}
                                </div>

                                {{-- RESPONSABLE --}}
                                <div class="col-md-6 text-sm-right">
                                    <h5 class="font-weight-bold">Responsable</h5>
                                    <p>{{ $job->user->name }} - {{ $job->user->email }}</p>
                                    {{-- <span style="white-space: pre-line">
                                        sales@ui-lib.com
                                        8254 S. Garfield Street. Villa Rica, GA 30180.

                                        +1-202-555-0170
                                    </span> --}}
                                </div>

                                {{-- DESCRIPCION --}}
                                <div class="col-md-12 text-sm-left">
                                    <h5 class="font-weight-bold">Descripción</h5>
                                    <p>{{ $job->description }}</p>
                                    {{-- <span style="white-space: pre-line">
                                        sales@ui-lib.com
                                        8254 S. Garfield Street. Villa Rica, GA 30180.

                                        +1-202-555-0170
                                    </span> --}}
                                </div>

                                {{-- ARCHIVOS --}}
                                <div class="col-md-12">
                                    <table class="table table-hover mb-4 text-center">
                                        <thead class="bg-gray-300">
                                            <tr>
                                                <th scope="col">Archivos</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if ($job->hasFiles())
                                                @foreach ($job->files as $file)
                                                <tr>
                                                    <td>
                                                        <a target="_blank" href="{{$file->path}}">{{$file->name}}</a>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            @else
                                                <tr>
                                                    <td>
                                                        No hay archivos
                                                    </td>
                                                </tr>
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>


                        <div class="col-md-6">

                            <div class="row">
                                <!-- begin::latest log -->
                                <div class="col-lg-12 col-xl-12 mt-6 mb-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="ul-widget__head">
                                                <div class="ul-widget__head-label">
                                                    <h3 class="ul-widget__head-title">
                                                        Cambios
                                                    </h3>
                                                </div>
                                            </div>
                                            <div class="ul-widget__body">
                                                <div class="tab-content">
                                                    <div class="tab-pane active show" id="__g-widget-s6-tab1-content">
                                                        <div class="ul-widget-s6__items">
                                                            @foreach ($job->orderedLogs() as $log)
                                                                <div class="ul-widget-s6__item">
                                                                    <span class="ul-widget-s6__badge">
                                                                        <p class="badge-dot-{{$log->randomBootstrapColor()}} ul-widget6__dot"></p>
                                                                    </span>
                                                                    <p class="ul-widget-s6__text">
                                                                        @if ($log->comment !== null)
                                                                            <a href="#" class="see-comment" target="comment-{{$log->id}}">
                                                                                {{ $log->change }}
                                                                            </a>
                                                                            <input type="hidden" id="comment-{{$log->id}}" value="{{ $log->comment }}">
                                                                        @else
                                                                            {{ $log->change }}
                                                                        @endif
                                                                        @switch($log->type)
                                                                            @case(1)
                                                                                <span class="badge badge-pill badge-primary  m-2">Sistema</span>
                                                                                @break
                                                                            @case(2)
                                                                                <span class="badge badge-pill badge-warning  m-2">Admin</span>
                                                                                @break
                                                                            @case(3)
                                                                                <span class="badge badge-pill badge-info  m-2">User</span>
                                                                                @break
                                                                            @default
                                                                        @endswitch
                                                                    </p>
                                                                    <span class="ul-widget-s6__time">{{ $log->created_at }}</span>
                                                                </div>
                                                            @endforeach

                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end::latest log -->

                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modalComment" tabindex="-1" role="dialog" aria-labelledby="modalCommentTitle-2" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalCommentTitle-2">Agregar comentario</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('comments.store', $job->id) }}" method="POST">
                    <div class="modal-body">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="comment" class="col-form-label">Comentario:</label>
                            <textarea rows="10" type="text" class="form-control" id="comment" name="comment"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal See Comment -->
    <div class="modal fade" id="modalSeeComment" tabindex="-1" role="dialog" aria-labelledby="modalSeeCommentTitle-2" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    {{-- <h5 class="modal-title" id="modalSeeCommentTitle-2">Comentario</h5> --}}
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p class="comment-body">
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('page-js')

    <script src="{{asset('assets/js/vendor/datatables.min.js')}}"></script>
    <script>
        $(document).ready(function(){
            $('.see-comment').on('click', function(e){
                e.preventDefault();
                target = $(this).attr('target');
                $('.comment-body').html('');
                $('.comment-body').html($('#'+target).attr('value'));
                $('#modalSeeComment').modal('show');
            });
        });
    </script>

@endsection
