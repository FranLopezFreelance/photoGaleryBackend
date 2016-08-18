@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="md-12">
				<table class="table table-hover table-striped">
					<tr>
						<th>Nombre</th>
						<th></th>
						<th>Sección</th>
						<th>Orden</th>
						<th>Editar</th>
						<th>Borrar</th>
					</tr>
					@forelse($photos as $photo)
						<tr>
							<td><b><a href="/photo/{{ $photo->id }}">{{ $photo->name }}</a></b></td>
							<td>
								<a class="btn btn-success btn-xs" href="files/{{ $photo->id }}">
									Agregar Fotos
								</a>
							</td>
							<td>{{ $photo->section->name }}</td>
							<td>{{ $photo->order }}</td>
							<td><a href="/photo/edit/{{ $photo->id }}"><i class="glyphicon glyphicon-pencil"></i></a></td>
							<td><a href="/photo/delete/{{ $photo->id }}"><i class="glyphicon glyphicon-trash"></i></a></td>
						</tr>
					@empty
						<tr>
							<td colspan="5">
								<h4>No hay ninguna Foto cargada.</h4>
								<h4>Subí la primera desde <a href="/photo/create" title="Subir Foto">aquí</a>.</h4>
							</td>
						</tr>
					@endforelse
				</table>
			</div>
		</div>
	</div>
@endsection
