@extends('layouts.master')
@section('page-css')

<link rel="stylesheet" href="{{asset('assets/styles/vendor/datatables.min.css')}}">
@endsection

@section('main-content')

    <div class="row mb-4">
        <div class="col-md-12 mb-4">

            <div class="card text-left">
                <div class="card-body">
                    <h4 class="card-title mb-3">Imprentas</h4>
                    <p>Crear un nuevo usuario</p>

                    <form action="{{ route('users.store') }}" method="POST">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-md-6 form-group mb-3">
                                <label for="name">Nombre</label>
                                <input type="text" class="form-control form-control-rounded" name="name" id="name" placeholder="Nombre" required>
                            </div>
                            <div class="col-md-6 form-group mb-3">
                                <label for="email">Email</label>
                                <input type="text" class="form-control form-control-rounded" name="email" id="email" placeholder="Email" required>
                            </div>
                            <div class="col-md-6 form-group mb-3">
                                <label for="phone">Teléfono</label>
                                <input type="text" class="form-control form-control-rounded" name="phone" id="phone" placeholder="Teléfono" required>
                            </div>
                            <div class="col-md-6 form-group mb-3">
                                <label for="password">Contraseña</label>
                                <input type="password" class="form-control form-control-rounded" name="password" id="password" placeholder="Contraseña" required>
                            </div>

                            <div class="col-md-6 form-group mb-3">
                                <label for="picker1">Rol</label>
                                <select class="form-control form-control-rounded" name="role" id="roles-select" required>
                                    <option value="user">Imprenta</option>
                                    <option value="gerente">Gerente</option>
                                    <option value="admin-gerencia">Admin Gerencia</option>
                                    <option value="admin">Administrador</option>
                                </select>
                            </div>

                            <div class="col-md-6 form-group mb-3">
                                <label for="picker1">Gerencia</label>
                                <select class="form-control form-control-rounded" name="gerence_id" id="gerences" autocomplete="off" disabled>
                                    <option value="null"></option>
                                    @foreach ($gerencias as $gerencia)
                                        <option value="{{ $gerencia->id }}">{{$gerencia->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-12">
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
    <script>
        $(document).ready(function(){
            $('#roles-select').on('change', function(e){
                if ( $(this).val() === 'gerente' || $(this).val() === 'admin-gerencia')
                {
                    $('#gerences').attr('disabled', false);
                } else {
                    $('#gerences').attr('disabled', true);
                    $('#gerences').val('');
                }
            });
        });
    </script>
@endsection
