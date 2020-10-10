<?php

namespace App\Http\Controllers\Frontend;

use App\Category;
use App\Http\Controllers\Controller;
use App\Podcast;
use App\Setting;
use App\User;
use Artesaos\SEOTools\Facades\SEOMeta;
use SEO;

class PodcastController extends Controller
{
    public function index()
    {

        $podcasts=Podcast::with('photo')->latest()->take(12)->get();
        $setting=Setting::first();
        $podcast=$podcasts[0];
        SEO::setTitle($podcast->meta_title);
        SEO::setDescription($podcast->meta_description);
        SEOMeta::addKeyword(explode('-', $podcast->meta_keywords));
        $categories=Category::where('parent_id',null)->with('children')->get();

        if(auth()->check())
        {
            $user=User::with('photo')->findOrFail(auth()->user()->id);
            return view('frontend.podcasts.index',compact(['podcasts','user','setting','categories']));
        }
        return view('frontend.podcasts.index',compact(['podcasts','setting','categories']));
    }

    public function show($slug)
    {
        $podcast=Podcast::with('photo','category')->whereSlug($slug)->first();
        $podcast->increment('viewCount');
        $setting=Setting::first();
        SEO::setTitle($podcast->meta_title);
        SEO::setDescription($podcast->meta_description);
        SEOMeta::addKeyword(explode('-', $podcast->meta_keywords));
        $categories=Category::where('parent_id',null)->with('children')->get();
        $comments=$podcast->comments()->where('status',1)->where('parent_id',0)->latest()->with(['comments'=>function ($query){
            $query->where('status',1)->latest();
        }])->get();
        $podcasts=Podcast::with('photo')->inRandomOrder()->take(4)->get();
        if(auth()->check())
        {
            $user=User::with('photo')->findOrFail(auth()->user()->id);
            return view('frontend.podcasts.show',compact(['podcast','user','podcasts','comments','setting','categories']));
        }
        return view('frontend.podcasts.show',compact(['podcast','podcasts','comments','setting','categories']));
    }
}
