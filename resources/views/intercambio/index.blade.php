@extends('adminlte::page')

@section('content_header')
    <h1>Intercambio</h1>
@stop

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-10 col-md-offset-1">
                <div class="card">
                    <div class="card-body">
                        <div class="box">
                            <div class="box-header with-border">
                                <h3 class="box-title">
                                    Lista
                                </h3>
                                <div class="box-tools">
                                    {!! Form::open(['method' => 'GET', 'url' => '/intercambio', 'class' => 'form-inline', 'role' => 'search'])  !!}
                                    <div class="input-group input-group-sm">
                                        <input type="text" class="form-control" name="search" placeholder="Search..." value="{{ request('search') }}">
                                        <span class="input-group-btn">
                                            <button class="btn btn-secondary btn-flat" type="submit">
                                                <i class="fa fa-search"></i>
                                            </button>
                                        </span>
                                    </div>
                                    {!! Form::close() !!}
                                </div>
                            </div>
                            <table class="table table-hover" style="margin-bottom: 0px">
                                <thead>
                                    <tr>
                                        <th>#</th><th>Fecha</th><th>Jugador 1</th><th>Jugador 2</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($intercambio as $item)
                                    <tr>
                                        <td>{{ $loop->iteration or $item->id }}</td>
                                        <td>{{ $item->fecha }}</td><td>{{ App\User::where('id',$item->id_jugador1)->first()->email }}</td><td>{{  App\User::where('id',$item->id_jugador1)->first()->email}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="box-footer">
                            <div class=""> {!! $intercambio->appends(['search' => Request::get('search')])->render() !!} </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
