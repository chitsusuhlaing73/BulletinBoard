<!-- <html>
<body>
    <form action="submit" method="POST" >
    @csrf
    <label for="title">Title</label>
    <input type="text" name="title"><br>
    <label for="description">Description</label>
    <input type="text" name="description"><br>
    <button>submit</button>
    </form>
</body>
</html> -->

@extends('layouts.app')

@section('content')
<div class="c">
    <div class="row justify-content-center">
        <div class="col-sm-8">
            <div class="card">
                <div class="card-header">Create Post Confirmation</div>

                <div class="card-body">
                    <form action="/store" method="POST" >
                        @csrf 
                        <div class="form-group row">
                            <label for="title" class="col-sm-4 col-form-label text-md-left">Title</label>
                            <label for="title">{{ $post->title }}</label>
                            <input type="hidden" id="title" class="form-control col-sm-6" name="title" value="{{ $post->title }}">
                        </div>
                        <div class="form-group row">
                            <label for="description" class="col-sm-4 col-form-label text-md-left">Description</label>
                            <label for="description">{{ $post->description }}</label>
                            <input type="hidden" id="description" class="form-control col-sm-6" name="description" value="{{ $post->description }}">
                        </div>
                        <div class="form-group row" style="display:flex;list-style:none;">
                            <button type="submit" class="col-form-label" style="margin-left:20px;border-radius:5px;width:65px;border:1px solid #d1cfc8;background:#dee2e6;">Create</button>
                            <a href="post" class="col-form-label" data-role="button" data-inline="true" data-rel="back" style="margin-left:20px;text-align:center;border-radius:5px;width:65px;border:1px solid #d1cfc8;color:#000;background:#dee2e6;">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
