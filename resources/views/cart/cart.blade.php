@extends('layouts.master')

@section('title')
    Cart
@endsection

@if (session()->has('cart') && !empty(session('cart')))

@section('cart')
<a class="shopping-cart" href="{{ route('cart.show') }}">Cart
                                        <i class="fas fa-shopping-cart">
                                            <span
                                                style="width:20px; font-size:100%;color:#fff;margin-left:3px; background-color:#f28123; padding:7px;border-radius:7px;">
                                                {{ Cart::content()->count() }}</span></i></a>
@endsection

    @section('content')
        <!-- cart -->
        <h1 id="result_id" style="text-align: center; padding-top:20px;">{{__('private.Cart')}} <i class="fas fa-shopping-cart car"></i></h1>
        <style>
            .car {
                position: relative;
                left: 0;
                animation: moveCar 5s infinite linear;
            }

            @keyframes moveCar {
                0% {
                    left: -100px;
                }

                100% {
                    left: calc(100% - 24px);
                }
            }
        </style>


        <div class="cart-section mt-150 mb-150" >
            <div class="container" >
                <div class="row">
                    <div class="col-lg-8 col-md-12">
                        <div class="cart-table-wrap">
                            <table class="cart-table">
                                <thead class="cart-table-head">
                                    <tr class="table-head-row">
                                        <th class="product-remove"></th>
                                        <th class="product-image">Product Image</th>
                                        <th class="product-name">Name</th>
                                        <th class="product-price">Price</th>
                                        <th class="product-quantity">Quantity</th>
                                        <th class="product-total">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (Cart::count() > 0)
                                        @foreach (Cart::content() as $details)
                                            <tr class="table-body-row" >  {{--data-rowId="{{ $details->id }}"--}}
                                                <td class="product-remove"><a href="{{route('delete.item.cart' , $details->rowId)}}" class="delete-product"><i
                                                            class="far fa-window-close"></i></a>
                                                </td>
                                                <td class="product-image"><img src="{{asset($details->model->imgPath)}}"
                                                        alt=""></td>
                                                <td class="product-name">{{ $details->name }}</td>
                                                <td class="product-price">${{$price =  $details->price }}</td>

                                                <td class="product-quantity">
                                                    <input name="quantity" type="number" min="1" max="100" placeholder="1"
                                                        value="{{$qty =  $details->qty }}"
                                                        data-rowId="{{ $details->rowId }}" onchange="updateQuantity(this)">
                                                </td>

                                                <td class="product-total">${{ $details->total }}</td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="total-section">
                            <table class="total-table">
                                <thead class="total-table-head">
                                    <tr class="table-total-row">
                                        <th>Total</th>
                                        <th>Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="total-data">
                                        <td><strong>Subtotal: </strong></td>
                                        <td class="subtotal-value">$<?php echo Cart::total(); ?></td>
                                    </tr>

                                    <tr class="total-data">
                                        <td><strong>Shipping: </strong></td>
                                        <td class="shipping-value">${{ $shipping = 50 }}</td>
                                    </tr>

                                    <tr class="total-data">
                                        <td><strong>Total: </strong></td>
                                        <td class="total-value">$<?php echo Cart::total() + $shipping; ?></td>
                                    </tr>
                                </tbody>

                            </table>
                            <div class="cart-buttons">
                                <a href="{{route('clear.cart')}}" class="boxed-btn">Clear Cart</a>
                                {{-- <button id="update-cart-btn" class="boxed-btn">Update Cart</button> --}}
                                <a href="{{route('checkout.order')}}" class="boxed-btn black">Check Out</a>
                            </div>
                        </div>

                        <div class="coupon-section">
                            <h3>Apply Coupon</h3>
                            <div class="coupon-form-wrap">
                                <form action="index.html">
                                    <p><input type="text" placeholder="Coupon"></p>
                                    <p><input type="submit" value="Apply"></p>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end cart -->
        <form id="updateCartQty" action="{{ route('update.sopping.cart') }}" method="post">
            @csrf
            @method('PUT')
            <input type="hidden" id="rowId" name="rowId">
            <input type="hidden" id="quantity" name="quantity">
        </form>


        <script>
            document.addEventListener("DOMContentLoaded", function() {
                    var container = document.getElementById("result_id");
                    if (container) {
                        container.scrollIntoView({ behavior: 'smooth', block: 'start'});
                    }
                });
                </script>
    @endsection

    @section('scripts')
        <script type="text/javascript">
            function updateQuantity(qty){
                $('#rowId').val($(qty).data('rowid'));
                $('#quantity').val($(qty).val());
                $('#updateCartQty').submit();
            }
        </script>
    @endsection
@else
    @section('content')
        <div class="product-section mt-150 mb-150">
            <div class="container">
                <div class="row" id="result_id">
                    <div class="col-lg-8 offset-lg-2 text-center">
                        <img src="{{asset('assets/img/giphy.gif')}}" alt="">
                        <div class="section-title">
                            <h2><span>Oops</span><br> The Cart It Seems Empty !</h2>
                            <h4>Please Add Prducts To Your Cart....</h4>
                        </div>
                        <a class="btn-primary " href="{{ route('AllProducts') }}">Continue Shopping...</a>
                    </div>
                </div>
            </div>
        </div>

        <script>
            document.addEventListener("DOMContentLoaded", function() {
                    var container = document.getElementById("result_id");
                    if (container) {
                        container.scrollIntoView({ behavior: 'smooth', block: 'start'});
                    }
                });
                </script>
    @endsection
@endif

{{-- d --}}
