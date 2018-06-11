@extends('layouts.app')
@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Imagenes</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Imagenes</li>
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
                    <div class="card-header">Imagenes</div>
                    <div class="card-body">
                        <table class="table table-striped table-hover">
                            <thead>
                            <th>ID</th>
                            <th>Imagen</th>
                            <th>Descripción</th>
                            <th>Estado</th>
                            </thead>
                            <tbody>
                            @foreach($images as $image)
                                <tr>
                                    <td>{{$image->id}}</td>
                                    <td><img src="{{asset('/images/'.$image->url)}}" class="img-responsive" width="100" alt="{{$image->description}}"></td>
                                    <td>{{$image->description}}</td>
                                    <td>{{$image->status}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{$images->render()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
