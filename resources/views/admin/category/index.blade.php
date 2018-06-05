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
                    <div class="card-header">Categorías <span class="float-right"><a href="{{route('categories.create')}}" class="btn btn-default btn-sm btn-circle" title="Agregar categoría"><i class="fa fa-plus"></i></a></span></div>
                    <div class="card-body">
                        <table class="table table-striped table-hover">
                            <thead>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Descripción</th>
                            <th>Estado</th>
                            </thead>
                            <tbody>
                            @foreach($categories as $category)
                                <tr>
                                    <td>{{$category->id}}</td>
                                    <td>{{$category->name}}</td>
                                    <td>{{$category->description}}</td>
                                    <td>{{$category->status}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{$categories->render()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
