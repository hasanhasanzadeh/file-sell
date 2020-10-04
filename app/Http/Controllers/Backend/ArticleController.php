<?php

namespace App\Http\Controllers\Backend;

use App\Article;
use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class ArticleController extends Controller
{

    public function index()
    {
        $user=User::with('photo')->findOrfail(auth()->user()->id);
        $articles=Article::latest()->paginate(10);
        return  response()->view('admin.articles.index',compact(['articles','user']));
    }

    public function create()
    {
        $user=User::with('photo')->findOrfail(auth()->user()->id);
        $categories=Category::with('children')->where('parent_id',null)->get();
        return view('admin.articles.create',compact(['categories','user']));
    }

    public function store(ArticleRequest $request)
    {
        $article=new Article();
        $article->title=$request->title;
        $article->slug=$this->makeSlug($request->title);
        $article->description=$this->makeDescription($request->body);
        $article->body=$request->body;
        $article->photo_id=$request->photo_id;
        $article->tags=$request->tags;
        $article->user_id=auth()->user()->id;
        $article->category_id=$request->category_id;
        $article->meta_title=$request->meta_title;
        $article->meta_keywords=$request->meta_keywords;
        $article->meta_description=$request->meta_description;
        $article->save();
        alert()->success('مقاله '.$article->title.' به موفقیت اضافه شد.','مقاله')->persistent("بستن");
        return  redirect()->route('articles.index');
    }

    public function show(Article $article)
    {
        $user=User::with('photo')->findOrfail(auth()->user()->id);
        $article=Article::findOrFail($article->id);
        return response()->view('admin.articles.show',compact(['article','user']));
    }

    public function edit($id)
    {
        $user=User::with('photo')->findOrfail(auth()->user()->id);
        $article=Article::findOrFail($id);
        $categories=Category::with('children')->where('parent_id',null)->get();
        return response()->view('admin.articles.edit',['article'=>$article,'categories'=>$categories,'user'=>$user]);
    }

    public function update(ArticleRequest $request, $id)
    {

        $article=Article::findOrFail($id);
        $article->title=$request->title;
        $article->slug=$this->makeSlug($request->title);
        $article->description=$this->makeDescription($request->body);
        $article->body=$request->body;
        $article->photo_id=$request->photo_id;
        $article->tags=$request->tags;
        $article->user_id=auth()->user()->id;
        $article->category_id=$request->category_id;
        $article->meta_title=$request->meta_title;
        $article->meta_keywords=$request->meta_keywords;
        $article->meta_description=$request->meta_description;
        $article->save();
        alert()->success('مقاله '.$article->title.' با موفقیت بروز رسانی شد.','مقاله')->persistent("بستن");
        return  redirect()->route('articles.index');
    }

    public function destroy($id)
    {
        $article=Article::findOrFail($id);
        $article->delete();
        alert()->error('مقاله '.$article->title.' با موفقیت حذف شد.','مقاله')->persistent("بستن");
        return  redirect()->route('articles.index');
    }

    public function makeDescription($string)
    {
        $desc=Str::limit(preg_replace('/<[^>]*>/' , '' , $string) , 200);
        return $desc;
    }

    public function makeSlug($string)
    {
        //$string = strtolower($string);
        //$string = str_replace(['؟', '?'], '', $string);
        return preg_replace('/\s+/u', '-', trim($string));
    }
}
