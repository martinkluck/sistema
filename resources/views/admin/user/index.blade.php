@extends('layouts.app')
@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                {{--<h1 class="m-0 text-dark">Usuarios</h1>--}}
                <nav class="navbar navbar-expand-lg navbar-light bg-white">
                    <a class="navbar-brand" href="#">Usuarios</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('users.create')}}">Nuevo</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('roles')}}">Roles</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('permissions')}}">Permisos</a>
                            </li>
                        </ul>
                    </div>
                </nav>
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
                    <div class="card-header">Usuarios</div>
                    <div class="card-body">
                        <table class="table table-striped table-hover">
                            <thead>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Correo electrónico</th>
                            <th>Roles</th>
                            <th>Estado</th>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{$user->id}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>
                                        @foreach($user->getRoleNames() as $role)
                                            {{$role}}
                                        @endforeach
                                    </td>
                                    <td>
                                        @if($user->status)
                                            <span class="badge badge-success">Activo</span>
                                        @else
                                            <span class="badge badge-danger">Inactivo</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{$users->render()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
