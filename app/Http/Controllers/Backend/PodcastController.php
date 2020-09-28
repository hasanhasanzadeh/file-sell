<?php

namespace App\Http\Controllers\Backend;

use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\PodcastRequest;
use App\Podcast;
use App\User;
use Illuminate\Support\Str;

class PodcastController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user=User::with('photo')->findOrfail(auth()->user()->id);
        $podcasts=Podcast::paginate(10);
        return response()->view('admin.podcasts.index',compact(['podcasts','user']));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user=User::with('photo')->findOrfail(auth()->user()->id);
        $categories=Category::with('children')->where('parent_id',null)->get();
        return response()->view('admin.podcasts.create',compact(['categories','user']));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PodcastRequest $request)
    {
        $podcast=new Podcast();
        $podcast->title=$request->title;
        $podcast->slug=$this->makeSlug($request->title);
        $podcast->body=$request->body;
        $podcast->description=$this->makeDescription($request->body);
        $podcast->tags=$request->tags;
        $podcast->user_id=auth()->user()->id;
        $podcast->category_id=$request->category_id;
        $podcast->photo_id=$request->photo_id;
        $podcast->price=$request->price;
        $podcast->type=$request->type;
        $podcast->meta_title=$request->meta_title;
        $podcast->meta_keywords=$request->meta_keywords;
        $podcast->meta_description=$request->meta_description;
        $podcast->save();
        alert()->success('کتاب صوتی '.$podcast->title.' با موفقیت اضافه شد.','کتاب صوتی')->persistent("بستن");
        return redirect()->route('podcasts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Podcast  $podcast
     * @return \Illuminate\Http\Response
     */
    public function show(Podcast $podcast)
    {
        $user=User::with('photo')->findOrfail(auth()->user()->id);
        $categories=Category::with('children')->where('parent_id',null)->get();
        $podcast=Podcast::findOrFail($podcast->id);
        return response()->view('admin.podcasts.show',compact(['categories','podcast','user']));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Podcast  $podcast
     * @return \Illuminate\Http\Response
     */
    public function edit(Podcast $podcast)
    {
        $user=User::with('photo')->findOrfail(auth()->user()->id);
        $categories=Category::with('children')->where('parent_id',null)->get();
        $podcast=Podcast::findOrFail($podcast->id);
        return response()->view('admin.podcasts.edit',compact(['categories','podcast','user']));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Podcast  $podcast
     * @return \Illuminate\Http\Response
     */
    public function update(PodcastRequest $request, Podcast $podcast)
    {
        $podcast=Podcast::findOrFail($podcast->id);
        $podcast->title=$request->title;
        $podcast->slug=$this->makeSlug($request->title);
        $podcast->body=$request->body;
        $podcast->description=$this->makeDescription($request->body);
        $podcast->tags=$request->tags;
        $podcast->user_id=auth()->user()->id;
        $podcast->category_id=$request->category_id;
        $podcast->photo_id=$request->photo_id;
        $podcast->price=$request->price;
        $podcast->type=$request->type;
        $podcast->meta_title=$request->meta_title;
        $podcast->meta_keywords=$request->meta_keywords;
        $podcast->meta_description=$request->meta_description;
        $podcast->save();
        alert()->success('کتاب صوتی '.$podcast->title.' با موفقیت بروزرسانی شد.','کتاب صوتی')->persistent("بستن");
        return redirect()->route('podcasts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Podcast  $podcast
     * @return \Illuminate\Http\Response
     */
    public function destroy(Podcast $podcast)
    {
        $podcast=Podcast::findOrFail($podcast->id);
        $podcast->delete();
        alert()->error('کتاب صوتی '.$podcast->title.' با موفقیت حذف شد.','کتاب صوتی')->persistent("بستن");
        return redirect()->route('courses.index');

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
