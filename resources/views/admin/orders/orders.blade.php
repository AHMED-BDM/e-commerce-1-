@extends('admin.layouts.master')

@section('title')
Orders | Admin Panel
@endsection



@section('content')
<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 text-center mb-5">
                <h2 class="heading-section">Orders Table</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="table-wrap">
                    <table class="table table-striped">
                        @if ( $all_orders->isNotEmpty() )
                      <thead>
                        <tr>
                          <th>Order Id</th>
                          <th>User Id</th>
                          <th>Customer</th>
                          <th>Address</th>
                          <th>subtotal</th>
                          <th>shipping</th>
                          <th>total_amount</th>
                          <th>Order Status</th>
                          <th>Order Details</th>
                          <th>Customer Details</th>
                          <th>Created At</th>
                          <th>Updated At</th>
                        </tr>
                      </thead>
                      <tbody>
                          @foreach ($all_orders as $id => $details)
                        <tr>
                          <th scope="row">{{$details->id}}</th>
                          <td>{{$details->user_id}}</td>
                          <td>{{$details->order_owen}}</td>
                          <td>{{$details->address}}</td>
                          <td>${{$details->subtotal}}</td>
                          <td>${{$details->shipping}}</td>
                          <td>${{$details->total_amount}}</td>
                          @if ($details->order_status == false)
                          <td>
                            <a href="#" class="btn btn-danger">Not Dlivered Yet</a>
                          </td>
                          @elseif ($details->order_status == true)
                          <td>
                            <a href="#" class="btn btn-success">Delivered</a>
                        </td>
                          @elseif ($details->order_status == 2)
                          <td>
                            <a href="#" class="btn btn-warning">Shipping</a>
                        </td>
                        @endif
                        <td><a class="order_details" href="{{route('order.details' , $details->id)}}">Order Details</a></td>
                        <td><a class="customer_details" href="{{route('customer.details' , $details->id)}}">Customer Details</a></td>
                          <td>{{$details->created_at}}</td>
                          <td>{{$details->updated_at}}</td>
                        </tr>
                        @endforeach
                        @elseif (!$all_orders->isNotEmpty())
                        <h1 style="text-align: center;color:red;">No Orders Has Been Ordered Yet...</h1>

                    </tbody>
                    @endif
                </table>
            </div>
            </div>
        </div>
    </div>
</section>
@endsection

