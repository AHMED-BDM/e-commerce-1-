{{-- users Products view --}}
@extends('layouts.master')

@section('title')
@foreach ($result2 as $item)
{{ $item->name }}
@endforeach
@endsection

@if ($result->isNotEmpty())
    @section('content')
        <!-- single product -->
        <div class="single-product mt-150 mb-150">
            <div class="container">
                <div class="row">
                    @foreach ($result2 as $item)
                        <div class="col-lg-8 offset-lg-2 text-center">
                            <div class="section-title">
                                @if ($currentCatId)
                                    <h3>قسم<span class="orange-text"> {{ $currentCatId->name }}</span> </h3>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="single-product-img">
                                <img src="{{ url($item->imgPath) }}" alt="">
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div class="single-product-content">
                                <h3>{{ $item->name }}</h3>
                                <p class="single-product-pricing">{{ $item->price }}$</p>
                                <p>{{ $item->description }}</p>
                                <div class="single-product-form">
                                    <a href="{{route('add-to.cart' , $item->id)}}" class="cart-btn"><i class="fas fa-shopping-cart"></i>{{__('private.AddToCart')}}</a>
                                    <p><strong>Categories: </strong>Fruits, Organic</p>
                                </div>
                                <h4>Share:</h4>
                                <ul class="product-share">
                                    <li><a href=""><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href=""><i class="fab fa-twitter"></i></a></li>
                                    <li><a href=""><i class="fab fa-google-plus-g"></i></a></li>
                                    <li><a href=""><i class="fab fa-linkedin"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
        <!-- end single product -->

        <!-- more products -->
        <div class="more-products mb-150">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2 text-center">
                        <div class="section-title">
                            <h3><span class="orange-text">Related</span> Products</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid, fuga quas itaque
                                eveniet beatae optio.</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @foreach ($currentCat as $item)
                        <div class="col-lg-4 col-md-6 text-center">
                            <div class="single-product-item">
                                <div class="product-image">
                                    <a href="{{ route('once-prod' , $item->id) }}"><img src="{{ url($item->imgPath) }}" style="min-height: 250px; max-height: 250px;"
                                            alt=""></a>
                                </div>
                                <h3>{{ $item->name }}</h3>
                                <p class="product-price">{{ $item->price }} $ </p>
                                {{-- <form action="" method="post"> --}}
                                    <a href="{{route('add-to.cart' , $item->id)}}" class="cart-btn"><i class="fas fa-shopping-cart"></i>{{__('private.AddToCart')}}</a>
                                {{-- </form> --}}
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <!-- end more products -->
    @endsection
@else
    @section('content')
        <div class="product-section mt-150 mb-150">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2 text-center">
                        <div class="section-title">
                            <h2><span>Oops</span><br> The Products Is Not Available Now!</h2>
                            <p>The Products Are Will Be Available Soon....</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
@endif
