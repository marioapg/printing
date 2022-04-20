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

                            <div class="col-md-6 form-group mb-3">
                                <label for="picker1">Gerencia ventas</label>
                                <select class="form-control form-control-rounded" name="sales_gerence_id" id="subgerences" autocomplete="off">
                                    @foreach ($subgerencias as $subgerencia)
                                        <option value="{{$subgerencia->id}}">{{ $subgerencia->name }}</option>
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
