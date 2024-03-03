@extends('layouts.master')

@section('title')
Home
@endsection

@section('content')
<!-- product section -->
<div class="product-section mt-150 mb-150">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="section-title">
                    <h3><span class="orange-text">{{__('private.categoriesSite1')}}</span> {{__('private.categoriesSite2')}}</h3>
                    <p>{{__('private.ThePleasureOfShoppingThroughOurBranches')}}</p>
                </div>
            </div>
        </div>

        <div class="row">
    @foreach ($result as $item)
    <div class="col-lg-4 col-md-6 text-center">
        <div class="single-product-item">
            <div class="product-image">
                    <a href="{{ route('show_prod', $item->id) }}">
                        <img src="{{ url($item->imgPath) }}" style="max-height: 250px !important; min-height: 250px !important;" alt="">
                    </a>
            </div>
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="section-title">
                        <h3><span class="orange-text">{{$item->name}}</span> </h3>
                </div>
            </div>
            <p>{{$item->description}}</p>
        </div>
    </div>
    @endforeach
        </div>
    </div>
</div>
<!-- end product section -->
@endsection



