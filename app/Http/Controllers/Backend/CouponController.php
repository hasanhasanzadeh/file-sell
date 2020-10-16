<?php

namespace App\Http\Controllers\Backend;

use App\Coupon;
use App\Course;
use App\Http\Controllers\Controller;
use App\Http\Requests\CouponRequest;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user=User::with('photo')->findOrfail(auth()->user()->id);
        $coupons=Coupon::with('photo')->latest()->paginate(10);
        return response()->view('admin.coupons.index',compact(['user','coupons']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user=User::with('photo')->findOrfail(auth()->user()->id);
        return response()->view('admin.coupons.create',compact(['user']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CouponRequest $request)
    {
        $coupon=new Coupon();
        $coupon->title=$request->title;
        $coupon->code=$request->code;
        $coupon->description=$request->description;
        $coupon->status=$request->status;
        $coupon->photo_id=$request->photo_id;
        $coupon->expired=Carbon::now()->addDay($request->expired);
        $coupon->save();
        alert()->success('تخفیف مورد نظر با موفقیت اضافه شد.','تخفیف')->persistent('بستن');
        return redirect('admin/coupons');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user=User::with('photo')->findOrfail(auth()->user()->id);
        $coupon=Coupon::with('photo')->findOrFail($id);
        return response()->view('admin.coupons.show',compact(['user','coupon']));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user=User::with('photo')->findOrfail(auth()->user()->id);
        $coupon=Coupon::with('photo')->findOrFail($id);
        return response()->view('admin.coupons.edit',compact(['user','coupon']));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $coupon=Coupon::findOrFail($id);
        $coupon->title=$request->title;
        $coupon->code=$request->code;
        $coupon->description=$request->description;
        $coupon->status=$request->status;
        $coupon->photo_id=$request->photo_id;
        $coupon->expired=Carbon::now()->addDay($request->expired);
        $coupon->save();
        alert()->success('تخفیف مورد نظر با موفقیت بروزرسانی شد.','تخفیف')->persistent('بستن');
        return redirect('admin/coupons');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $coupon=Coupon::findOrFail($id);
        $coupon->delete();
        alert()->success('تخفیف مورد نظر با موفقیت حذف شد.','تخفیف')->persistent('بستن');
        return redirect('admin/coupons');
    }
}
