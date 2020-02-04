@extends('layouts.app')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.js"></script>
@section('content')
<div class="c">
    <div class="row justify-content-center">
        <div class="col-sm-8">
            <div class="card">
                <div class="card-header">Update Post</div>

                <div class="card-body">
                    <form method="post" action="/updateconfirm">
                        @csrf 
                        <div class="form-group row">
                            <label for="title" class="col-sm-4 col-form-label text-md-left">Title</label>
                            <div class="col-sm-6 d-flex">
                                <input type="text" id="title" class="form-control" name="title" value = "{{$post->title}}" required>
                                <label for="title" style="color:red;padding-left:5px;">*</label>
                                <small class="text-danger">{{ $errors->first('title') }}</small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="description" class="col-sm-4 col-form-label text-md-left">Description</label>
                            <div class="col-sm-6 d-flex">
                                <textarea id="description" class="form-control" name="description" required>{{$post->description}}</textarea>
                                <label for="description" style="color:red;padding-left:5px;">*</label>
                                <small class="text-danger">{{ $errors->first('description') }}</small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="status" class="col-sm-4 col-form-label text-md-left">Status</label>
                            <div class="col-sm-6">
                                <label class="switch">
                                <input value="{{$post->status}}" name="status" data-id="{{$post->id}}" class="bg-danger js-switch" type="checkbox" data-onstyle="Active" 
                                data-offstyle="danger" data-toggle="toggle" data-on="Active" 
                                data-off="InActive" {{ $post->status == '1' ? 'checked' : '0' }}>
                                    <span class="slider round bg-info"></span>
                                </label>
                            </div>
                        </div>
                        <input type="hidden" name="id" value = "{{$post->id}}">
                        <div class="form-group row" style="display:flex;list-style:none;">
                            <button type="submit" class="col-form-label btn btn-primary" style="margin-left:auto;border-radius:5px;border:1px solid #d1cfc8;">Confirm</button>
                            <button type="reset" class="col-form-label" style="margin-left:20px;margin-right:auto;border-radius:5px;width:65px;border:1px solid #d1cfc8;">{{ __('Clear') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
let elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));
elems.forEach(function(html) {
    let switchery = new Switchery(html,  { size: 'medium' });
});
</script>

@endsection

