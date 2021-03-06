@extends('adminlte::page')

@section('content_header')
    <h1>Cartas encontradas en el sobre!!</h1>
@stop

@section('content')
    <div class="container-full-fluid">
        <div class="row">
            @php
                $count = 0;
                $count2 =0;
            @endphp
            {{dd($cartas)}}
            @foreach($cartas as  $carta)
                <div class="col-md-2">
                        <img src="../../uploads/imgUrl/{{$carta->imgUrl}}" height="250" style="position: absolute; margin-top:{{($count2*320)+6}}px; margin-left: 15px">
                        @foreach($carta->clases()->orderBy('precio_c','desc')->get() as $clase)
                            <img src="../../uploads/imgUrl/{{$clase->imgUrl}}" height="300" style="position: absolute; margin-top:{{($count2*320)}}px">
                        @endforeach
                        <p style="position: absolute;color: white;font-size: 11px;margin-top: {{($count2*320)+219}}px;left: 25%;">Precio: {{$carta->precio_v()}}, cant: {{$carta->pivot->cantidad}}</p>
                        <p style="position: absolute;color: white;font-size: 10px;margin-top: {{($count2*320)+237}}px;left:15%;">{{$carta->nombre}}</p>
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