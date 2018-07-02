@extends('adminlte::page')

@section('content_header')
    <h1>Carta</h1>
    <a href="{{ url('/carta') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
@stop

@section('content')
    <div class="container-full-fluid">
        <div class="row">
            <div class="col-md-6 col-md-offset-4">
                <img src="../uploads/imgUrl/{{$cartum->imgUrl}}" style="position: absolute; margin-top:20px; margin-left: 35px">
                @foreach($cartum->clases()->orderBy('precio_c','desc')->get() as $clase)
                    <img src="../uploads/imgUrl/{{$clase->imgUrl}}" style="position: absolute; ">
                @endforeach
                <p style="position: absolute;color: white;font-size: 16px;margin-top: 475px;left:10%;">{{$cartum->nombre}}</p>
                <p style="position: absolute;color: white;font-size: 16px;margin-top: 440px;left:21%;">Valor: {{$cartum->precio_c()}}</p>
            </div>
        </div>
    </div>
@endsection
