<?php

namespace App\Http\Controllers\Frontend;

use App\Achievement;
use App\Advertisement;
use App\Article;
use App\Category;
use App\Comment;
use App\Course;
use App\Gazette;
use App\Http\Controllers\Controller;
use App\Podcast;
use App\Setting;
use App\User;
use Artesaos\SEOTools\Facades\SEOMeta;
use SEO;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class MainController extends Controller
{
    public function index()
    {
//        $user=User::create([
//           'name'=>'حسن زاده',
//           'mobile'=>'09142641975',
//           'status'=>1,
//           'level'=>'editor',
//            'admin_active'=>1,
//           'mobile_verified_at'=>Carbon::now(),
//           'password'=>Hash::make('09142641975'),
//        ]);
        //auth()->loginUsingId(1);

        $setting=Setting::first();
        $courses=Course::with('photo','category')->latest()->take(16)->get();
        $achievements=Achievement::with('user')->latest()->where('status',1)->get();
        $articles=Article::with('photo','category')->latest()->take(16)->get();
        $podcasts=Podcast::with('photo','category')->latest()->take(16)->get();
        $gazettes=Gazette::with('photo','category')->latest()->take(16)->get();
        $categories=Category::with('children')->where('parent_id',null)->get();
        SEO::setTitle($setting->meta_title);
        SEO::setDescription($setting->meta_description);
        SEOMeta::addKeyword(explode('-', $setting->meta_keywords));
        $advertisements=Advertisement::with('user','photo')->where('status',1)->latest()->get();
        if (auth()->check()){
            $user=User::with('photo')->findOrFail(auth()->user()->id);
            //alert()->success('کاربر '.$user->name.' به سایت ما خوش آمدید.','ورود');
            return view('welcome',compact(['user','podcasts','courses','articles','gazettes','categories','setting','achievements','advertisements']));
        }
        else
        {
            //alert()->success('کاربر میهمان به سایت ما خوش آمدید.','ورود');
            return view('welcome',compact(['podcasts','courses','articles','gazettes','categories','setting','achievements','advertisements']));
        }

    }
}
