@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        @if(count($errors)>0)
        
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                  <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
        @endif
        @if($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{$message}}</p>
        </div>
        @endif
        <div align="right">
            <!-- <a href="{{route('student.create')}}" class="btn btn-primary">Add</a> -->
            <br />
            <br />

        
        @if($student)
          <form method="post" action="{{action('StudentController@update', $id)}}" enctype="multipart/form-data">
            {{csrf_field()}}
            <input type="hidden" name="_method" value="PATCH" />
            <div class="form-group">
                <input type="text" name="first_name" class="form-control" value="{{$student->first_name}}" style="width: 50%;" />
            </div>
            <div class="form-group">
                <input type="text" name="last_name" class="form-control" value="{{$student->last_name}}" 
                style="width: 50%;"/>
            </div>
             <div class="form-group">
                <input type="file" name="file_name" class="form-control" style="width: 50%;" />
            </div>
            <div class="form-group">
                <input type="submit" value="Edit" class="btn btn-primary" />
            </div>
            
        </form>
        @endif
        @if(!$student)
        <form method="post" action="{{url('student')}}" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="form-group">
                <input type="text" name="first_name" class="form-control" placeholder="Enter Customer first Name" style="width: 50%;" />
            </div>
            <div class="form-group">
                <input type="text" name="last_name" class="form-control" placeholder="Enter Customer last Name" 
                style="width: 50%;"/>
                <input type="hidden" name="userId" value="{{Auth::user()->id}}"/>
            </div>
             <div class="form-group">
                <input type="file" name="file_name" class="form-control" style="width: 50%;" />
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" />
            </div>
            
        </form>
        @endif
        </div>
        <table class="table table-bordered">
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Uploaded File</th>
                <th>Action</th>
            </tr>
            @foreach($students as $row)
            <tr>
                <td>{{$row['first_name']}}</td>
                <td>{{$row['last_name']}}</td>
                <td><a href="{{action('StudentController@show',$row['id'])}}">Download File</a></td>
                <td>
                    <a href="{{action('StudentController@edit',$row['id'])}}" class="btn btn-warning">Edit</a>
                    <form method="post" class="delete_form" action="{{action('StudentController@destroy',$row['id'])}}" style="display: inline-block;">
                        {{csrf_field()}}
                        <input type="hidden" name="_method" value="DELETE" />
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
