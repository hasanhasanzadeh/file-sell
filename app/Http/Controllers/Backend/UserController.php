<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileRequest;
use App\Http\Requests\ProfileUpdateRequest;
use App\Http\Requests\UserRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{

    public function index()
    {
        $user=User::with('photo')->findOrfail(auth()->user()->id);
        $users=User::with('photo','comments')->paginate(10);
        if (!Gate::allows('isAdmin')){
            alert()->error('کاربر '.$user->name.' به این قسمت دسترسی ندارید.','کاربر')->persistent("بستن");
            abort(403,"دسترسی به این قسمت ندارید");
        }
        return response()->view('admin.users.index',compact(['users','user']));
    }


    public function create()
    {
        $user=User::with('photo')->findOrfail(auth()->user()->id);
        if (!Gate::allows('isAdmin')){
            alert()->error('کاربر '.$user->name.' به این قسمت دسترسی ندارید.','کاربر')->persistent("بستن");
            abort(403,"دسترسی به این قسمت ندارید");
        }
        return response()->view('admin.users.create',compact('user'));
    }


    public function store(UserRequest $request)
    {
        $user=new User();
        $user->name=$request->name;
        $user->mobile=$request->mobile;
        $user->password=Hash::make($request->password);
        $user->status=$request->status;
        $user->level=$request->level;
        $user->save();
        alert()->success('کاربر '.$user->name.' با موفقیت اضافه شد.','کاربر')->persistent("بستن");
        Session::flash('success','کاربر با موفقیت ایجاد شد.');
        return redirect('/admin/users');
    }


    public function show($id)
    {
        $user=User::with('photo')->findOrfail(auth()->user()->id);
        $user_au=User::with('photo','comments')->findOrFail($id);
        if (!Gate::allows('isAdmin')){
            alert()->error('کاربر '.$user->name.' به این قسمت دسترسی ندارید.','کاربر')->persistent("بستن");
            abort(403,"دسترسی به این قسمت ندارید");
        }
        return response()->view('admin.users.show',compact(['user_au','user']));
    }


    public function edit($id)
    {
        $user=User::with('photo')->findOrfail(auth()->user()->id);
        $user_au=User::with('photo','comments')->findOrFail($id);
        if (!Gate::allows('isAdmin')){
            alert()->error('کاربر '.$user->name.' به این قسمت دسترسی ندارید.','کاربر')->persistent("بستن");
            abort(403,"دسترسی به این قسمت ندارید");
        }
        return response()->view('admin.users.edit',compact(['user','user_au']));
    }


    public function update(UserRequest $request, $id)
    {
        $user=User::findOrFail($id);
        $user->name=$request->name;
        $user->mobile=$request->mobile;
        if ($request->password)
        {
            $user->password=Hash::make($request->password);
        }
        $user->status=$request->status;
        $user->level=$request->level;
        $user->save();
        alert()->success('کاربر '.$user->name.' با موفقیت بروزرسانی شد.','کاربر')->persistent("بستن");
        return redirect('/admin/users');
    }


    public function destroy($id)
    {
        $user=User::findOrFail($id);
        $user->delete();
        alert()->error('کاربر '.$user->name.' با موفقیت حذف شد.','کاربر')->persistent("بستن");
        return back();
    }

    public function profile()
    {
        $user=User::with('photo')->findOrfail(auth()->user()->id);
        $profile=User::findOrFail(auth()->user()->id);
        return view('admin.profile.show',compact(['profile','user']));
    }
    public function profileEdit()
    {
        $user=User::with('photo')->findOrfail(auth()->user()->id);
        $profile=User::findOrFail(auth()->user()->id);
        return view('admin.profile.edit',compact(['profile','user']));
    }
    public function profileUpdate(ProfileRequest $request)
    {
        $profile=User::findOrFail(auth()->user()->id);
        $profile->name=$request->name;
        $profile->mobile=$request->mobile;
        $profile->email=$request->email;
        if($request->password)
        {
            $profile->password=Hash::make($request->password);
        }
        $profile->photo_id=$request->photo_id;
        $profile->status=$request->status;
        if($request->level){
            $profile->level=$request->level;
        }
        $profile->save();
        alert()->success('پروفایل '.$profile->name.' با موفقیت بروزرسانی شد.','پروفایل')->persistent("بستن");
        return redirect('admin/profile');
    }
}
