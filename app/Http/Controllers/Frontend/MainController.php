<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class MainController extends Controller
{
    public function index()
    {
//        $user=User::create([
//           'name'=>'hassan hassanzadeh',
//           'mobile'=>'09384446491',
//           'status'=>1,
//           'mobile_verified_at'=>Carbon::now(),
//           'password'=>Hash::make('12345678'),
//        ]);
        if (auth()->check()){
            $user=User::with('photo')->findOrFail(auth()->user()->id);
            alert()->success('کاربر '.$user->name.' به سایت ما خوش آمدید.','ورود')->persistent("بستن");
            return view('welcome',compact(['user']));
        }
        else
        {
            alert()->success('کاربر میهمان به سایت ما خوش آمدید.','ورود')->persistent("بستن");
            return view('welcome');
        }

    }
}
