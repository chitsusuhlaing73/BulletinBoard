@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-8">
            <div class="card">
                <div class="card-header">Change Password</div>
                <div class="card-body">
                    <form action="/changed" method="post">
                        @csrf 
                        @foreach ($errors->all() as $error)
                            <p class="text-danger">{{ $error }}</p>
                        @endforeach 
                        <div class="form-group row">
                        <label for="password" class="col-sm-5">Old password</label>
                        <input type="password" name="password" class="col-sm-5">
                        </div>
                        <div class="form-group row">
                        <label for="password" class="col-sm-5">New Password</label>
                        <input type="password" class="col-sm-5" name="new_password">
                        </div>
                        <div class="form-group row">
                        <label for="password" class="col-sm-5">Confirm New Password</label>
                        <input type="password" class="col-sm-5" name="confirm_new_password">
                        </div>
                        <input type="hidden" name="id" value = "{{Auth::user()->id}}">
                        <div class="form-group row">
                        <button type="submit" class="btn btn-primary col-sm-2" style="margin-left:10px;">Change</button><br>
                        <button type="reset" class="btn btn-outline-primary col-md-2" style="margin-left:10px;">Clear</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
