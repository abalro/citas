@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-md-offset-0">
                <div class="panel panel-default">
                    <div class="panel-heading">Prescripciones</div>

                    <div class="panel-body">
                        @include('flash::message')
                        {!! Form::open(['route' => 'prescripciones.create', 'method' => 'get']) !!}
                        {!!   Form::submit('Crear prescripcion', ['class'=> 'btn btn-primary'])!!}
                        {!! Form::close() !!}


                        <br><br>
                        <table class="table table-responsive table-striped table-bordered">
                            <tr>
                                <th>Tratamiento para</th>
                                <th>Dosis</th>
                                <th>Frecuencia</th>
                                <th>Instrucciones</th>
                                <th>Medicamento</th>
                                <th colspan="2">Acciones</th>

                            </tr>

                            @foreach ($prescripciones as $prescripcion)

                                <tr>
                                    <td>{{ $prescripcion->tratamiento->paciente->full_name }}</td>
                                    <td>{{ $prescripcion->dosis}}</td>
                                    <td>{{ $prescripcion->frecuencia }}</td>
                                    <td>{{ $prescripcion->instrucciones }}</td>
                                    <td>{{ $prescripcion->medicina->name}}</td>

                                    <td>
                                        {!! Form::open(['route' => ['prescripciones.edit',$prescripcion->id], 'method' => 'get']) !!}
                                        {!!   Form::submit('Editar', ['class'=> 'btn btn-warning'])!!}
                                        {!! Form::close() !!}
                                    </td>
                                    <td>
                                        {!! Form::open(['route' => ['prescripciones.destroy',$prescripcion->id], 'method' => 'delete']) !!}
                                        {!!   Form::submit('Borrar', ['class'=> 'btn btn-danger' ,'onclick' => 'if(!confirm("¿Está seguro?"))event.preventDefault();'])!!}
                                        {!! Form::close() !!}

                                    </td>

                                </tr>

                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection