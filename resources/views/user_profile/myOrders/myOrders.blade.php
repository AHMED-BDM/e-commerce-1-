@extends('layouts.app')


@section('content')

    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center mb-5">
                    <h2 class="heading-section">{{__('private.myOrders')}}</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="table-wrap">
                        <table class="table table-striped">
                            @if ($order->isNotEmpty())
                                <thead>
                                    <tr>
                                        <th>{{__('private.Customer')}}</th>
                                        <th>{{__('private.Address')}}</th>
                                        <th>{{__('private.subtotal')}}</th>
                                        <th>{{__('private.shipping')}}</th>
                                        <th>{{__('private.total_amount')}}</th>
                                        <th>{{__('private.OrderStatus')}}</th>
                                        <th>{{__('private.orderDetails')}}</th>
                                        <th>{{__('private.CreatedAt')}}</th>
                                        <th>{{__('private.UpdatedAt')}}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($order as $id => $details)
                                        <tr>

                                            </td>
                                            <td>{{ $details->order_owen }}
                                            </td>
                                            <td>{{ $details->address }}
                                            </td>
                                            <td>${{ $details->subtotal }}
                                            </td>
                                            <td>${{ $details->shipping }}
                                            </td>
                                            <td>${{ $details->total_amount }}
                                            </td>
                                            @if ($details->order_status == 0)
                                                <td>
                                                    <a href="#" class="btn btn-danger disabled" style="background-color: rgb(240, 22, 22)">{{__('private.NotDliveredYet')}}</a>
                                                </td>
                                            @elseif($details->order_status == 1)
                                                <td>
                                                    <a href="#" class="btn btn-success disabled" style="background-color: rgb(38, 225, 38)">{{__('private.Delivered')}}</a>
                                                </td>
                                            @elseif($details->order_status == 2)
                                                <td>
                                                    <a href="#" class="btn btn-warning disabled" style="background-color: rgb(239, 255, 20)">{{__('private.Shipping')}}</a>
                                                </td>
                                            @endif
                                            <td><a class="btn btn-info"
                                                    href="{{ route('my.order.details', $details->id) }}">{{__('private.orderDetails')}}</a></td>
                                            <td>{{ $details->created_at }}
                                            </td>
                                            <td>{{ $details->updated_at }}
                                            </td>
                                        </tr>
                                    @endforeach
                                @elseif (!$order->isNotEmpty())
                                <h1 style="text-align: center;color:red;">
                                    <img src="{{asset('assets/img/giphy.gif')}}" alt="">
                                        {{__('private.NoOrdersYouHave')}}
                                    </h1>

                                </tbody>
                            @endif
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
