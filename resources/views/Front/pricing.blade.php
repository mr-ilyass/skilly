@extends('Front.layout.layouts')
@section('title')
    Pricing

@endsection

@section('style')



@endsection

@section('content')

    <section>
        <br><br><br>
{{--    <section class="section " >--}}
        <div class="container">
            <header class="section-header">
                <small>Pricing</small>
                <h2>Choose License Type</h2>
                </header>
{{--c3edea  #f8f8f8--}}

            <div class="row gap-y">

                <div class="col-lg-4">
                    <div class="pricing-3" style="background-color: #ffe0ac;">
                        <h6 class="plan-name">Mensuel</h6>
                        <h2 class="price">200 <span class="price-unit"> M.A.D</span></h2>
                        <ul>
                            <li>Accés a toutes les catégories</li>
                            <li>Support 5/7 Days</li>
                            <li>Contacter la communté</li>
                        </ul>
                        <br>
                        <a class="btn btn-round btn-outline-primary w-200" href="{{route('checkout',1)}}">Get started</a>
                    </div>
                </div>


                <div class="col-lg-4">
                    <div class="pricing-3 popular" style="background-color: #d8b9c3;">
                        <span class="popular-tag">Best choice</span>
                        <h6 class="plan-name">Biannuel</h6>
                        <h2 class="price">1099 <span class="price-unit"> M.A.D</span></h2>
                        <ul>
                            <li>Accés a toutes les catégories</li>
                            <li>Support 7/24</li>
                            <li>Contacter la communté</li>

                        </ul>
                        <br>
                        <a class="btn btn-round btn-primary w-200" href="{{route('checkout',2)}}">Get started</a>
                    </div>
                </div>


                <div class="col-lg-4">
                    <div class="pricing-3" style="background-color: #ffe0ac;">
                        <h6 class="plan-name">Annuel</h6>
                        <h2 class="price">2199 <span class="price-unit"> M.A.D</span></h2>
                        <ul>
                            <li>Accés a toutes les catégories</li>
                            <li>Support 7/24h</li>
                            <li>Résoudre les probleme techniques</li>
                        </ul>
                        <br>
                        <a class="btn btn-round btn-outline-primary w-200" href="{{route('checkout',3)}}">Get started</a>
                    </div>
                </div>

            </div>

        </div>
        <br><br><br>

    </section>
@endsection
