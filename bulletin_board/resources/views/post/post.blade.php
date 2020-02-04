@extends('layouts.app')

@section('content')
<div class="c">
    <div class="row justify-content-center">
        <div class="col-sm-8">
            <div class="card">
                <div class="card-header">Create Post</div>

                <div class="card-body">
                    <form method="POST" action="postconfirm">
                        @csrf 
                        <div class="form-group row">
                            <label for="title" class="col-sm-4 col-form-label text-md-right">Title</label>
                            <div class="col-sm-6 d-flex">
                                <input type="text" id="title" class="form-control" name="title" value="{{ old('title', session('title')) }}" autofocus>
                                <label for="title" style="color:red;padding-left:5px;">*</label>
                                <small class="text-danger">{{ $errors->first('title') }}</small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="description" class="col-sm-4 col-form-label text-md-right">Description</label>
                            <div class="col-sm-6 d-flex">
                                <textarea id="description" class="form-control" name="description" autofocus>{{ old('description', session('description')) }}</textarea>
                                <label for="description" style="color:red;padding-left:5px;">*</label>
                                <small class="text-danger">{{ $errors->first('description') }}</small>
                            </div>
                        </div>
                        <div class="form-group row" style="display:flex;list-style:none;">
                            <button type="submit" class="col-form-label" style="margin-left:auto;border-radius:5px;border:1px solid #d1cfc8;">{{ __('Confirm') }}</button>
                            <button type="reset" class="col-form-label" style="margin-left:20px;margin-right:auto;border-radius:5px;width:65px;border:1px solid #d1cfc8;">{{ __('Clear') }}</button>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

