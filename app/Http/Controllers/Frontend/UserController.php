<?php

namespace App\Http\Controllers\Frontend;

use App\ActivationCode;
use App\Category;
use App\Coupon;
use App\Http\Controllers\Controller;
use App\Http\Requests\CodeRequest;
use App\Http\Requests\EmailRequest;
use App\Setting;
use App\User;
use Artesaos\SEOTools\Facades\SEOMeta;
use Carbon\Carbon;


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
        $coupon=Coupon::where('expired','>',Carbon::now())->where('status',1)->latest()->first();
        $setting=Setting::first();
        SEO::setTitle($setting->meta_title);
        SEO::setDescription($setting->meta_description);
        SEOMeta::addKeyword(explode('-', $setting->meta_keywords));
        $categories=Category::where('parent_id',null)->with('children')->get();

        return response()->view('auth.verify',compact('categories','setting','coupon'));
    }

    public function emailSave(EmailRequest $request)
    {
        $user=User::findOrFail(auth()->user()->id);
        $user->email=$request->email;
        $user->email_status=1;
        $user->save();
        alert()->success('ایمیل شما با موفقیت در خبرنامه ثبت شد.','عضویت در خبرنامه')->persistent("بستن");
        return back();
    }

}
