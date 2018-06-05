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
                        <form action="{{route('categories.store')}}" type="post">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label for="name">Nombre</label>
                                <input type="text" name="name" id="name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="description">Descripción</label>
                                <input type="text" class="form-control" name="description" id="description">
                            </div>
                            <div class="form-group">
                                <div class="checkbox">
                                    <label for="status">
                                        Estado
                                        <input type="checkbox" class="form-control" name="status" id="status">
                                    </label>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Guardar</button>
                            <a href="{{route('categories.index')}}" class="btn btn-default">Cancelar</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
