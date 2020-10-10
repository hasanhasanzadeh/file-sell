<?php

namespace App\Http\Controllers\Frontend;

use App\Category;
use App\Gazette;
use App\Http\Controllers\Controller;
use App\Setting;
use App\User;
use Artesaos\SEOTools\Facades\SEOMeta;
use SEO;

class GazetteController extends Controller
{
    public function index()
    {

        $gazettes=Gazette::with('photo')->latest()->take(12)->get();
        $setting=Setting::first();
        $gazette=$gazettes[0];
        SEO::setTitle($gazette->meta_title);
        SEO::setDescription($gazette->meta_description);
        SEOMeta::addKeyword(explode('-', $gazette->meta_keywords));
        $categories=Category::with('children')->where('parent_id',null)->get();
        if(auth()->check())
        {
            $user=User::with('photo')->findOrFail(auth()->user()->id);
            return view('frontend.gazettes.index',compact(['gazettes','user','setting','categories']));
        }
        return view('frontend.gazettes.index',compact(['gazettes','setting','categories']));
    }

    public function show($slug)
    {
        $gazette=Gazette::with('photo','category')->whereSlug($slug)->first();
        $gazette->increment('viewCount');
        $setting=Setting::first();
        SEO::setTitle($gazette->meta_title);
        SEO::setDescription($gazette->meta_description);
        SEOMeta::addKeyword(explode('-', $gazette->meta_keywords));
        $categories=Category::with('children')->where('parent_id',null)->get();
        $comments=$gazette->comments()->where('status',1)->where('parent_id',0)->latest()->with(['comments'=>function ($query){
            $query->where('status',1)->latest();
        }])->get();
        $gazettes=Gazette::with('photo')->inRandomOrder()->take(4)->get();
        if(auth()->check())
        {
            $user=User::with('photo')->findOrFail(auth()->user()->id);
            return view('frontend.gazettes.show',compact(['gazette','user','gazettes','setting','comments','categories']));
        }
        return view('frontend.gazettes.show',compact(['gazette','gazettes','comments','setting','categories']));
    }
}
