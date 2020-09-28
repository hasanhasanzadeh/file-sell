<?php

namespace App\Http\Controllers\Backend;

use App\Category;
use App\Gazette;
use App\Http\Controllers\Controller;
use App\Http\Requests\GazetteRequest;
use App\User;
use Illuminate\Support\Str;

class GazetteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user=User::with('photo')->findOrfail(auth()->user()->id);
        $gazettes=Gazette::paginate(10);
        return response()->view('admin.gazettes.index',compact(['gazettes','user']));

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
        return response()->view('admin.gazettes.create',compact(['categories','user']));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GazetteRequest $request)
    {
        $gazette=new Gazette();
        $gazette->title=$request->title;
        $gazette->slug=$this->makeSlug($request->title);
        $gazette->body=$request->body;
        $gazette->description=$this->makeDescription($request->body);
        $gazette->tags=$request->tags;
        $gazette->user_id=auth()->user()->id;
        $gazette->category_id=$request->category_id;
        $gazette->photo_id=$request->photo_id;
        $gazette->price=$request->price;
        $gazette->file_url=$request->file_url;
        $gazette->type=$request->type;
        $gazette->meta_title=$request->meta_title;
        $gazette->meta_keywords=$request->meta_keywords;
        $gazette->meta_description=$request->meta_description;
        $gazette->save();
        alert()->success('مجله '.$gazette->title.' با موفقیت اضافه شد.','مجله')->persistent("بستن");
        return redirect()->route('gazettes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Gazette  $gazette
     * @return \Illuminate\Http\Response
     */
    public function show(Gazette $gazette)
    {
        $user=User::with('photo')->findOrfail(auth()->user()->id);
        $categories=Category::with('children')->where('parent_id',null)->get();
        $gazette=Gazette::findOrFail($gazette->id);
        return response()->view('admin.gazettes.show',compact(['categories','gazette','user']));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Gazette  $gazette
     * @return \Illuminate\Http\Response
     */
    public function edit(Gazette $gazette)
    {
        $user=User::with('photo')->findOrfail(auth()->user()->id);
        $categories=Category::with('children')->where('parent_id',null)->get();
        $gazette=Gazette::findOrFail($gazette->id);
        return response()->view('admin.gazettes.edit',compact(['categories','gazette','user']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Gazette  $gazette
     * @return \Illuminate\Http\Response
     */
    public function update(GazetteRequest $request, Gazette $gazette)
    {
        $gazette=Gazette::findOrFail($gazette->id);
        $gazette->title=$request->title;
        $gazette->slug=$this->makeSlug($request->title);
        $gazette->body=$request->body;
        $gazette->description=$this->makeDescription($request->body);
        $gazette->tags=$request->tags;
        $gazette->user_id=auth()->user()->id;
        $gazette->category_id=$request->category_id;
        $gazette->photo_id=$request->photo_id;
        $gazette->price=$request->price;
        $gazette->file_url=$request->file_url;
        $gazette->type=$request->type;
        $gazette->meta_title=$request->meta_title;
        $gazette->meta_keywords=$request->meta_keywords;
        $gazette->meta_description=$request->meta_description;
        $gazette->save();
        alert()->success('مجله '.$gazette->title.' با موفقیت بروزرسانی شد.','مجله')->persistent("بستن");
        return redirect()->route('gazettes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Gazette  $gazette
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gazette $gazette)
    {
        $gazette=Gazette::findOrFail($gazette->id);
        $gazette->delete();
        alert()->error('مجله '.$gazette->title.' با موفقیت حذف شد.','مجله')->persistent("بستن");
        return redirect()->route('gazettes.index');
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
