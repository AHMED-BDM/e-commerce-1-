@extends('layouts.app')


@section('content')
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-sm-12">
                    <a class="btn btn-info "
                        href="{{ route('my.orders') }}">{{__('private.myOrders')}}</a>
                </div>
                <div class="col-md-6 text-center mb-5">
                    <h2 class="heading-section">{{__('private.orderDetails')}}</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="table-wrap">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>{{__('private.ProductName')}}</th>
                                    <th>{{__('private.ProductImage')}}</th>
                                    <th>{{__('private.ProductPrice')}}</th>
                                    <th>{{__('private.ProductQty')}}</th>
                                    <th>{{__('private.ProductSubtotal')}}</th>
                                    <th>{{__('private.CreatedAt')}}</th>
                                    <th>{{__('private.UpdatedAt')}}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($order_details->isNotEmpty())
                                    @foreach ($order_details as $details)
                                        <tr>
                                            <td>{{ $details->name }}</td>
                                            <td class="product-image"><img src="{{ asset($details->imgPath) }}"
                                                    alt=""></td>
                                            <td>${{$price= $details->price }}</td>
                                            <td>{{ $details->qty }}</td>
                                            <td>${{ $details->subtotal }}</td>
                                            <td>{{ $details->created_at }}</td>
                                            <td>{{ $details->updated_at }}</td>
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
