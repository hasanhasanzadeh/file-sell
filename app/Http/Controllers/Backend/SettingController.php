<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\SettingRequest;
use App\Setting;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class SettingController extends Controller
{
    public function show()
    {
        $setting=Setting::first();
        $user=User::with('photo')->findOrfail(auth()->user()->id);
        if (!Gate::allows('isAdmin')){
        alert()->error('دسترسی به این قسمت مجاز نیست.','دسترسی')->persistent("بستن");
        abort(403,"دسترسی به این قسمت ندارید");
    }
        return view('admin.settings.show',compact(['setting','user']));
    }

    public function edit($id)
    {
        $setting=Setting::findOrFail($id);
        $user=User::with('photo')->findOrfail(auth()->user()->id);
        $user=User::with('photo')->findOrfail(auth()->user()->id);
        $user=User::with('photo')->findOrfail(auth()->user()->id);
        if (!Gate::allows('isAdmin')){
            alert()->error('دسترسی به این قسمت مجاز نیست.','دسترسی')->persistent("بستن");
            abort(403,"دسترسی به این قسمت ندارید");
        }
        return view('admin.settings.edit',compact(['setting','user']));
    }

    public function update(SettingRequest $request,$id)
    {
        $setting=Setting::findOrFail($id);
        $setting->title=$request->title;
        $setting->mobile=$request->mobile;
        $setting->banner_text=$request->banner_text;
        $setting->banner=$request->banner;
        $setting->icon_image=$request->icon_image;
        $setting->description_banner=$request->description_banner;
        $setting->telegram=$request->telegram;
        $setting->youtube=$request->youtube;
        $setting->instagram=$request->instagram;
        $setting->twitter=$request->twitter;
        $setting->telegram_id=$request->telegram_id;
        $setting->email=$request->email;
        $setting->about=$request->about;
        $setting->e_name=$request->e_name;
        $setting->copy_right=$request->copy_right;
        $setting->meta_title=$request->meta_title;
        $setting->meta_keywords=$request->meta_keywords;
        $setting->meta_description=$request->meta_description;
        $setting->save();
        alert()->success('تنظیمات صفحه اصلی با موفقیت بروزرسانی شد.','تنظیمات صفحه اصلی')->persistent('بستن');
        return redirect('/admin/settings');
    }
}
