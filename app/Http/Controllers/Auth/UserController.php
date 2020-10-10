<?php

namespace App\Http\Controllers\Auth;

use App\Category;
use App\Http\Controllers\Controller;
use App\Setting;
use App\User;
use Artesaos\SEOTools\Facades\SEOMeta;
use Illuminate\Http\Request;
use SEO;

class UserController extends Controller
{
    public function profile()
    {
        $setting=Setting::first();
        SEO::setTitle($setting->meta_title);
        SEO::setDescription($setting->meta_description);
        SEOMeta::addKeyword(explode('-', $setting->meta_keywords));
        $categories=Category::with('children')->where('parent_id',null)->get();

        if (auth()->check()){
            $user=User::with('photo')->findOrFail(auth()->user()->id);
            return response()->view('auth.profile',compact(['user','setting','categories']));
        }
        else
        {
            alert()->error('لطفا اول وارد سایت شده و بعد وارد ویرایش اطلاعات پروفایل شوید.','پروفایل')->persistent("بستن");
            return redirect('/login');
        }
    }

    public function profileEdit()
    {
        $setting=Setting::first();
        SEO::setTitle($setting->meta_title);
        SEO::setDescription($setting->meta_description);
        SEOMeta::addKeyword(explode('-', $setting->meta_keywords));
        $categories=Category::with('children')->where('parent_id',null)->get();

        if (auth()->check()){
            $user=User::with('photo')->findOrFail(auth()->user()->id);
            return response()->view('auth.edit',compact(['user','setting','categories']));
        }
        else
        {
            alert()->error('لطفا اول وارد سایت شده و بعد وارد ویرایش اطلاعات پروفایل شوید.','پروفایل')->persistent("بستن");
            return redirect('/login');
        }
    }

    public function profileUpdate(Request $request)
    {
        //dd($request->all());
        $this->validate($request,[
            'name'=>'required|string|max:256',
            'password'=>'nullable|string|min:8|max:64',
            'mobile'=>'required|regex:/(09)[0-9]{9}/|digits:11|numeric|unique:users,mobile,'.auth()->user()->id,
            'email'=>'nullable|email'
        ]);
        $profile=User::findOrFail(auth()->user()->id);
        $profile->name=$request->name;
        $profile->email=$request->email;
        $profile->email_status=$request->email_status;
        $profile->mobile=$request->mobile;
        $profile->photo_id=$request->photo_id;
        $profile->save();
        alert()->success('پروفایل '.$profile->name.' با موفقیت بروزرسانی شد.','پروفایل')->persistent("بستن");
        return redirect('/profile');
    }

}
