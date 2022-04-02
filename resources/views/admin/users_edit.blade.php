@extends('layouts.master')
@section('page-css')

<link rel="stylesheet" href="{{asset('assets/styles/vendor/datatables.min.css')}}">
@endsection

@section('main-content')

    <div class="row mb-4">
        <div class="col-md-12 mb-4">
            <div class="card text-left">
                <div class="card-body">
                    <div class="col-md-12">
                        <div class="mt-1">
                            <button onclick="history.back()" class="btn btn-primary"> < </button>
                        </div>
                    </div>
                    <h4 class="card-title mb-3">Imprentas</h4>
                    <p>Editar información de usuario</p>

                    <form action="{{ route('users.update', $user->id) }}" method="POST">
                        {{ csrf_field() }}
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6 form-group mb-3">
                                <label for="name">Nombre</label>
                                <input type="text"
                                class="form-control form-control-rounded"
                                name="name"
                                id="name"
                                placeholder="Nombre"
                                required
                                value="{{ $user->name }}">
                            </div>
                            <div class="col-md-6 form-group mb-3">
                                <label for="email">Email</label>
                                <input type="text"
                                class="form-control form-control-rounded"
                                name="email"
                                id="email"
                                placeholder="Email"
                                required
                                value="{{ $user->email }}" disabled>
                            </div>
                            <div class="col-md-6 form-group mb-3">
                                <label for="phone">Teléfono</label>
                                <input type="text"
                                class="form-control form-control-rounded"
                                name="phone"
                                id="phone"
                                placeholder="Teléfono"
                                required
                                value="{{ $user->phone }}">
                            </div>
                            <div class="col-md-6 form-group mb-3">
                                <label for="password">Contraseña</label>
                                <input type="password"
                                class="form-control form-control-rounded"
                                name="password"
                                id="password"
                                placeholder="Contraseña">
                            </div>

                            <div class="col-md-6 form-group mb-3">
                                <label for="picker1">Rol</label>
                                <select class="form-control form-control-rounded" name="role" required>
                                    <option value="admin" @if ($user->hasRole('admin')) selected @endif>Administrador</option>
                                    <option value="user" @if ($user->hasRole('user')) selected @endif>Imprenta</option>
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

    <script src="{{asset('assets/js/vendor/datatables.min.js')}}"></script>
    <script src="{{asset('assets/js/datatables.script.js')}}"></script>

@endsection
