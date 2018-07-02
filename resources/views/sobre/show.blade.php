@extends('adminlte::page')

@section('content_header')
    <h1>Sobre</h1>
    <a href="{{ url('/sobre') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
@stop

@section('content')
    <div class="container-full-fluid">
        <div class="row">

            <div class="col-md-3 col-md-offset-3">
                <div class="box">
                <div class="box-header with-border">
                    <div class="box-title">Sobre</div>
                    <div class="box-tools">
                        <a href="{{ url('/sobre/' . $sobre->id . '/edit') }}" title="Edit Sobre"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('sobre' . '/' . $sobre->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Sobre" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                    </div>
                </div>

                    <div class="box-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <tbody>       
                                    <tr><th> Nombre </th><td> {{ $sobre->nombre }} </td></tr><tr><th> Precio </th><td> {{ $sobre->precio }} </td></tr><tr><th> Cant Cartas </th><td> {{ $sobre->cant_cartas }} </td></tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4"><img src="../uploads/imgUrl/{{$sobre->imgUrl}}" style="position:absolute" height="230px" alt=""></div>
        </div>
    </div>
@endsection
