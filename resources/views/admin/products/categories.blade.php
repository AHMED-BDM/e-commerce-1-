@extends('admin.admin-master')

@section('title')
Categories
@endsection

@if (session('success'))
    @extends('admin.layouts.flout-window')
    @section('message')
        {{ session('success') }}
    @endsection
@endif

@if ($result->isNotEmpty())
    @section('content')
        <!-- product section -->
        <div class="product-section mt-150 mb-150">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2 text-center">
                        <div class="section-title">
                            <h3><span class="orange-text">اقسام</span> الموقع</h3>
                            <p>متعة التسوق عبر فروعنا</p>
                        </div>
                    </div>
                </div>

                <div class="row">
                    @foreach ($result as $item)
                        <div class="col-lg-4 col-md-6 text-center">
                            <div class="single-product-item">
                                <div class="product-image">
                                    <a href="{{ route('admin_products', $item->id) }}">
                                        <img src="{{ url($item->imgPath) }}"
                                            style="max-height: 250px !important; min-height: 250px !important;"
                                            alt="">
                                    </a>

                                </div>
                                <div class="col-lg-8 offset-lg-2 text-center">
                                    <div class="section-title">
                                        <h3><span class="orange-text">{{ $item->name }}</span> </h3>
                                    </div>
                                    <p>{{ $item->description }}</p>
                                </div>
                                <div class="dix">
                                    <form action="{{ route('delete-category', $item->id) }}" method="post">
                                        <a class="btn-edit" href="{{ route('edit-category', $item->id) }}">Edit</a>
                                        @csrf
                                        <button class="btn-delete" type="submit">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <!-- end product section -->
    @endsection
@else
    @section('content')
        <div class="product-section mt-150 mb-150">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2 text-center">
                        <div class="section-title">
                            <h2><span>Oops</span><br> No Added Categories !</h2>
                            <p>Please Add Categories....</p><br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection

@endif
