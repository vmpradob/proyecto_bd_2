<div class="form-group {{ $errors->has('nombre') ? 'has-error' : ''}}">
    <label for="nombre" class="col-md-2 control-label">{{ 'Nombre' }}</label>
    <div class="col-md-10">
        <input class="form-control" name="nombre" type="text" id="nombre" value="{{ $sobre->nombre or ''}}" required>
        {!! $errors->first('nombre', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('precio') ? 'has-error' : ''}}">
    <label for="precio" class="col-md-2 control-label">{{ 'Precio' }}</label>
    <div class="col-md-10">
        <input class="form-control" name="precio" type="number" id="precio" value="{{ $sobre->precio or ''}}" required>
        {!! $errors->first('precio', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('cant_cartas') ? 'has-error' : ''}}">
    <label for="cant_cartas" class="col-md-2 control-label">{{ 'Cant Cartas' }}</label>
    <div class="col-md-10">
        <input class="form-control" name="cant_cartas" type="number" id="cant_cartas" value="{{ $sobre->cant_cartas or ''}}" >
        {!! $errors->first('cant_cartas', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('imgUrl') ? 'has-error' : ''}}">
    <label for="imgUrl" class="col-md-2 control-label">{{ 'Imgurl' }}</label>
    <div class="col-md-10">
        <input class="form-control" name="imgUrl" type="file" id="imgUrl" value="{{ $sobre->imgUrl or ''}}" >
        {!! $errors->first('imgUrl', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('imgUrl') ? 'has-error' : ''}}">
    <label for="clase" class="col-md-2 control-label">{{ 'Clase' }}</label>
    <div class="col-md-10">
        <select name="clase" class="form-control" id="">
            @foreach(App\Clase::all() as $clase)
                @if(isset($sobre))
                    <option @if($sobre->clase = $clase) selected  @endif value="{{$clase->id}}">{{$clase->nombre}}</option>
                @else
                    <option value="{{$clase->id}}">{{$clase->nombre}}</option>

                @endif

            @endforeach
        </select>
    </div>
</div>
<div class="form-group">
    <div class="col-md-offset-2 col-md-10">
        <input class="btn btn-primary" type="submit" value="{{ $submitButtonText or 'Create' }}">
    </div>
</div>
