@extends('layouts.master')
@section('page-css')

<link rel="stylesheet" href="{{asset('assets/styles/vendor/datatables.min.css')}}">
@endsection

@section('main-content')

    <div class="row mb-4">
        <div class="col-md-12 mb-4">
            <div class="card text-right" style="align-items: end;">
                <button class="col-md-2 btn btn-primary">+ Nuevo trabajo</button>
            </div>
            <div class="separator-breadcrumb border-top"></div>
            <div class="card text-left">
                <div class="card-body">
                    <h4 class="card-title mb-3">Trabajos</h4>
                    <p>Listado de trabajos cargados en el sistema</p>
                    <div class="table-responsive">
                        <table id="zero_configuration_table" class="display table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Código</th>
                                    <th>Nombre</th>
                                    <th>Responsable</th>
                                    <th>Estatus</th>
                                    <th>Fecha enviado</th>
                                    <th>Fecha requerido</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>3</td>
                                    <td>Pendón supermercado</td>
                                    <td>Imprenta A</td>
                                    <td>
                                        <button class="btn btn-danger custom-btn  btn-sm" type="button">
                                            Retrasado
                                        </button>
                                    </td>
                                    <td>25/04/2022</td>
                                    <td>30/05/2022</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Flyer publicidad</td>
                                    <td>Imprenta B</td>
                                    <td>
                                        <button class="btn btn-warning custom-btn  btn-sm" type="button">
                                            En progreso
                                        </button>
                                    </td>
                                    <td>25/04/2022</td>
                                    <td>30/05/2022</td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>Flyer concierto</td>
                                    <td>Imprenta C</td>
                                    <td>
                                        <button class="btn btn-success custom-btn  btn-sm" type="button">
                                            Completada
                                        </button>
                                    </td>
                                    <td>25/04/2022</td>
                                    <td>30/05/2022</td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
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

@endsection
