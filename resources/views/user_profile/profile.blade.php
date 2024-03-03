@extends('layouts.app')

@if (session('success'))
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
@endif

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('private.myAccount') }}</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                Hi
                            </div>
                        @endif
                        @if (session('error'))
                            <div class="alert alert-success" role="alert">
                                <p class="me">
                                    {{ session('error') }}
                                    {{ Auth::user()->name }}
                                </p>
                            </div>
                        @endif


                        {{-- #################### profil ################### --}}
                        {{-- ##################################################################### --}}


                        <div class="container">
                            <div class="main-body">

                                <!-- Breadcrumb -->
                                <nav aria-label="breadcrumb" class="main-breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a class="btn btn-info"
                                                href="{{ route('sh_cat') }}">{{__('private.Home')}}</a></li>
                                                <li><div class="col-sm-12">
                                                    <a class="btn btn-info "
                                                        href="{{ route('my.orders') }}">{{__('private.myOrders')}}</a>
                                                </div></li>
                                        {{-- <li class="breadcrumb-item"><a href="javascript:void(0)">User</a></li> --}}
                                        {{-- <li class="breadcrumb-item active" aria-current="page">User Profile</li> --}}
                                    </ol>
                                </nav>
                                <!-- /Breadcrumb -->

                                <div class="row gutters-sm">
                                    <div class="col-md-4 mb-3">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="d-flex flex-column align-items-center text-center">
                                                    @foreach ($profile as $item)
                                                        <img src="{{ asset($item->image) }}" alt="Admin"
                                                            class="rounded-circle" width="200" height="200">
                                                        <div class="mt-3">
                                                            <h4>{{ $item->full_name }}</h4>
                                                    @endforeach
                                                    <p class="text-secondary mb-1">Back-End Developer [Laravel , NodeJs]</p>
                                                    <p class="text-muted font-size-sm">Egypt , Sohag</p>
                                                    <button class="btn btn-primary">Follow</button>
                                                    <button class="btn btn-outline-primary">Message</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-8">
                                    <div class="card mb-3">
                                        <div class="card-body">
                                            @foreach ($profile as $item)
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <h6 class="mb-0">User Id</h6>
                                                    </div>
                                                    <div class="col-sm-9 text-secondary">
                                                        {{ $item->user_id }}
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <h6 class="mb-0">{{__('private.FullName')}}</h6>
                                                    </div>
                                                    <div class="col-sm-9 text-secondary">
                                                        {{ $item->full_name }}
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <h6 class="mb-0">{{__('private.Email')}}</h6>
                                                    </div>
                                                    <div class="col-sm-9 text-secondary">
                                                        {{ $item->email }}
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <h6 class="mb-0">{{__('private.Phone')}}</h6>
                                                    </div>
                                                    <div class="col-sm-9 text-secondary">
                                                        {{ $item->phone }}
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <h6 class="mb-0">{{__('private.Address')}}</h6>
                                                    </div>
                                                    <div class="col-sm-9 text-secondary">
                                                        {{ $item->address }}
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <a class="btn btn-info "
                                                            href="{{ route('edit.profile', $item->id) }}">{{__('private.Edit')}}</a>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    @if (auth()->user()->is_admin == 1)
                        <p class="p">.If you want to go to the Admin Panel..<span class="spa">--></span></p>
                        <a class="dashboard" href="{{ route('admin') }}">
                            Admin Dashboard
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
    </div>



    <style>
        .dashboard {
            text-decoration: none;
            padding: 15px;
            margin: 8px;
            background-color: #198754;
            border-radius: 10px;
            color: rgb(0, 0, 0);
            font-size: 16px;
            font-weight: bold;
        }

        .dashboard:hover {
            background-color: #30dd8c;
            color: rgb(0, 0, 0);

        }

        .p {
            display: initial;
            color: rgb(18, 12, 137);
            font-size: 16px;
            font-weight: bold;
        }

        .me {
            font-size: 16px;
            font-weight: bold;
        }

        .spa {
            display: inline;
            font-size: 20px;
            font-weight: bold;
            color: red;
        }


        .btn-secondary {
            text-decoration: none;
            padding: 0.5rem 1rem;
            font-size: 1rem;
            font-weight: 900;
            color: #f28123;
            background-color: #051922;
            border: 1px solid #ffffff;
            border-radius: 0.375rem;
            transition: background-color 0.2s ease, border-color 0.2s ease, color 0.2s ease;
        }

        .btn-secondary:hover {
            background-color: #0a3041;
        }

        .btn-secondary:focus {
            outline: none;
            box-shadow: 0 0 0 3px rgba(255, 255, 255, 0.5);
        }
    </style>
@endsection
