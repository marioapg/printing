@extends('layouts.master')
@section('page-css')

<link rel="stylesheet" href="{{asset('assets/styles/vendor/datatables.min.css')}}">
@endsection

@section('main-content')

    <div class="row mb-4">
        <div class="col-md-12 mb-4">

            <div class="card text-left">
                <div class="card-body">
                    <h4 class="card-title mb-3">Trabajo</h4>
                    <p>Nuevo trabajo</p>

                    <form action="{{ route('jobs.store') }}" method="POST">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-md-6 form-group mb-3">
                                <label for="name">Nombre</label>
                                <input type="text" class="form-control form-control-rounded" name="name" id="name" placeholder="Nombre" required>
                            </div>

                            <div class="col-md-6 form-group mb-3">
                                <label for="priority">Prioridad</label>
                                <select class="form-control form-control-rounded" name="priority" required>
                                    <option value="Baja">Baja</option>
                                    <option value="Media" selected>Media</option>
                                    <option value="Alta">Alta</option>
                                    <option value="Urgente">Urgente</option>
                                </select>
                            </div>

                            <div class="col-md-6 form-group mb-3">
                                <label for="delivery_date">Fecha para entrega</label>
                                <input type="date"
                                    class="form-control form-control-rounded"
                                    name="delivery_date"
                                    id="delivery_date"
                                    placeholder="Fecha entrega"
                                    required>
                            </div>

                            <div class="col-md-6 form-group mb-3">
                                <label for="user_id">Responsable</label>
                                <select class="form-control form-control-rounded" name="user_id" required>
                                    @foreach ($responsables as $responsable)
                                        <option value="{{ $responsable->id }}">{{ $responsable->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-6 form-group mb-3">
                                <label for="description">Descripción</label>
                                <textarea
                                    class="form-control form-control-rounded"
                                    name="description"
                                    id="description"
                                    placeholder="Descripción"
                                    rows="10"></textarea>
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
