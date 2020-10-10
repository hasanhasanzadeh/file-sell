<?php

namespace App\Http\Controllers\Backend;

use App\Advertisement;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class AdvertisementController extends Controller
{
    public function trueStatus()
    {
        $user=User::with('photo')->findOrfail(auth()->user()->id);
        $advertisements=Advertisement::with('user')->where('status',1)->latest()->paginate(10);
        if (!Gate::allows('isAdmin')){
            alert()->error('دسترسی به این قسمت مجاز نیست.','دسترسی')->persistent("بستن");
            abort(403,"دسترسی به این قسمت ندارید");
        }
        return  response()->view('admin.advertisements.trueStatus',compact(['advertisements','user']));
    }

    public function falseStatus()
    {
        $user=User::with('photo')->findOrfail(auth()->user()->id);
        $advertisements=Advertisement::with('user')->where('status',0)->latest()->paginate(10);
        if (!Gate::allows('isAdmin')){
            alert()->error('دسترسی به این قسمت مجاز نیست.','دسترسی')->persistent("بستن");
            abort(403,"دسترسی به این قسمت ندارید");
        }
        return  response()->view('admin.advertisements.falseStatus',compact(['advertisements','user']));
    }


    public function update(Request $request, $id)
    {
        $advertisement=Advertisement::findOrFail($id);
        $advertisement->status=1;
        $advertisement->save();
        alert()->success('اطلاعات آگهی با موفقیت تایید شد.','آگهی')->persistent('بستن');
        return redirect('admin/advertisements/false-status');
    }

    public function destroy($id)
    {
        $advertisement=Advertisement::findOrFail($id);
        $advertisement->delete();
        alert()->success('اطلاعات حذف شد.','آگهی')->persistent('بستن');
        return back();
    }
}
