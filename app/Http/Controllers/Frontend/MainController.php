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
//           'name'=>'حسن زاده',
//           'mobile'=>'09142641975',
//           'status'=>1,
//           'level'=>'editor',
//            'admin_active'=>1,
//           'mobile_verified_at'=>Carbon::now(),
//           'password'=>Hash::make('09142641975'),
//        ]);

        if (auth()->check()){
            $user=User::with('photo')->findOrFail(auth()->user()->id);
            alert()->success('کاربر '.$user->name.' به سایت ما خوش آمدید.','ورود');
            return view('welcome',compact(['user']));
        }
        else
        {
            alert()->success('کاربر میهمان به سایت ما خوش آمدید.','ورود');
            return view('welcome');
        }

    }
}
