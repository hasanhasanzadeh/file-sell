<?php

namespace App\Http\Controllers\Frontend;

use App\Article;
use App\Category;
use App\Coupon;
use App\Course;
use App\Gazette;
use App\Http\Controllers\Controller;
use App\Like;
use App\Podcast;
use App\Setting;
use App\User;
use Artesaos\SEOTools\Facades\SEOMeta;
use Carbon\Carbon;
use Illuminate\Http\Request;
use SEO;

class LikeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coupon=Coupon::where('expired','>',Carbon::now())->where('status',1)->latest()->first();
        $likes=Like::with('user','likeable')->latest()->paginate(5);
        $setting=Setting::first();
        SEO::setTitle($setting->meta_title);
        SEO::setDescription($setting->meta_description);
        SEOMeta::addKeyword(explode('-', $setting->meta_keywords));
        $categories=Category::with('children')->where('parent_id',null)->get();
        $articles=Article::with('likes')->whereHas('likes', function ($query) {
            $query->where('user_id',auth()->user()->id);
        })->get();
        $courses=Course::with('likes')->whereHas('likes', function ($query) {
            $query->where('user_id',auth()->user()->id);
        })->get();
        $gazettes=Gazette::with('likes')->whereHas('likes', function ($query) {
            $query->where('user_id',auth()->user()->id);
        })->get();
        $podcasts=Podcast::with('likes')->whereHas('likes', function ($query) {
            $query->where('user_id',auth()->user()->id);
        })->get();

        $arrays=['articles'=>$articles,'gazettes'=>$gazettes,'courses'=>$courses,'podcasts'=>$podcasts];
        if (auth()->check()){
            $user=User::with('photo')->findOrFail(auth()->user()->id);
            return view('auth.likes',compact(['likes','user','setting','categories','arrays','coupon']));
        }
        else{
            return back();
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $like=Like::where('user_id',auth()->user()->id)->where('likeable_id',$request->likeable_id)->where('likeable_type',$request->likeable_type)->first();
        if (empty($like)){
            $like=new Like();
            $like->user_id=auth()->user()->id;
            $like->likeable_id=$request->likeable_id;
            $like->likeable_type=$request->likeable_type;
            $like->save();
            alert()->success('اطلاعات مورد علاقه شما با موفقیت اضافه شد.','علاقه مندی ها')->persistent('بستن');
            return back();
        }
        else{
            alert()->warning('اطلاعات مورد علاقه شما قبلا ذخیره شده است.','علاقه مندی ها')->persistent('بستن');
            return back();
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Like  $like
     * @return \Illuminate\Http\Response
     */
    public function show(Like $like)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Like  $like
     * @return \Illuminate\Http\Response
     */
    public function edit(Like $like)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Like  $like
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Like $like)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Like  $like
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {

        $like=Like::where('likeable_id',$id)->where('user_id',auth()->user()->id)->where('likeable_type',$request->likeable_type)->first();
        $like->delete();
        alert()->success('اطلاعات مورد علاقه شما با موفقیت حذف شد.','علاقه مندی ها')->persistent('بستن');
        return back();
    }
}
