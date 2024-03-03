{{-- admin Products view --}}
@extends('admin.admin-master')

@section('title')
Products
@endsection

{{-- view success message if data entry was done --}}
@if (session('success'))
    @extends('admin.layouts.flout-window')
    @section('message')
        {{ session('success') }}
    @endsection
@endif

@if ($result2->isNotEmpty())
    @section('content')
        <div class="product-section mt-150 mb-150">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2 text-center">
                        <div class="section-title">
                            @if ($currentCatId)
                                <h3>قسم<span class="orange-text"> {{ $currentCatId->name }}</span> </h3>
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
                                <p>{{ $item->quantity }} pices</p>
                                <h4>{{ $item->description }}</h4>


                                <div class="dix">
                                    <form action="{{ route('delete-product', $item->id) }}" method="post">
                                        @csrf
                                        <a class="btn-edit" href="{{ route('edit-product', $item->id) }}">Edit</a>
                                        <button class="btn-delete" type="submit">Delete</button>
                                    </form>
                                </div>

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
                        <h2><span>Oops</span><br> The Category Is Seems Empty !</h2>
                        <p>Please Add Products To This Category....</p>
                    </div>
                </div>
            </div>
            </div>
        </div>
        @endsection

@endif
