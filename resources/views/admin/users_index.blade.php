@extends('layouts.master')
@section('page-css')

<link rel="stylesheet" href="{{asset('assets/styles/vendor/datatables.min.css')}}">
@endsection

@section('main-content')

    <div class="row mb-4">
        <div class="col-md-12 mb-4">
            <div class="card text-right" style="align-items: end;box-shadow: none !important;">
                <a href="{{ route('users.create') }}" class="col-md-2 btn btn-primary">+ Nuevo usuario</a>
            </div>
            <div class="separator-breadcrumb"></div>
            <div class="card text-left">
                <div class="card-body">
                    <h4 class="card-title mb-3">Imprentas</h4>
                    <p>Listado de usuarios del sistema</p>
                    <div class="table-responsive">
                        <table id="zero_configuration_table" class="display table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Código</th>
                                    <th>Nombre</th>
                                    <th>Email</th>
                                    <th>Teléfono</th>
                                    <th>Estatus</th>
                                    <th>Rol</th>
                                    {{-- <th>Acciones</th> --}}
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                @foreach ($users as $user)
                                    <tr>
                                        <td>
                                            <a href="{{ route('users.edit', $user->id) }}">{{ $user->id}}</a>
                                        </td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->phone }}</td>
                                        <td>{{ $user->status }}</td>
                                        <td>{{ $user->getRoleNames()[0] }}</td>
                                        {{-- <td>
                                            <a href="{{ route('users.edit', $user->id) }}" class="text-success mr-2">
                                                <i class="nav-icon i-Pen-2 font-weight-bold"></i>
                                            </a>

                                            <a href="#"
                                                class="text-danger mr-2"
                                                onclick="confirmDelete({{$user->id}}, '{{$user->name}}')">
                                                <i class="nav-icon i-Close-Window font-weight-bold"></i>
                                            </a>
                                            <form action="{{ route('users.delete', $user->id) }}"
                                                id="form-del-user-{{$user->id}}"
                                                method="POST"
                                                onsubmit="return "
                                                style="display: none;">
                                                {{ csrf_field() }}
                                                @method('delete')
                                            </form>
                                        </td> --}}
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
    {{-- <script src="{{asset('assets/js/datatables.script.js')}}"></script> --}}

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

        function confirmDelete(user_id, user_name) {
            check = confirm('Realmente desea eliminar a cliente '+user_name+'?');

            if (!check) {

                event.preventDefault();
                return false;
            }

            document.getElementById('form-del-user-'+user_id).submit();
        }

    </script>

@endsection
