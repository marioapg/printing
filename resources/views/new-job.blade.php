@extends('layouts.master')
@section('page-css')

<link rel="stylesheet" href="{{asset('assets/styles/vendor/datatables.min.css')}}">
@endsection

@section('main-content')

    <div class="row mb-4">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="card-title mb-3">Nuevo trabajo</div>
                    <form ">
                        <div class="row">
                            <div class="col-md-6 form-group mb-3">
                                <label for="firstName2">Nombre</label>
                                <input type="text" class="form-control form-control-rounded" id="firstName2" placeholder="Enter your first name">
                            </div>

                            <div class="col-md-6 form-group mb-3">
                                <label for="picker1">Responsable</label>
                                <select class="form-control form-control-rounded">
                                    <option>Imprenta A</option>
                                    <option>Imprenta B</option>
                                    <option>Imprenta C</option>
                                </select>
                            </div>

                            <div class="col-md-6 form-group mb-3">
                                <label for="picker2">Fecha esperada de entrega</label>
                                <div class="input-group">
                                    <input id="picker2" class="form-control form-control-rounded" placeholder="yyyy-mm-dd" name="dp" >
                                    <div class="input-group-append">
                                        <button class="btn btn-secondary btn-rounded"  type="button">
                                            <i class="icon-regular i-Calendar-4"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 form-group mb-3">
                                <label for="lastName2">Adjunto</label>
                                <input type="file" class="form-control form-control-rounded" id="lastName2" placeholder="Enter your last name">
                            </div>

                            <div class="col-md-12">
                                    <button class="btn btn-primary">Submit</button>
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
