<?php

namespace App\Http\Controllers\Backend;

use App\Category;
use App\Course;
use App\Http\Controllers\Controller;
use App\Http\Requests\CourseRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class CourseController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user=User::with('photo')->findOrfail(auth()->user()->id);
        $courses=Course::paginate(10);
        return response()->view('admin.courses.index',compact(['courses','user']));
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
        return response()->view('admin.courses.create',compact(['categories','user']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CourseRequest $request)
    {
        $course=new Course();
        $course->title=$request->title;
        $course->slug=$this->makeSlug($request->title);
        $course->body=$request->body;
        $course->description=$this->makeDescription($request->body);
        $course->tags=$request->tags;
        $course->user_id=auth()->user()->id;
        $course->category_id=$request->category_id;
        $course->photo_id=$request->photo_id;
        $course->price=$request->price;
        $course->type=$request->type;
        $course->meta_title=$request->meta_title;
        $course->meta_keywords=$request->meta_keywords;
        $course->meta_description=$request->meta_description;
        $course->save();
        alert()->success('دوره آموزشی '.$course->title.' با موفقیت اضافه شد.','دوره آموزشی')->persistent("بستن");
        return redirect()->route('courses.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user=User::with('photo')->findOrfail(auth()->user()->id);
        $categories=Category::with('children')->where('parent_id',null)->get();
        $course=Course::findOrFail($id);
        return response()->view('admin.courses.show',compact(['categories','course','user']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user=User::with('photo')->findOrfail(auth()->user()->id);
        $categories=Category::with('children')->where('parent_id',null)->get();
        $course=Course::findOrFail($id);
        return response()->view('admin.courses.edit',compact(['categories','course','user']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $idwarning
     * @return \Illuminate\Http\Response
     */
    public function update(CourseRequest $request, $id)
    {
        $course=Course::findOrFail($id);
        $course->title=$request->title;
        $course->slug=$this->makeSlug($request->title);
        $course->body=$request->body;
        $course->description=$this->makeDescription($request->body);
        $course->tags=$request->tags;
        $course->user_id=auth()->user()->id;
        $course->category_id=$request->category_id;
        $course->photo_id=$request->photo_id;
        $course->price=$request->price;
        $course->type=$request->type;
        $course->meta_title=$request->meta_title;
        $course->meta_keywords=$request->meta_keywords;
        $course->meta_description=$request->meta_description;
        $course->save();
        alert()->success('دوره آموزشی '.$course->title.' با موفقیت بروزرسانی شد.','دوره آموزشی')->persistent("بستن");
        return redirect()->route('courses.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $course=Course::findOrFail($id);
        $course->delete();
        alert()->error('دوره آموزشی '.$course->title.' با موفقیت حذف شد.','دوره آموزشی')->persistent("بستن");
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
