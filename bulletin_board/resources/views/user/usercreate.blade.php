@extends('layouts.app')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<style>
.div {
    width: 202px;
    height: 202px;
    border: 1px solid grey;
}
</style>
@section('content')
<div class="c">
    <div class="row justify-content-center">
        <div class="col-sm-8">
            <div class="card">
                <div class="card-header">Create User</div>

                <div class="card-body">
                    <form method="post" action="userconfirm" enctype="multipart/form-data">
                        @csrf 
                        <div class="form-group row">
                        <label for="name" class="col-sm-3">Name</label>
                        <input type="text" class="col-sm-4" name="name" id="name" value="{{ old('name') }}">
                        <label for="name" style="color:red;">*</label>
                        <small class="text-danger"> {{ $errors->first('name') }} </small>
                        </div>
                        <div class="form-group row">
                        <label for="email" class="col-sm-3">Email</label>
                        <input type="text" class="col-sm-4" name="email" id="email" value="{{ old('email') }}">
                        <label for="email" style="color:red;">*</label>
                        <small class="text-danger"> {{ $errors->first('email') }} </small>
                        </div>
                        <div class="form-group row">
                        <label for="password" class="col-sm-3">Password</label>
                        <input type="password" class="col-sm-4" name="password" id="password" value="{{ old('password') }}">
                        <label for="password" style="color:red;">*</label>
                        <small class="text-danger">{{ $errors->first('password') }}</small>
                        </div>
                        <div class="form-group row">
                        <label for="password" class="col-sm-3">Confirm Password</label>
                        <input type="password" class="col-sm-4" name="confirm_password" id="conPassword" value="{{ old('password') }}">
                        <label for="password" style="color:red;">*</label>
                        </div>
                        <div class="form-group row">
                        <label for="type" class="col-sm-3">Type</label>
                        <select name="type" class="col-sm-4" id="type">
                        <option value="1"  {{ old('type') == 1 ? 'selected' : '' }}>User</option>
                        <option value="0"  {{ old('type') == 0 ? 'selected' : '' }}>Admin</option>
                        </select>
                        <label for="type" style="color:red;">*</label>
                        </div>
                        <div class="form-group row">
                        <label for="phone" class="col-sm-3">Phone</label>
                        <input type="text" class="col-sm-4" name="phone" id="phone" value="{{ old('phone') }}">
                        </div>
                        <div class="form-group row">
                        <label for="date" class="col-sm-3">Date Of Birth</label>
                        <input type="date" class="col-sm-4" name="dob" id="date" value="{{ old('date') }}">
                        </div>
                        <div class="form-group row">
                        <label for="address" class="col-sm-3">Address</label>
                        <textarea name="address" id="address" class="col-sm-4" rows="3">{{ old('address') }}</textarea>
                        </div>
                        <div class="form-group row">
                        <label for="profile" class="col-sm-3">Profile</label>
                        <input type="file" name="file" id="file" class="col-sm-4" accept="image/*" onchange="readURL(this);" value="{{ old('file') }}">
                        <small class="text-danger"> {{ $errors->first('file') }} </small>
                        <label for="type" style="color:red;">*</label>
                        </div>
                        <div class="form-group row">
                        <div class="col-sm-3"></div>
                        <div class="div">
                        <div id="preview"></div>
                        </div>
                        </div>
                        <div class="form-group row">
                        <button type="submit" class="btn btn-primary col-sm-3" style="margin-left:10px;">Confirm</button><br>
                        <button type="reset" class="btn btn-outline-primary col-sm-3" style="margin-left:10px;" id="reset">Clear</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
function filePreview(input) {
    if(input.files && input.files[0]){
        var reader = new FileReader();
        reader.onload = function (e){
            $('#preview + img').remove();
            $('#preview').after('<img src="' + e.target.result + '"width="200" height="200"/>');
        };
        reader.readAsDataURL(input.files[0]);
    };
};
$("#file").change(function() {
    filePreview(this);
});
$("#reset").click(function() {
    $('#preview + img').remove();
});
</script>
@endsection

