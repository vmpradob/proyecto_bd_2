@extends('adminlte::page')

@section('content_header')
    <h1>Comprar Cartas</h1>
@stop

@section('content')
    <div class="container-full-fluid">
        <div class="row">
        @php
        $count = 0;
        $count2 =0;
        @endphp
         @foreach($cartas as  $carta)
            <div class="col-md-2">
            <a href="">
            <img src="../uploads/imgUrl/{{$carta->imgUrl}}" height="250" style="position: absolute; margin-top:{{($count2*610)+6}}px; margin-left: 15px">
                @foreach($carta->clases()->orderBy('precio_c','desc')->get() as $clase)
                    <img src="../uploads/imgUrl/{{$clase->imgUrl}}" height="300" style="position: absolute; margin-top:{{($count2*610)}}px">
                @endforeach
                <p style="position: absolute;color: white;font-size: 10px;margin-top: {{($count2*610)+237}}px;left:15%;">{{$carta->nombre}}</p>
            </a>       

            </div>
            @php
            $count++; 
            if($count == 6){ 
                $count = 0; 
                $count2++;
            };
            @endphp
        @endforeach
        </div>
    </div>
@endsection