@extends('adminlte::page')

@section('content_header')
    <h1>Clase</h1>
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
                                    {!! Form::open(['method' => 'GET', 'url' => '/clase', 'class' => 'form-inline', 'role' => 'search'])  !!}
                                    <a href="{{ url('/clase/create') }}" class="btn btn-success btn-sm" title="Add New Clase">
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
                                    {!! Form::close() !!}
                                </div>
                            </div>
                            <table class="table table-hover" style="margin-bottom: 0px">
                                <thead>
                                    <tr>
                                        <th>#</th><th>Nombre</th><th>Precio C</th><th>Precio V</th><th>Probabilidad</th><th>ImgUrl</th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($clase as $item)
                                    <tr>
                                        <td>{{ $loop->iteration or $item->id }}</td>
                                        <td>{{ $item->nombre }}</td><td>{{ $item->precio_c }}</td><td>{{ $item->precio_v }}</td><td>{{ $item->probabilidad }}</td><td>{{ $item->imgUrl }}</td>
                                        <td>
                                            <a href="{{ url('/clase/' . $item->id) }}" title="View Clase"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            <a href="{{ url('/clase/' . $item->id . '/edit') }}" title="Edit Clase"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                                            {!! Form::open([
                                                'method'=>'DELETE',
                                                'url' => ['/clase', $item->id],
                                                'style' => 'display:inline'
                                            ]) !!}
                                                {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-danger btn-sm',
                                                        'title' => 'Delete Clase',
                                                        'onclick'=>'return confirm("Confirm delete?")'
                                                )) !!}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="box-footer">
                            <div class=""> {!! $clase->appends(['search' => Request::get('search')])->render() !!} </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
