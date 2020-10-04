<?php

namespace App\Http\Controllers\Backend;

use App\Comment;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function trueStatus()
    {
        $user=User::with('photo')->findOrfail(auth()->user()->id);
        $comments=Comment::where('status',1)->latest()->paginate(10);
        return  response()->view('admin.comments.trueStatus',compact(['comments','user']));
    }

    public function falseStatus()
    {
        $user=User::with('photo')->findOrfail(auth()->user()->id);
        $comments=Comment::where('status',0)->latest()->paginate(10);
        return  response()->view('admin.comments.falseStatus',compact(['comments','user']));
    }

    public function destroy($id)
    {
        $comment=Comment::findOrFail($id);
        $comment->delete();
        alert()->error('حذف دیدگاه با موفقیت انجام شد.','حذف دیدگاه')->persistent('بستن');
        return back();
    }

    public function update(Request $request,$id)
    {
        $comment=Comment::findOrFail($id);
        $comment->status=1;
        $comment->save();
        alert()->success(' دیدگاه مورد نظر با موفقیت تأیید شد.','تأیید دیدگاه')->persistent('بستن');
        return back();
    }
}
