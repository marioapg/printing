@extends('layouts.master')
@section('page-css')

<link rel="stylesheet" href="{{asset('assets/styles/vendor/datatables.min.css')}}">
@endsection

@section('main-content')

    <div class="row mb-4">
        <div class="col-md-12 mb-4">
            <div class="card text-right" style="align-items: end;box-shadow: none !important;">
                <a href="{{ route('jobs.create') }}" class="col-md-2 btn btn-primary">+ Nuevo trabajo</a>
            </div>
            <div class="separator-breadcrumb"></div>
            <div class="card text-left">
                <div class="card-body">
                    <h4 class="card-title mb-3">Trabajos</h4>
                    <p>Listado de trabajos cargados en el sistema</p>
                    <div class="table-responsive">
                        <table id="zero_configuration_table" class="display table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Código</th>
                                    <th>Ver</th>
                                    <th>Nombre</th>
                                    <th>Responsable</th>
                                    <th>Gcia Gral</th>
                                    <th>Gcia Ventas</th>
                                    <th>Prioridad</th>
                                    <th>Estatus</th>
                                    <th>Fecha enviado</th>
                                    <th>Fecha requerido</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($jobs as $job)
                                    <tr>
                                        <td>
                                            <a href="{{ route('jobs.show', $job->id) }}">
                                                {{ $job->id }}
                                            </a>
                                        </td>
                                        <td>
                                            <a class="btn btn-primary" href="{{ route('jobs.show', $job->id) }}">
                                                <i class="badge-icon bg-primary text-white i-Eye"></i>
                                            </a>
                                        </td>
                                        <td>{{ $job->name }}</td>
                                        <td>{{ $job->responsable() }}</td>
                                        <td>{{ $job->printGerences() }}</td>
                                        <td>{{ $job->printSalesGerences() }}</td>
                                        <td>
                                            <button class="btn btn-outline-{{ $job->jobPriorityColor() }}" type="button">
                                                {{ $job->priority }}
                                            </button>
                                        </td>
                                        <td>
                                            <button class="btn btn-{{ $job->statusColor() }}" type="button">
                                                {{ $job->statusName() }}
                                            </button>
                                        </td>
                                        <td>{{ $job->createAtFormat('d-m-Y') }}</td>
                                        <td>{{ $job->deliveryDateFormat('d-m-Y') }}</td>
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
    <script>
        $(document).ready(function(){
            $('#zero_configuration_table').DataTable({
                language: {
				processing:     "Procesando...",
				search:         "",
				searchPlaceholder: "Buscar",
				info:           "",
				lengthMenu:     "Mostrar _MENU_",
				infoEmpty:      "Vacío",
				infoFiltered:   "Información refinada",
				infoPostFix:    "",
				loadingRecords: "Procesando...",
				zeroRecords:    "Vacio",
				emptyTable:     "Vacio",
				paginate: {
					first:      "Primero",
					previous:   "<",
					next:       ">",
					last:       "Último"
				},
				aria: {
					sortAscending:  ": Ordenar ascendente",
					sortDescending: ": Ordenar descendente"
				}
			    },
            });
        });
    </script>

@endsection
