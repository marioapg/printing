@extends('layouts.master')
@section('page-css')

<link rel="stylesheet" href="{{asset('assets/styles/vendor/datatables.min.css')}}">
@endsection

@section('main-content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="invoice" role="tabpanel" aria-labelledby="invoice-tab">
                        {{-- <div class="d-sm-flex mb-5" data-view="print">
                            <span class="m-auto"></span>
                            <button class="btn btn-primary mb-sm-0 mb-3 print-invoice">Print Invoice</button>
                        </div> --}}
                        <!---===== Print Area =======-->
                        <div id="print-area">
                            <div class="row">
                                <div class="col-md-6">
                                    <h4 class="font-weight-bold">Trabajo #{{ $job->id }}</h4>
                                    <p><strong>Fecha de creación: </strong>{{ $job->created_at }}</p>
                                </div>
                                <div class="col-md-6 text-sm-right">
                                    <p><strong>Estatus: </strong>
                                        <span class="badge badge-pill badge-{{ $job->statusColor() }} p-2 m-1">{{ $job->statusName() }}</span>
                                    </p>
                                    <p><strong>Fecha entrega: </strong>{{ $job->delivery_date }}</p>
                                </div>
                            </div>
                            <div class="mt-3 mb-4 border-top"></div>
                            <div class="row mb-5">
                                <div class="col-md-6 mb-3 mb-sm-0">
                                    <h5 class="font-weight-bold">Prioridad</h5>
                                    <p><span class="badge r-badge badge-outline-{{ $job->jobPriorityColor() }} p-2 m-1">{{ $job->priority }}</span></p>
                                    {{-- <span style="white-space: pre-line">
                                        rodriguez.trent@senger.com
                                        61 Johnson St. Shirley, NY 11967.

                                        +202-555-0170
                                    </span> --}}
                                </div>
                                <div class="col-md-6 text-sm-right">
                                    <h5 class="font-weight-bold">Responsable</h5>
                                    <p>{{ $job->user->name }} - {{ $job->user->email }}</p>
                                    {{-- <span style="white-space: pre-line">
                                        sales@ui-lib.com
                                        8254 S. Garfield Street. Villa Rica, GA 30180.

                                        +1-202-555-0170
                                    </span> --}}
                                </div>
                                <div class="col-md-12 text-sm-left">
                                    <h5 class="font-weight-bold">Descripción</h5>
                                    <p>{{ $job->description }}</p>
                                    {{-- <span style="white-space: pre-line">
                                        sales@ui-lib.com
                                        8254 S. Garfield Street. Villa Rica, GA 30180.

                                        +1-202-555-0170
                                    </span> --}}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <table class="table table-hover mb-4 text-center">
                                        <thead class="bg-gray-300">
                                            <tr>
                                                <th scope="col">Archivos</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><a href="#">Archivo 1</a></td>
                                            </tr>
                                            <tr>
                                                <td><a href="#">Archivo 2</a></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                        <!--==== / Print Area =====-->
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('page-js')

    <script src="{{asset('assets/js/vendor/datatables.min.js')}}"></script>
    <script src="{{asset('assets/js/datatables.script.js')}}"></script>

@endsection
