<?php

namespace App\Http\Controllers\Frontend;

use App\Category;
use App\Coupon;
use App\Course;
use App\Http\Controllers\Controller;
use App\Setting;
use App\User;
use Carbon\Carbon;
use SEO;
use Artesaos\SEOTools\Facades\SEOMeta;


class CourseController extends Controller
{

    public function index()
    {
        $coupon=Coupon::where('expired','>',Carbon::now())->where('status',1)->latest()->first();
        $courses=Course::with('photo')->latest()->take(12)->get();
        $setting=Setting::first();
        $course=$courses[0];
        SEO::setTitle($course->meta_title);
        SEO::setDescription($course->meta_description);
        SEOMeta::addKeyword(explode('-', $course->meta_keywords));
        $categories=Category::with('children')->where('parent_id',null)->get();
        if(auth()->check())
        {
            $user=User::with('photo')->findOrFail(auth()->user()->id);
            return view('frontend.courses.index',compact(['courses','user','setting','categories','coupon']));
        }
        return view('frontend.courses.index',compact(['courses','setting','categories','coupon']));
    }

    public function show($slug)
    {
        $coupon=Coupon::where('expired','>',Carbon::now())->where('status',1)->latest()->first();
        $course=Course::with('photo','category')->whereSlug($slug)->first();
        $course->increment('viewCount');
        $setting=Setting::first();
        SEO::setTitle($course->meta_title);
        SEO::setDescription($course->meta_description);
        SEOMeta::addKeyword(explode('-', $course->meta_keywords));
        $categories=Category::with('children')->where('parent_id',null)->get();
        $comments=$course->comments()->where('status',1)->where('parent_id',0)->latest()->with(['comments'=>function ($query){
        $query->where('status',1)->latest();
        }])->get();
        $courses=Course::with('photo')->inRandomOrder()->take(4)->get();
        if(auth()->check())
        {
            $user=User::with('photo')->findOrFail(auth()->user()->id);
            return view('frontend.courses.show',compact(['course','user','courses','setting','comments','categories','coupon']));
        }
        return view('frontend.courses.show',compact(['course','courses','comments','setting','categories','coupon']));
    }


}
