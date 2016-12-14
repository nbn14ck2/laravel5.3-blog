@if (Session::has('status'))
	<div class="alert alert-success fade in">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		<div class="text-center">{{ Session::get('status') }}</div>
	</div>
@endif