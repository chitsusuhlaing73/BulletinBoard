@extends('layouts.app')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
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
                <div class="card-header">Update User</div>

                <div class="card-body">
                    <form method="post" action="/userupconfirm" enctype="multipart/form-data">
                        @csrf 
                        <div class="clearfix">
                            <div class="float-right col-lg-3 col-sm-3">
                            <div class="file">
                            <img src="/image/{{Auth::user()->profile}}" alt="image" name="file" width="95px" height="102px">
                                <input type="hidden" name="file" value="">
                            </div>
                            </div>
                            <div class="float-left col-lg-9 col-sm-9">
                                <div class="form-group row">
                                <label for="name" class="col-sm-4">Name</label>
                                <input type="text" class="col-sm-4" name="name" id="name" value="{{ Auth::user()->name }}" >
                                </div>
                                <div class="form-group row">
                                <label for="email" class="col-sm-4">Email</label>
                                <label for="email" class="col-sm-4">{{ Auth::user()->email }}</label>
                                <input type="hidden" id="email" name="email" value="{{ Auth::user()->email }}" >
                                </div>
                                <div class="form-group row">
                                <label for="type" class="col-sm-4">Type</label>
                                <select name="type" class="col-sm-4" id="type">
                                    <option value="1"  {{ old('type') == 1 ? 'selected' : '' }}>User</option>
                                    <option value="0"  {{ old('type') == 0 ? 'selected' : '' }}>Admin</option>
                                </select>
                                </div>
                                <div class="form-group row">
                                <label for="phone" class="col-sm-4">Phone</label>
                                <input type="text" id="phone" name="phone" value="{{ Auth::user()->phone }}" class="col-sm-4">
                                </div>
                                <div class="form-group row">
                                <label for="date" class="col-sm-4">Date Of Birth</label>
                                <input type="date" id="dob" name="dob" value="{{ Auth::user()->dob }}" class="col-sm-4">
                                </div>
                                <div class="form-group row">
                                <label for="address" class="col-sm-4">Address</label>
                                <textarea id="address" name="address" class="col-sm-4">{{ Auth::user()->address }}</textarea>
                                </div>
                                <div class="form-group row">
                                <label for="profile" class="col-sm-4">Profile</label>
                                <input type="file" name="file" id="files" class="col-sm-4" accept="image/*" onchange="readURL(this);" value="{{ old('file') }}">
                                <small class="text-danger"> {{ $errors->first('file') }} </small>
                                <label for="type" style="color:red;">*</label>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-4"></div>
                                    <div class="div">
                                        <div id="pre"></div>
                                    </div>
                                </div>
                                <br>
                                <div class="form-group row">
                                    <a href="/change_password" class="col-sm-4">Change Password</a>
                                </div>
                            </div>
                        </div>
                        <br><br>
                        <input type="hidden" name="id" value = "{{Auth::user()->id}}">
                        <div class="form-group row">
                        <button type="submit" class="btn btn-primary col-sm-2" style="margin-left:10px;">Confirm</button><br>
                        <input type="reset" id="reset" class="btn btn-outline-primary col-sm-2" style="margin-left:10px;" value="Clear" id="reset"></input>
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
            $('#pre + img').remove();
            $('#pre').after('<img src="' + e.target.result + '"width="102" height="100"/>');
        };
        reader.readAsDataURL(input.files[0]);
    };
};
$("#files").change(function() {
    filePreview(this);
});
$("#reset").click(function() {
    $('#pre + img').remove();
});
</script>
@endsection

