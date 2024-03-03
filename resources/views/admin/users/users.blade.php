@extends('admin.layouts.master')

@section('title')
Users | Admin Panel
@endsection



@section('content')
<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 text-center mb-5">
                <h2 class="heading-section">Users Table</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="table-wrap">
                    <table class="table table-striped">
                        @if ( $all_users->isNotEmpty() )
                      <thead>
                        <tr>
                          <th>User Id</th>
                          <th>User Name</th>
                          <th>User Email</th>
                          <th>Is Admin ?</th>
                          <th>User Password</th>
                          <th>Created At</th>
                          <th>Updated At</th>
                        </tr>
                      </thead>
                      <tbody>
                          @foreach ($all_users as $id => $details)
                        <tr>
                          <th scope="row">{{$details->id}}</th>
                          <td>{{$details->name}}</td>
                          <td>{{$details->email}}</td>
                          <td>{{$details->is_admin}}</td>
                          <td>{{$details->password}}</td>
                          <td>{{$details->created_at}}</td>
                          <td>{{$details->updated_at}}</td>
                        </tr>
                        @endforeach
                        @elseif (!$all_orders->isNotEmpty())
                        <h1 style="text-align: center;color:red;">No Users Have Registered Yet...</h1>
                    </tbody>
                    @endif
                </table>
            </div>
            </div>
        </div>
    </div>
</section>
@endsection

