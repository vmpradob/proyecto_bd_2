@extends('adminlte::page')

@section('content_header')
    <h1>Comprar Sobres</h1>
    {!! $sobres->appends(['search' => Request::get('search')])->render() !!}
@stop

@section('content')
    <div class="container-full-fluid">
        <div class="row">
        @php
        $count = 0;
        $count2 =0;
        @endphp
         @foreach($sobres as $sobre)
            <div class="col-md-2">            
            <img src="../uploads/imgUrl/{{$sobre->imgUrl}}" height="250" style="position: absolute; margin-top:{{($count2*320)+6}}px; margin-left: 15px">
                <p style="position: absolute;color: black;font-size: 12px;margin-top: {{($count2*320)+250}}px;left:50%;">Precio: {{$sobre->precio}}</p>
                <p style="position: absolute;color: black;font-size: 12px;margin-top: {{($count2*320)+270}}px;left:50%;">{{$sobre->nombre}}</p>
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