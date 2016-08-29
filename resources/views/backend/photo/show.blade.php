@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="col-md-8">
			<h4>{{ $photo->name }} <a class="btn btn-primary btn-xs edit" href="/backend/photo/{{ $photo->id }}/edit"><i class="glyphicon glyphicon-pencil"></i></a></h4>
			<p>{{ $photo->description }}</p>

			<ul>
				@foreach($photo->images as $image)
					<span class="imagesPhoto">
						<img src="{{
							route('photo.image', [
								'name' => $image->path
							])
						}}" width="150"/>

						{{ Form::open(array('url' => 'image/' . $image->id, 'class' => 'imgDelete')) }}

						{{ Form::hidden('_method', 'DELETE') }}

							<button type="submit" class="btn btn-danger btn-xs">
									<i class="glyphicon glyphicon-trash"></i>
							</button>

						{{ Form::close() }}

					</span>
				@endforeach
			</ul>
		</div>

		<div class="col-md-4">
			<div class="dropzoneDIV">
	            <h4>Arrastrá las imágenes que quieras agregar</h4>
	            <form action="/backend/photo/addImage/{{ $photo->id }}" class="dropzone" method="POST">

	            {{ csrf_field() }}

	            </form>
	        </div>
	    </div>

	</div>
@endsection
