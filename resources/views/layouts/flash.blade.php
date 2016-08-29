@if(session()->has('flash_message'))

	<script>
		swal({
			title: "{{ session('flash_message.title') }}",
			text: "{{ session('flash_message.text') }}",
			type: "{{ session('flash_message.type') }}",
			timer: 3000,
			showConfirmButton: false
		});
	</script>

@endif

@if(session()->has('flash_message_overlay'))

	<script>
		swal({
			title: "{{ session('flash_message_overlay.title') }}",
			text: "{{ session('flash_message_overlay.text') }}",
			type: "{{ session('flash_message_overlay.type') }}",
			confirmButtonText: "Si"
		});
	</script>

@endif

@if(session()->has('flash_message_alert'))
	<script>
		swal({
			title: "{{ session('flash_message_alert.title') }}",
			text: "{{ session('flash_message_alert.text') }}",
			type: "{{ session('flash_message_alert.type') }}",
			showCancelButton: true,
			closeOnConfirm: false,
			showLoaderOnConfirm: true,
		},
		function(){
			setTimeout(function(){
				swal("{{ session('flash_message_alert.postMessage') }}");
			}, 2000);
		});
	</script>
@endif