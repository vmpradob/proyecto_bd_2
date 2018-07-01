@extends('adminlte::page')

@section('content_header')
    <h1>Compra</h1>
    <a href="{{ url('/compra') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
@stop

@section('content')
    <div class="container-full-fluid">
        <div class="row">

            <div class="col-md-6 col-md-offset-3">
                <div class="box">
                <div class="box-header with-border">
                    <div class="box-title">Compra</div>
                    <div class="box-tools">
                        <a href="{{ url('/compra/' . $compra->id . '/edit') }}" title="Edit Compra"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('compra' . '/' . $compra->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Compra" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                    </div>
                </div>

                    <div class="box-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $compra->id }}</td>
                                    </tr>
                                    <tr><th> Id Jugador </th><td> {{ $compra->id_jugador }} </td></tr><tr><th> Id Sobre </th><td> {{ $compra->id_sobre }} </td></tr><tr><th> Cantidad </th><td> {{ $compra->cantidad }} </td></tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
