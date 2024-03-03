@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="main-body">
            <div class="row">

                <div class="col-sm-12">
                    <a class="btn btn-info "
                        href="{{ route('show.profile') }}">{{__('private.myAccount')}}</a>
                </div><br><br>
                {{-- edit form --}}
                <form action="{{route('update.profile' , $edit_profile->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-body">
                                <div class="row mb-3">
                                <h1 style="text-align: center; color:deepskyblue">{{__('private.EditProfile')}}</h1>
                                <div class="col-sm-3">
                                    <h6 class="mb-0">{{__('private.FullName')}}</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" class="form-control" name="full_name" value="{{ $edit_profile->full_name }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">{{__('private.Email')}}</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" class="form-control" name="email" value="{{ $edit_profile->email }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">{{__('private.Phone')}}</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" class="form-control" name="phone" value="{{ $edit_profile->phone }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">{{__('private.Address')}}</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" class="form-control" name="address" value="{{ $edit_profile->address }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">{{__('private.Photo')}}</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input class="form-control" type="file" name="image" id="image" value="{{ $edit_profile->image }}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3"></div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="submit" class="btn btn-primary px-4" value="{{__('private.SaveChanges')}}">
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
