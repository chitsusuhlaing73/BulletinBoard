@extends('layouts.app')
<style>
.div {
    width: 105px;
    height: 105px;
    border: 1px solid grey;
}
</style>
@section('content')
<div class="c">
    <div class="row justify-content-center">
        <div class="col-lg-7 col-sm-11">
            <div class="card">
                <div class="card-header">Create User Confirmation</div>

                <div class="card-body">
                    <form method="post" action="/storeUser" enctype="multipart/form-data">
                        @csrf 
                        <div class="clearfix">
                            <div class="float-right col-lg-3 col-sm-3">
                            <div class="div rounded-circle" name="file">
                                <img class="rounded-circle" src="/image/{{ $user->file }}" alt="image" width="100" heigth="100"> 
                                <input type="hidden" name="file" value="{{$user->file}}">
                            </div>
                            </div>
                            <div class="float-left col-lg-9 col-sm-9">
                                <div class="form-group row">
                                <label for="name" class="col-sm-4">Name</label>
                                <label for="name" class="col-sm-4">{{ $user->name }}</label>
                                <input type="hidden" class="col-sm-4" name="name" id="name" value="{{ $user->name }}" >
                                </div>
                                <div class="form-group row">
                                <label for="email" class="col-sm-4">Email</label>
                                <label for="email" class="col-sm-4">{{ $user->email }}</label>
                                <input type="hidden" id="email" name="email" value="{{ $user->email }}" >
                                </div>
                                <div class="form-group row">
                                <label for="password" class="col-sm-4">Password</label>
                                <label for="password" class="col-sm-4">{{ $user->password }}</label>
                                <input type="hidden" id="password" name="password" value="{{ $user->password }}" >
                                </div>
                                <div class="form-group row">
                                <label for="type" class="col-sm-4">Type</label>
                                <label for="type" class="col-sm-4">{{ $user->type }}</label>
                                <input type="hidden" id="type" name="type" value="{{ $user->type }}" >
                                </div>
                                <div class="form-group row">
                                <label for="phone" class="col-sm-4">Phone</label>
                                <label for="phone" class="col-sm-4">{{ $user->phone }}</label>
                                <input type="hidden" id="phone" name="phone" value="{{ $user->phone }}" >
                                </div>
                                <div class="form-group row">
                                <label for="date" class="col-sm-4">Date Of Birth</label>
                                <label for="date" class="col-sm-4">{{ $user->dob }}</label>
                                <input type="hidden" id="dob" name="dob" value="{{ $user->dob }}" >
                                </div>
                                <div class="form-group row">
                                <label for="address" class="col-sm-4">Address</label>
                                <label for="address" class="col-sm-4">{{ $user->address }}</label>
                                <input type="hidden" id="address" name="address" value="{{ $user->address }}" >
                                </div>
                            </div>
                        </div>
                        <br><br>
                        <div class="form-group row">
                        <button type="submit" class="btn btn-primary col-sm-2" style="margin-left:10px;">Create</button><br>
                        <a href="usercreate" class="btn btn-outline-primary col-sm-2" style="margin-left:10px;" id="reset">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

