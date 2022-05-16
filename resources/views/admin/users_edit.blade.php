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
                    <h4 class="card-title mb-3">Imprentas</h4>
                    <p>Editar información de usuario</p>

                    <form>
                    {{-- <form action="{{ route('users.update', $user->id) }}" method="POST"> --}}
                        {{-- {{ csrf_field() }}
                        @method('PUT') --}}
                        <div class="row">
                            <div class="col-md-6 form-group mb-3">
                                <label for="name">Nombre</label>
                                <input type="text"
                                class="form-control form-control-rounded"
                                name="name"
                                id="name"
                                placeholder="Nombre"
                                required
                                disabled
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
                                disabled
                                value="{{ $user->phone }}">
                            </div>
                            <div class="col-md-6 form-group mb-3">
                                <label for="password">Contraseña</label>
                                <input type="password"
                                class="form-control form-control-rounded"
                                name="password"
                                id="password"
                                placeholder="Contraseña" disabled>
                            </div>

                            <div class="col-md-6 form-group mb-3">
                                <label for="picker1">Rol</label>
                                <input type="text"
                                    value="@if ($user->hasRole('admin')) Administrador @else Imprenta @endif"
                                    class="form-control form-control-rounded"
                                    disabled>
                            </div>

                            <div class="col-md-6 form-group mb-3">
                                <label for="picker1">Gerencia</label>
                                <input type="text"
                                    value="{{ $user->gerence->name ?? '' }}"
                                    class="form-control form-control-rounded"
                                    disabled>
                            </div>
                            {{-- <div class="col-md-3 form-group mb-3">
                                <label for="picker1">Gerencia ventas</label>
                                <input type="text"
                                    value="{{ $user->salesGerence->name ?? '' }}"
                                    class="form-control form-control-rounded"
                                    disabled>
                            </div> --}}

                            {{-- <div class="col-md-12">
                                <button class="btn btn-primary">Guardar</button>
                            </div> --}}
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
            $('#gerences').on('change', function(e){
                $.ajax({
                    url: $(this).val(),
                    success: function(response) {
                        console.log(response)
                        $('#subgerences').html('');
                        newSelect = '';
                        $.each(response, function(index, value){
                            newSelect += '<option value="'+value.id+'">'+value.name+'</option>'
                        });
                        $('#subgerences').html(newSelect);
                    }
                });
            });
        });
    </script>

@endsection
