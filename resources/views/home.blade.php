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
                    <h4 class="card-title mb-3">Home</h4>
                    <p>Bienvenidos</p>
                    Bienvenidos al sistema
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
