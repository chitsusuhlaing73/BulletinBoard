@extends('layouts.app')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.js"></script>
@section('content')
<div class="c">
    <div class="row justify-content-center">
        <div class="col-sm-8">
            <div class="card">
                <div class="card-header">Update Post Confirmation</div>

                <div class="card-body">
                    <form method="post" action="/update">
                        @csrf 
                        <div class="form-group row">
                            <label for="title" class="col-sm-4 col-form-label text-md-left">Title</label>
                            <label for="title" name="title">{{ $post->title }}</label>
                            <input type="hidden" id="title" class="form-control col-sm-6" name="title" value="{{ $post->title }}">
                        </div>
                        <div class="form-group row">
                            <label for="description" class="col-sm-4 col-form-label text-md-left">Description</label>
                            <label for="description">{{$post->description}}</label>
                            <input type="hidden" id="title" class="form-control col-sm-6" name="description" value="{{$post->description}}">
                        </div>
                        <div class="form-group row">
                            <label for="status" class="col-sm-4 col-form-label text-md-left">Status</label>
                            <div class="col-sm-6">
                                <label class="switch">
                                <input value="1" name="status" data-id="{{$post->id}}" class="bg-danger js-switch" type="checkbox" data-onstyle="Active" 
                                data-offstyle="danger" data-toggle="toggle" data-on="Active" 
                                data-off="InActive" {{ $post->status == '1' ? 'checked' : '0' }}>
                                    <span class="slider round bg-info"></span>
                                </label>
                            </div>
                        </div>
                        <input type="hidden" name="id" value = "{{$post->id}}">
                        <div class="form-group row" style="display:flex;list-style:none;">
                            <button type="submit" class="col-form-label btn btn-primary" style="margin-left:20px;border-radius:5px;border:1px solid #d1cfc8;">{{ __('Update') }}</button>
                            <a href="postupdate/{{ $post -> id }}" class="col-form-label" style="margin-right:auto;margin-left:10px;text-align:center;border-radius:5px;width:65px;border:1px solid #d1cfc8;color:#000;background:#dee2e6;">Cancel</a>
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

