<?php

namespace App\Http\Controllers;
use App\Coupon;
use App\Http\Requests\couponRequest;
use App\Plan;
use App\Subscription;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth ;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Mail ;
use App\Mail\welcome ;

class PaymentController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }

    public function payment($id)
    {

        $user = auth()->user();
        if ($user->hasRole('abonne') ){

            Alert::info(' Vous etes deja abonné ', 'On apprécie votre générosité');
            return back();

        }

        if ($id == 1)
        $availablePlans = Plan::where('id',1)->get();
        elseif ($id == 2)
            $availablePlans = Plan::where('id',2)->get();
        elseif ($id == 3)
            $availablePlans = Plan::where('id',3)->get();
        else
            return back();

        $data = [

            'intent' => auth()->user()->createSetupIntent(),
            'plans'=> $availablePlans,
            'id' => $id

        ];
        return view('front.payment')->with($data);
    }

    public function paymentCoupon(couponRequest $request , $id){

        $user = auth()->user();
//        $userrr = Subscription::where('user_id',$user->id)->where('stripe_status','active')->first() ;
//        if ($userrr != null ){
//            Alert::info(' Vous etes deja abonné ', 'On apprécie votre générosité');
//            return back();
//
//        }

        if ($id == 1)
            $availablePlans = Plan::where('id',1)->get();
        elseif ($id == 2)
            $availablePlans = Plan::where('id',2)->get();
        elseif ($id == 3)
            $availablePlans = Plan::where('id',3)->get();
        else
            return back();

        $coupon = Coupon::where('coupon_Name',$request->coupon)->where('coupon_value' , 'active')->first();
        if ($coupon != null){

        $data = [

            'intent' => auth()->user()->createSetupIntent(),
            'plans'=> $availablePlans,
            'coupon' => $coupon->coupon_Key,
            'id' => $id

        ];
            Alert::success('Coupon', 'Votre Coupon est validé');

            return view('front.paymentCOUPON')->with($data);
        }

        else
        {
            Alert::error('Epuisé', 'Le Coupon n\'est plus desponible ');

            return back();
        }
    }

    public function subscribe(Request $request)
    {

        $user = auth()->user();
        $paymentMethod = $request->payment_method;
        $coup = $request->coupon;
        $planId = $request->plan;
        $user->newSubscription('main', $planId)->withCoupon($coup)->create($paymentMethod);
        $user->attachRole('abonne');
        Alert::success('Abonné', 'Votre Abonnement est activé');
        Mail::to(Auth::user()->email)->send(new welcome());
        return response([
            'success_url'=> redirect()->intended('/')->getTargetUrl(),
            'message'=>'success'
        ]);

    }

}
