<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Socialite;
use App\User;
use Auth;
use Illuminate\Http\Request;
use JWTAuth;
use JWTException;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function username()
    {
        return 'username';
    }

    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    public function redirectToProvider($provider)
    {
        try {
          return \Socialite::driver($provider)->redirect();
        } catch (InvalidArgumentException $e) {
          return abort(404, 'Driver tidak dikenal.');
        }
    }

    public function handleProviderCallback($provider)
    {
        try {
          $account = \Socialite::driver($provider)->user();
          $user = User::firstOrCreate(['provider' => $provider, 'provider_id' => $account->id]);
          // update details
          $user->name = $account->name;
          $user->email = $account->email;
          $user->avatar = $account->avatar;
          $user->save();
          \Auth::login($user, true);
          return redirect('home');
        } catch (InvalidArgumentException $e) {
          return abort(404, 'Driver tidak dikenal.');
        } catch (\GuzzleHttp\Exception\ClientException $e) {
          return redirect('login');
        }
    }

    public function getToken(Request $request)
    {
      // mengambli credential dari client
      $credentials = $request->only('email', 'password');

      try {
        // memvalidasi crendential yang dikirim client
        if (! $token = JWTAuth::attempt($credentials)) {
          return response()->json(['error' => 'invalid_credentials'], 401);
        }
      } catch (JWTException $e) {
        // ada error
        return response()->json(['error' => 'could_not_create_token'], 500);
      }

    // mengirim token ke client
    return response()->json(compact('token'));
    }
}
