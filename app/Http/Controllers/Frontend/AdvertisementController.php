<?php

namespace App\Http\Controllers\Frontend;

use App\Advertisement;
use App\Category;
use App\Coupon;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdvertisementRequest;
use App\Setting;
use App\User;
use Artesaos\SEOTools\Facades\SEOMeta;
use Carbon\Carbon;
use SEO;

class AdvertisementController extends Controller
{
    public function index()
    {
        $coupon=Coupon::where('expired','>',Carbon::now())->where('status',1)->latest()->first();
        $setting=Setting::first();
        SEO::setTitle($setting->meta_title);
        SEO::setDescription($setting->meta_description);
        SEOMeta::addKeyword(explode('-', $setting->meta_keywords));
        $advertisements=Advertisement::where('user_id',auth()->user()->id)->paginate(2);
        $categories=Category::with('children')->where('parent_id',null)->get();
        $user=User::with('photo')->findOrFail(auth()->user()->id);
        return view('frontend.advertisements.index',compact(['user','advertisements','setting','categories','coupon']));
    }

    public function create()
    {
        $setting=Setting::first();
        $coupon=Coupon::where('expired','>',Carbon::now())->where('status',1)->latest()->first();
        SEO::setTitle($setting->meta_title);
        SEO::setDescription($setting->meta_description);
        SEOMeta::addKeyword(explode('-', $setting->meta_keywords));
        $categories=Category::with('children')->where('parent_id',null)->get();
        $user=User::with('photo')->findOrFail(auth()->user()->id);
        return view('frontend.advertisements.create',compact(['user','setting','categories','coupon']));

    }

    public function edit($id)
    {
        $coupon=Coupon::where('expired','>',Carbon::now())->where('status',1)->latest()->first();
        $advertisement=Advertisement::findOrFail($id);
        $setting=Setting::first();
        SEO::setTitle($setting->meta_title);
        SEO::setDescription($setting->meta_description);
        SEOMeta::addKeyword(explode('-', $setting->meta_keywords));
        $categories=Category::with('children')->where('parent_id',null)->get();
        $user=User::with('photo')->findOrFail(auth()->user()->id);
        return view('frontend.advertisements.edit',compact(['user','setting','categories','advertisement','coupon']));
    }

    public function show($id)
    {
        $advertisement=Advertisement::findOrFail($id);
        $coupon=Coupon::where('expired','>',Carbon::now())->where('status',1)->latest()->first();

        $setting=Setting::first();
        SEO::setTitle($setting->meta_title);
        SEO::setDescription($setting->meta_description);
        SEOMeta::addKeyword(explode('-', $setting->meta_keywords));
        $categories=Category::with('children')->where('parent_id',null)->get();
        if (auth()->check()){
            $user=User::with('photo')->findOrFail(auth()->user()->id);
            return view('frontend.advertisements.show',compact(['user','setting','categories','advertisement','coupon']));

        }
        return view('frontend.advertisements.show',compact(['setting','categories','advertisement','coupon']));

    }

    public function store(AdvertisementRequest $request)
    {
        $advertisement=new Advertisement();
        $advertisement->user_id=auth()->user()->id;
        $advertisement->title=$request->title;
        $advertisement->body=$request->body;
        $advertisement->url_address=$request->url_address;
        $advertisement->payment_id=$request->payment_id;
        $advertisement->photo_id=$request->photo_id;
        $advertisement->save();
        alert()->success('آگهی شما با موفقیت ثبت شد.','ثبت آگهی')->persistent('بستن');
        return redirect('/advertisements');

    }

    public function update(AdvertisementRequest $request,$id)
    {
        $advertisement=Advertisement::findOrFail($id);
        $advertisement->user_id=auth()->user()->id;
        $advertisement->title=$request->title;
        $advertisement->body=$request->body;
        $advertisement->url_address=$request->url_address;
        $advertisement->payment_id=$request->payment_id;
        $advertisement->photo_id=$request->photo_id;
        $advertisement->save();
        alert()->success('آگهی شما با موفقیت بروزرسانی شد.','ثبت آگهی')->persistent('بستن');
        return redirect('/advertisements');

    }
}
