<?php

namespace App\Http\Controllers\Frontend;

use App\Article;
use App\Category;
use App\Coupon;
use App\Http\Controllers\Controller;
use App\Setting;
use App\User;
use Artesaos\SEOTools\Facades\SEOMeta;
use Carbon\Carbon;
use SEO;

class ArticleController extends Controller
{

    public function index()
    {
        $coupon=Coupon::where('expired','>',Carbon::now())->where('status',1)->latest()->first();
        $articles=Article::with('photo')->latest()->take(12)->get();
        $setting=Setting::first();
        $article=$articles[0];
        SEO::setTitle($article->meta_title);
        SEO::setDescription($article->meta_description);
        SEOMeta::addKeyword(explode('-', $article->meta_keywords));
        $categories=Category::where('parent_id',null)->with('children')->get();

        if(auth()->check())
        {
            $user=User::with('photo')->findOrFail(auth()->user()->id);
            return view('frontend.articles.index',compact(['articles','user','setting','categories','coupon']));
        }
        return view('frontend.articles.index',compact(['articles','setting','categories','coupon']));
    }

    public function show($slug)
    {
        $coupon=Coupon::where('expired','>',Carbon::now())->where('status',1)->latest()->first();
        $article=Article::with('photo','category')->whereSlug($slug)->first();
        $article->increment('viewCount');
        $setting=Setting::first();
        SEO::setTitle($article->meta_title);
        SEO::setDescription($article->meta_description);
        SEOMeta::addKeyword(explode('-', $article->meta_keywords));
        $categories=Category::where('parent_id',null)->with('children')->get();
        $comments=$article->comments()->where('status',1)->where('parent_id',0)->latest()->with(['comments'=>function ($query){
        $query->where('status',1)->latest();
        }])->get();
        $articles=Article::with('photo')->inRandomOrder()->take(4)->get();
        if(auth()->check())
        {
            $user=User::with('photo')->findOrFail(auth()->user()->id);
            return view('frontend.articles.show',compact(['article','user','articles','comments','setting','categories','coupon']));
        }
        return view('frontend.articles.show',compact(['article','articles','comments','setting','categories','coupon']));
    }


}
