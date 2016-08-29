@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<ul class="sectionsUL">
				@forelse($sections as $section)
					@if($section->type->principal == 1)
						<li
							@if($section->type->childs == 1 && $section->subsections()->count() > 0 )
								class="open"
							@endif
						>
							<h4 class="titleSectionBack">{{ $section->name }}</h4>
										@if($section->type_view == 1
										&& ($section->type_id == 1 || $section->type_id == 3))
											<a href="/backend/photo/create/{{ $section->id }}" class="btn-success btn-xs tag-view">Nueva Galería</a>
										@elseif($section->type_view == 2
										&& ($section->type_id == 1 || $section->type_id == 3))
											<a href="/backend/video/create/{{ $section->id }}" class="btn-success btn-xs tag-view">Nuevo Video</a>
										@endif
							@if($section->type->childs == 1)
								({{ $section->subsections()->count() }})
								<a href="/backend/section/create/{{ $section->id }}" class="btn-success btn-xs tag-view">Nueva Sección</a>
							@endif
							<div class="actions">
								<a class="btn btn-primary btn-xs" href="/backend/section/{{ $section->id }}/edit">
									<i class="glyphicon glyphicon-pencil"></i>
								</a>
								{{ Form::open(array('url' => 'backend/section/' . $section->id, 'class' => 'formDelete')) }}

									{{ Form::hidden('_method', 'DELETE') }}

									<button type="submit" class="btn btn-danger btn-xs">
										<i class="glyphicon glyphicon-trash"></i>
									</button>

								{{ Form::close() }}
							</div>

							{{-- Lista de elementos creados en la seccion --}}
							<ul class="listElements">
							@foreach($section->photos as $photo)
								<li><a href="/backend/photo/{{ $photo->id }}">{{ $photo->name }}</a></li>
							@endforeach
							</ul>

							<ul class="listElements">
							@foreach($section->videos as $video)
								<li><a href="/backend/video/{{ $video->id }}">{{ $video->name }}</a></li>
							@endforeach
							</ul>
						</li>
						@if($section->type->childs == 1)
							<ul style="display:none" class="subsectionsUL">
							@foreach($section->subsections as $section)
								<li
									@if($section->type->childs == 1 && $section->subsections()->count() > 0 )
								class="open2"
							@endif
								>
									<h4 class="titleSectionBack">{{ $section->name }}</h4>
										@if($section->type_view == 1
										&& ($section->type_id == 1 || $section->type_id == 3))
											<a href="/backend/photo/create/{{ $section->id }}" class="btn-success btn-xs tag-view">Nueva Galería</a>
										@elseif($section->type_view == 2
										&& ($section->type_id == 1 || $section->type_id == 3))
											<a href="/backend/video/create/{{ $section->id }}" class="btn-success btn-xs tag-view">Nuevo Video</a>
										@endif
									@if($section->type->childs == 1)
										({{ $section->subsections()->count() }})
										<a href="/backend/section/create/{{ $section->id }}" class="btn-success btn-xs tag-view">Nueva Sección</a>
									@endif
									<div class="actions">
										<a class="btn btn-primary btn-xs" href="/backend/section/{{ $section->id }}/edit">
											<i class="glyphicon glyphicon-pencil"></i>
										</a>
										{{ Form::open(array('url' => 'backend/section/' . $section->id, 'class' => 'formDelete')) }}

											{{ Form::hidden('_method', 'DELETE') }}

											<td>
												<button type="submit" class="btn btn-danger btn-xs">
													<i class="glyphicon glyphicon-trash"></i>
												</button>
											</td>

										{{ Form::close() }}
									</div>

									{{-- Lista de elementos creados en la seccion --}}
									<ul class="listElements">
									@foreach($section->photos as $photo)
										<li><a href="/backend/photo/{{ $photo->id }}">{{ $photo->name }}</a></li>
									@endforeach
									</ul>

									<ul class="listElements">
									@foreach($section->videos as $video)
										<li><a href="/backend/video/{{ $video->id }}">{{ $video->name }}</a></li>
									@endforeach
									</ul>
								</li>
								@if($section->type->childs == 1)
									<ul style="display:none" class="subsections2UL">
									@foreach($section->subsections as $section)
										<li>
											<h4 class="titleSectionBack">{{ $section->name }}</h4>
												@if($section->type_view == 1
												&& ($section->type_id == 1 || $section->type_id == 3))
													<a href="/backend/photo/create/{{ $section->id }}" class="btn-success btn-xs tag-view">Nueva Galería</a>
												@elseif($section->type_view == 2
												&& ($section->type_id == 1 || $section->type_id == 3))
													<a href="/backend/video/create/{{ $section->id }}" class="btn-success btn-xs tag-view">Nuevo Video</a>
												@endif
											<div class="actions">
												<a class="btn btn-primary btn-xs" href="/backend/section/{{ $section->id }}/edit">
													<i class="glyphicon glyphicon-pencil"></i>
												</a>
												{{ Form::open(array('url' => 'backend/section/' . $section->id, 'class' => 'formDelete')) }}

													{{ Form::hidden('_method', 'DELETE') }}

													<td>
														<button type="submit" class="btn btn-danger btn-xs">
															<i class="glyphicon glyphicon-trash"></i>
														</button>
													</td>

												{{ Form::close() }}
											</div>

											{{-- Lista de elementos creados en la seccion --}}
											<ul class="listElements">
											@foreach($section->photos as $photo)
												<li><a href="/backend/photo/{{ $photo->id }}">{{ $photo->name }}</a></li>
											@endforeach
											</ul>

											<ul class="listElements">
											@foreach($section->videos as $video)
												<li><a href="/backend/video/{{ $video->id }}">{{ $video->name }}</a></li>
											@endforeach
											</ul>
										</li>
									@endforeach
									</ul>
								@endif
							@endforeach
							</ul>
						@endif
					@endif
				@empty
				@endforelse
				</ul>

			</div>
		</div>
	</div>
@endsection