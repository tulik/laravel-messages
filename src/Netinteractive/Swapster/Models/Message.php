<?php namespace Netinteractive\Swapster\Models;

use Config, Eloquent;

class Message extends Eloquent {

	protected $table = 'messages';

	public function sender()
	{
		return $this->belongsTo(Config::get('Swapster::swapster.user_model'), 'user_from_id');
	}

	public function recipient()
	{
		return $this->belongsTo(Config::get('Swapster::swapster.user_model'), 'user_to_id');
	}

}