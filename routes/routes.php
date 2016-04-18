<?php

/**
 * @var \Illuminate\Routing\Router $router
 */

$router = app('router');

$router->match(['GET', 'POST'], '/social/{provider}/authorize', [
    'as' => 'socialplus.authorize',
    'uses' => 'Stanwarri\SocialPlus\AuthorizeController@authorize'
])->where('provider', 'facebook|twitter|linkedin|google');

$router->match(['GET', 'POST'], '/social/{provider}/callback', [
    'as' => 'socialplus.callback',
    'uses' => 'Stanwarri\SocialPlus\AuthorizeController@callback'
])->where('provider', 'facebook|twitter|linkedin|google');
