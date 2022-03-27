@extends('layouts.master')
@section('page-css')

<link rel="stylesheet" href="{{asset('assets/styles/vendor/datatables.min.css')}}">
@endsection

@section('main-content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="invoice" role="tabpanel" aria-labelledby="invoice-tab">
                        {{-- <div class="d-sm-flex mb-5" data-view="print">
                            <span class="m-auto"></span>
                            <button class="btn btn-primary mb-sm-0 mb-3 print-invoice">Print Invoice</button>
                        </div> --}}
                        <!---===== Print Area =======-->
                        <div id="print-area">
                            <div class="row">
                                <div class="col-md-6">
                                    <h4 class="font-weight-bold">Trabajo #{{ $job->id }}</h4>
                                    <p><strong>Fecha de creación: </strong>{{ $job->created_at }}</p>
                                </div>
                                <div class="col-md-6 text-sm-right">
                                    <p><strong>Estatus: </strong>
                                        <span class="badge badge-pill badge-{{ $job->statusColor() }} p-2 m-1">{{ $job->statusName() }}</span>
                                    </p>
                                    <p><strong>Fecha entrega: </strong>{{ $job->delivery_date }}</p>
                                </div>
                            </div>
                            <div class="mt-3 mb-4 border-top"></div>
                            <div class="row mb-5">
                                <div class="col-md-6 mb-3 mb-sm-0">
                                    <h5 class="font-weight-bold">Prioridad</h5>
                                    <p><span class="badge r-badge badge-outline-{{ $job->jobPriorityColor() }} p-2 m-1">{{ $job->priority }}</span></p>
                                    {{-- <span style="white-space: pre-line">
                                        rodriguez.trent@senger.com
                                        61 Johnson St. Shirley, NY 11967.

                                        +202-555-0170
                                    </span> --}}
                                </div>
                                <div class="col-md-6 text-sm-right">
                                    <h5 class="font-weight-bold">Responsable</h5>
                                    <p>{{ $job->user->name }} - {{ $job->user->email }}</p>
                                    {{-- <span style="white-space: pre-line">
                                        sales@ui-lib.com
                                        8254 S. Garfield Street. Villa Rica, GA 30180.

                                        +1-202-555-0170
                                    </span> --}}
                                </div>
                                <div class="col-md-12 text-sm-left">
                                    <h5 class="font-weight-bold">Descripción</h5>
                                    <p>{{ $job->description }}</p>
                                    {{-- <span style="white-space: pre-line">
                                        sales@ui-lib.com
                                        8254 S. Garfield Street. Villa Rica, GA 30180.

                                        +1-202-555-0170
                                    </span> --}}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <table class="table table-hover mb-4 text-center">
                                        <thead class="bg-gray-300">
                                            <tr>
                                                <th scope="col">Archivos</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><a href="#">Archivo 1</a></td>
                                            </tr>
                                            <tr>
                                                <td><a href="#">Archivo 2</a></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <!-- begin::latest log -->
                                <div class="col-lg-6 col-xl-6 mt-6 mb-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="ul-widget__head">
                                                <div class="ul-widget__head-label">
                                                    <h3 class="ul-widget__head-title">
                                                        Latest Log
                                                    </h3>
                                                </div>
                                                <div class="ul-widget__head-toolbar">
                                                    <ul class="nav nav-tabs nav-tabs-line nav-tabs-bold ul-widget-nav-tabs-line"
                                                        role="tablist">
                                                        <li class="nav-item">
                                                            <a class="nav-link active show" data-toggle="tab"
                                                                href="#__g-widget-s6-tab1-content" role="tab" aria-selected="true">
                                                                Today
                                                            </a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" data-toggle="tab" href="#__g-widget-s6-tab2-content"
                                                                role="tab" aria-selected="false">
                                                                Month
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="ul-widget__body">
                                                <div class="tab-content">
                                                    <div class="tab-pane active show" id="__g-widget-s6-tab1-content">
                                                        <div class="ul-widget-s6__items">
                                                            <div class="ul-widget-s6__item">
                                                                <span class="ul-widget-s6__badge">
                                                                    <p class="badge-dot-primary ul-widget6__dot"></p>
                                                                </span>
                                                                <span class="ul-widget-s6__text">12 new users registered</span>
                                                                <span class="ul-widget-s6__time">Just Now</span>
                                                            </div>
                                                            <div class="ul-widget-s6__item">
                                                                <span class="ul-widget-s6__badge">
                                                                    <p class="badge-dot-success ul-widget6__dot"></p>
                                                                </span>
                                                                <p class="ul-widget-s6__text">
                                                                    System shutdown
                                                                    <span class="badge badge-pill badge-primary  m-2">Primary</span>
                                                                </p>
                                                                <span class="ul-widget-s6__time">14 mins</span>
                                                            </div>

                                                            <div class="ul-widget-s6__item">
                                                                <span class="ul-widget-s6__badge">
                                                                    <p class="badge-dot-warning ul-widget6__dot"></p>
                                                                </span>
                                                                <span class="ul-widget-s6__text">System error -
                                                                    <a href="" class="typo_link text-danger">
                                                                        Danger state text</a>
                                                                </span>
                                                                <span class="ul-widget-s6__time">2 hrs </span>
                                                            </div>
                                                            <div class="ul-widget-s6__item">
                                                                <span class="ul-widget-s6__badge">
                                                                    <p class="badge-dot-danger ul-widget6__dot"></p>
                                                                </span>
                                                                <span class="ul-widget-s6__text">12 new users registered</span>
                                                                <span class="ul-widget-s6__time">Just Now</span>
                                                            </div>
                                                            <div class="ul-widget-s6__item">
                                                                <span class="ul-widget-s6__badge">
                                                                    <p class="badge-dot-info ul-widget6__dot"></p>
                                                                </span>
                                                                <p class="ul-widget-s6__text">
                                                                    System shutdown
                                                                    <span class="badge badge-pill badge-success  m-2">Primary</span>
                                                                </p>
                                                                <span class="ul-widget-s6__time">14 mins</span>
                                                            </div>

                                                            <div class="ul-widget-s6__item">
                                                                <span class="ul-widget-s6__badge">
                                                                    <p class="badge-dot-dark ul-widget6__dot"></p>
                                                                </span>
                                                                <span class="ul-widget-s6__text">System error -
                                                                    <a href="" class="typo_link text-danger">
                                                                        Danger state text</a>
                                                                </span>
                                                                <span class="ul-widget-s6__time">2 hrs </span>
                                                            </div>
                                                            <div class="ul-widget-s6__item">
                                                                <span class="ul-widget-s6__badge">
                                                                    <p class="badge-dot-primary ul-widget6__dot"></p>
                                                                </span>
                                                                <span class="ul-widget-s6__text">12 new users registered</span>
                                                                <span class="ul-widget-s6__time">Just Now</span>
                                                            </div>
                                                            <div class="ul-widget-s6__item">
                                                                <span class="ul-widget-s6__badge">
                                                                    <p class="badge-dot-success ul-widget6__dot"></p>
                                                                </span>
                                                                <p class="ul-widget-s6__text">
                                                                    System shutdown
                                                                    <span class="badge badge-pill badge-danger  m-2">Primary</span>
                                                                </p>
                                                                <span class="ul-widget-s6__time">14 mins</span>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="tab-pane" id="__g-widget-s6-tab2-content">
                                                        <div class="ul-widget2">
                                                            <div class="ul-widget-s6__items">
                                                                <div class="ul-widget-s6__item">
                                                                    <span class="ul-widget-s6__badge">
                                                                        <p class="badge-dot-danger ul-widget6__dot"></p>
                                                                    </span>
                                                                    <span class="ul-widget-s6__text">44 new users registered</span>
                                                                    <span class="ul-widget-s6__time">Just Now</span>
                                                                </div>
                                                                <div class="ul-widget-s6__item">
                                                                    <span class="ul-widget-s6__badge">
                                                                        <p class="badge-dot-warning ul-widget6__dot"></p>
                                                                    </span>
                                                                    <p class="ul-widget-s6__text">
                                                                        System shutdown
                                                                        <span class="badge badge-pill badge-primary  m-2">Primary</span>
                                                                    </p>
                                                                    <span class="ul-widget-s6__time">14 mins</span>
                                                                </div>

                                                                <div class="ul-widget-s6__item">
                                                                    <span class="ul-widget-s6__badge">
                                                                        <p class="badge-dot-primary ul-widget6__dot"></p>
                                                                    </span>
                                                                    <span class="ul-widget-s6__text">System error -
                                                                        <a href="" class="typo_link text-danger">
                                                                            Danger state text</a>
                                                                    </span>
                                                                    <span class="ul-widget-s6__time">2 hrs </span>
                                                                </div>
                                                                <div class="ul-widget-s6__item">
                                                                    <span class="ul-widget-s6__badge">
                                                                        <p class="badge-dot-danger ul-widget6__dot"></p>
                                                                    </span>
                                                                    <span class="ul-widget-s6__text">12 new users registered</span>
                                                                    <span class="ul-widget-s6__time">Just Now</span>
                                                                </div>
                                                                <div class="ul-widget-s6__item">
                                                                    <span class="ul-widget-s6__badge">
                                                                        <p class="badge-dot-info ul-widget6__dot"></p>
                                                                    </span>
                                                                    <p class="ul-widget-s6__text">
                                                                        System shutdown
                                                                        <span class="badge badge-pill badge-success  m-2">Primary</span>
                                                                    </p>
                                                                    <span class="ul-widget-s6__time">14 mins</span>
                                                                </div>

                                                                <div class="ul-widget-s6__item">
                                                                    <span class="ul-widget-s6__badge">
                                                                        <p class="badge-dot-dark ul-widget6__dot"></p>
                                                                    </span>
                                                                    <span class="ul-widget-s6__text">System error -
                                                                        <a href="" class="typo_link text-danger">
                                                                            Danger state text</a>
                                                                    </span>
                                                                    <span class="ul-widget-s6__time">2 hrs </span>
                                                                </div>
                                                                <div class="ul-widget-s6__item">
                                                                    <span class="ul-widget-s6__badge">
                                                                        <p class="badge-dot-primary ul-widget6__dot"></p>
                                                                    </span>
                                                                    <span class="ul-widget-s6__text">12 new users registered</span>
                                                                    <span class="ul-widget-s6__time">Just Now</span>
                                                                </div>
                                                                <div class="ul-widget-s6__item">
                                                                    <span class="ul-widget-s6__badge">
                                                                        <p class="badge-dot-success ul-widget6__dot"></p>
                                                                    </span>
                                                                    <span class="ul-widget-s6__text">System shutdown
                                                                        <span
                                                                            class="badge badge-pill badge-danger  m-2">Primary</span></span>
                                                                    <span class="ul-widget-s6__time">14 mins</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end::latest log -->

                            </div>
                        </div>
                        <!--==== / Print Area =====-->
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('page-js')

    <script src="{{asset('assets/js/vendor/datatables.min.js')}}"></script>
    <script src="{{asset('assets/js/datatables.script.js')}}"></script>

@endsection
