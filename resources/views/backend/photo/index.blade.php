@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="md-12">
				<table class="table table-hover table-striped">
					<tr>
						<th>Nombre</th>
						<th>Sección</th>
						<th>Orden</th>
						<th>Editar</th>
						<th>Borrar</th>
					</tr>
					@forelse($photos as $photo)
						<tr>
							<td>
								<b><a href="/backend/photo/{{ $photo->id }}">{{ $photo->name }}</a></b></td>
							<td>{{ $photo->section->name }}</td>
							<td>{{ $photo->order }}</td>
							<td><a class="btn btn-primary btn-xs" href="/backend/photo/{{ $photo->id }}/edit"><i class="glyphicon glyphicon-pencil"></i></a></td>

							{{ Form::open(array('url' => 'backend/photo/' . $photo->id)) }}

								{{ Form::hidden('_method', 'DELETE') }}

								<td>
									<button type="submit" class="btn btn-danger btn-xs">
										<i class="glyphicon glyphicon-trash"></i>
									</button>
								</td>

							{{ Form::close() }}
						</tr>
					@empty
						<tr>
							<td colspan="5">
								<h4>No hay ninguna Foto cargada.</h4>
								<h4>Subí la primera desde <a href="/backend/photo/create" title="Subir Foto">aquí</a>.</h4>
							</td>
						</tr>
					@endforelse
				</table>
			</div>
		</div>
	</div>
@endsection
