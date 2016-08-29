@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Nuevo Video</div>
                <div class="panel-body">

                    <form class="form-horizontal" role="form" method="POST" action="/backend/video">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-3 control-label">Nombre</label>

                            <div class="col-md-7">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}">

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                            <label for="description" class="col-md-3 control-label">Descripción</label>

                            <div class="col-md-7">
                                <textarea id="description" class="form-control" name="description">{{ old('description') }}</textarea>

                                @if ($errors->has('description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('type_id') ? ' has-error' : '' }}">
                            <label for="type_id" class="col-md-3 control-label">Tipo de Video</label>

                            <div class="col-md-7">
                                <select class="form-control" id="type_id" name="type_id">
                                    <option value="0">Seleccionar... </option>

                                        <option  value="1"

                                            @if(1 == old('type_id'))
                                                selected
                                            @endif
                                        >
                                            Youtube
                                        </option>
                                        <option  value="2"

                                            @if(2 == old('type_id'))
                                                selected
                                            @endif
                                        >
                                            Vimeo
                                        </option>

                                </select>

                                @if ($errors->has('type_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('type_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

						<div class="form-group{{ $errors->has('url') ? ' has-error' : '' }}">
                            <label for="url" class="col-md-3 control-label">URL ID</label>

                            <div class="col-md-7">
                                <input id="url" type="text" class="form-control" name="url" value="{{ old('url') }}">

                                @if ($errors->has('url'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('url') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('section_id') ? ' has-error' : '' }}">
                            <label for="section_id" class="col-md-3 control-label">Sección</label>

                            <div class="col-md-7">
                                <select class="form-control" id="section_id" name="section_id">

                                    @if(isset($section))
                                        <option value="{{ $section->id }}">{{ $section->name }}</option>
                                    @else
                                        <option value="0">Seleccionar... </option>

                                        @foreach($sections as $section)
                                            @if($section->type_id == 1 && $section->type_view == 2 || $section->type_id == 3 && $section->type_view == 2)
                                                <option  value="{{ $section->id }}"

                                                    @if($section->id == old('section_id'))
                                                        selected
                                                    @endif
                                                >
                                                    {{ $section->name }}
                                                </option>
                                            @endif
                                        @endforeach
                                    @endif
                                </select>

                                @if ($errors->has('section_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('section_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('order') ? ' has-error' : '' }}">
                            <label for="order" class="col-md-3 control-label">Orden</label>

                            <div class="col-md-7">
                                <input id="order" type="number" class="form-control" name="order" value="{{ old('order') }}">

                                @if ($errors->has('order'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('order') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-3">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-upload"></i> Crear
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
