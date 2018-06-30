@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Edit Clase_cartum #{{ $clase_cartum->id }}</div>
                    <div class="card-body">
                        <a href="{{ url('/clase_carta/clase_carta') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <br />
                        <br />

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        <form method="POST" action="{{ url('/clase_carta/clase_carta/' . $clase_cartum->id) }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            {{ csrf_field() }}

                            @include ('clase_carta.clase_carta.form', ['submitButtonText' => 'Update'])

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
