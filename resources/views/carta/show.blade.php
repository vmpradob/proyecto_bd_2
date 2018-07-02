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
                <img src="../uploads/imgUrl/Retador.png" style="position: absolute; ">
                <img src="../uploads/imgUrl/shurima.png" style="position: absolute; ">
                <img src="../uploads/imgUrl/Tanque.png" style="position: absolute; ">
                <p style="position: absolute;color: white;font-size: 16px;margin-top: 440px;margin-left: 75px">{{$cartum->nombre}}</p>
            </div>
        </div>
    </div>
@endsection
