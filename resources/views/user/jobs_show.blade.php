@extends('layouts.master')
@section('page-css')

<link rel="stylesheet" href="{{asset('assets/styles/vendor/datatables.min.css')}}">
@endsection

@section('main-content')
    <div class="row">
        <div class="col-md-12">

            <div class="card text-right" style="align-items: end;box-shadow: none !important;">
                <button style="float:right;" onclick="history.back()" class="btn btn-primary"> < Atrás </button>
            </div>
            <div class="separator-breadcrumb"></div>

            <div class="card">
                <div class="tab-content" id="myTabContent">
                    <div class="row" id="invoice" role="tabpanel" aria-labelledby="invoice-tab">
                        {{-- <div class="d-sm-flex mb-5" data-view="print">
                            <span class="m-auto"></span>
                            <button class="btn btn-primary mb-sm-0 mb-3 print-invoice">Print Invoice</button>
                        </div> --}}

                        <div class="col-md-6">
                            <div class="row col-md-12">
                                <div class="col-md-12">
                                    <h4 class="font-weight-bold">Trabajo #{{ $job->id }}</h4>
                                    <p><strong>Fecha de creación: </strong>{{ $job->created_at }}</p>
                                </div>
                                <div class="col-md-12 text-sm-right">
                                    <p><strong>Estatus: </strong>
                                        <span class="badge badge-pill badge-{{ $job->statusColor() }} p-2 m-1">{{ $job->statusName() }}</span>
                                    </p>
                                    <p><strong>Fecha entrega: </strong>{{ $job->delivery_date }}</p>
                                </div>
                                <div class="col-md-12" style="display: inline-block;">
                                    <a href="{{ route('myjobs.edit', $job->id) }}" class="btn btn-light">Editar</a>
                                    <button style="float: right !important;" type="button" class="btn btn-info" data-toggle="modal" data-target="#modalComment">
                                        Agregar comentario
                                    </button>
                                </div>
                            </div>
                            <div class="mt-3 mb-4 border-top col-md-12"></div>
                            <div class="row mb-5 col-md-12">
                                {{-- PRIORIDAD --}}
                                <div class="col-md-6 mb-3 mb-sm-0">
                                    <h5 class="font-weight-bold">Prioridad</h5>
                                    {{-- <p><span class="badge r-badge badge-outline-{{ $job->jobPriorityColor() }} p-2 m-1">{{ $job->priority }}</span></p> --}}
                                    <p><button type="button" class="btn btn-{{ $job->jobPriorityColor() }} btn-rounded m-1">{{ $job->priority }}</button></p>
                                    {{-- <span style="white-space: pre-line">
                                        rodriguez.trent@senger.com
                                        61 Johnson St. Shirley, NY 11967.

                                        +202-555-0170
                                    </span> --}}
                                </div>

                                {{-- RESPONSABLE --}}
                                <div class="col-md-6 text-sm-right">
                                    <h5 class="font-weight-bold">Responsable</h5>
                                    <p>{{ $job->user->name }} - {{ $job->user->email }}</p>
                                    {{-- <span style="white-space: pre-line">
                                        sales@ui-lib.com
                                        8254 S. Garfield Street. Villa Rica, GA 30180.

                                        +1-202-555-0170
                                    </span> --}}
                                </div>

                                {{-- DESCRIPCION --}}
                                <div class="col-md-12 text-sm-left">
                                    <h5 class="font-weight-bold">Descripción</h5>
                                    <p>{{ $job->description }}</p>
                                    {{-- <span style="white-space: pre-line">
                                        sales@ui-lib.com
                                        8254 S. Garfield Street. Villa Rica, GA 30180.

                                        +1-202-555-0170
                                    </span> --}}
                                </div>

                                {{-- ARCHIVOS --}}
                                <div class="col-md-12">
                                    <table class="table table-hover mb-4 text-center">
                                        <thead class="bg-gray-300">
                                            <tr>
                                                <th scope="col">Archivos</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if ($job->hasFiles())
                                                @foreach ($job->files as $file)
                                                <tr>
                                                    <td>
                                                        <a target="_blank" href="{{$file->path}}">{{$file->name}}</a>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            @else
                                                <tr>
                                                    <td>
                                                        No hay archivos
                                                    </td>
                                                </tr>
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                                
                                <div class="accordion col-md-12">
                                    <div class="card ul-card__v-space">
                                        <div class="card-header header-elements-inline">
                                            <h6 class="card-title ul-collapse__icon--size ul-collapse__left-icon mb-0">
                                            <a data-toggle="collapse" class="" href="#accordion-item-icon-left-coll-1" aria-expanded="false">
                                                BASE MULTIAFICHE 5 COSTA (2)
                                            </a>
                                            </h6>
                                        </div>
    
                                        <div id="accordion-item-icon-left-coll-1" class="show">
                                            <div class="card-body">
                                                <div class="col-md-12 mb-3">
                                                    <div class="card text-left">
                                                        <div class="table-responsive" style="overflow: scroll;height: 300px;">
                                                            <table cellspacing="0" border="0">
                                                                <colgroup width="160"></colgroup>
                                                                <colgroup width="224"></colgroup>
                                                                <colgroup span="2" width="98"></colgroup>
                                                                <tr>
                                                                    <td style="border-bottom: 1px solid #8faadc" height="20" align="left" valign=bottom bgcolor="#DAE3F3"><b><font color="#000000">GERENCIA</font></b></td>
                                                                    <td style="border-bottom: 1px solid #8faadc" align="left" valign=bottom bgcolor="#DAE3F3"><b><font color="#000000">GERENCIA V</font></b></td>
                                                                    <td style="border-bottom: 1px solid #8faadc" align="left" valign=bottom bgcolor="#DAE3F3"><b><font color="#000000">DESARROLLO</font></b></td>
                                                                    <td align="right" valign=bottom bgcolor="#DAE3F3"><b><font color="#000000">BASE1</font></b></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC COSTA CENTRO</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC CHONE</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECB436</font></td>
                                                                    <td align="right" valign=bottom sdval="28" sdnum="1033;"><font color="#000000">28</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC COSTA CENTRO</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC CHONE</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECB446</font></td>
                                                                    <td align="right" valign=bottom sdval="30" sdnum="1033;"><font color="#000000">30</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC COSTA CENTRO</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC CHONE</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECB449</font></td>
                                                                    <td align="right" valign=bottom sdval="32" sdnum="1033;"><font color="#000000">32</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC COSTA CENTRO</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC CHONE</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECB495</font></td>
                                                                    <td align="right" valign=bottom sdval="26" sdnum="1033;"><font color="#000000">26</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC COSTA CENTRO</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC CHONE</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECB604</font></td>
                                                                    <td align="right" valign=bottom sdval="28" sdnum="1033;"><font color="#000000">28</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC COSTA CENTRO</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC CHONE</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECBA49</font></td>
                                                                    <td align="right" valign=bottom sdval="26" sdnum="1033;"><font color="#000000">26</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC COSTA CENTRO</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC CHONE</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECBA50</font></td>
                                                                    <td align="right" valign=bottom sdval="32" sdnum="1033;"><font color="#000000">32</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC COSTA CENTRO</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC CHONE</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECBA51</font></td>
                                                                    <td align="right" valign=bottom sdval="32" sdnum="1033;"><font color="#000000">32</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC COSTA CENTRO</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC MANABI WHS</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECB012</font></td>
                                                                    <td align="right" valign=bottom sdval="20" sdnum="1033;"><font color="#000000">20</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC COSTA CENTRO</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC MANABI WHS</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECB046</font></td>
                                                                    <td align="right" valign=bottom sdval="20" sdnum="1033;"><font color="#000000">20</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC COSTA CENTRO</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC MANABI WHS</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECB428</font></td>
                                                                    <td align="right" valign=bottom sdval="20" sdnum="1033;"><font color="#000000">20</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC COSTA CENTRO</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC MANTA</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECB135</font></td>
                                                                    <td align="right" valign=bottom sdval="20" sdnum="1033;"><font color="#000000">20</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC COSTA CENTRO</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC MANTA</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECB436</font></td>
                                                                    <td align="right" valign=bottom sdval="20" sdnum="1033;"><font color="#000000">20</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC COSTA CENTRO</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC MANTA</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECB447</font></td>
                                                                    <td align="right" valign=bottom sdval="32" sdnum="1033;"><font color="#000000">32</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC COSTA CENTRO</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC MANTA</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECB448</font></td>
                                                                    <td align="right" valign=bottom sdval="30" sdnum="1033;"><font color="#000000">30</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC COSTA CENTRO</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC MANTA</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECB449</font></td>
                                                                    <td align="right" valign=bottom sdval="20" sdnum="1033;"><font color="#000000">20</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC COSTA CENTRO</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC MANTA</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECB450</font></td>
                                                                    <td align="right" valign=bottom sdval="32" sdnum="1033;"><font color="#000000">32</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC COSTA CENTRO</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC MANTA</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECB451</font></td>
                                                                    <td align="right" valign=bottom sdval="42" sdnum="1033;"><font color="#000000">42</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC COSTA CENTRO</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC MANTA</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECB495</font></td>
                                                                    <td align="right" valign=bottom sdval="20" sdnum="1033;"><font color="#000000">20</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC COSTA CENTRO</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC MANTA</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECB605</font></td>
                                                                    <td align="right" valign=bottom sdval="40" sdnum="1033;"><font color="#000000">40</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC COSTA CENTRO</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC MANTA</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECB606</font></td>
                                                                    <td align="right" valign=bottom sdval="42" sdnum="1033;"><font color="#000000">42</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC COSTA CENTRO</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC MANTA</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECB607</font></td>
                                                                    <td align="right" valign=bottom sdval="36" sdnum="1033;"><font color="#000000">36</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC COSTA CENTRO</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC MANTA</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECB608</font></td>
                                                                    <td align="right" valign=bottom sdval="32" sdnum="1033;"><font color="#000000">32</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC COSTA CENTRO</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC MANTA</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECB609</font></td>
                                                                    <td align="right" valign=bottom sdval="32" sdnum="1033;"><font color="#000000">32</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC COSTA CENTRO</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC MANTA</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECB610</font></td>
                                                                    <td align="right" valign=bottom sdval="30" sdnum="1033;"><font color="#000000">30</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC COSTA CENTRO</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC MANTA</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECBA31</font></td>
                                                                    <td align="right" valign=bottom sdval="34" sdnum="1033;"><font color="#000000">34</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC COSTA CENTRO</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC MANTA</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECBA49</font></td>
                                                                    <td align="right" valign=bottom sdval="20" sdnum="1033;"><font color="#000000">20</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC COSTA CENTRO</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC MANTA</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECBA51</font></td>
                                                                    <td align="right" valign=bottom sdval="20" sdnum="1033;"><font color="#000000">20</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC COSTA CENTRO</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC NUEVO 19</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECB500</font></td>
                                                                    <td align="right" valign=bottom sdval="20" sdnum="1033;"><font color="#000000">20</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC COSTA CENTRO</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC NUEVO 19</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECB615</font></td>
                                                                    <td align="right" valign=bottom sdval="20" sdnum="1033;"><font color="#000000">20</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC COSTA CENTRO</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC NUEVO 19</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECB616</font></td>
                                                                    <td align="right" valign=bottom sdval="20" sdnum="1033;"><font color="#000000">20</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC COSTA CENTRO</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC NUEVO 19</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECB617</font></td>
                                                                    <td align="right" valign=bottom sdval="34" sdnum="1033;"><font color="#000000">34</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC COSTA CENTRO</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC NUEVO 19</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECBA42</font></td>
                                                                    <td align="right" valign=bottom sdval="22" sdnum="1033;"><font color="#000000">22</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC COSTA CENTRO</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC NUEVO 19</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECBA43</font></td>
                                                                    <td align="right" valign=bottom sdval="28" sdnum="1033;"><font color="#000000">28</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC COSTA CENTRO</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC NUEVO 19</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECBA44</font></td>
                                                                    <td align="right" valign=bottom sdval="28" sdnum="1033;"><font color="#000000">28</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC COSTA CENTRO</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC NUEVO 19</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECBA45</font></td>
                                                                    <td align="right" valign=bottom sdval="22" sdnum="1033;"><font color="#000000">22</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC COSTA CENTRO</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC PORTOVIEJO</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECB016</font></td>
                                                                    <td align="right" valign=bottom sdval="20" sdnum="1033;"><font color="#000000">20</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC COSTA CENTRO</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC PORTOVIEJO</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECB431</font></td>
                                                                    <td align="right" valign=bottom sdval="32" sdnum="1033;"><font color="#000000">32</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC COSTA CENTRO</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC PORTOVIEJO</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECB440</font></td>
                                                                    <td align="right" valign=bottom sdval="30" sdnum="1033;"><font color="#000000">30</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC COSTA CENTRO</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC PORTOVIEJO</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECB441</font></td>
                                                                    <td align="right" valign=bottom sdval="38" sdnum="1033;"><font color="#000000">38</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC COSTA CENTRO</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC PORTOVIEJO</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECB443</font></td>
                                                                    <td align="right" valign=bottom sdval="40" sdnum="1033;"><font color="#000000">40</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC COSTA CENTRO</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC PORTOVIEJO</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECB446</font></td>
                                                                    <td align="right" valign=bottom sdval="20" sdnum="1033;"><font color="#000000">20</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC COSTA CENTRO</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC PORTOVIEJO</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECB611</font></td>
                                                                    <td align="right" valign=bottom sdval="38" sdnum="1033;"><font color="#000000">38</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC COSTA CENTRO</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC PORTOVIEJO</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECB612</font></td>
                                                                    <td align="right" valign=bottom sdval="34" sdnum="1033;"><font color="#000000">34</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC COSTA CENTRO</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC PORTOVIEJO</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECB613</font></td>
                                                                    <td align="right" valign=bottom sdval="28" sdnum="1033;"><font color="#000000">28</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC COSTA CENTRO</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC PORTOVIEJO</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECB614</font></td>
                                                                    <td align="right" valign=bottom sdval="30" sdnum="1033;"><font color="#000000">30</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC COSTA CENTRO</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC PORTOVIEJO</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECBA44</font></td>
                                                                    <td align="right" valign=bottom sdval="20" sdnum="1033;"><font color="#000000">20</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC COSTA CENTRO</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC PORTOVIEJO</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECBA48</font></td>
                                                                    <td align="right" valign=bottom sdval="32" sdnum="1033;"><font color="#000000">32</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC COSTA CENTRO</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC STAELENA PLAYAS</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECB036</font></td>
                                                                    <td align="right" valign=bottom sdval="32" sdnum="1033;"><font color="#000000">32</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC COSTA CENTRO</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC STAELENA PLAYAS</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECB278</font></td>
                                                                    <td align="right" valign=bottom sdval="20" sdnum="1033;"><font color="#000000">20</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC COSTA CENTRO</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC STAELENA PLAYAS</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECB320</font></td>
                                                                    <td align="right" valign=bottom sdval="40" sdnum="1033;"><font color="#000000">40</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC COSTA CENTRO</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC STAELENA PLAYAS</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECB466</font></td>
                                                                    <td align="right" valign=bottom sdval="34" sdnum="1033;"><font color="#000000">34</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC COSTA CENTRO</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC STAELENA PLAYAS</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECB496</font></td>
                                                                    <td align="right" valign=bottom sdval="44" sdnum="1033;"><font color="#000000">44</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC COSTA CENTRO</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC STAELENA PLAYAS</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECB500</font></td>
                                                                    <td align="right" valign=bottom sdval="20" sdnum="1033;"><font color="#000000">20</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC COSTA CENTRO</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC STAELENA PLAYAS</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECB618</font></td>
                                                                    <td align="right" valign=bottom sdval="30" sdnum="1033;"><font color="#000000">30</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC COSTA CENTRO</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC STAELENA PLAYAS</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECBA05</font></td>
                                                                    <td align="right" valign=bottom sdval="30" sdnum="1033;"><font color="#000000">30</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC COSTA CENTRO</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC STAELENA PLAYAS</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECBA25</font></td>
                                                                    <td align="right" valign=bottom sdval="24" sdnum="1033;"><font color="#000000">24</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC COSTA CENTRO</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC STAELENA PLAYAS</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECBA26</font></td>
                                                                    <td align="right" valign=bottom sdval="44" sdnum="1033;"><font color="#000000">44</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC COSTA CENTRO</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC STAELENA PLAYAS</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECBA46</font></td>
                                                                    <td align="right" valign=bottom sdval="40" sdnum="1033;"><font color="#000000">40</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC COSTA CENTRO</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC STAELENA PLAYAS</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECBA60</font></td>
                                                                    <td align="right" valign=bottom sdval="26" sdnum="1033;"><font color="#000000">26</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC COSTA CENTRO</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC STAELENA PLAYAS</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECBA64</font></td>
                                                                    <td align="right" valign=bottom sdval="32" sdnum="1033;"><font color="#000000">32</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td style="border-bottom: 1px solid #8faadc" height="20" align="left" valign=bottom><b><font color="#000000">EC COSTA CENTRO</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC STAELENA PLAYAS</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECBA67</font></td>
                                                                    <td align="right" valign=bottom sdval="20" sdnum="1033;"><font color="#000000">20</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC COSTA NORTE</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC COSTA NORTE WHS</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECB023</font></td>
                                                                    <td align="right" valign=bottom sdval="20" sdnum="1033;"><font color="#000000">20</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC COSTA NORTE</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC COSTA NORTE WHS</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECB024</font></td>
                                                                    <td align="right" valign=bottom sdval="20" sdnum="1033;"><font color="#000000">20</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC COSTA NORTE</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC COSTA NORTE WHS</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECB040</font></td>
                                                                    <td align="right" valign=bottom sdval="20" sdnum="1033;"><font color="#000000">20</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC COSTA NORTE</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC ESM QUININDE</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECB187</font></td>
                                                                    <td align="right" valign=bottom sdval="28" sdnum="1033;"><font color="#000000">28</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC COSTA NORTE</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC ESM QUININDE</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECB413</font></td>
                                                                    <td align="right" valign=bottom sdval="28" sdnum="1033;"><font color="#000000">28</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC COSTA NORTE</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC ESM QUININDE</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECB421</font></td>
                                                                    <td align="right" valign=bottom sdval="36" sdnum="1033;"><font color="#000000">36</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC COSTA NORTE</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC ESM QUININDE</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECB437</font></td>
                                                                    <td align="right" valign=bottom sdval="36" sdnum="1033;"><font color="#000000">36</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC COSTA NORTE</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC ESM QUININDE</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECBA57</font></td>
                                                                    <td align="right" valign=bottom sdval="28" sdnum="1033;"><font color="#000000">28</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC COSTA NORTE</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC ESM QUININDE</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECBA59</font></td>
                                                                    <td align="right" valign=bottom sdval="22" sdnum="1033;"><font color="#000000">22</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC COSTA NORTE</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC ESM QUININDE</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECBA70</font></td>
                                                                    <td align="right" valign=bottom sdval="26" sdnum="1033;"><font color="#000000">26</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC COSTA NORTE</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC ESM SAN LORENZO</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECB186</font></td>
                                                                    <td align="right" valign=bottom sdval="20" sdnum="1033;"><font color="#000000">20</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC COSTA NORTE</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC ESM SAN LORENZO</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECB424</font></td>
                                                                    <td align="right" valign=bottom sdval="20" sdnum="1033;"><font color="#000000">20</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC COSTA NORTE</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC ESM SAN LORENZO</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECB425</font></td>
                                                                    <td align="right" valign=bottom sdval="24" sdnum="1033;"><font color="#000000">24</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC COSTA NORTE</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC ESM SAN LORENZO</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECB426</font></td>
                                                                    <td align="right" valign=bottom sdval="32" sdnum="1033;"><font color="#000000">32</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC COSTA NORTE</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC ESM SAN LORENZO</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECB429</font></td>
                                                                    <td align="right" valign=bottom sdval="28" sdnum="1033;"><font color="#000000">28</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC COSTA NORTE</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC ESM SAN LORENZO</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECB559</font></td>
                                                                    <td align="right" valign=bottom sdval="24" sdnum="1033;"><font color="#000000">24</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC COSTA NORTE</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC ESM SAN LORENZO</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECBA61</font></td>
                                                                    <td align="right" valign=bottom sdval="32" sdnum="1033;"><font color="#000000">32</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC COSTA NORTE</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC ESM SAN LORENZO</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECBA62</font></td>
                                                                    <td align="right" valign=bottom sdval="26" sdnum="1033;"><font color="#000000">26</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC COSTA NORTE</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC ESM SAN LORENZO</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECBA63</font></td>
                                                                    <td align="right" valign=bottom sdval="22" sdnum="1033;"><font color="#000000">22</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC COSTA NORTE</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC ESM SAN LORENZO</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECBA68</font></td>
                                                                    <td align="right" valign=bottom sdval="28" sdnum="1033;"><font color="#000000">28</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC COSTA NORTE</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC ESM SAN LORENZO</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECBA97</font></td>
                                                                    <td align="right" valign=bottom sdval="20" sdnum="1033;"><font color="#000000">20</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC COSTA NORTE</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC ESM SAN LORENZO</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECBA98</font></td>
                                                                    <td align="right" valign=bottom sdval="20" sdnum="1033;"><font color="#000000">20</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC COSTA NORTE</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC QUEVEDO</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECB128</font></td>
                                                                    <td align="right" valign=bottom sdval="20" sdnum="1033;"><font color="#000000">20</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC COSTA NORTE</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC QUEVEDO</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECB190</font></td>
                                                                    <td align="right" valign=bottom sdval="20" sdnum="1033;"><font color="#000000">20</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC COSTA NORTE</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC QUEVEDO</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECB401</font></td>
                                                                    <td align="right" valign=bottom sdval="28" sdnum="1033;"><font color="#000000">28</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC COSTA NORTE</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC QUEVEDO</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECB402</font></td>
                                                                    <td align="right" valign=bottom sdval="24" sdnum="1033;"><font color="#000000">24</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC COSTA NORTE</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC QUEVEDO</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECB403</font></td>
                                                                    <td align="right" valign=bottom sdval="20" sdnum="1033;"><font color="#000000">20</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC COSTA NORTE</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC QUEVEDO</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECB404</font></td>
                                                                    <td align="right" valign=bottom sdval="20" sdnum="1033;"><font color="#000000">20</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC COSTA NORTE</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC QUEVEDO</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECB405</font></td>
                                                                    <td align="right" valign=bottom sdval="20" sdnum="1033;"><font color="#000000">20</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC COSTA NORTE</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC QUEVEDO</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECB406</font></td>
                                                                    <td align="right" valign=bottom sdval="20" sdnum="1033;"><font color="#000000">20</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC COSTA NORTE</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC QUEVEDO</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECB407</font></td>
                                                                    <td align="right" valign=bottom sdval="20" sdnum="1033;"><font color="#000000">20</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC COSTA NORTE</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC QUEVEDO</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECB560</font></td>
                                                                    <td align="right" valign=bottom sdval="26" sdnum="1033;"><font color="#000000">26</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC COSTA NORTE</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC QUEVEDO RURAL</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECB127</font></td>
                                                                    <td align="right" valign=bottom sdval="22" sdnum="1033;"><font color="#000000">22</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC COSTA NORTE</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC QUEVEDO RURAL</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECB408</font></td>
                                                                    <td align="right" valign=bottom sdval="22" sdnum="1033;"><font color="#000000">22</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC COSTA NORTE</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC QUEVEDO RURAL</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECB411</font></td>
                                                                    <td align="right" valign=bottom sdval="24" sdnum="1033;"><font color="#000000">24</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC COSTA NORTE</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC QUEVEDO RURAL</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECB412</font></td>
                                                                    <td align="right" valign=bottom sdval="24" sdnum="1033;"><font color="#000000">24</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC COSTA NORTE</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC QUEVEDO RURAL</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECB561</font></td>
                                                                    <td align="right" valign=bottom sdval="24" sdnum="1033;"><font color="#000000">24</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC COSTA NORTE</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC QUEVEDO RURAL</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECB562</font></td>
                                                                    <td align="right" valign=bottom sdval="22" sdnum="1033;"><font color="#000000">22</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC COSTA NORTE</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC STO DOMINGO</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECB059</font></td>
                                                                    <td align="right" valign=bottom sdval="30" sdnum="1033;"><font color="#000000">30</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC COSTA NORTE</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC STO DOMINGO</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECB189</font></td>
                                                                    <td align="right" valign=bottom sdval="30" sdnum="1033;"><font color="#000000">30</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC COSTA NORTE</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC STO DOMINGO</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECB410</font></td>
                                                                    <td align="right" valign=bottom sdval="28" sdnum="1033;"><font color="#000000">28</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC COSTA NORTE</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC STO DOMINGO</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECB416</font></td>
                                                                    <td align="right" valign=bottom sdval="26" sdnum="1033;"><font color="#000000">26</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC COSTA NORTE</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC STO DOMINGO</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECB420</font></td>
                                                                    <td align="right" valign=bottom sdval="34" sdnum="1033;"><font color="#000000">34</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC COSTA NORTE</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC STO DOMINGO</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECB422</font></td>
                                                                    <td align="right" valign=bottom sdval="32" sdnum="1033;"><font color="#000000">32</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC COSTA NORTE</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC STO DOMINGO</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECB423</font></td>
                                                                    <td align="right" valign=bottom sdval="20" sdnum="1033;"><font color="#000000">20</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC COSTA NORTE</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC STO DOMINGO</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECB563</font></td>
                                                                    <td align="right" valign=bottom sdval="26" sdnum="1033;"><font color="#000000">26</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC COSTA NORTE</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC STO DOMINGO</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECB564</font></td>
                                                                    <td align="right" valign=bottom sdval="26" sdnum="1033;"><font color="#000000">26</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC COSTA NORTE</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC STO DOMINGO</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECB565</font></td>
                                                                    <td align="right" valign=bottom sdval="28" sdnum="1033;"><font color="#000000">28</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC COSTA NORTE</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC STO DOMINGO</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECB566</font></td>
                                                                    <td align="right" valign=bottom sdval="32" sdnum="1033;"><font color="#000000">32</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC COSTA NORTE</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC STO DOMINGO</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECB567</font></td>
                                                                    <td align="right" valign=bottom sdval="32" sdnum="1033;"><font color="#000000">32</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC COSTA NORTE</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC STO DOMINGO COSTA</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECB568</font></td>
                                                                    <td align="right" valign=bottom sdval="20" sdnum="1033;"><font color="#000000">20</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC COSTA NORTE</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC STO DOMINGO COSTA</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECB569</font></td>
                                                                    <td align="right" valign=bottom sdval="32" sdnum="1033;"><font color="#000000">32</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC COSTA NORTE</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC STO DOMINGO COSTA</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECBA15</font></td>
                                                                    <td align="right" valign=bottom sdval="26" sdnum="1033;"><font color="#000000">26</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC COSTA NORTE</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC STO DOMINGO COSTA</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECBA58</font></td>
                                                                    <td align="right" valign=bottom sdval="20" sdnum="1033;"><font color="#000000">20</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC COSTA NORTE</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC STO DOMINGO COSTA</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECBA72</font></td>
                                                                    <td align="right" valign=bottom sdval="20" sdnum="1033;"><font color="#000000">20</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC COSTA NORTE</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC STO DOMINGO COSTA</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECBA73</font></td>
                                                                    <td align="right" valign=bottom sdval="22" sdnum="1033;"><font color="#000000">22</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC COSTA NORTE</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC STO DOMINGO COSTA</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECBA75</font></td>
                                                                    <td align="right" valign=bottom sdval="20" sdnum="1033;"><font color="#000000">20</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC COSTA NORTE</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC STO DOMINGO SIERR</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECB415</font></td>
                                                                    <td align="right" valign=bottom sdval="20" sdnum="1033;"><font color="#000000">20</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC COSTA NORTE</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC STO DOMINGO SIERR</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECB570</font></td>
                                                                    <td align="right" valign=bottom sdval="20" sdnum="1033;"><font color="#000000">20</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC COSTA NORTE</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC STO DOMINGO SIERR</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECB571</font></td>
                                                                    <td align="right" valign=bottom sdval="28" sdnum="1033;"><font color="#000000">28</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC COSTA NORTE</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC STO DOMINGO SIERR</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECB572</font></td>
                                                                    <td align="right" valign=bottom sdval="24" sdnum="1033;"><font color="#000000">24</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC COSTA NORTE</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC STO DOMINGO SIERR</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECBA13</font></td>
                                                                    <td align="right" valign=bottom sdval="24" sdnum="1033;"><font color="#000000">24</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC COSTA NORTE</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC STO DOMINGO SIERR</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECBA69</font></td>
                                                                    <td align="right" valign=bottom sdval="20" sdnum="1033;"><font color="#000000">20</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td style="border-bottom: 1px solid #8faadc" height="20" align="left" valign=bottom><b><font color="#000000">EC COSTA NORTE</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC STO DOMINGO SIERR</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECBA71</font></td>
                                                                    <td align="right" valign=bottom sdval="20" sdnum="1033;"><font color="#000000">20</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC COSTA SUR</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC COSTA SUR WHS</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECB013</font></td>
                                                                    <td align="right" valign=bottom sdval="20" sdnum="1033;"><font color="#000000">20</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC COSTA SUR</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC COSTA SUR WHS</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECB026</font></td>
                                                                    <td align="right" valign=bottom sdval="20" sdnum="1033;"><font color="#000000">20</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC COSTA SUR</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC COSTA SUR WHS</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECB198</font></td>
                                                                    <td align="right" valign=bottom sdval="20" sdnum="1033;"><font color="#000000">20</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC COSTA SUR</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC COSTA SUR WHS</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECB459</font></td>
                                                                    <td align="right" valign=bottom sdval="20" sdnum="1033;"><font color="#000000">20</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC COSTA SUR</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC DAULE</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECB133</font></td>
                                                                    <td align="right" valign=bottom sdval="20" sdnum="1033;"><font color="#000000">20</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC COSTA SUR</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC DAULE</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECB192</font></td>
                                                                    <td align="right" valign=bottom sdval="24" sdnum="1033;"><font color="#000000">24</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC COSTA SUR</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC DAULE</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECB193</font></td>
                                                                    <td align="right" valign=bottom sdval="20" sdnum="1033;"><font color="#000000">20</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC COSTA SUR</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC DAULE</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECB233</font></td>
                                                                    <td align="right" valign=bottom sdval="30" sdnum="1033;"><font color="#000000">30</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC COSTA SUR</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC DAULE</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECBA01</font></td>
                                                                    <td align="right" valign=bottom sdval="32" sdnum="1033;"><font color="#000000">32</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC COSTA SUR</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC DAULE</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECBA02</font></td>
                                                                    <td align="right" valign=bottom sdval="30" sdnum="1033;"><font color="#000000">30</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC COSTA SUR</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC DAULE</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECBA03</font></td>
                                                                    <td align="right" valign=bottom sdval="30" sdnum="1033;"><font color="#000000">30</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC COSTA SUR</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC DAULE</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECBA38</font></td>
                                                                    <td align="right" valign=bottom sdval="20" sdnum="1033;"><font color="#000000">20</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC COSTA SUR</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC MACHALA</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECB287</font></td>
                                                                    <td align="right" valign=bottom sdval="20" sdnum="1033;"><font color="#000000">20</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC COSTA SUR</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC MACHALA</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECB288</font></td>
                                                                    <td align="right" valign=bottom sdval="24" sdnum="1033;"><font color="#000000">24</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC COSTA SUR</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC MACHALA</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECB289</font></td>
                                                                    <td align="right" valign=bottom sdval="26" sdnum="1033;"><font color="#000000">26</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC COSTA SUR</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC MACHALA</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECB291</font></td>
                                                                    <td align="right" valign=bottom sdval="24" sdnum="1033;"><font color="#000000">24</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC COSTA SUR</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC MACHALA</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECB293</font></td>
                                                                    <td align="right" valign=bottom sdval="26" sdnum="1033;"><font color="#000000">26</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC COSTA SUR</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC MACHALA</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECB573</font></td>
                                                                    <td align="right" valign=bottom sdval="28" sdnum="1033;"><font color="#000000">28</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC COSTA SUR</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC MACHALA</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECB574</font></td>
                                                                    <td align="right" valign=bottom sdval="34" sdnum="1033;"><font color="#000000">34</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC COSTA SUR</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC MACHALA</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECB575</font></td>
                                                                    <td align="right" valign=bottom sdval="32" sdnum="1033;"><font color="#000000">32</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC COSTA SUR</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC MACHALA</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECB576</font></td>
                                                                    <td align="right" valign=bottom sdval="36" sdnum="1033;"><font color="#000000">36</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC COSTA SUR</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC MACHALA</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECBA91</font></td>
                                                                    <td align="right" valign=bottom sdval="28" sdnum="1033;"><font color="#000000">28</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC COSTA SUR</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC MACHALA SUR</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECB069</font></td>
                                                                    <td align="right" valign=bottom sdval="22" sdnum="1033;"><font color="#000000">22</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC COSTA SUR</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC MACHALA SUR</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECB175</font></td>
                                                                    <td align="right" valign=bottom sdval="20" sdnum="1033;"><font color="#000000">20</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC COSTA SUR</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC MACHALA SUR</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECB292</font></td>
                                                                    <td align="right" valign=bottom sdval="20" sdnum="1033;"><font color="#000000">20</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC COSTA SUR</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC MACHALA SUR</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECB577</font></td>
                                                                    <td align="right" valign=bottom sdval="24" sdnum="1033;"><font color="#000000">24</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC COSTA SUR</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC MACHALA SUR</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECB578</font></td>
                                                                    <td align="right" valign=bottom sdval="30" sdnum="1033;"><font color="#000000">30</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC COSTA SUR</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC MACHALA SUR</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECBA08</font></td>
                                                                    <td align="right" valign=bottom sdval="20" sdnum="1033;"><font color="#000000">20</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC COSTA SUR</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC MACHALA SUR</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECBA18</font></td>
                                                                    <td align="right" valign=bottom sdval="20" sdnum="1033;"><font color="#000000">20</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC COSTA SUR</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC MACHALA SUR</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECBA33</font></td>
                                                                    <td align="right" valign=bottom sdval="20" sdnum="1033;"><font color="#000000">20</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC COSTA SUR</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC MACHALA SUR</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECBA66</font></td>
                                                                    <td align="right" valign=bottom sdval="20" sdnum="1033;"><font color="#000000">20</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC COSTA SUR</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC MACHALA SUR</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECBA94</font></td>
                                                                    <td align="right" valign=bottom sdval="24" sdnum="1033;"><font color="#000000">24</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC COSTA SUR</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC MILAGRO KM26</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECB191</font></td>
                                                                    <td align="right" valign=bottom sdval="20" sdnum="1033;"><font color="#000000">20</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC COSTA SUR</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC MILAGRO KM26</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECB295</font></td>
                                                                    <td align="right" valign=bottom sdval="20" sdnum="1033;"><font color="#000000">20</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC COSTA SUR</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC MILAGRO KM26</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECB296</font></td>
                                                                    <td align="right" valign=bottom sdval="20" sdnum="1033;"><font color="#000000">20</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC COSTA SUR</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC MILAGRO KM26</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECB297</font></td>
                                                                    <td align="right" valign=bottom sdval="20" sdnum="1033;"><font color="#000000">20</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC COSTA SUR</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC MILAGRO KM26</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECB298</font></td>
                                                                    <td align="right" valign=bottom sdval="32" sdnum="1033;"><font color="#000000">32</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC COSTA SUR</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC MILAGRO KM26</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECB579</font></td>
                                                                    <td align="right" valign=bottom sdval="28" sdnum="1033;"><font color="#000000">28</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC COSTA SUR</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC MILAGRO KM26</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECB580</font></td>
                                                                    <td align="right" valign=bottom sdval="34" sdnum="1033;"><font color="#000000">34</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC COSTA SUR</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC MILAGRO KM26</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECBA27</font></td>
                                                                    <td align="right" valign=bottom sdval="20" sdnum="1033;"><font color="#000000">20</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC COSTA SUR</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC MILAGRO KM26</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECBA30</font></td>
                                                                    <td align="right" valign=bottom sdval="20" sdnum="1033;"><font color="#000000">20</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC COSTA SUR</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC MILAGRO KM26</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECBA37</font></td>
                                                                    <td align="right" valign=bottom sdval="30" sdnum="1033;"><font color="#000000">30</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC COSTA SUR</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC TRONCAL MACHALA</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECB581</font></td>
                                                                    <td align="right" valign=bottom sdval="26" sdnum="1033;"><font color="#000000">26</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC COSTA SUR</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC TRONCAL MACHALA</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECB582</font></td>
                                                                    <td align="right" valign=bottom sdval="20" sdnum="1033;"><font color="#000000">20</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC COSTA SUR</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC TRONCAL MACHALA</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECB583</font></td>
                                                                    <td align="right" valign=bottom sdval="22" sdnum="1033;"><font color="#000000">22</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC COSTA SUR</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC TRONCAL MACHALA</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECBA07</font></td>
                                                                    <td align="right" valign=bottom sdval="22" sdnum="1033;"><font color="#000000">22</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC COSTA SUR</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC TRONCAL MACHALA</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECBA09</font></td>
                                                                    <td align="right" valign=bottom sdval="28" sdnum="1033;"><font color="#000000">28</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC COSTA SUR</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC TRONCAL MACHALA</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECBA10</font></td>
                                                                    <td align="right" valign=bottom sdval="20" sdnum="1033;"><font color="#000000">20</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC COSTA SUR</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC TRONCAL MACHALA</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECBA12</font></td>
                                                                    <td align="right" valign=bottom sdval="20" sdnum="1033;"><font color="#000000">20</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC COSTA SUR</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC TRONCAL MACHALA</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECBA16</font></td>
                                                                    <td align="right" valign=bottom sdval="20" sdnum="1033;"><font color="#000000">20</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC COSTA SUR</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC TRONCAL MACHALA</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECBA17</font></td>
                                                                    <td align="right" valign=bottom sdval="20" sdnum="1033;"><font color="#000000">20</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC COSTA SUR</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC TRONCAL MACHALA</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECBA34</font></td>
                                                                    <td align="right" valign=bottom sdval="24" sdnum="1033;"><font color="#000000">24</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC COSTA SUR</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC YAGUACHI BABAHOYO</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECB093</font></td>
                                                                    <td align="right" valign=bottom sdval="20" sdnum="1033;"><font color="#000000">20</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC COSTA SUR</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC YAGUACHI BABAHOYO</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECB460</font></td>
                                                                    <td align="right" valign=bottom sdval="20" sdnum="1033;"><font color="#000000">20</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC COSTA SUR</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC YAGUACHI BABAHOYO</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECB462</font></td>
                                                                    <td align="right" valign=bottom sdval="20" sdnum="1033;"><font color="#000000">20</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC COSTA SUR</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC YAGUACHI BABAHOYO</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECB463</font></td>
                                                                    <td align="right" valign=bottom sdval="20" sdnum="1033;"><font color="#000000">20</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC COSTA SUR</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC YAGUACHI BABAHOYO</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECB465</font></td>
                                                                    <td align="right" valign=bottom sdval="26" sdnum="1033;"><font color="#000000">26</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC COSTA SUR</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC YAGUACHI BABAHOYO</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECB584</font></td>
                                                                    <td align="right" valign=bottom sdval="28" sdnum="1033;"><font color="#000000">28</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC COSTA SUR</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC YAGUACHI BABAHOYO</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECB585</font></td>
                                                                    <td align="right" valign=bottom sdval="30" sdnum="1033;"><font color="#000000">30</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC COSTA SUR</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC YAGUACHI BABAHOYO</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECB586</font></td>
                                                                    <td align="right" valign=bottom sdval="30" sdnum="1033;"><font color="#000000">30</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td style="border-bottom: 1px solid #8faadc" height="20" align="left" valign=bottom><b><font color="#000000">EC COSTA SUR</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC YAGUACHI BABAHOYO</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECBA36</font></td>
                                                                    <td align="right" valign=bottom sdval="20" sdnum="1033;"><font color="#000000">20</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC GUAYAQUIL</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC GYE CENTRO</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECB176</font></td>
                                                                    <td align="right" valign=bottom sdval="38" sdnum="1033;"><font color="#000000">38</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC GUAYAQUIL</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC GYE CENTRO</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECB200</font></td>
                                                                    <td align="right" valign=bottom sdval="38" sdnum="1033;"><font color="#000000">38</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC GUAYAQUIL</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC GYE CENTRO</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECB201</font></td>
                                                                    <td align="right" valign=bottom sdval="38" sdnum="1033;"><font color="#000000">38</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC GUAYAQUIL</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC GYE CENTRO</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECB203</font></td>
                                                                    <td align="right" valign=bottom sdval="30" sdnum="1033;"><font color="#000000">30</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC GUAYAQUIL</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC GYE CENTRO</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECB225</font></td>
                                                                    <td align="right" valign=bottom sdval="34" sdnum="1033;"><font color="#000000">34</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC GUAYAQUIL</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC GYE CENTRO</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECB242</font></td>
                                                                    <td align="right" valign=bottom sdval="28" sdnum="1033;"><font color="#000000">28</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC GUAYAQUIL</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC GYE CENTRO</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECB308</font></td>
                                                                    <td align="right" valign=bottom sdval="34" sdnum="1033;"><font color="#000000">34</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC GUAYAQUIL</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC GYE CENTRO</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECB471</font></td>
                                                                    <td align="right" valign=bottom sdval="20" sdnum="1033;"><font color="#000000">20</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC GUAYAQUIL</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC GYE CENTRO</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECB507</font></td>
                                                                    <td align="right" valign=bottom sdval="28" sdnum="1033;"><font color="#000000">28</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC GUAYAQUIL</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC GYE CENTRO</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECB508</font></td>
                                                                    <td align="right" valign=bottom sdval="38" sdnum="1033;"><font color="#000000">38</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC GUAYAQUIL</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC GYE DURAN AURORA</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECB047</font></td>
                                                                    <td align="right" valign=bottom sdval="32" sdnum="1033;"><font color="#000000">32</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC GUAYAQUIL</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC GYE DURAN AURORA</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECB197</font></td>
                                                                    <td align="right" valign=bottom sdval="34" sdnum="1033;"><font color="#000000">34</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC GUAYAQUIL</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC GYE DURAN AURORA</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECB207</font></td>
                                                                    <td align="right" valign=bottom sdval="34" sdnum="1033;"><font color="#000000">34</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC GUAYAQUIL</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC GYE DURAN AURORA</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECB210</font></td>
                                                                    <td align="right" valign=bottom sdval="34" sdnum="1033;"><font color="#000000">34</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC GUAYAQUIL</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC GYE DURAN AURORA</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECB513</font></td>
                                                                    <td align="right" valign=bottom sdval="38" sdnum="1033;"><font color="#000000">38</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC GUAYAQUIL</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC GYE DURAN AURORA</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECB514</font></td>
                                                                    <td align="right" valign=bottom sdval="32" sdnum="1033;"><font color="#000000">32</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC GUAYAQUIL</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC GYE DURAN AURORA</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECB515</font></td>
                                                                    <td align="right" valign=bottom sdval="30" sdnum="1033;"><font color="#000000">30</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC GUAYAQUIL</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC GYE DURAN AURORA</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECBA99</font></td>
                                                                    <td align="right" valign=bottom sdval="40" sdnum="1033;"><font color="#000000">40</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC GUAYAQUIL</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC GYE NORTE</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECB222</font></td>
                                                                    <td align="right" valign=bottom sdval="20" sdnum="1033;"><font color="#000000">20</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC GUAYAQUIL</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC GYE NORTE</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECB224</font></td>
                                                                    <td align="right" valign=bottom sdval="32" sdnum="1033;"><font color="#000000">32</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC GUAYAQUIL</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC GYE NORTE</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECB227</font></td>
                                                                    <td align="right" valign=bottom sdval="30" sdnum="1033;"><font color="#000000">30</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC GUAYAQUIL</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC GYE NORTE</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECB232</font></td>
                                                                    <td align="right" valign=bottom sdval="30" sdnum="1033;"><font color="#000000">30</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC GUAYAQUIL</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC GYE NORTE</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECB234</font></td>
                                                                    <td align="right" valign=bottom sdval="30" sdnum="1033;"><font color="#000000">30</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC GUAYAQUIL</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC GYE NORTE</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECB247</font></td>
                                                                    <td align="right" valign=bottom sdval="36" sdnum="1033;"><font color="#000000">36</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC GUAYAQUIL</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC GYE NORTE</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECB503</font></td>
                                                                    <td align="right" valign=bottom sdval="34" sdnum="1033;"><font color="#000000">34</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC GUAYAQUIL</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC GYE NORTE</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECB504</font></td>
                                                                    <td align="right" valign=bottom sdval="36" sdnum="1033;"><font color="#000000">36</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC GUAYAQUIL</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC GYE NORTE</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECB505</font></td>
                                                                    <td align="right" valign=bottom sdval="42" sdnum="1033;"><font color="#000000">42</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC GUAYAQUIL</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC GYE NORTE</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECB506</font></td>
                                                                    <td align="right" valign=bottom sdval="34" sdnum="1033;"><font color="#000000">34</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC GUAYAQUIL</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC GYE PASCUALES</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECB215</font></td>
                                                                    <td align="right" valign=bottom sdval="32" sdnum="1033;"><font color="#000000">32</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC GUAYAQUIL</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC GYE PASCUALES</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECB237</font></td>
                                                                    <td align="right" valign=bottom sdval="32" sdnum="1033;"><font color="#000000">32</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC GUAYAQUIL</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC GYE PASCUALES</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECB302</font></td>
                                                                    <td align="right" valign=bottom sdval="32" sdnum="1033;"><font color="#000000">32</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC GUAYAQUIL</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC GYE PASCUALES</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECB516</font></td>
                                                                    <td align="right" valign=bottom sdval="38" sdnum="1033;"><font color="#000000">38</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC GUAYAQUIL</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC GYE PASCUALES</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECB517</font></td>
                                                                    <td align="right" valign=bottom sdval="34" sdnum="1033;"><font color="#000000">34</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC GUAYAQUIL</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC GYE PASCUALES</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECB518</font></td>
                                                                    <td align="right" valign=bottom sdval="38" sdnum="1033;"><font color="#000000">38</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC GUAYAQUIL</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC GYE PASCUALES</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECB519</font></td>
                                                                    <td align="right" valign=bottom sdval="32" sdnum="1033;"><font color="#000000">32</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC GUAYAQUIL</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC GYE PASCUALES</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECB520</font></td>
                                                                    <td align="right" valign=bottom sdval="42" sdnum="1033;"><font color="#000000">42</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC GUAYAQUIL</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC GYE PASCUALES</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECBA11</font></td>
                                                                    <td align="right" valign=bottom sdval="40" sdnum="1033;"><font color="#000000">40</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC GUAYAQUIL</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC GYE PERIMETRAL</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECB202</font></td>
                                                                    <td align="right" valign=bottom sdval="40" sdnum="1033;"><font color="#000000">40</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC GUAYAQUIL</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC GYE PERIMETRAL</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECB219</font></td>
                                                                    <td align="right" valign=bottom sdval="40" sdnum="1033;"><font color="#000000">40</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC GUAYAQUIL</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC GYE PERIMETRAL</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECB221</font></td>
                                                                    <td align="right" valign=bottom sdval="40" sdnum="1033;"><font color="#000000">40</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC GUAYAQUIL</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC GYE PERIMETRAL</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECB239</font></td>
                                                                    <td align="right" valign=bottom sdval="40" sdnum="1033;"><font color="#000000">40</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC GUAYAQUIL</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC GYE PERIMETRAL</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECB241</font></td>
                                                                    <td align="right" valign=bottom sdval="40" sdnum="1033;"><font color="#000000">40</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC GUAYAQUIL</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC GYE PERIMETRAL</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECB244</font></td>
                                                                    <td align="right" valign=bottom sdval="34" sdnum="1033;"><font color="#000000">34</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC GUAYAQUIL</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC GYE PERIMETRAL</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECB303</font></td>
                                                                    <td align="right" valign=bottom sdval="40" sdnum="1033;"><font color="#000000">40</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC GUAYAQUIL</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC GYE PERIMETRAL</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECB501</font></td>
                                                                    <td align="right" valign=bottom sdval="40" sdnum="1033;"><font color="#000000">40</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC GUAYAQUIL</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC GYE PERIMETRAL</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECB502</font></td>
                                                                    <td align="right" valign=bottom sdval="40" sdnum="1033;"><font color="#000000">40</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC GUAYAQUIL</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC GYE SUBURBIO</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECB240</font></td>
                                                                    <td align="right" valign=bottom sdval="32" sdnum="1033;"><font color="#000000">32</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC GUAYAQUIL</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC GYE SUBURBIO</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECB251</font></td>
                                                                    <td align="right" valign=bottom sdval="30" sdnum="1033;"><font color="#000000">30</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC GUAYAQUIL</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC GYE SUBURBIO</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECB252</font></td>
                                                                    <td align="right" valign=bottom sdval="30" sdnum="1033;"><font color="#000000">30</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC GUAYAQUIL</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC GYE SUBURBIO</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECB256</font></td>
                                                                    <td align="right" valign=bottom sdval="32" sdnum="1033;"><font color="#000000">32</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC GUAYAQUIL</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC GYE SUBURBIO</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECB257</font></td>
                                                                    <td align="right" valign=bottom sdval="38" sdnum="1033;"><font color="#000000">38</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC GUAYAQUIL</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC GYE SUBURBIO</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECB309</font></td>
                                                                    <td align="right" valign=bottom sdval="20" sdnum="1033;"><font color="#000000">20</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC GUAYAQUIL</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC GYE SUBURBIO</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECB312</font></td>
                                                                    <td align="right" valign=bottom sdval="38" sdnum="1033;"><font color="#000000">38</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC GUAYAQUIL</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC GYE SUBURBIO</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECB521</font></td>
                                                                    <td align="right" valign=bottom sdval="40" sdnum="1033;"><font color="#000000">40</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC GUAYAQUIL</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC GYE SUBURBIO</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECB522</font></td>
                                                                    <td align="right" valign=bottom sdval="42" sdnum="1033;"><font color="#000000">42</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC GUAYAQUIL</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC GYE SUBURBIO</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECB523</font></td>
                                                                    <td align="right" valign=bottom sdval="42" sdnum="1033;"><font color="#000000">42</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC GUAYAQUIL</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC GYE SUR</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECB235</font></td>
                                                                    <td align="right" valign=bottom sdval="38" sdnum="1033;"><font color="#000000">38</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC GUAYAQUIL</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC GYE SUR</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECB238</font></td>
                                                                    <td align="right" valign=bottom sdval="38" sdnum="1033;"><font color="#000000">38</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC GUAYAQUIL</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC GYE SUR</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECB248</font></td>
                                                                    <td align="right" valign=bottom sdval="38" sdnum="1033;"><font color="#000000">38</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC GUAYAQUIL</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC GYE SUR</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECB255</font></td>
                                                                    <td align="right" valign=bottom sdval="34" sdnum="1033;"><font color="#000000">34</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC GUAYAQUIL</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC GYE SUR</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECB509</font></td>
                                                                    <td align="right" valign=bottom sdval="30" sdnum="1033;"><font color="#000000">30</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC GUAYAQUIL</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC GYE SUR</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECB510</font></td>
                                                                    <td align="right" valign=bottom sdval="36" sdnum="1033;"><font color="#000000">36</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20" align="left" valign=bottom><b><font color="#000000">EC GUAYAQUIL</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC GYE SUR</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECB511</font></td>
                                                                    <td align="right" valign=bottom sdval="36" sdnum="1033;"><font color="#000000">36</font></td>
                                                                </tr>
                                                                <tr>
                                                                    <td style="border-bottom: 1px solid #8faadc" height="20" align="left" valign=bottom><b><font color="#000000">EC GUAYAQUIL</font></b></td>
                                                                    <td align="left" valign=bottom><b><font color="#000000">EC GYE SUR</font></b></td>
                                                                    <td align="left" valign=bottom><font color="#000000">ECB512</font></td>
                                                                    <td align="right" valign=bottom sdval="38" sdnum="1033;"><font color="#000000">38</font></td>
                                                                </tr>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
    
                                    {{-- <div class="card ul-card__v-space">
                                        <div class="card-header header-elements-inline">
                                            <h6 class="card-title ul-collapse__icon--size ul-collapse__left-icon mb-0">
                                                <a data-toggle="collapse" class="collapsed" href="#accordion-item-icon-left-coll-2">
                                                    Accordion Item #2
                                                </a>
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
                                                <a data-toggle="collapse" class="collapsed" href="#accordion-item-icon-left-coll-3">
                                                    Accordion Item #3
                                                </a>
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
                                    </div> --}}
                                </div>
                                <!--  end of col -->

                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="row">
                                <!-- begin::latest log -->
                                <div class="col-lg-12 col-xl-12 mt-6 mb-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="ul-widget__head">
                                                <div class="ul-widget__head-label">
                                                    <h3 class="ul-widget__head-title">
                                                        Cambios
                                                    </h3>
                                                </div>
                                            </div>
                                            <div class="ul-widget__body">
                                                <div class="tab-content">
                                                    <div class="tab-pane active show" id="__g-widget-s6-tab1-content">
                                                        <div class="ul-widget-s6__items">
                                                            @foreach ($job->orderedLogs() as $log)
                                                                <div class="ul-widget-s6__item">
                                                                    <span class="ul-widget-s6__badge">
                                                                        <p class="badge-dot-{{$log->randomBootstrapColor()}} ul-widget6__dot"></p>
                                                                    </span>
                                                                    <p class="ul-widget-s6__text">
                                                                        @if ($log->comment !== null)
                                                                            <a href="#" class="see-comment" target="comment-{{$log->id}}">
                                                                                {{ $log->change }}
                                                                            </a>
                                                                            <input type="hidden" id="comment-{{$log->id}}" value="{{ $log->comment }}">
                                                                        @else
                                                                            {{ $log->change }}
                                                                        @endif
                                                                        @switch($log->type)
                                                                            @case(1)
                                                                                <span class="badge badge-pill badge-primary  m-2">Sistema</span>
                                                                                @break
                                                                            @case(2)
                                                                                <span class="badge badge-pill badge-warning  m-2">Admin</span>
                                                                                @break
                                                                            @case(3)
                                                                                <span class="badge badge-pill badge-info  m-2">User</span>
                                                                                @break
                                                                            @default
                                                                        @endswitch
                                                                    </p>
                                                                    <span class="ul-widget-s6__time">{{ $log->created_at }}</span>
                                                                </div>
                                                            @endforeach

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

                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modalComment" tabindex="-1" role="dialog" aria-labelledby="modalCommentTitle-2" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalCommentTitle-2">Agregar comentario</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('user.comments.store', $job->id) }}" method="POST">
                    <div class="modal-body">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="comment" class="col-form-label">Comentario:</label>
                            <textarea rows="10" type="text" class="form-control" id="comment" name="comment"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal See Comment -->
    <div class="modal fade" id="modalSeeComment" tabindex="-1" role="dialog" aria-labelledby="modalSeeCommentTitle-2" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    {{-- <h5 class="modal-title" id="modalSeeCommentTitle-2">Comentario</h5> --}}
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p class="comment-body">
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('page-js')

    <script src="{{asset('assets/js/vendor/datatables.min.js')}}"></script>
    <script>
        $(document).ready(function(){
            $('.see-comment').on('click', function(e){
                e.preventDefault();
                target = $(this).attr('target');
                $('.comment-body').html('');
                $('.comment-body').html($('#'+target).attr('value'));
                $('#modalSeeComment').modal('show');
            });
        });
    </script>

@endsection
