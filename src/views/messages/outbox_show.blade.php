@extends('Swapster::_layouts.swapster')

@section('swapster')

<table>
	<tr>
		<td>Do</td>
		<td>{{ $message->recipient->{Config::get('Swapster::swapster.username')} }}</td>
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
</table>

@stop