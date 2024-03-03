@extends('admin.layouts.master')

@section('title')
Customer details | Admin Panel
@endsection



@section('content')
<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 text-center mb-5">
                <h2 class="heading-section">Details Of Customer</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="table-wrap">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>User Id</th>
                          <th>Order Id</th>
                          <th>User Image</th>
                          <th>User Name</th>
                          <th>User Email</th>
                          <th>User Phone</th>
                          <th>Order Address</th>
                          <th>User Comment</th>
                          <th>Created At</th>
                          <th>Updated At</th>
                        </tr>
                      </thead>
                      <tbody>
                          @if ( $customer_details->isNotEmpty() )
                          @foreach ($customer_details as $details)
                        <tr>
                            <th scope="row">{{$details->user_id}}</th>
                            <td>{{$details->order_id}}</td>
                          <td class="product-image"><img src="#"
                            alt=""></td>
                          <td>{{$details->name}}</td>
                          <td>{{$details->email}}</td>
                          <td>{{$details->phone}}</td>
                          <td>{{$details->address}}</td>
                          <td>{{$details->comment}}</td>
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
