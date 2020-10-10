<?php

namespace App\Http\Controllers\Backend;

use App\Achievement;
use App\Article;
use App\Comment;
use App\Course;
use App\Gazette;
use App\Http\Controllers\Controller;
use App\Order;
use App\Permission;
use App\Podcast;
use App\Role;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        $downloadCount=0;
        $userCount=User::all()->count();
        $commentCount=Comment::all()->count();
        $courseCount=Course::all()->count();
        $articleCount=Article::all()->count();
        $podcastCount=Podcast::all()->count();
        $gazetteCount=Gazette::all()->count();
        $achievementCount=Achievement::all()->count();
        $arrays=['userCount'=>$userCount ,'courseCount'=>$courseCount,'commentCount'=>$commentCount,'downloadCount'=>$downloadCount
        ,'articleCount'=>$articleCount,
            'podcastCount'=>$podcastCount,
            'gazetteCount'=>$gazetteCount,
            'achievementCount'=>$achievementCount,
        ];
        $courses=Course::with('photo')->latest()->take(10)->get();
        $users=User::with('photo')->whereDate('created_at', Carbon::today())->get();
        $user=User::with('photo')->findOrfail(auth()->user()->id);
        //alert()->success('کاربر '.$user->name.' به بخش مدیریت خوش آمدید.','ورود');
        return view('admin.main.index',compact(['user','users','courses','arrays']));
    }
}
