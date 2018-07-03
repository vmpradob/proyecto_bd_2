@extends('adminlte::page')

@section('content_header')
    <h1>Comprar Sobres</h1>
    {!! $sobres->appends(['search' => Request::get('search')])->render() !!}
@stop

@section('content')

@endsection