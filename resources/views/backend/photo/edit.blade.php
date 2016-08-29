@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    @if(isset($section))
                        {{ $section->name }} /
                    @endif

                    Editar Galería "<b>{{ $photo->name }}</b>"

                </div>
                <div class="panel-body">

                    <form class="form-horizontal" role="form" method="POST" action="/backend/photo/{{ $photo->id  }}">
                        {{ csrf_field() }}
						{{ method_field('PATCH') }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-3 control-label">Nombre</label>

                            <div class="col-md-7">

                                @if(isset($photo))
                                	<input id="name" type="text" class="form-control" name="name" value="{{ $photo->name }}"/>
                                @else
                                	<input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}"/>
                                @endif

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
                                @if(isset($photo))
                                  	<textarea id="description" class="form-control" name="description">{{ $photo->description }}</textarea>
                                @else
                                	<textarea id="description" class="form-control" name="description">{{ old('description') }}</textarea>
                                @endif


                                @if ($errors->has('description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('section_id') ? ' has-error' : '' }}">
                            <label for="section_id" class="col-md-3 control-label">Sección</label>

                            <div class="col-md-7">
                                <select class="form-control" id="section_id" name="section_id">

                                    @if(!isset($photo))
                                    	<option value="0">Seleccionar... </option>
                                    @endif

                                    @foreach($sections as $sectionEdit)
                                    	@if(isset($photo) && $photo->section_id == $sectionEdit->id)
                                    			<option  value="{{ $photo->section_id }}" selected>
	                                                {{ $photo->section->name }}
	                                            </option>
                                    	@else
	                                        @if($sectionEdit->type_id == 1 && $sectionEdit->type_view == 1 || $sectionEdit->type_id == 3 && $sectionEdit->type_view == 1)
	                                            <option  value="{{ $sectionEdit->id }}"
	                                                @if($sectionEdit->id == old('section_id'))
	                                                    selected
	                                                @endif
	                                            >
	                                                {{ $sectionEdit->name }}
	                                            </option>
	                                        @endif
                                        @endif
                                    @endforeach
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

                            	@if(isset($photo))
                                	<input id="order" type="text" class="form-control" name="order" value="{{ $photo->order }}"/>
                                @else
                                	<input id="order" type="number" class="form-control" name="order" value="{{ old('order') }}">
                                @endif


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
                                    <i class="fa fa-btn fa-upload"></i> Guardar
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
