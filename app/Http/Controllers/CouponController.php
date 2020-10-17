<?php

namespace App\Http\Controllers;

use App\Coupon;
use App\Http\Requests\couponAdminRequest;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class CouponController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:superadministrator');
    }

    public function index()
    {
        $coupons = Coupon::all();

        return view('dashboard.coupon')->with(compact('coupons'));

    }




    public function store(couponAdminRequest $request)
    {
        $coupon = new Coupon ;
        $coupon->coupon_Name = $request->name_C ;
        $coupon->coupon_Key = $request->key_C ;


        if($request->checkValue != null)
            $coupon->coupon_Value = 'active';
        else{
            $coupon->coupon_Value = 'desactiver';
        }

        $coupon->save();
        Alert::success('Enregistré', 'Le coupon est bien enregistré');

        return back();
    }







    public function update(couponAdminRequest $request, $id)
    {

        $coupon = Coupon::findOrFail($id);
        $coupon->coupon_Name = $request->name_C ;
        $coupon->coupon_Key = $request->key_C ;


        if($request->checkValue != null)
        $coupon->coupon_Value = 'active';
        else{
            $coupon->coupon_Value = 'desactiver';
        }

        $coupon->save();
        Alert::success('Modifié', 'Le coupon est bien Modifié');

        return back();

    }



    public function destroy($id)
    {
        $cat = Coupon::findOrFail ($id);
        $cat->delete();
        Alert::success('Supprimé', 'Le coupon est supprimé');

        return back();

    }
}
