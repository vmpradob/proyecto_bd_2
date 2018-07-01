<div class="form-group {{ $errors->has('nombre') ? 'has-error' : ''}}">
    <label for="nombre" class="col-md-2 control-label">{{ 'Nombre' }}</label>
    <div class="col-md-10">
        <input class="form-control" name="nombre" type="text" id="nombre" value="{{ $cartum->nombre or ''}}" required>
        {!! $errors->first('nombre', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('imgUrl') ? 'has-error' : ''}}">
    <label for="imgUrl" class="col-md-2 control-label">{{ 'Imgurl' }}</label>
    <div class="col-md-10">
        <input class="form-control" name="imgUrl" type="file" id="imgUrl" value="{{ $cartum->imgUrl or ''}}" >
        {!! $errors->first('imgUrl', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('imgUrl') ? 'has-error' : ''}}">
    <div class="col-md-offset-2 col-md-10">
        <select name="clase" id="selectMultiple" multiple class="form-control">
            @foreach(App\Clase::all() as $clase)
                <option value="{{$clase->id}}">{{$clase->nombre}}</option>
            @endforeach
        </select>
        {!! $errors->first('imgUrl', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-2 col-md-10">
        <input class="btn btn-primary" type="submit" value="{{ $submitButtonText or 'Create' }}">
    </div>
</div>
