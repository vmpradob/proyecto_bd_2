<div class="form-group {{ $errors->has('fecha') ? 'has-error' : ''}}">
    <label for="fecha" class="col-md-2 control-label">{{ 'Fecha' }}</label>
    <div class="col-md-10">
        <input class="form-control" name="fecha" type="date" id="fecha" value="{{ $intercambio->fecha or ''}}" >
        {!! $errors->first('fecha', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('id_jugador1') ? 'has-error' : ''}}">
    <label for="id_jugador1" class="col-md-2 control-label">{{ 'Id Jugador1' }}</label>
    <div class="col-md-10">
        <input class="form-control" name="id_jugador1" type="number" id="id_jugador1" value="{{ $intercambio->id_jugador1 or ''}}" required>
        {!! $errors->first('id_jugador1', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('id_jugador2') ? 'has-error' : ''}}">
    <label for="id_jugador2" class="col-md-2 control-label">{{ 'Id Jugador2' }}</label>
    <div class="col-md-10">
        <input class="form-control" name="id_jugador2" type="number" id="id_jugador2" value="{{ $intercambio->id_jugador2 or ''}}" required>
        {!! $errors->first('id_jugador2', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-2 col-md-10">
        <input class="btn btn-primary" type="submit" value="{{ $submitButtonText or 'Create' }}">
    </div>
</div>
