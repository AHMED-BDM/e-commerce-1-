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
                    <div class="card-header">{{ __('Profile') }}</div>
                    <a class="btn-secondary" href="{{ route('show.profile.create') }}">Create Profile</a>
                    <a class="btn-secondary" href="{{ route('show.profile' , auth()->user()->id) }}">Profile</a>
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
                        <a class="btn-secondary" href="{{ route('sh_cat') }}">Home</a>

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
