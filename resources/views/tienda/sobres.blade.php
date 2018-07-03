@extends('adminlte::page')

@section('content_header')
    <h1>Comprar Sobres</h1>
    {!! $sobres->appends(['search' => Request::get('search')])->render() !!}
@stop

@section('content')
    <div class="container-full-fluid">
        <div class="row">
         @foreach($sobres as $sobre)
            <div class="col-md-3">
                <div class="box box-widget widget-user">
                    <!-- Add the bg color to the header using any of the bg-* classes -->
                    <div class="widget-user-header bg-primary">
                        <h3 class="widget-user-username text-center">{{$sobre->nombre}}</h3>
                    </div>
                    <div class="widget-user-image">
                        <img class="img-circle" style="background-color: white" src="../uploads/imgUrl/{{$sobre->imgUrl}}" alt="User Avatar">
                    </div>
                    <div class="box-footer">
                        <div class="row">
                            <div class="@if(Auth::user()->jugador->dinero >= $sobre->precio) col-sm-4 @else col-sm-6 @endif border-right">
                                <div class="description-block">
                                    <h5 class="description-header">{{$sobre->precio}}</h5>
                                    <span class="description-text">precio</span>
                                </div>
                                <!-- /.description-block -->
                            </div>
                            <!-- /.col -->
                            @if(Auth::user()->jugador->dinero >= $sobre->precio)
                                <div class="col-sm-4 border-right">
                                    <div class="description-block">
                                        <h5 class="description-header"><a href="../comprar/sobre/{{ $sobre->id }}" class="btn btn-primary">Comprar</a></h5>
                                    </div>
                                    <!-- /.description-block -->
                                </div>
                            @endif

                            <div class="@if(Auth::user()->jugador->dinero >= $sobre->precio) col-sm-4 @else col-sm-6 @endif border-right">
                                <div class="description-block">
                                    <h5 class="description-header">{{$sobre->cant_cartas}}</h5>
                                    <span class="description-text">Cartas</span>
                                </div>
                                <!-- /.description-block -->
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                </div>
            </div>
        @endforeach
        </div>
    </div>
@endsection