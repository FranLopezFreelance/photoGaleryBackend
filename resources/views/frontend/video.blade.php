<h2> Videos > {{ $section->name }}</h2><br />

            @forelse($videos as $video)
				@if($video->type_id == 1) {
					<div id='videoVimeo'>
                        <iframe src='https://player.vimeo.com/video/{{ $video->url }}' width='100%' height='100%' frameborder='0' webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                    </div>
				@else
					<div class='videoYoutube'>
                        <iframe width='100%' height='100%'' src='https://www.youtube.com/embed/".$item->id_video."' frameborder='0' allowfullscreen></iframe>
                    </div>
                @endif			}
			@empty
                <h2 class='noResults'>No hay Videos en esta sección.</h2>
            @endforelse