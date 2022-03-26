@extends('layouts.master')
@section('page-css')

<link rel="stylesheet" href="{{asset('assets/styles/vendor/datatables.min.css')}}">
@endsection

@section('main-content')

    <div class="row mb-4">
        <div class="col-md-12 mb-4">
            <div class="card text-right" style="align-items: end;">
                <a href="{{ route('jobs.create') }}" class="col-md-2 btn btn-primary">+ Nuevo trabajo</a>
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
                                @foreach($jobs as $job)
                                    <tr>
                                        <td>{{ $job->id }}</td>
                                        <td>{{ $job->name }}</td>
                                        <td>{{ $job->responsable() }}</td>
                                        <td>
                                            <button class="btn btn-danger custom-btn  btn-sm" type="button">
                                                {{ $job->statusName() }}
                                            </button>
                                        </td>
                                        <td>{{ $job->created_at }}</td>
                                        <td>{{ $job->delivery_date }}</td>
                                    </tr>
                                @endforeach
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
