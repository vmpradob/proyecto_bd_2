@extends('adminlte::page')

@section('content_header')
    <h1>Intercambio</h1>
    <a href="{{ url('/intercambio') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
@stop
@section('content')
    <div class="container-full-fluid">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="box">
                    <div class="box-body">
                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        <form method="POST" action="{{ url('/intercambio') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            @include ('intercambio.form')
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
