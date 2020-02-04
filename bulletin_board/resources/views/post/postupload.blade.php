@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 col-sm-10">
            <div class="card">
                <div class="card-header">Upload CSV File</div>
                <div class="card-body">
                    <form action="/uploadFile" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="col-sm-10 mx-auto">
                        Import File Form:
                        <div class="col-sm-10 border">
                            <div class="form-group row mt-5 ml-auto">
                                <input type="file" name="import_file" class="col-md-6 col-sm-10">
                                @if ($errors->any())
                                <div class="text-danger">
                                    @foreach($errors->all() as $error)
                                        <small>{{ $error }}</small>
                                    @endforeach
                                </div>
                                @endif
                            </div>
                            <div class="form-group row ml-auto">
                                <div class="align-self-center mx-auto col-md-4 col-sm-8">
                                    <button type="submit" class="btn btn-primary">Import File</button>
                                </div>
                            </div>
                        </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 
