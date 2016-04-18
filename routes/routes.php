<?php

Route::group(['middleware' => ['web']], function () {

	Route::match(['GET', 'POST'], '/social/{provider}/authorize', [
	    'as' => 'socialplus.authorize',
	    'uses' => 'Stanwarri\SocialPlus\AuthorizeController@authorize'
	])->where('provider', 'facebook|twitter|linkedin|google');

	Route::match(['GET', 'POST'], '/social/{provider}/callback', [
	    'as' => 'socialplus.callback',
	    'uses' => 'Stanwarri\SocialPlus\AuthorizeController@callback'
	])->where('provider', 'facebook|twitter|linkedin|google');

})