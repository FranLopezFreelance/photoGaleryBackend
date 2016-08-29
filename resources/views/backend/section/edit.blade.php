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

                    Nueva Seccion
                </div>
                <div class="panel-body">

                    <form class="form-horizontal" role="form" method="POST" action="/backend/section/{{  $section->id }}">
                        {{ csrf_field() }}
                        {{ method_field('PATCH') }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-3 control-label">Nombre</label>

                            <div class="col-md-7">

                            	@if(isset($section))
                                	<input id="name" type="text" class="form-control" name="name" value="{{ $section->name }}"/>
                                @else
                                	<input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}">
                                @endif

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('type_id') ? ' has-error' : '' }}">
                            <label for="type_id" class="col-md-3 control-label">Tipo de Sección</label>

                            <div class="col-md-7">
                                <select class="form-control" id="type_id" name="type_id">

                                    @if(!isset($section))
                                    	<option value="0">Seleccionar... </option>
                                    @endif

                                    @foreach($types as $type)

                                        @if(isset($section) && $section->type_id == $type->id)
                                        	<option value="{{ $section->type_id }}" selected>
                                        		{{ $section->type->name }}
                                        	</option>
                                        @else
	                                            <option  value="{{ $type->id }}"

	                                                @if($type->id == old('type_id'))
	                                                    selected
	                                                @endif
	                                            >
	                                                {{ $type->name }}
	                                            </option>
	                                    @endif
                                    @endforeach
                                </select>

                                @if ($errors->has('type_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('type_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('type_view') ? ' has-error' : '' }}">
                            <label for="type_view" class="col-md-3 control-label">Tipo de Vista</label>

                            <div class="col-md-7">
                                <select class="form-control" id="type_view" name="type_view">

                                    @if(!isset($section))
                                    	<option value="0">Seleccionar... </option>
                                    @endif

                                    @if(isset($section))
                                    	@if($section->type_view == 1)
											<option  value="1" selected>Fotos</option>
											<option  value="2">Videos</option>
                                    	@else
                                    		<option  value="1">Fotos</option>
                                    		<option  value="2" selected>Videos</option>
                                    	@endif
                                    @else

                                        <option  value="1"

                                            @if(1 == old('type_view'))
                                                selected
                                            @endif
                                        >
                                            Fotos
                                        </option>
                                        <option  value="2"

                                            @if(2 == old('type_view'))
                                                selected
                                            @endif
                                        >
                                            Videos
                                        </option>
                                    @endif

                                </select>

                                @if ($errors->has('type_view'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('type_view') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('section_id') ? ' has-error' : '' }}">
                            <label for="section_id" class="col-md-3 control-label">Sección Madre</label>

                            <div class="col-md-7">
                                <select class="form-control" id="section_id" name="section_id">

                                    @if(isset($section) && $section->type->principal == 1)
                                    	<option value="0">Seleccionar... </option>
                                    @endif

                                        @foreach($sections as $sectionUpdate)

                                        	@if(isset($section) && $section->section_id == $sectionUpdate->id && $section->type->principal == 0)
                                        		<option value="{{ $section->id }}" selected>
													{{ $section->name }}
                                        		</option>
                                        	@else
	                                            @if($sectionUpdate->type->childs == 1)
	                                                <option  value="{{ $sectionUpdate->id }}"

	                                                    @if($sectionUpdate->id == old('section_id'))
	                                                        selected
	                                                    @endif
	                                                >
	                                                    {{ $sectionUpdate->name }}
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
                                @if(isset($section))
                                	<input id="order" type="text" class="form-control" name="order" value="{{ $section->order }}"/>
                                @else
                                	<input id="order" type="text" class="form-control" name="order" value="{{ old('order') }}"/>
                                @endif

                                @if ($errors->has('order'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('order') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <input type="hidden" name="active" value="1">

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
