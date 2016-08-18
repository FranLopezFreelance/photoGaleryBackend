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
											<a href="/photo/create/{{ $section->id }}" class="btn-warning btn-xs tag-view">Nueva Galería</a>
										@elseif($section->type_view == 2
										&& ($section->type_id == 1 || $section->type_id == 3))
											<a href="/video/create/{{ $section->id }}" class="btn-warning btn-xs tag-view">Nuevo Video</a>
										@endif
							@if($section->type->childs == 1)
								({{ $section->subsections()->count() }})
							@endif
							<div class="actions">
								<a class="btn btn-primary btn-xs" href="/section/{{ $section->id }}/edit">
									<i class="glyphicon glyphicon-pencil"></i>
								</a>
								<a class="btn btn-danger btn-xs" href="/section/{{ $section->id }}">
									<i class="glyphicon glyphicon-trash"></i>
								</a>
							</div>
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
											<a href="/photo/create/{{ $section->id }}" class="btn-warning btn-xs tag-view">Nueva Galería</a>
										@elseif($section->type_view == 2
										&& ($section->type_id == 1 || $section->type_id == 3))
											<a href="/video/create/{{ $section->id }}" class="btn-warning btn-xs tag-view">Nuevo Video</a>
										@endif
									@if($section->type->childs == 1)
										({{ $section->subsections()->count() }})
									@endif
									<div class="actions">
										<a class="btn btn-primary btn-xs" href="/section/{{ $section->id }}/edit">
											<i class="glyphicon glyphicon-pencil"></i>
										</a>
										<a class="btn btn-danger btn-xs" href="/section/{{ $section->id }}">
											<i class="glyphicon glyphicon-trash"></i>
										</a>
									</div>
								</li>
								@if($section->type->childs == 1)
									<ul style="display:none" class="subsections2UL">
									@foreach($section->subsections as $section)
										<li>
											<h4 class="titleSectionBack">{{ $section->name }}</h4>
												@if($section->type_view == 1
												&& ($section->type_id == 1 || $section->type_id == 3))
													<a href="/photo/create/{{ $section->id }}" class="btn-warning btn-xs tag-view">Nueva Galería</a>
												@elseif($section->type_view == 2
												&& ($section->type_id == 1 || $section->type_id == 3))
													<a href="/video/create/{{ $section->id }}" class="btn-warning btn-xs tag-view">Nuevo Video</a>
												@endif
											<div class="actions">
												<a class="btn btn-primary btn-xs" href="/section/{{ $section->id }}/edit">
													<i class="glyphicon glyphicon-pencil"></i>
												</a>
												<a class="btn btn-danger btn-xs" href="/section/{{ $section->id }}">
													<i class="glyphicon glyphicon-trash"></i>
												</a>
											</div>
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