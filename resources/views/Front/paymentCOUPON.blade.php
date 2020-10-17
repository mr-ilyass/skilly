@extends('layouts.app2')
@section('title')
    Checkout
@endsection
@section('head')
    <script src="https://js.stripe.com/v3/"></script>

    <style>
        .StripeElement {
            box-sizing: border-box;

            height: 40px;

            padding: 10px 12px;

            border: 1px solid transparent;
            border-radius: 4px;
            background-color: white;

            box-shadow: 0 1px 3px 0 #e6ebf1;
            -webkit-transition: box-shadow 150ms ease;
            transition: box-shadow 150ms ease;
        }

        .StripeElement--focus {
            box-shadow: 0 1px 3px 0 #cfd7df;
        }

        .StripeElement--invalid {
            border-color: #fa755a;
        }

        .StripeElement--webkit-autofill {
            background-color: #fefde5 !important;
        }
    </style>
@endsection


@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <a href="{{url('/home')}}"> <img src="{{asset('SaaSassets/img/CustomBlack.png')}}" alt=""></a> Checkout
                <br><br>
                <div class="card" style="background-color: #dae1e7 ; opacity: 0.8">
                    <div class="card-header" style="background-color: #f0f0f0 ;font-family: 'Microsoft Sans Serif'">Subscribe  In Premium Service</div>

                    <div class="card-body">

                        <h5>Type d'abonnement</h5>
                        <select name="plan" class="form-control" id="subscription-plan">
                            @foreach($plans as $plan)
                                <option  value="{{$plan->plan_Key}}"> {{$plan->plan_Name}} --> {{$plan->Plan_Price}} M.A.D + Réduction du coupon</option>
                            @endforeach
                        </select>
                            <br>
                        <h5>titulaire de la carte: </h5>

                        <input placeholder="Card Holder" class="form-control" id="card-holder-name" type="text">
                        <br><br>


                        <!-- Stripe Elements Placeholder -->
                        <div id="card-element" ></div>
                        <br><br>
                        <button class="mt-2 btn btn-sm btn-primary" id="card-button" data-secret="{{ $intent->client_secret }}">
                            Subscribe
                        </button>


                        <script src="https://js.stripe.com/v3/"></script>

                        <script>
                            window.addEventListener('load', function() {


                                const stripe = Stripe('{{env('STRIPE_KEY')}}');

                                const elements = stripe.elements();
                                const cardElement = elements.create('card');

                                cardElement.mount('#card-element');

                                const cardHolderName = document.getElementById('card-holder-name');
                                const cardButton = document.getElementById('card-button');
                                const coupon = document.getElementById('coupon');
                                const clientSecret = cardButton.dataset.secret;

                                const e = document.getElementById('subscription-plan');
                                const plan = e.options[e.selectedIndex].value;
                                cardButton.addEventListener('click', async (e) => {
                                    const { setupIntent, error } = await stripe.handleCardSetup(
                                        clientSecret, cardElement, {
                                            payment_method_data: {
                                                billing_details: { name: cardHolderName.value }
                                            }
                                        }
                                    );

                                    if (error) {
                                        // Display "error.message" to the user...
                                        alert(error.message)
                                    } else {
                                        // The card has been verified successfully...
                                        console.log('handling success', setupIntent.payment_method);

                                        axios.post('/subscribe',{
                                            payment_method: setupIntent.payment_method,
                                            plan : plan,
                                            coupon : {!! json_encode($coupon) !!}
                                        }).then((data)=>{
                                            location.replace(data.data.success_url)
                                        });
                                    }
                                });
                            })




                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

