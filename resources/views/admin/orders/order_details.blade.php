@extends('admin.layouts.master')

@section('title')
More details | Admin Panel
@endsection



@section('content')
<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 text-center mb-5">
                <h2 class="heading-section">Details Of Order</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="table-wrap">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>Id</th>
                          <th>Order Id</th>
                          <th>Product Image</th>
                          <th>Product Name</th>
                          <th>Product Price</th>
                          <th>Product Qty</th>
                          <th>subtotal</th>
                          <th>Created At</th>
                          <th>Updated At</th>
                        </tr>
                      </thead>
                      <tbody>
                          @if ( $order_details->isNotEmpty() )
                          @foreach ($order_details as $details)
                        <tr>
                          <th scope="row">{{$details->id}}</th>
                          <td>{{$details->order_id}}</td>
                          <td class="product-image"><img src="{{ asset($details->imgPath) }}"
                            alt=""></td>
                          <td>{{$details->name}}</td>
                          <td>${{$details->price}}</td>
                          <td>{{$details->qty}}</td>
                          <td>${{$details->price * $details->qty}}</td>
                          <td>{{$details->created_at}}</td>
                          <td>{{$details->updated_at}}</td>
                        </tr>
                        @endforeach
                        @endif

                      </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
{{--  --}}
