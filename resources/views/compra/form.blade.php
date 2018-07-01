<div class="form-group {{ $errors->has('id_jugador') ? 'has-error' : ''}}">
    <label for="id_jugador" class="col-md-2 control-label">{{ 'Id Jugador' }}</label>
    <div class="col-md-10">
        <input class="form-control" name="id_jugador" type="number" id="id_jugador" value="{{ $compra->id_jugador or ''}}" >
        {!! $errors->first('id_jugador', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('id_sobre') ? 'has-error' : ''}}">
    <label for="id_sobre" class="col-md-2 control-label">{{ 'Id Sobre' }}</label>
    <div class="col-md-10">
        <input class="form-control" name="id_sobre" type="number" id="id_sobre" value="{{ $compra->id_sobre or ''}}" >
        {!! $errors->first('id_sobre', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('cantidad') ? 'has-error' : ''}}">
    <label for="cantidad" class="col-md-2 control-label">{{ 'Cantidad' }}</label>
    <div class="col-md-10">
        <input class="form-control" name="cantidad" type="number" id="cantidad" value="{{ $compra->cantidad or ''}}" >
        {!! $errors->first('cantidad', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-2 col-md-10">
        <input class="btn btn-primary" type="submit" value="{{ $submitButtonText or 'Create' }}">
    </div>
</div>
