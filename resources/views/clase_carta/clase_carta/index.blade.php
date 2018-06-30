@extends('adminlte::page')

@section('content_header')
    <h1>Lista de clases</h1>
@stop

@section('content')
    <div class="container-full-fluid">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="card">
                    <div class="card-body">
                        <div class="box">
                            <div class="box-header with-border">
                                <h3 class="box-title">Lista</h3>
                                <div class="box-tools">

                                    <form method="GET" action="{{ url('/clase_carta') }}" accept-charset="UTF-8" class="form-inline" role="search">
                                        <a href="{{ url('/clase_carta/create') }}" class="btn btn-success btn-sm" title="Add New Clase_cartum">
                                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                                        </a>
                                        <div class="input-group input-group-sm">
                                            <input type="text" class="form-control" name="search" placeholder="Search..." value="{{ request('search') }}">
                                            <span class="input-group-btn">
                                                <button class="btn btn-secondary btn-flat" type="submit">
                                                    <i class="fa fa-search"></i>
                                                </button>
                                            </span>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <table class="table table-hover ">
                                <thead>
                                    <tr>
                                        <th>#</th><th>Precio C</th><th>Precio V</th><th>Probabilidad</th><th>Nombre</th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($clase_carta as $item)
                                    <tr>
                                        <td>{{ $loop->iteration or $item->id }}</td>
                                        <td>{{ $item->precio_c }}</td><td>{{ $item->precio_v }}</td><td>{{ $item->probabilidad }}</td><td>{{ $item->nombre }}</td>
                                        <td>
                                            <a href="{{ url('/clase_carta/' . $item->id) }}" title="View Clase_cartum"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            <a href="{{ url('/clase_carta/' . $item->id . '/edit') }}" title="Edit Clase_cartum"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                                            <form method="POST" action="{{ url('/clase_carta' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Clase_cartum" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="box-footer clearfix">
                                <div class="pagination"> {!! $clase_carta->appends(['search' => Request::get('search')])->render() !!} </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
