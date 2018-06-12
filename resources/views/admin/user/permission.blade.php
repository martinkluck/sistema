@extends('layouts.app')
@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Permisos</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Permisos</li>
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
                    <div class="card-header">Agregar Permisos</div>
                    <div class="card-body">
                        {!! Form::open(['route'=>'setPermissions']) !!}
                        <div class="form-group">
                            {{Form::label('name','Nombre')}}
                            {{Form::text('name',null,['class'=>'form-control', 'id'=>'name'])}}
                        </div>
                        <div class="form-group">
                            {{ Form::label('role_id','Role') }}
                            {{ Form::select('role_id',$roles,null,['class' => 'form-control']) }}
                        </div>
                        <div class="form-group">
                            {{Form::submit('Guardar',['class'=>'btn btn-primary'])}}
                            <a href="{{route('categories.index')}}" class="btn btn-default">Cancelar</a>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Permisos</div>
                    <div class="card-body">
                        <table class="table table-hover table-striped">
                            <thead>
                            <th>Name</th>
                            </thead>
                            <tbody>
                            @foreach($permissions as $permission)
                                <tr>
                                    <td>{{$permission->name}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
