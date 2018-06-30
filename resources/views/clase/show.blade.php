@extends('adminlte::page')

@section('content_header')
    <h1>Clase</h1>
    <a href="{{ url('/clase') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
@stop

@section('content')
    <div class="container-full-fluid">
        <div class="row">

            <div class="col-md-6 col-md-offset-3">
                <div class="box">
                <div class="box-header with-border">
                                            <div class="box-tools">
                                                <a href="{{ url('/clase/' . $clase->id . '/edit') }}" title="Edit Clase"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                                                <form method="POST" action="{{ url('clase' . '/' . $clase->id) }}" accept-charset="UTF-8" style="display:inline">
                                                    {{ method_field('DELETE') }}
                                                    {{ csrf_field() }}
                                                    <button type="submit" class="btn btn-danger btn-sm" title="Delete Clase" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                                </form>
                                            </div>
                                        </div>
                    <div class="box-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $clase->id }}</td>
                                    </tr>
                                    <tr><th> Precio C </th><td> {{ $clase->precio_c }} </td></tr><tr><th> Precio V </th><td> {{ $clase->precio_v }} </td></tr><tr><th> Probabilidad </th><td> {{ $clase->probabilidad }} </td></tr><tr><th> Nombre </th><td> {{ $clase->nombre }} </td></tr><tr><th> ImgUrl </th><td> {{ $clase->imgUrl }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
