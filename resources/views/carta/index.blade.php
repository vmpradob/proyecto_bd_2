@extends('adminlte::page')

@section('content_header')
    <h1>Carta</h1>
@stop

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-6 col-md-offset-3">
                <div class="card">
                    <div class="card-body">
                        <div class="box">
                            <div class="box-header with-border">
                                <h3 class="box-title">
                                    Lista
                                </h3>
                                <div class="box-tools">
                                    {!! Form::open(['method' => 'GET', 'url' => '/carta', 'class' => 'form-inline', 'role' => 'search'])  !!}
                                    <a href="{{ url('/carta/create') }}" class="btn btn-success btn-sm" title="Add New Cartum">
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
                                        <th>#</th><th>Nombre</th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($carta as $item)
                                    <tr>
                                        <td>{{ $loop->iteration or $item->id }}</td>
                                        <td>{{ $item->nombre }}</td>                                    
                                        <td>
                                            <a href="{{ url('/carta/' . $item->id) }}" title="View Cartum"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            <a href="{{ url('/carta/' . $item->id . '/edit') }}" title="Edit Cartum"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                                            {!! Form::open([
                                                'method'=>'DELETE',
                                                'url' => ['/carta', $item->id],
                                                'style' => 'display:inline'
                                            ]) !!}
                                                {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-danger btn-sm',
                                                        'title' => 'Carta',
                                                        'onclick'=>'return confirm("Confirm delete?")'
                                                )) !!}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="box-footer">
                            <div class=""> {!! $carta->appends(['search' => Request::get('search')])->render() !!} </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
