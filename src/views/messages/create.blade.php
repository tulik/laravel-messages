@extends('Swapster::_layouts.swapster')

@section('swapster')

<table>
{{ Form::open(['method' => 'POST', 'route' => 'messages.store']) }}
	<tr>
		<td>Do</td>
		<td>{{ Form::select('user_to_id', $userList) }}</td>
	</tr>

	<tr>
		<td>Temat</td>
		<td>{{ Form::text('subject') }}</td>
	</tr>

	<tr>
		<td>Treść</td>
		<td>{{ Form::textarea('body') }}</td>
	</tr>

	<tr>
		<td colspan="2">
			{{ Form::submit('Wyślij') }}
			<a href="{{ route('messages.inbox') }}">Anuluj</a>
		</td>
	</tr>
{{ Form::close() }}
</table>

@stop