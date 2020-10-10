<?php

namespace App\Http\Controllers\Auth;

use App\Events\SendSMSCode;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Setting;
use Artesaos\SEOTools\Facades\SEOMeta;
use SEO;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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

    public function showLoginForm()
    {
        $setting=Setting::first();
        SEO::setTitle($setting->meta_title);
        SEO::setDescription($setting->meta_description);
        SEOMeta::addKeyword(explode('-', $setting->meta_keywords));
        return view('auth.login',compact(['setting']));
    }

    public function username()
    {
        return 'mobile';
    }
    protected $redirectTo = RouteServiceProvider::HOME;

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'mobile' => ['required', 'regex:/(09)[0-9]{9}/', 'digits:11', 'numeric'],
            'password' => ['required', 'string', 'min:8'],
        ]);
    }
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        // Validate data
        $this->validateLogin($request);

        if (method_exists($this, 'hasTooManyLoginAttempts') && $this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);
            return $this->sendLockoutResponse($request);
        }

        // ------------------------------------------- //
        if($this->guard()->validate($this->credentials($request))) {
            $user = $this->guard()->getLastAttempted();
            if ($user->status && $this->attemptLogin($request)) {
                alert()->success('شما با موفقیت وارد سایت شدید.','ورود به سایت')->persistent("بستن");
                return $this->sendLoginResponse($request);
            } else {
                $this->incrementLoginAttempts($request);
                event(new SendSMSCode($user));
                return redirect('user/active/mobile');
            }
        }
        // ------------------------------------------- //

        $this->incrementLoginAttempts($request);
        return $this->sendFailedLoginResponse($request);
    }

    protected function validateLogin(Request $request)
    {
        $request->validate([
            'mobile' => ['required', 'regex:/(09)[0-9]{9}/', 'digits:11', 'numeric'],
            'password' => ['required', 'string', 'min:8'],
            ]);
    }
}
