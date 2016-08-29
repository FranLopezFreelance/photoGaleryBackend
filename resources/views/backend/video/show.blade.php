@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="col-md-4">
			<h4>{{ $video->name }} <a class="btn btn-primary btn-xs edit" href="/backend/video/{{ $video->id }}/edit"><i class="glyphicon glyphicon-pencil"></i></a></h4>
			<p>{{ $video->description }}</p>

				<p>{{ Form::open(array('url' => 'backend/video/' . $video->id, 'class' => 'formDelete')) }}

				<p><b>Sección:</b> {{ $video->section->name }}</p>

				{{ Form::hidden('_method', 'DELETE') }}

					<button type="submit" class="btn btn-danger btn-xs">
						<i class="glyphicon glyphicon-trash"></i>
					</button>

				{{ Form::close() }}</p>

		</div>
		<div class="col-md-8">
			@if($video->type_id == 1)
				<iframe width="560" height="315" src="https://www.youtube.com/embed/{{ $video->url }}" frameborder="0" allowfullscreen></iframe>
			@else
				<iframe src="https://player.vimeo.com/video/{{ $video->url }}" width="640" height="360" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
			@endif
		</div>
	</div>
@endsection
