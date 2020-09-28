<?php

namespace App\Http\Controllers\Backend;


use App\Part;
use App\Podcast;
use App\User;
use Illuminate\Support\Str;
use App\Http\Requests\PartRequest;
use App\Http\Controllers\Controller;

class PartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user=User::with('photo')->findOrFail(auth()->user()->id);
        $parts=Part::with('podcast')->orderBy('number')->get();
        $podcasts=Podcast::with('photo','parts')->latest()->paginate(10);
        return response()->view('admin.parts.index',compact(['podcasts','user','parts']));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user=User::with('photo')->findOrFail(auth()->user()->id);
        $podcasts=Podcast::with('photo')->get();
        return response()->view('admin.parts.create',compact(['podcasts','user']));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PartRequest $request)
    {
        $part=new Part();
        $part->title=$request->title;
        $part->slug=$this->makeSlug($request->title);
        $part->body=$request->body;
        $part->description=$this->makeDescription($request->body);
        $part->tags=$request->tags;
        $part->number=$request->number;
        $part->podcast_id=$request->podcast_id;
        $part->file_size=$request->file_size;
        $part->file_time=$request->file_time;
        $part->file_url=$request->file_url;
        $part->type=$request->type;
        $part->save();
        alert()->success('آپلود کتاب صوتی '.$part->title.' با موفقیت اضافه شد.','آپلود کتاب صوتی ')->persistent("بستن");
        return redirect()->route('parts.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Part  $part
     * @return \Illuminate\Http\Response
     */
    public function show(Part $part)
    {
        $user=User::with('photo')->findOrFail(auth()->user()->id);
        $part=Part::with('podcast')->orderBy('number')->findOrFail($part->id);
        $podcast=Podcast::with('photo','parts')->findOrFail($part->podcast_id);
        return response()->view('admin.parts.show',compact(['part','user','podcast']));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Part  $part
     * @return \Illuminate\Http\Response
     */
    public function edit(Part $part)
    {
        $user=User::with('photo')->findOrFail(auth()->user()->id);
        $part=Part::with('podcast')->findOrFail($part->id);
        $podcasts=Podcast::with('photo','parts')->get();
        return response()->view('admin.parts.edit',compact(['part','podcasts','user']));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Part  $part
     * @return \Illuminate\Http\Response
     */
    public function update(PartRequest $request, Part $part)
    {
        $part=Part::findOrFail($part->id);
        $part->title=$request->title;
        $part->slug=$this->makeSlug($request->title);
        $part->body=$request->body;
        $part->description=$this->makeDescription($request->body);
        $part->tags=$request->tags;
        $part->number=$request->number;
        $part->podcast_id=$request->podcast_id;
        $part->file_size=$request->file_size;
        $part->file_time=$request->file_time;
        $part->file_url=$request->file_url;
        $part->type=$request->type;
        $part->save();
        alert()->success('آپلود کتاب صوتی '.$part->title.' با موفقیت بروزرسانی شد.','آپلود کتاب صوتی ')->persistent("بستن");
        return redirect()->route('parts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Part  $part
     * @return \Illuminate\Http\Response
     */
    public function destroy(Part $part)
    {
        $part=Part::findOrFail($part->id);
        $part->delete();
        alert()->error('آپلود کتاب صوتی '.$part->title.' با موفقیت حذف شد.','کتاب صوتی')->persistent("بستن");
        return redirect()->route('parts.index');
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
