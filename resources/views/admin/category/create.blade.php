@extends('layouts.app')
@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Categorías</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Categorías</li>
                </ol>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Agregar Categorías</div>
                    <div class="card-body">
                        {!! Form::open(['route'=>'categories.store']) !!}
                            <div class="form-group">
                                {{Form::label('name','Nombre')}}
                                {{Form::text('name',null,['class'=>'form-control', 'id'=>'name'])}}
                            </div>
                            <div class="form-group">
                                {{Form::label('description','Descripción')}}
                                {{Form::text('description',null,['class'=>'form-control', 'id'=>'description'])}}
                            </div>
                            <div class="form-check form-check-inline">
                                {{Form::checkbox('status', true, ['class'=>'form-check-input', 'id'=>'status'])}}
                                {{Form::label('status','Activo', ['class'=>'form-check-label'])}}
                            </div>
                            <div class="form-group">
                                {{Form::submit('Guardar',['class'=>'btn btn-primary'])}}
                                <a href="{{route('categories.index')}}" class="btn btn-default">Cancelar</a>
                            </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
