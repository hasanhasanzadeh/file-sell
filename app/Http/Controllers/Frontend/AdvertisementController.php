<?php

namespace App\Http\Controllers\Frontend;

use App\Advertisement;
use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdvertisementRequest;
use App\Setting;
use App\User;
use Artesaos\SEOTools\Facades\SEOMeta;
use SEO;

class AdvertisementController extends Controller
{
    public function index()
    {
        $setting=Setting::first();
        SEO::setTitle($setting->meta_title);
        SEO::setDescription($setting->meta_description);
        SEOMeta::addKeyword(explode('-', $setting->meta_keywords));
        $advertisements=Advertisement::where('user_id',auth()->user()->id)->paginate(2);
        $categories=Category::with('children')->where('parent_id',null)->get();
        $user=User::with('photo')->findOrFail(auth()->user()->id);
        return view('frontend.advertisements.index',compact(['user','advertisements','setting','categories']));
    }

    public function create()
    {
        $setting=Setting::first();
        SEO::setTitle($setting->meta_title);
        SEO::setDescription($setting->meta_description);
        SEOMeta::addKeyword(explode('-', $setting->meta_keywords));
        $categories=Category::with('children')->where('parent_id',null)->get();
        $user=User::with('photo')->findOrFail(auth()->user()->id);
        return view('frontend.advertisements.create',compact(['user','setting','categories']));

    }

    public function edit($id)
    {
        $advertisement=Advertisement::findOrFail($id);
        $setting=Setting::first();
        SEO::setTitle($setting->meta_title);
        SEO::setDescription($setting->meta_description);
        SEOMeta::addKeyword(explode('-', $setting->meta_keywords));
        $categories=Category::with('children')->where('parent_id',null)->get();
        $user=User::with('photo')->findOrFail(auth()->user()->id);
        return view('frontend.advertisements.edit',compact(['user','setting','categories','advertisement']));

    }

    public function show($id)
    {
        $advertisement=Advertisement::findOrFail($id);
        $setting=Setting::first();
        SEO::setTitle($setting->meta_title);
        SEO::setDescription($setting->meta_description);
        SEOMeta::addKeyword(explode('-', $setting->meta_keywords));
        $categories=Category::with('children')->where('parent_id',null)->get();
        $user=User::with('photo')->findOrFail(auth()->user()->id);
        return view('frontend.advertisements.show',compact(['user','setting','categories','advertisement']));

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
