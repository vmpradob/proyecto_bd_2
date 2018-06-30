<div class="form-group {{ $errors->has('precio_c') ? 'has-error' : ''}}">
    <label for="precio_c" class="col-md-2 control-label">{{ 'Precio C' }}</label>
    <div class="col-md-10">
        <input class="form-control" name="precio_c" type="number" id="precio_c" value="{{ $clase_cartum->precio_c or ''}}" required>
        {!! $errors->first('precio_c', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('precio_v') ? 'has-error' : ''}}">
    <label for="precio_v" class="col-md-2 control-label">{{ 'Precio V' }}</label>
    <div class="col-md-10">
        <input class="form-control" name="precio_v" type="number" id="precio_v" value="{{ $clase_cartum->precio_v or ''}}" required>
        {!! $errors->first('precio_v', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('probabilidad') ? 'has-error' : ''}}">
    <label for="probabilidad" class="col-md-2 control-label">{{ 'Probabilidad' }}</label>
    <div class="col-md-10">
        <input class="form-control" name="probabilidad" type="number" step="any" id="probabilidad" value="{{ $clase_cartum->probabilidad or ''}}" required>
        {!! $errors->first('probabilidad', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('nombre') ? 'has-error' : ''}}">
    <label for="nombre" class="col-md-2 control-label">{{ 'Nombre' }}</label>
    <div class="col-md-10">
        <input class="form-control" name="nombre" type="text" id="nombre" value="{{ $clase_cartum->nombre or ''}}" required>
        {!! $errors->first('nombre', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('imgUrl') ? 'has-error' : ''}}">
    <label for="imgUrl" class="col-md-2 control-label">{{ 'Imgurl' }}</label>
    <div class="col-md-10">
        <input class="form-control" name="imgUrl" type="text" id="imgUrl" value="{{ $clase_cartum->imgUrl or ''}}" >
        {!! $errors->first('imgUrl', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-4 col-md-offset-1">
        <input class="btn btn-primary" type="submit" value="{{ $submitButtonText or 'Create' }}">
    </div>
</div>
