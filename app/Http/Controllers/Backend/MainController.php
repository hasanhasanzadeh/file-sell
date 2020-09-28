<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Permission;
use App\Role;
use App\User;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        $user=User::with('photo')->findOrfail(auth()->user()->id);
        alert()->success('کاربر '.$user->name.' به بخش مدیریت خوش آمدید.','ورود')->persistent("بستن");
        return view('admin.main.index',compact('user'));
    }
}
