<?php

namespace App\Http\Controllers\Backend;

use App\Category;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{
    public function index()
    {
        $user=User::with('photo')->findOrfail(auth()->user()->id);
        $categories=Category::with('children')->where('parent_id',null)->paginate(15);
        return response()->view('admin.categories.index',compact(['categories','user']));
    }

    public function create()
    {
        $user=User::with('photo')->findOrfail(auth()->user()->id);
        $categories=Category::with('children')->where('parent_id',null)->get();
        return response()->view('admin.categories.create',compact(['categories','user']));
    }

    public function edit($id)
    {
        $user=User::with('photo')->findOrfail(auth()->user()->id);
        $categories=Category::with('children')->where('parent_id',null)->get();
        $category=Category::with('children')->findOrFail($id);
        return response()->view('admin.categories.edit',compact(['category','categories','user']));
    }

    public function show($id)
    {
        $user=User::with('photo')->findOrfail(auth()->user()->id);
        $category=Category::with('children')->findOrFail($id);
        return response()->view('admin.categories.show',compact(['category','user']));

    }

    public function store(CategoryRequest $request)
    {
        $category=new Category();
        $category->name=$request->name;
        $category->parent_id=$request->parent_id;
        $category->meta_title=$request->meta_title;
        $category->meta_keywords=$request->meta_keywords;
        $category->meta_description=$request->meta_description;
        $category->save();
        alert()->success('دسته بندی '.$category->name.' به موفقیت اضافه شد.','دسته بندی')->persistent("بستن");
        return redirect()->route('categories.index');
    }

    public function destroy($id)
    {
        $category=Category::with('children')->findOrFail($id);
        if (($category->children)->isEmpty()){
            $category->delete();
            alert()->error('حذف دسته بندی '.$category->name.' با موفقیت انجام شد.','دسته بندی')->persistent("بستن");
        }
        else{
            alert()->error('دسته بندی  '.$category->name.' به دلیل زیر دسته داشتن نمی تواند حذف شود.','دسته بندی')->persistent("بستن");
        }
        return back();
    }

    public function update(CategoryRequest $request,$id)
    {
        $category=Category::findOrFail($id);
        $category->name=$request->name;
        $category->parent_id=$request->parent_id;
        $category->meta_title=$request->meta_title;
        $category->meta_keywords=$request->meta_keywords;
        $category->meta_description=$request->meta_description;
        $category->save();
        alert()->success('دسته بندی '.$category->name.' به موفقیت بروزرسانی شد.','دسته بندی')->persistent("بستن");
        return redirect()->route('categories.index');

    }
}
