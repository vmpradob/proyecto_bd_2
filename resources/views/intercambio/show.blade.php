@extends('adminlte::page')

@section('content_header')
    <h1>Intercambio</h1>
    <a href="{{ url('/intercambio') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
@stop

@section('content')
    <div class="container-full-fluid">
        <div class="row">

            <div class="col-md-6 col-md-offset-3">
                <div class="box">
                <div class="box-header with-border">
                    <div class="box-title">Intercambio</div>
                    <div class="box-tools">
                        <a href="{{ url('/intercambio/' . $intercambio->id . '/edit') }}" title="Edit Intercambio"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('intercambio' . '/' . $intercambio->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Intercambio" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                    </div>
                </div>

                    <div class="box-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $intercambio->id }}</td>
                                    </tr>
                                    <tr><th> Fecha </th><td> {{ $intercambio->fecha }} </td></tr><tr><th> Id Jugador1 </th><td> {{ $intercambio->id_jugador1 }} </td></tr><tr><th> Id Jugador2 </th><td> {{ $intercambio->id_jugador2 }} </td></tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
