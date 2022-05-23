@extends('layouts.master')
@section('page-css')

<link rel="stylesheet" href="{{asset('assets/styles/vendor/datatables.min.css')}}">
@endsection

@section('main-content')

    <div class="row mb-4">
        <div class="col-md-12 mb-4">

            <div class="card text-right" style="align-items: end;box-shadow: none !important;">
                <button style="float:right;" onclick="history.back()" class="btn btn-primary"> < Atrás </button>
            </div>
            <div class="separator-breadcrumb"></div>

            <div class="card text-left">
                <div class="card-body">
                    <h4 class="card-title mb-3">Trabajo</h4>
                    <p>Editar trabajo</p>

                    <form action="{{ route('agerence.jobs.update', $job->id) }}"
                        method="POST"
                        enctype="multipart/form-data">

                        @method("PUT")
                        {{ csrf_field() }}

                        <div class="row">
                            <div class="col-md-4 form-group mb-3">
                                <label for="name">Nombre</label>
                                <input type="text"
                                    class="form-control form-control-rounded"
                                    name="name"
                                    id="name"
                                    value="{{ $job->name }}"
                                    required>
                            </div>

                            <div class="col-md-4 form-group mb-3">
                                <label for="priority">Prioridad</label>
                                <select class="form-control form-control-rounded" name="priority" required>
                                    <option value="Baja" @if($job->priority == 'Baja') selected @endif>Baja</option>
                                    <option value="Media" @if($job->priority == 'Media') selected @endif>Media</option>
                                    <option value="Alta" @if($job->priority == 'Alta') selected @endif>Alta</option>
                                    <option value="Urgente" @if($job->priority == 'Urgente') selected @endif>Urgente</option>
                                </select>
                            </div>

                            <div class="col-md-4 form-group mb-3">
                                <label for="job-status">Estatus</label>
                                <select name="job_status_id" id="job-status" class="form-control form-control-rounded">
                                    @foreach ($estatus as $est)
                                        <option
                                            value="{{ $est->id }}"
                                            @if($est->id == $job->job_status_id) selected @endif>
                                                {{ $est->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-4 form-group mb-3">
                                <label for="delivery_date">Fecha para entrega</label>
                                <input type="date"
                                    class="form-control form-control-rounded"
                                    name="delivery_date"
                                    id="delivery_date"
                                    min="{{ \Carbon\Carbon::now()->format('Y-m-d') }}"
                                    value="{{ $job->dateInputFormat('Y-m-d') }}"
                                    required>
                            </div>

                            <div class="col-md-4 form-group mb-3">
                                <label for="user_id">Responsable</label>
                                <select class="form-control form-control-rounded" name="user_id" required>
                                    @foreach ($responsables as $responsable)
                                        <option value="{{ $responsable->id }}"
                                            @if($job->user_id == $responsable->id) selected @endif>
                                            {{ $responsable->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-4 form-group mb-3">
                                <label for="tracking">Guía</label>
                                <input
                                    type="text"
                                    class="form-control form-control-rounded"
                                    name="tracking"
                                    id="tracking"
                                    value="{{$job->tracking ?? ''}}"
                                    @if(!($job->status->name === 'Finalizado')) disabled @endif
                                >
                            </div>

                            <div class="col-md-6 form-group mb-3">
                                <label for="description">Descripción</label>
                                <textarea
                                    class="form-control form-control-rounded"
                                    name="description"
                                    id="description"
                                    rows="10">{{ $job->description }}</textarea>
                            </div>

                            <div class="col-md-6 mb-3">
                                <button class="btn btn-primary add-button mb-1">+Agregar archivo</button>
                                <div id="files-input">
                                    @if($job->hasFiles())
                                    @foreach ($job->files as $file)
                                        <div class="input-group mb-1" id="parent{{ $loop->index }}">
                                            <div class="custom-file">
                                                <a class="btn btn-secondary btn-block" href="{{ $file->path }}" target="_blank">{{ $file->name }}</a>
                                            </div>
                                            {{-- <button class="btn btn-danger del-ex-doc"
                                                target="parent{{ $loop->index }}"
                                                loop-index="{{ $loop->index }}"
                                                >x</button> --}}
                                        </div>
                                    @endforeach
                                    @endif
                                </div>
                            </div>
                            <!--  end of col -->

                            <div class="col-md-12 text-center">
                                <button class="btn btn-primary">Guardar</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
        <!-- end of col -->

    </div>
    <!-- end of row -->
@endsection

@section('page-js')

    <script src="{{asset('assets/js/vendor/datatables.min.js')}}"></script>
    <script src="{{asset('assets/js/datatables.script.js')}}"></script>

    <script>
        $(document).ready(function () {
            $('.add-button').on('click', function(e){
                e.preventDefault();
                let id = (Math.random() + 1).toString(36).substring(7);
                $('#files-input')
                .append(`
                    <div class="input-group mb-1" id="parent`+id+`">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="files[]" id="`+id+`">
                            <label class="custom-file-label" for="`+id+`">Archivo</label>
                        </div>
                        <button class="btn btn-danger del-doc" target="parent`+id+`">x</button>
                    </div>`);

                    $(document).on('change', '#'+id, function(ex){
                        var fileName = document.getElementById(id).files[0].name;
                        var nextSibling = ex.target.nextElementSibling
                        nextSibling.innerText = fileName
                    })
                    $('#'+id).click();
            });

            $(document).on('click', '.del-doc', function(ez){
                ez.preventDefault();
                target = $(this).attr('target');
                $('#'+target).remove();
            })

            $(document).on('click', '.del-ex-doc', function(ez){
                ez.preventDefault();
                target = $(this).attr('target');
                path = $(this).attr('path');
                indx = $(this).attr('loop-index');
                $('#files-input')
                .append(`
                    <input type="hidden" name="files_del[]" value="`+indx+`">
                    `);
                $('#'+target).remove();
            })

            $('#job-status').on('change', function(e){
                if( $(this).val() == 4 ) {
                    $('#tracking').attr('disabled', false);
                } else {
                    $('#tracking').val(null);
                    $('#tracking').attr('disabled', true);
                }
            });
        });

    </script>
@endsection
