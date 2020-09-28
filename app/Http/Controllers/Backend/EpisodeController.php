<?php

namespace App\Http\Controllers\Backend;

use App\Course;
use App\Episode;
use App\Http\Controllers\Controller;
use App\Http\Middleware\isAdmin;
use App\Http\Requests\EpisodeRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class EpisodeController extends Controller
{
    /**
     *  Display a listing of the resource.
     *
     *  @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user=User::with('photo')->findOrFail(auth()->user()->id);
        $episodes=Episode::with('course')->orderBy('number')->get();
        $courses=Course::with('photo','episodes')->latest()->paginate(10);
        return response()->view('admin.episodes.index',compact(['episodes','user','courses']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user=User::with('photo')->findOrFail(auth()->user()->id);
        $courses=Course::with('photo')->get();
        return response()->view('admin.episodes.create',compact(['courses','user']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EpisodeRequest $request)
    {
        $episode=new Episode();
        $episode->title=$request->title;
        $episode->slug=$this->makeSlug($request->title);
        $episode->body=$request->body;
        $episode->description=$this->makeDescription($request->body);
        $episode->tags=$request->tags;
        $episode->number=$request->number;
        $episode->course_id=$request->course_id;
        $episode->file_size=$request->file_size;
        $episode->file_time=$request->file_time;
        $episode->file_url=$request->file_url;
        $episode->type=$request->type;
        $episode->save();
        alert()->success('قسمت دوره آموزشی '.$episode->title.' با موفقیت اضافه شد.','قسمت دوره آموزشی ')->persistent("بستن");
        return redirect()->route('episodes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user=User::with('photo')->findOrFail(auth()->user()->id);
        $episode=Episode::with('course')->orderBy('number')->findOrFail($id);
        $course=Course::with('photo','episodes')->findOrFail($episode->course_id);
        return response()->view('admin.episodes.show',compact(['episode','user','course']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user=User::with('photo')->findOrFail(auth()->user()->id);
        $episode=Episode::with('course')->findOrFail($id);
        $courses=Course::with('photo','episodes')->get();
        return response()->view('admin.episodes.edit',compact(['episode','courses','user']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EpisodeRequest $request, $id)
    {
        $episode=Episode::findOrFail($id);
        $episode->title=$request->title;
        $episode->slug=$this->makeSlug($request->title);
        $episode->body=$request->body;
        $episode->description=$this->makeDescription($request->body);
        $episode->tags=$request->tags;
        $episode->number=$request->number;
        $episode->course_id=$request->course_id;
        $episode->file_size=$request->file_size;
        $episode->file_time=$request->file_time;
        $episode->file_url=$request->file_url;
        $episode->type=$request->type;
        $episode->save();
        alert()->success('قسمت دوره آموزشی '.$episode->title.' با موفقیت بروزرسانی شد.','قسمت دوره آموزشی ')->persistent("بستن");
        return redirect()->route('episodes.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $episode=Episode::findOrFail($id);
        $episode->delete();
        alert()->error('قسمت دوره آموزشی '.$episode->title.' با موفقیت حذف شد.','قسمت دوره آموزشی')->persistent("بستن");
        return redirect()->route('episodes.index');

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
