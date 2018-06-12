@extends('layouts.app')
@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Usuarios</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Usuarios</li>
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
                    <div class="card-header">Agregar Usuario</div>
                    <div class="card-body">
                        <p><strong>Nombre de usuario:</strong> {{$user->name}}</p>
                        <p><strong>Correo electrónico de usuario:</strong> {{$user->email}}</p>
                        <p>
                            <strong>Roles del usuario:</strong>
                            @foreach($user->roles as $role)
                                {{$role->name}}
                            @endforeach
                        </p>
                        <p>
                            <strong>Permisos del usuario:</strong>
                            @foreach($user->permissions as $permission)
                                {{$permission->name}}
                            @endforeach
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
