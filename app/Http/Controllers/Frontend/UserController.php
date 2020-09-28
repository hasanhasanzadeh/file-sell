<?php

namespace App\Http\Controllers\Frontend;

use App\ActivationCode;
use App\Http\Controllers\Controller;
use App\Http\Requests\CodeRequest;
use App\Http\Requests\ProfileUpdateRequest;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function activation(CodeRequest $request)
    {
        $activationCode=ActivationCode::whereCode($request->code)->first();
        if (!$activationCode){
            alert()->error('کد مورد نظر صحیح نمی باشد..','ثبت نام')->persistent("بستن");
            return redirect()->back();
        }
        if($activationCode->expire < Carbon::now()){
            alert()->error('زمان استفاده از کد به پایان رسیده است لطفا ارسال دوباره کد را کلیک کنید.','ثبت نام')->persistent("بستن");
            return redirect()->back();
        }
        if($activationCode->used==true){
            alert()->error('کد مورد نظر قبلا استفاده شده است.','ثبت نام')->persistent("بستن");
            return redirect()->back();
        }

        $activationCode->user()->update([
            'status'=>1,
            'mobile_verified_at'=>Carbon::now()
        ]);
        $activationCode->update([
            'used'=>true
        ]);

        auth()->loginUsingId($activationCode->user->id);
        alert()->success('ثبت نام شما با موفقیت انجام شد.','ثبت نام')->persistent("بستن");
        return redirect('/');
    }

    public function verify()
    {
        return response()->view('auth.verify');
    }

}
