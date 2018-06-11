@extends('layouts.app')
@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Productos</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Productos</li>
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
                    <div class="card-header">
                        Imagenes de {{$product->name}}
                    </div>
                    <div class="card-body">
                        <div class="row">
                            @foreach($product->images as $image)
                                <div class="col-4 bg-white">
                                    <img src="{{asset('/images/'.$image->url)}}" alt="{{$image->description}}" class="img-fluid see-img" onclick="verImagen(this)">
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Modal body text goes here.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        var seeImg = document.getElementsByClassName('see-img');
        console.log(seeImg);
        for (var i = 0; i < seeImg.length; i++) {
            seeImg[i].style.cursor = 'pointer';
        }
        function verImagen(e){
            console.log(e);
            $('.modal-header').html(e.alt);
            $('.modal-body').html('<img src="'+e.src+'" alt="'+e.alt+'" class="img-fluid see-img">');
            $('.modal').modal('show');
        }
    </script>
@endsection
