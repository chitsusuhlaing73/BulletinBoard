@extends('layouts.app')
@section('content')
<div class="c">
    <div class="row justify-content-center">
        <div class="col-lg-11 col-sm-12">
            <div class="card">
                <div class="card-header">Post List</div>

                <div class="card-body">
                    <form method="post" action="/search">
                        @csrf 
                        <div class="form-group row col-sm-12">
                            <div class="col-lg-4">
                                <input class="col-sm-12 border border-info" name="search" type="search" placeholder="Search..." style="height:35px;"><br><br>
                            </div>
                            <div class="col-lg-2">
                                <button type="submit" class="col-sm-12 btn btn-primary" >Search</button><br><br>
                            </div>
                            <div class="col-lg-2">
                                <a href="post" class="col-sm-12 btn btn-primary" >Add</a><br><br>
                            </div>
                            <div class="col-lg-2">
                                <a href="postupload" class="col-sm-12 btn btn-primary">Upload</a><br><br>
                            </div>
                            <div class="col-lg-2">
                                <a href="{{ action('PostController@download') }}" class="col-sm-12 btn btn-primary">Download</a>
                            </div>
                        </div><br>
                        <table class="table table_bordered table_striped">
                            <tr>
                                <th class="text-center">Post Title</th>
                                <th class="text-center">Post Decription</th>
                                <th class="text-center">Posted User</th>
                                <th class="text-center">Posted Date</th>
                                <th class="text-center"></th>
                                <th class="text-center"></th> 
                            </tr>

                            
                            @if($data->count())
                                @foreach($data as $key => $post)
                                <tr>
                                    <td class="text-center"><a href="#" data-toggle="modal" data-target="#myModal_{{$post->id}}"><u>{{ $post->title }}</u></a></td>
                                    <td class="text-center">{{ $post->description }}</td>
                                    <td class="text-center">{{ $post->users->name }} </td>
                                    <td class="text-center"> {{ $post->created_at->format('Y-m-d') }} </td>
                                    <td class="text-center"><a href="postupdate/{{ $post -> id }}"><u>Edit</u></a></td>
                                    <td class="text-center"><a href = 'delete/{{ $post -> id }}' onclick="return confirm('Are you sure?')"><u>Delete</u></a></td>
                                </tr>
                                @endforeach
                            @else
                                <div class="alert alert-danger">No record found.
                                <a href="postlist" class="close" aria-label="close">x</a>
                                </div>
                            @endif
                        </table><br>
 
                        <div class="pagination col-11 justify-content-center">
                             {{ $data->links() }}
                        </div>

                        @foreach($data as $post)
                        <!-- Modal -->
                        <div class="modal fade" id="myModal_{{$post->id}}" role="dialog">
                            <div class="modal-dialog">
                            
                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-body">
                                <p>Title : {{ $post->title }} </p>
                                <p>Description : {{ $post->description }} </p>
                                <p>Status : {{ $post->status }} </p>
                                <p>Created at : {{ $post->created_at->format('Y-m-d') }}</p>
                                <p>Created user : {{ $post->users->name }} </p>
                                <p>Last updated at : {{ $post->created_at->format('Y-m-d') }} </p>
                                <p>updated user : {{ $post->users->name }} </p>
                                </div>
                                <div class="clearfix">
                                <button type="button" class="btn btn-default float-right" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                            
                            </div>
                        </div>
                        @endforeach

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<footer style="display:none;"></footer>
@endsection