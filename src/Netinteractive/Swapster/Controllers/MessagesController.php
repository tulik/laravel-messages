<?php namespace Netinteractive\Swapster\Controllers;

use Config, Input, Lang, Redirect, Session, Validator, View;
use Netinteractive\Swapster\Models\Message;

class MessagesController extends \BaseController {

	public function create()
	{
		$user = call_user_func_array([Config::get('Swapster::swapster.user_model'), 'find'], [Config::get('Swapster::swapster.user_id')]);
		
		$users 		= call_user_func([Config::get('Swapster::swapster.user_model'), 'all']);
		$userList 	= $users->lists(Config::get('Swapster::swapster.username'), 'id');
		UNSET($userList[$user->id]);

		return View::make('Swapster::messages.create')->with([
			'userList'	=> $userList,
		]);
	}

	public function reply($id)
	{
		$user = call_user_func_array([Config::get('Swapster::swapster.user_model'), 'find'], [Config::get('Swapster::swapster.user_id')]);

		$message = $user->inbox()->find($id);

		$userList = [$message->sender->id => $message->sender->{Config::get('Swapster::swapster.username')}];

		if (is_null($message))
		{
			Session::flash('success', Lang::get('Swapster::messages.not_found'));

			return Redirect::route('messages.inbox');
		}

		return View::make('Swapster::messages.reply')->with([
			'message' 	=> $message,
			'userList'	=> $userList,
		]);
	}

	public function store()
	{
		$input = Input::all();

		$validator = Validator::make($input, [
			'user_to_id'	=> 'required',
			'subject'		=> 'required|max:255',
			'body'			=> 'required',
		]);

		if ($validator->fails())
		{
			return Redirect::back()->withInput()->withErrors($validator);
		}

		$message = new Message;
		$message->user_from_id 	= Config::get('Swapster::swapster.user_id');
		$message->user_to_id 	= $input['user_to_id'];
		$message->subject 		= $input['subject'];
		$message->body 			= $input['body'];
		$message->save();

		if ($message)
		{
			Session::flash('message-success', Lang::get('Swapster::messages.create_success'));
		}
		else
		{
			Session::flash('message-error', Lang::get('Swapster::messages.create_error'));
		}

		return Redirect::route('messages.outbox');
	}

	public function inbox()
	{
		$user = call_user_func_array([Config::get('Swapster::swapster.user_model'), 'find'], [Config::get('Swapster::swapster.user_id')]);

		$messages = $user->inbox;

		return View::make('Swapster::messages.inbox')->with([
			'messages'	=> $messages,
		]);
	}

	public function inbox_show($id)
	{
		$user = call_user_func_array([Config::get('Swapster::swapster.user_model'), 'find'], [Config::get('Swapster::swapster.user_id')]);

		$message = $user->inbox()->find($id);

		if (is_null($message))
		{
			Session::flash('success', Lang::get('Swapster::messages.not_found'));

			return Redirect::route('messages.inbox');
		}

		return View::make('Swapster::messages.inbox_show')->with([
			'message'	=> $message,
		]);
	}

	public function outbox()
	{
		$user = call_user_func_array([Config::get('Swapster::swapster.user_model'), 'find'], [Config::get('Swapster::swapster.user_id')]);

		$messages = $user->outbox;

		return View::make('Swapster::messages.outbox')->with([
			'messages'	=> $messages,
		]);
	}

	public function outbox_show($id)
	{
		$user = call_user_func_array([Config::get('Swapster::swapster.user_model'), 'find'], [Config::get('Swapster::swapster.user_id')]);

		$message = $user->outbox()->find($id);

		if (is_null($message))
		{
			Session::flash('success', Lang::get('Swapster::messages.not_found'));

			return Redirect::route('messages.outbox');
		}

		return View::make('Swapster::messages.outbox_show')->with([
			'message'	=> $message,
		]);
	}

}