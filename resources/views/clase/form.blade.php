<div class="form-group {{ $errors->has('nombre') ? 'has-error' : ''}}">
    <label for="nombre" class="col-md-2 control-label">{{ 'Nombre' }}</label>
    <div class="col-md-10">
        <input class="form-control" name="nombre" type="text" id="nombre" value="{{ $clase->nombre or ''}}" required>
        {!! $errors->first('nombre', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('precio_c') ? 'has-error' : ''}}">
    <label for="precio_c" class="col-md-2 control-label">{{ 'Precio' }}</label>
    <div class="col-md-10">
        <input class="form-control" name="precio_c" type="number" id="precio_c"  value="{{ $clase->precio_c or ''}}" required>
        {!! $errors->first('precio_c', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('probabilidad') ? 'has-error' : ''}}">
    <label for="probabilidad" class="col-md-2 control-label">{{ 'Probabilidad' }}</label>
    <div class="col-md-10">
        <input class="form-control" name="probabilidad" type="number" id="probabilidad" step="any" value="{{ $clase->probabilidad or ''}}" required>
        {!! $errors->first('probabilidad', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('imgUrl') ? 'has-error' : ''}}">
    <label for="imgUrl" class="col-md-2 control-label">{{ 'Imagen' }}</label>
    <div class="col-md-10">
        <input class="form-control" name="imgUrl" type="file" id="imgUrl" value="{{ $clase->imgUrl or ''}}" >
        {!! $errors->first('imgUrl', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-2 col-md-10">
        <input class="btn btn-primary" type="submit" value="{{ $submitButtonText or 'Create' }}">
    </div>
</div>
