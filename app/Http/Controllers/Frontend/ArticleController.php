<?php

namespace App\Http\Controllers\Frontend;

use App\Article;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class ArticleController extends Controller
{

    public function index()
    {

        $articles=Article::with('photo')->latest()->take(12)->get();
        if(auth()->check())
        {
            $user=User::with('photo')->findOrFail(auth()->user()->id);
            return view('frontend.articles.index',compact(['articles','user']));
        }
        return view('frontend.articles.index',compact(['articles']));
    }

    public function show($slug)
    {
        $article=Article::with('photo','category')->whereSlug($slug)->first();
        $article->increment('viewCount');
        $comments=$article->comments()->with('comments')->where('status',1)->where('parent_id',0)->latest()->get();
        $articles=Article::with('photo')->inRandomOrder()->take(4)->get();
        if(auth()->check())
        {
            $user=User::with('photo')->findOrFail(auth()->user()->id);
            return view('frontend.articles.show',compact(['article','user','articles','comments']));
        }
        return view('frontend.articles.show',compact(['article','articles','comments']));
    }


}
