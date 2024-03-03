@extends('layouts.app')


@section('content')
<div class="container">
    <div class="main-body">
        <div class="row">

            {{-- edit form --}}
            <form action="{{route('create.profile')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="row mb-3">
                                    <h1 style="text-align: center; color:deepskyblue">Create Profile</h1>
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Full Name</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" class="form-control" name="full_name" required>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Email</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" class="form-control" name="email" required>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Phone</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" class="form-control" name="phone">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Address</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" class="form-control" name="address">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Photo</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input class="form-control" type="file" name="image" id="image">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-3"></div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="submit" class="btn btn-primary px-4" value="Save">
                                    </div>
                                </div>
                            </div>
                        </div>
                </form>
                {{-- end edit form --}}

            </div>
        </div>
    </div>
    </div>
@endsection
