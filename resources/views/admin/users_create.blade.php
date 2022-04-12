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
                                <select class="form-control form-control-rounded" name="role" required>
                                    <option value="admin">Administrador</option>
                                    <option value="user">Imprenta</option>
                                </select>
                            </div>

                            <div class="col-md-3 form-group mb-3">
                                <label for="picker1">Gerencia</label>
                                <select class="form-control form-control-rounded" name="gerence_id" id="gerences" autocomplete="off">
                                    @foreach ($gerencias as $gerencia)
                                        <option value="{{ route('subgerences.ajax', $gerencia->id) }}">{{$gerencia->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-3 form-group mb-3">
                                <label for="picker1">Gerencia ventas</label>
                                <select class="form-control form-control-rounded" name="sales_gerence_id" id="subgerences" autocomplete="off">
                                    @foreach ($subgerencias as $subgerencia)
                                        <option value="{{$subgerencia->id}}">{{ $subgerencia->name }}</option>
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
