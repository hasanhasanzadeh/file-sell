<?php

namespace App\Http\Controllers\Frontend;

use App\Achievement;
use App\Advertisement;
use App\Article;
use App\Category;
use App\Comment;
use App\Contact;
use App\Coupon;
use App\Course;
use App\Gazette;
use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;
use App\Podcast;
use App\Setting;
use App\User;
use Artesaos\SEOTools\Facades\SEOMeta;
use Carbon\Carbon;
use SEO;

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
        $coupon=Coupon::where('expired','>',Carbon::now())->where('status',1)->latest()->first();
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
            return view('welcome',compact(['user','podcasts','courses','articles','gazettes','categories','setting','achievements','advertisements','coupon']));
        }
        else
        {
            //alert()->success('کاربر میهمان به سایت ما خوش آمدید.','ورود');
            return view('welcome',compact(['podcasts','courses','articles','gazettes','categories','setting','achievements','advertisements','coupon']));
        }

    }

    public function about()
    {
        $coupon=Coupon::where('expired','>',Carbon::now())->where('status',1)->latest()->first();
        $setting=Setting::first();
        SEO::setTitle($setting->meta_title);
        SEO::setDescription($setting->meta_description);
        SEOMeta::addKeyword(explode('-', $setting->meta_keywords));
        $categories=Category::with('children')->where('parent_id',null)->get();

        if (auth()->check()){
            $user=User::with('photo')->findOrFail(auth()->user()->id);
            //alert()->success('کاربر '.$user->name.' به سایت ما خوش آمدید.','ورود');
            return view('frontend.pages.about',compact(['user','categories','setting','coupon']));
        }
        else
        {
            //alert()->success('کاربر میهمان به سایت ما خوش آمدید.','ورود');
            return view('frontend.pages.about',compact(['categories','setting','coupon']));
        }

    }

    public function adv()
    {
        $setting=Setting::first();
        SEO::setTitle($setting->meta_title);
        SEO::setDescription($setting->meta_description);
        SEOMeta::addKeyword(explode('-', $setting->meta_keywords));
        $categories=Category::with('children')->where('parent_id',null)->get();
        $coupon=Coupon::where('expired','>',Carbon::now())->where('status',1)->latest()->first();

        if (auth()->check()){
            $user=User::with('photo')->findOrFail(auth()->user()->id);
            //alert()->success('کاربر '.$user->name.' به سایت ما خوش آمدید.','ورود');
            return view('frontend.pages.advertisement',compact(['user','categories','setting','coupon']));
        }
        else
        {
            //alert()->success('کاربر میهمان به سایت ما خوش آمدید.','ورود');
            return view('frontend.pages.advertisement',compact(['categories','setting','coupon']));
        }
    }

    public function contact_us()
    {
        $setting=Setting::first();
        SEO::setTitle($setting->meta_title);
        SEO::setDescription($setting->meta_description);
        SEOMeta::addKeyword(explode('-', $setting->meta_keywords));
        $categories=Category::with('children')->where('parent_id',null)->get();
        $coupon=Coupon::where('expired','>',Carbon::now())->where('status',1)->latest()->first();

        if (auth()->check()){
            $user=User::with('photo')->findOrFail(auth()->user()->id);
            //alert()->success('کاربر '.$user->name.' به سایت ما خوش آمدید.','ورود');
            return view('frontend.pages.contact-us',compact(['user','categories','setting','coupon']));
        }
        else
        {
            //alert()->success('کاربر میهمان به سایت ما خوش آمدید.','ورود');
            return view('frontend.pages.contact-us',compact(['categories','setting','coupon']));
        }
    }

    public function faq()
    {
        $setting=Setting::first();
        SEO::setTitle($setting->meta_title);
        SEO::setDescription($setting->meta_description);
        SEOMeta::addKeyword(explode('-', $setting->meta_keywords));
        $categories=Category::with('children')->where('parent_id',null)->get();
        $coupon=Coupon::where('expired','>',Carbon::now())->where('status',1)->latest()->first();

        if (auth()->check()){
            $user=User::with('photo')->findOrFail(auth()->user()->id);
            //alert()->success('کاربر '.$user->name.' به سایت ما خوش آمدید.','ورود');
            return view('frontend.pages.faq',compact(['user','categories','setting','coupon']));
        }
        else
        {
            //alert()->success('کاربر میهمان به سایت ما خوش آمدید.','ورود');
            return view('frontend.pages.faq',compact(['categories','setting','coupon']));
        }
    }

    public function law()
    {
        $setting=Setting::first();
        SEO::setTitle($setting->meta_title);
        SEO::setDescription($setting->meta_description);
        SEOMeta::addKeyword(explode('-', $setting->meta_keywords));
        $categories=Category::with('children')->where('parent_id',null)->get();
        $coupon=Coupon::where('expired','>',Carbon::now())->where('status',1)->latest()->first();

        if (auth()->check()){
            $user=User::with('photo')->findOrFail(auth()->user()->id);
            //alert()->success('کاربر '.$user->name.' به سایت ما خوش آمدید.','ورود');
            return view('frontend.pages.law',compact(['user','categories','setting','coupon']));
        }
        else
        {
            //alert()->success('کاربر میهمان به سایت ما خوش آمدید.','ورود');
            return view('frontend.pages.law',compact(['categories','setting','coupon']));
        }
    }

    public function contact_me(ContactRequest $request)
    {
        $contact=new Contact();
        $contact->user_id=auth()->user()->id;
        $contact->title=$request->title;
        $contact->description=$request->description;
        $contact->save();
        alert()->success('پیشنهاد یا انتقاد شما با موفقیت ارسال شد.','ارسال پیشنهاد و انتقاد')->persistent('بستن');
        return back();
    }

    public function coupon_show($id)
    {
        $setting=Setting::first();
        SEO::setTitle($setting->meta_title);
        SEO::setDescription($setting->meta_description);
        SEOMeta::addKeyword(explode('-', $setting->meta_keywords));

        $coupon=Coupon::with('photo')->where('status',1)->where('expired','>',Carbon::now())->findOrFail($id);
        return view('frontend.pages.coupon',compact(['coupon','setting']));
    }
}
