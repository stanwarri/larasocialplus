Laravel 5 SocialPlus
------------------------------

## Installation

Add this to your `composer.json` file

### Laravel 5.2:

``` bash
"stanwarri/larasocialplus": "dev-master"
```

### Laravel 5.1:
``` bash
"stanwarri/larasocialplus": "1.0.0"
```

## Service Provider

Append this to your list of service providers in `config/app.php`

``` php
'Stanwarri\SocialPlus\SocialPlusServiceProvider'
```

Run the command below

    $ php artisan vendor:publish --provider="Stanwarri\SocialPlus\SocialPlusServiceProvider"
    
## Social Providers

[TODO - Extract from socialite]

Add provider configuration in `config/services.php`

    "facebook": {
        "client_id": "...",
        "client_secret": "..."
    }

## Handlers

Handlers are a way SocialPlus delegates performing custom behaviours in your application 

during pre-authorization (authorize request) and post-authorization (callback request).
 
This is where you may implement your login workflow and whatever.

Handlers are registered in `config/socialplus.php` like so

    <?php
    
    return [
        'authorize_handlers' => [
            'login' => App\Handlers\SocialPlus\LoginHandler::class
        ]
    ];


Suggestion: Handlers should be placed in `app/Handlers/SocialPlus` folder

#### Example Handler

    namespace App\Handlers\SocialPlus;

    use Stanwarri\SocialPlus\AuthorizeHandler;
    use Laravel\Socialite\Contracts\User as SocialiteUser;
    
    class LoginHandler implements AuthorizeHandler
    {
        public function authorize($provider)
        {
            // Called before any request is made to the provider
        }
        
        public function callback(SocialiteUser $socialiteUser, $accessToken, $provider)
        {
            // Executed after a successful authorization
        }
        
        public function exception($exception, $provider)
        {
            // Executed when an exception occurs / authorization fails
        }
    }
    
Once you done registering the handler, you create a link like so;

    // - route('socialplus.authorize', ['provider' => 'facebook', 'a' => 'login'])

    // - Like So:
    
    <a href="{{ route('socialplus.authorize', ['provider' => 'facebook', 'a' => 'login']) }}">Login With Facebook</a>

notice the 'a' parameter? .... That's the value you use to connect handler we just created and

its what tells socialplus what handler to use for that specific action.

## Contribute

[WIP] This documentation is a work in progress and would really appreciate contributions. :)
