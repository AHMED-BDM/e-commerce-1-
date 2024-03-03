{{-- users Products view --}}
@extends('admin.admin-master')
@section('title')
    @foreach ($result2 as $item)
        {{ $item->name }}
    @endforeach
@endsection

@if ($result->isNotEmpty())
    @section('content')
        <div class="product-section mt-150 mb-150">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2 text-center">
                        <div class="section-title">
                            @if ($categoryName)
                                <h3>قسم<span class="orange-text"> {{ $categoryName }}</span> </h3>
                            @else
                                <h3>قسم<span class="orange-text"> غير معروف</span> </h3>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="row">
                    @foreach ($result2 as $item)
                        <div class="col-lg-4 col-md-6 text-center">
                            <div class="single-product-item">
                                <div class="product-image">
                                    <a href="#"><img src="{{ url($item->imgPath) }}"
                                            style="max-height:250px !important;min-height:250px !important;"
                                            alt=""></a>
                                </div>
                                <div class="col-lg-8 offset-lg-2 text-center">
                                    <div class="section-title">
                                        <h3><span class="orange-text">{{ $item->name }}</span> </h3>
                                    </div>
                                </div>

                                <p class="product-price">{{ $item->price }} $</p>
                                <a href="cart.html" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
                                <p>{{ $item->quantity }} pices</p>
                                <h4>{{ $item->description }}</h4>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
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
