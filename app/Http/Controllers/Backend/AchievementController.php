<?php

namespace App\Http\Controllers\Backend;

use App\Achievement;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Request;


class AchievementController extends Controller
{

    public function trueStatus()
    {
        $user=User::with('photo')->findOrfail(auth()->user()->id);
        $achievements=Achievement::with('user')->where('status',1)->latest()->paginate(10);
        if (!Gate::allows('isAdmin')){
            alert()->error('دسترسی به این قسمت مجاز نیست.','دسترسی')->persistent("بستن");
            abort(403,"دسترسی به این قسمت ندارید");
        }
        return  response()->view('admin.achievements.trueStatus',compact(['achievements','user']));
    }

    public function falseStatus()
    {
        $user=User::with('photo')->findOrfail(auth()->user()->id);
        $achievements=Achievement::with('user')->where('status',0)->latest()->paginate(10);
        if (!Gate::allows('isAdmin')){
            alert()->error('دسترسی به این قسمت مجاز نیست.','دسترسی')->persistent("بستن");
            abort(403,"دسترسی به این قسمت ندارید");
        }
        return  response()->view('admin.achievements.falseStatus',compact(['achievements','user']));
    }


    public function update(Request $request,$id)
    {
        $achievement=Achievement::findOrFail($id);
        $achievement->status=1;
        $achievement->save();
        alert()->success('اطلاعات موفقیت تایید شد.','موفقیت')->persistent('بستن');
        return redirect('admin/achievements/false-status');
    }

    public function destroy($id)
    {
        $achievement=Achievement::findOrFail($id);
        $achievement->delete();
        alert()->success('اطلاعات حذف شد.','موفقیت')->persistent('بستن');
        return back();
    }
}
