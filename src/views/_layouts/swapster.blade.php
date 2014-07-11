<ul>
	<li><a href="{{ route('messages.create') }}">Nowa wiadomość</a></li>
	<li><a href="{{ route('messages.inbox') }}">Odebrane</a></li>
	<li><a href="{{ route('messages.outbox') }}">Wysłane</a></li>
</ul>

@include('Swapster::_partials.messages')

@yield('swapster')