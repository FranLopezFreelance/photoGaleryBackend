@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="md-12">
				<table class="table table-hover table-striped">
					<tr>
						<th>Nombre</th>
						<th>Tipo</th>
						<th>Sección</th>
						<th>Orden</th>
						<th>Editar</th>
						<th>Borrar</th>
					</tr>
					@forelse($videos as $video)
						<tr>
							<td><b><a href="/backend/video/{{ $video->id }}">{{ $video->name }}</a></b></td>

								@if($video->type_id == 1)
									<td>Youtube</td>
								@else
									<td>Vimeo</td>
								@endif

							<td>{{ $video->section->name }}</td>
							<td>{{ $video->order }}</td>
							<td><a href="/backend/video/edit/{{ $video->id }}"><i class="glyphicon glyphicon-pencil"></i></a></td>
							<td><a href="/backend/video/delete/{{ $video->id }}"><i class="glyphicon glyphicon-trash"></i></a></td>
						</tr>
					@empty
						<tr>
							<td colspan="6">
								<h4>No hay ningún Video cargado.</h4>
								<h4>Subí el primero desde <a href="/backend/video/create" title="Subir Video">aquí</a>.</h4>
							</td>
						</tr>
					@endforelse
				</table>
			</div>
		</div>
	</div>
@endsection
