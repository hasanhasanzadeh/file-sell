<?php

namespace App\Http\Controllers\Frontend;

use App\Achievement;
use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\AchievementRequest;
use App\Setting;
use App\User;
use Artesaos\SEOTools\Facades\SEOMeta;
use SEO;
class AchievementController extends Controller
{
    public function index()
    {
        $setting=Setting::first();
        SEO::setTitle($setting->meta_title);
        SEO::setDescription($setting->meta_description);
        SEOMeta::addKeyword(explode('-', $setting->meta_keywords));
        $achievements=Achievement::where('user_id',auth()->user()->id)->paginate(3);
        $categories=Category::with('children')->where('parent_id',null)->get();
        $user=User::with('photo')->findOrFail(auth()->user()->id);
        return view('frontend.achievements.index',compact(['user','achievements','setting','categories']));
    }

    public function show($id)
    {
        $setting=Setting::first();
        SEO::setTitle($setting->meta_title);
        SEO::setDescription($setting->meta_description);
        SEOMeta::addKeyword(explode('-', $setting->meta_keywords));
        $achievement=Achievement::with('user')->findOrFail($id);
        $categories=Category::with('children')->where('parent_id',null)->get();
        $user=User::with('photo')->findOrFail(auth()->user()->id);
        return view('frontend.achievements.show',compact(['user','achievement','setting','categories']));
    }

    public function create()
    {
        $setting=Setting::first();
        SEO::setTitle($setting->meta_title);
        SEO::setDescription($setting->meta_description);
        SEOMeta::addKeyword(explode('-', $setting->meta_keywords));
        $categories=Category::with('children')->where('parent_id',null)->get();
        $user=User::with('photo')->findOrFail(auth()->user()->id);
        return view('frontend.achievements.create',compact(['user','setting','categories']));
    }

    public function store(AchievementRequest $request)
    {
        $achievement=new Achievement();
        $achievement->title=$request->title;
        $achievement->body=$request->body;
        $achievement->user_id=auth()->user()->id;
        $achievement->save();
        alert()->success('اطلاعات درباره موفقیت ثبت شد.','موفقیت')->persistent('بستن');
        return redirect('/achievements');
    }


    public function destroy($id)
    {
        $achievement=Achievement::findOrFail($id);
        $achievement->delete();
        alert()->success('اطلاعات حذف شد.','موفقیت')->persistent('بستن');
        return redirect('/achievements');
    }
}
