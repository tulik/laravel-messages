@extends('Swapster::_layouts.swapster')

@section('swapster')

<table>
	<tr>
		<td>Od</td>
		<td>{{ $message->sender->{Config::get('Swapster::swapster.username')} }}</td>
	</tr>
	<tr>
		<td>Data</td>
		<td>{{ $message->created_at }}</td>
	</tr>
	<tr>
		<td>Temat</td>
		<td>{{ $message->subject }}</td>
	</tr>
	<tr>
		<td colspan="2">{{ $message->body }}</td>
	</tr>
	<tr>
		<td colspan="2"><a href="{{ route('messages.reply', $message->id) }}">Odpowiedź</a></td>
	</tr>
</table>

@stop