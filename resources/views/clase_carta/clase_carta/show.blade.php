@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Clase_cartum {{ $clase_cartum->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/clase_carta/clase_carta') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/clase_carta/clase_carta/' . $clase_cartum->id . '/edit') }}" title="Edit Clase_cartum"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('clase_carta/clase_carta' . '/' . $clase_cartum->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Clase_cartum" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $clase_cartum->id }}</td>
                                    </tr>
                                    <tr><th> Precio C </th><td> {{ $clase_cartum->precio_c }} </td></tr><tr><th> Precio V </th><td> {{ $clase_cartum->precio_v }} </td></tr><tr><th> Probabilidad </th><td> {{ $clase_cartum->probabilidad }} </td></tr><tr><th> Nombre </th><td> {{ $clase_cartum->nombre }} </td></tr><tr><th> ImgUrl </th><td> {{ $clase_cartum->imgUrl }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
