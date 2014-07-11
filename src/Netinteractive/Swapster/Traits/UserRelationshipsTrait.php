<?php namespace Netinteractive\Swapster\Traits;

trait UserRelationshipsTrait {

	public function inbox()
	{
		return $this->hasMany('\Netinteractive\Swapster\Models\Message', 'user_to_id')->orderBy('created_at', 'DESC');
	}

	public function outbox()
	{
		return $this->hasMany('\Netinteractive\Swapster\Models\Message', 'user_from_id')->orderBy('created_at', 'DESC');
	}

}