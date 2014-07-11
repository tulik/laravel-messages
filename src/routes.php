<?php

Route::group(['before' => Config::get('Swapster::swapster.auth_filter')], function()
{
	Route::get('messages/create', [
		'as'	=> 'messages.create',
		'uses'	=> '\Netinteractive\Swapster\Controllers\MessagesController@create',
	]);

	Route::get('messages/{id}/reply', [
		'as'	=> 'messages.reply',
		'uses'	=> '\Netinteractive\Swapster\Controllers\MessagesController@reply',
	]);

	Route::post('messages', [
		'as'	=> 'messages.store',
		'uses'	=> '\Netinteractive\Swapster\Controllers\MessagesController@store',
	]);

	Route::get('messages/inbox', [
		'as'	=> 'messages.inbox',
		'uses'	=> '\Netinteractive\Swapster\Controllers\MessagesController@inbox',
	]);

	Route::get('messages/outbox', [
		'as'	=> 'messages.outbox',
		'uses'	=> '\Netinteractive\Swapster\Controllers\MessagesController@outbox',
	]);

	Route::get('messages/{id}/inbox', [
		'as'	=> 'messages.show.inbox',
		'uses'	=> '\Netinteractive\Swapster\Controllers\MessagesController@inbox_show',
	]);

	Route::get('messages/{id}/outbox', [
		'as'	=> 'messages.show.outbox',
		'uses'	=> '\Netinteractive\Swapster\Controllers\MessagesController@outbox_show',
	]);
});