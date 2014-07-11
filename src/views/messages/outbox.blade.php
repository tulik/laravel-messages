@extends('Swapster::_layouts.swapster')

@section('swapster')

<table>
	<thead>
		<tr>
			<td>Temat</td>
			<td>Do</td>
			<td>Data</td>
		</tr>
	</thead>
	<tbody>
		@if ($messages->count() > 0)
			@foreach ($messages as $message)
			<tr>
				<td><a href="{{ route('messages.show.outbox', $message->id) }}">{{ $message->subject }}</a></td>
				<td>{{ $message->recipient->{Config::get('Swapster::swapster.username')} }}</td>
				<td>{{ $message->created_at }}</td>
			</tr>
			@endforeach
		@else
			<tr>
				<td colspan="3">Nie masz żadnych wiadomości</td>
			</tr>
		@endif
	</tbody>
</table>

@stop