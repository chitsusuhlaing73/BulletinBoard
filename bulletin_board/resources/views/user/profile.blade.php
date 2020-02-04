@extends('layouts.app')
<style>
.div {
    width: 100px;
    height: 100px;
    border: 1px solid grey;
}
</style>
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-10">
            <div class="card">
                <div class="card-header navbar">
                    <ul class="navbar-nav ">
                        <li class="nav-item">User Profile</li>
                    </ul>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="userupdate/{{ Auth::user()->id }}" class="nav-link">Edit</a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <form action="userupdate" method="get" class="clearfix">
                        @csrf
                        <div class="float-right col-sm-3">
                            <div class="div rounded-circle"><img class="rounded-circle" src="/image/{{ Auth::user()->profile }}" alt="image" name="file" width="95px" height="98px"></div>
                        </div>
                        <div class="float-left col-sm-9">
                            <div class="form-group row">
                            <label for="name" class="col-sm-4">Name</label>
                            <label for="name" class="col-sm-8">{{ Auth::user()->name }}</label>
                            </div>
                            <div class="form-group row">
                            <label for="email" class="col-sm-4">Email</label>
                            <label for="email" class="col-sm-8">{{ Auth::user()->email }}</label>
                            </div>
                            <div class="form-group row">
                            <label for="type" class="col-sm-4">Type</label>
                            <label for="type" class="col-sm-8">{{ Auth::user()->type }}</label>
                            </div>
                            <div class="form-group row">
                            <label for="phone" class="col-sm-4">Phone</label>
                            <label for="phone" class="col-sm-8">{{ Auth::user()->phone }}</label>
                            </div>
                            <div class="form-group row">
                            <label for="date" class="col-sm-4">Date Of Birth</label>
                            <label for="date" class="col-sm-8">{{ Auth::user()->dob }}</label>
                            </div>
                            <div class="form-group row">
                            <label for="address" class="col-sm-4">Address</label>
                            <label for="address" class="col-sm-8">{{ Auth::user()->address }}</label>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
