<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
use Facebook\FacebookRequest;
use Facebook\FacebookSession;

Route::get('/', function () {
    return view('welcome');
});


Route::get('messages', [
    'as' => 'messages', 'uses' => 'MessagesController@index'
]);

Route::post('receiveForm', [
    'as' => 'receiveForm', 'uses' => 'MessagesController@receiveForm'
]);



Route::group(['prefix' => '', 'as' => 'auth::'], function () {
    Route::get('login', ['as' => 'getLogin', 'uses' => 'Auth\AuthController@getLogin']);
    Route::post('login', ['as' => 'postLogin', 'uses' => 'Auth\AuthController@postLogin']);
    Route::get('logout', ['as' => 'logout', 'uses' => 'Auth\AuthController@getLogout']);
    Route::get('signup', ['as' => 'getSignup', 'uses' => 'Auth\AuthController@getRegister']);
    Route::post('signup', ['as' => 'postSignup', 'uses' => 'Auth\AuthController@postRegister']);
    Route::get('password/email', ['as' => 'getPasswordEmail', 'uses' => 'Auth\PasswordController@getEmail']);
    Route::post('password/email', ['as' => 'postPasswordEmail', 'uses' => 'Auth\PasswordController@postEmail']);
    Route::get('password/reset/{token}', ['as' => 'getPasswordReset', 'uses' => 'Auth\PasswordController@getReset']);
    Route::post('password/reset', ['as' => 'postPasswordReset', 'uses' => 'Auth\PasswordController@postReset']);
    Route::get('verify/{token}', ['as' => 'verifyUser', 'uses' => 'Auth\AuthController@verify']);
    Route::get('login/{provider?}', ['as' => 'socialLogin', 'uses' => 'Auth\AuthController@login']);
});


Route::get('/fb/login',  function(SammyK\LaravelFacebookSdk\LaravelFacebookSdk $fb)
{
    // Send an array of permissions to request
    $login_url = $fb->getLoginUrl(['email']);

    // Obviously you'd do this in blade :)
    echo '<a href="' . $login_url . '">Login with Facebook</a>';
});


Route::get('/fb/callback', function(SammyK\LaravelFacebookSdk\LaravelFacebookSdk $fb)
{
    // Obtain an access token.
    try {
        $token = $fb->getAccessTokenFromRedirect();
    } catch (Facebook\Exceptions\FacebookSDKException $e) {
        dd($e->getMessage());
    }

    // Access token will be null if the user denied the request
    // or if someone just hit this URL outside of the OAuth flow.
    if (! $token) {
        // Get the redirect helper
        $helper = $fb->getRedirectLoginHelper();

        if (! $helper->getError()) {
            abort(403, 'Unauthorized action.');
        }

        // User denied the request
        dd(
            $helper->getError(),
            $helper->getErrorCode(),
            $helper->getErrorReason(),
            $helper->getErrorDescription()
        );
    }

    if (! $token->isLongLived()) {
        // OAuth 2.0 client handler
        $oauth_client = $fb->getOAuth2Client();

        // Extend the access token.
        try {
            $token = $oauth_client->getLongLivedAccessToken($token);
        } catch (Facebook\Exceptions\FacebookSDKException $e) {
            dd($e->getMessage());
        }
    }

    $fb->setDefaultAccessToken($token);

    // Save for later
    Session::put('fb_user_access_token', (string) $token);

    // Get basic info on the user from Facebook.
    try {
        $response = $fb->get('/me?fields=id,name,email');
    } catch (Facebook\Exceptions\FacebookSDKException $e) {
        dd($e->getMessage());
    }

    // Convert the response to a `Facebook/GraphNodes/GraphUser` collection
    $facebook_user = $response->getGraphUser();

echo "<pre>"; print_r($facebook_user); echo "</pre>";exit;

    // Log the user into Laravel
    //Auth::login($user);

    return redirect('/')->with('message', 'Successfully logged in with Facebook');
});
Route::get('fb/friends', function(SammyK\LaravelFacebookSdk\LaravelFacebookSdk $fb){

        $fb->setDefaultAccessToken(Session::get('fb_user_access_token'));
        $response = $fb->get('/me?fields=id,name,email');
        $id = $response->getGraphUser()->getproperty('id');
        $response = $fb->get("/me/taggable_friends");
        echo "<pre>"; print_r($response); echo "</pre>";exit;
        $session = new FacebookSession(Session::get('fb_user_access_token'));
        $request = new FacebookRequest( $session,
                                        'GET',
                                        '/{friend-list-id}'
        );
    $response = $request->execute();
    $graphObject = $response->getGraphObject();
});

Route::get('/dashboard', function () {
    return view('welcome_twitter');
});
