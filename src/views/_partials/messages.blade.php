@foreach($errors->all() as $error)
	<p>{{ $error }}</p>	    
@endforeach

@if (Session::has('message-success'))
	<p>{{ Session::get('message-success') }}</p>
@endif

@if (Session::has('message-error'))
	<p>{{ Session::get('message-error') }}</p>
@endif

