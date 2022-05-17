@extends('layouts.master')
@section('page-css')

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.13.5/css/selectize.bootstrap3.css"/>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.13.5/css/selectize.css"/>
    <style>
        .optgroup-header {
            text-transform: uppercase;
            font-weight: bold;
            font-size: 15px !important;
        }
    </style>
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
                    <h4 class="card-title mb-3">Trabajo</h4>
                    <p>Nuevo trabajo</p>

                    <form action="{{ route('agerence.jobs.store') }}"
                        method="POST"
                        enctype="multipart/form-data">

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

                            <div class="col-md-3 form-group mb-3">
                                <label for="delivery_date">Fecha para entrega</label>
                                <input type="date"
                                    class="form-control form-control-rounded"
                                    name="delivery_date"
                                    id="delivery_date"
                                    min="{{ \Carbon\Carbon::now()->format('Y-m-d') }}"
                                    placeholder="Fecha entrega"
                                    required>
                            </div>

                            <div class="col-md-3 form-group mb-3">
                                <label for="user_id">Responsable</label>
                                <select class="form-control form-control-rounded" name="user_id" required>
                                    @foreach ($responsables as $responsable)
                                        <option value="{{ $responsable->id }}">{{ $responsable->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-6 form-group mb-6">
                                <label for="picker1">Gerencia</label>
                                <select name="gerences[]" id="gerences" autocomplete="off" multiple="multiple">
                                    @foreach ($gerencias as $gerencia)
                                        <optgroup label="{{$gerencia->name}}"
                                            optgroupField="{{$gerencia->name}}"
                                            optgroupLabelField="{{$gerencia->name}}"
                                            optgroupValueField="{{$gerencia->name}}">
                                            @foreach ($gerencia->subgerence as $subgerencia)
                                                <option value="{{$subgerencia->id}}">
                                                    {{ $subgerencia->name }}
                                                </option>
                                                {{-- <option value="{{ route('subgerences.ajax', $gerencia->id) }}">{{$gerencia->name}}</option> --}}
                                            @endforeach
                                        </optgroup>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-6 form-group mb-3">
                                <label for="description">Descripción</label>
                                <textarea
                                    class="form-control form-control-rounded"
                                    name="description"
                                    id="description"
                                    rows="10"></textarea>
                            </div>

                            <div class="col-md-6 mb-3">
                                <button class="btn btn-primary add-button mb-1">+Agregar archivo</button>
                                <div id="files-input">

                                </div>
                            </div>
                            <!--  end of col -->

                            <div class="accordion col-md-6">
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
                                                    <div class="table-responsive">
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

    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.13.5/js/standalone/selectize.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.13.5/js/standalone/selectize.min.js"></script>

    <script>
        $(document).ready(function () {
            $('.add-button').on('click', function(e){
                e.preventDefault();
                let id = (Math.random() + 1).toString(36).substring(7);
                $('#files-input')
                .append(`
                    <div class="input-group mb-1" id="parent`+id+`">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="files[]" id="`+id+`">
                            <label class="custom-file-label" for="`+id+`">Archivo</label>
                        </div>
                        <button class="btn btn-danger del-doc" target="parent`+id+`">x</button>
                    </div>`);

                    $(document).on('change', '#'+id, function(ex){
                        var fileName = document.getElementById(id).files[0].name;
                        var nextSibling = ex.target.nextElementSibling
                        nextSibling.innerText = fileName
                    })
                    $('#'+id).click();
            });

            $(document).on('click', '.del-doc', function(ez){
                ez.preventDefault();
                target = $(this).attr('target');
                $('#'+target).remove();
            });

            $("#gerences").selectize();
        });

    </script>
@endsection
