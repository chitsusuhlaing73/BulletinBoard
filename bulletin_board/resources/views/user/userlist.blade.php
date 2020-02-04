@extends('layouts.app')
@section('content')
<div class="c">
    <div class="row justify-content-center">
        <div class="col-lg-10 col-sm-11">
            <div class="card">
                <div class="card-header">Post List</div>

                <div class="card-body">
                    <form method="post" action="/multi_search" enctype="multipart/form-data">
                        @csrf 
                        <div class="form-group row">
                            <div class="col-lg-2">
                                <input class="col-sm-12 border border-info" type="text" placeholder="Search By Name" name="name" style="height:35px;"><br><br>
                            </div>
                            <div class="col-lg-2">
                                <input class="col-sm-12 border border-info" type="text" placeholder="Search By Email" name="email" style="height:35px;"><br><br>
                            </div>
                            <div class="col-lg-2">
                                <input class="col-sm-12 border border-info" type="date" placeholder="CreatedFrom" name="from" style="height:35px;"><br><br>
                            </div>
                            <div class="col-lg-2">
                                <input class="col-sm-12 border border-info" type="date" placeholder="Created To" name="to" style="height:35px;"><br><br>
                            </div>
                            <div class="col-lg-2">
                                <button type="submit" class="col-sm-12 btn btn-primary" >Search</button><br><br>
                            </div>
                            <div class="col-lg-2">
                                <a href="usercreate" class="col-sm-12 btn btn-primary" >Add</a><br><br>
                            </div>  
                        </div><br>
                        <table class="table table_bordered table_striped">
                            <tr>
                                <th style="text-align:center;">Name</th>
                                <th style="text-align:center;">Email</th>
                                <th style="text-align:center;">Created User</th>
                                <th style="text-align:center;">Phone</th>
                                <th style="text-align:center;">Birth Date</th>
                                <th style="text-align:center;">Created Date</th> 
                                <th style="text-align:center;"></th>
                            </tr>
                            @if($user->count())
                                @foreach($user as $item)
                                    <tr>
                                        <td class="text-center"><a href="#" data-toggle="modal" data-target="#myModal_{{$item->id}}"><u>{{ $item->name }}</u></a></td>
                                        <td class="text-center">{{ $item->email }}</td>
                                        <td class="text-center"> {{ $item->users->name }} </td>
                                        <td class="text-center">{{ $item->phone }}</td>
                                        <td class="text-center">{{ $item->dob }}</td>
                                        <td class="text-center"> {{ $item->created_at->format('Y-m-d') }} </td>
                                        <td class="text-center"><a href = 'deleted/{{ $item -> id }}' onclick="return confirm('Are you sure?')"><u>Delete</u></a></td>
                                    </tr>
                                @endforeach
                            @else
                            <div class="alert alert-danger">No record found.
                                <a href="userlist" class="close" aria-label="close">x</a>
                            </div>
                            @endif
                        </table><br>
                        
                       
                        <div class="pagination col-11 justify-content-center">
                            {{ $user->links() }}
                        </div>

                        @foreach($user as $item) 
                        <div class="modal fade" id="myModal_{{ $item->id }}" role="dialog">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <img class="rounded-circle" src="/image/{{$item->profile}}" alt="image" width="100px" height="100px">
                                        <p>Name : {{ $item->name }} </p>
                                        <p>Email : {{ $item->email }} </p>
                                        <p>Phone : {{ $item->phone }} </p>
                                        <p>Date of birth : {{ $item->dob }} </p>
                                        <p>Address : {{ $item->address }} </p>
                                        <p>Created at : {{ $item->created_at->format('Y-m-d')}}</p>
                                        <p>Created user : Admin </p>
                                        <p>Last updated at : {{ $item->created_at->format('Y-m-d') }} </p>
                                        <p>Updated user : {{ $item->name }} </p> 
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
@endsection

