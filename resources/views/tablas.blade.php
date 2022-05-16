@extends('layouts.master')
@section('page-css')

<link rel="stylesheet" href="{{asset('assets/styles/vendor/datatables.min.css')}}">
@endsection

@section('main-content')

    <div class="row mb-4">
        <div class="col-md-12 mb-4">
            <div class="card text-left">
                <div class="card-body">
                    <div class="col-lg-12 mt-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-title">
                                        <h3 class="">Tablas</h3>
                                    </div>

                                    <div class="accordion">
                                    <div class="card ul-card__v-space">
                                        <div class="card-header header-elements-inline">
                                            <h6 class="card-title ul-collapse__icon--size ul-collapse__left-icon mb-0">
                                            <a data-toggle="collapse" class="" href="#accordion-item-icon-left-coll-1" aria-expanded="false">
                                                Accordion asdasd Item #1
                                            </a>
                                            </h6>
                                        </div>

                                        <div id="accordion-item-icon-left-coll-1" class="show">
                                            <div class="card-body">
                                                <div class="col-md-12 mb-3">
                                                    <div class="card text-left">
                                                        <div class="table-responsive">
                                                            <table class="table">
                                                                <thead>
                                                                    <tr>
                                                                        <th scope="col">#</th>
                                                                        <th scope="col">Dato 1</th>
                                                                        <th scope="col">Dato 2</th>
                                                                        <th scope="col">Dato 3</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <th scope="row">1</th>
                                                                        <td>Watch</td>
                                                                        <td>12-10-2019</td>
                                                                        <td>$30</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th scope="row">2</th>
                                                                        <td>Iphone</td>
                                                                        <td>23-10-2019</td>
                                                                        <td>$300</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th scope="row">3</th>
                                                                        <td>Watch</td>
                                                                        <td>12-10-2019</td>
                                                                        <td>$30</td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card ul-card__v-space">
                                        <div class="card-header header-elements-inline">
                                            <h6 class="card-title ul-collapse__icon--size ul-collapse__left-icon mb-0">
                                                <a data-toggle="collapse" class="collapsed" href="#accordion-item-icon-left-coll-2">Accordion Item #2</a>
                                            </h6>
                                        </div>



                                        <div id="accordion-item-icon-left-coll-2" class="collapse">
                                            <div class="card-body">
                                                <div class="col-md-12 mb-3">
                                                    <div class="card text-left">
                                                        <div class="table-responsive">
                                                            <table class="table">
                                                                <thead>
                                                                    <tr>
                                                                        <th scope="col">#</th>
                                                                        <th scope="col">Dato 1</th>
                                                                        <th scope="col">Dato 2</th>
                                                                        <th scope="col">Dato 3</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <th scope="row">1</th>
                                                                        <td>Watch</td>
                                                                        <td>12-10-2019</td>
                                                                        <td>$30</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th scope="row">2</th>
                                                                        <td>Iphone</td>
                                                                        <td>23-10-2019</td>
                                                                        <td>$300</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th scope="row">3</th>
                                                                        <td>Watch</td>
                                                                        <td>12-10-2019</td>
                                                                        <td>$30</td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card ul-card__v-space">
                                        <div class="card-header header-elements-inline">
                                            <h6 class="card-title ul-collapse__icon--size ul-collapse__left-icon mb-0">
                                                <a data-toggle="collapse" class="collapsed" href="#accordion-item-icon-left-coll-3">Accordion Item #3</a>
                                            </h6>

                                        </div>



                                        <div id="accordion-item-icon-left-coll-3" class="collapse">
                                            <div class="card-body">
                                                <div class="col-md-12 mb-3">
                                                    <div class="card text-left">
                                                        <div class="table-responsive">
                                                            <table class="table">
                                                                <thead>
                                                                    <tr>
                                                                        <th scope="col">#</th>
                                                                        <th scope="col">Dato 1</th>
                                                                        <th scope="col">Dato 2</th>
                                                                        <th scope="col">Dato 3</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <th scope="row">1</th>
                                                                        <td>Watch</td>
                                                                        <td>12-10-2019</td>
                                                                        <td>$30</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th scope="row">2</th>
                                                                        <td>Iphone</td>
                                                                        <td>23-10-2019</td>
                                                                        <td>$300</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th scope="row">3</th>
                                                                        <td>Watch</td>
                                                                        <td>12-10-2019</td>
                                                                        <td>$30</td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
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
