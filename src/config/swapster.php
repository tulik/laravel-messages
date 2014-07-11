<?php

return [
	
	/**
	 *	Nazwa filtra sprawdzającego czy użytkownik jest zalogowany
	 */ 
	'auth_filter'	=> 'auth',

	/**
	 * Model użytkownika
	 */
	'user_model'	=> Config::get('auth.model'),

	/**
	 * ID zalogowanego użytkownika
	 */
	'user_id'		=> 2,

	/**
	 * Nazwa pola jakie ma być wyświetlane polach od/do [np. email, username]
	 */
	'username'		=> 'email',

];