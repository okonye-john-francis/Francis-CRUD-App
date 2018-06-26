@extends('master')

@section('content')

<div class="row">
	<div class="col-md-12">

		<br/>
		<h3 align="center">Hotel Reservation</h3>
		<br/>
		<hr>
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
          <form method="post" action="{{action('StudentController@update', $id)}}">
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
				<input type="submit" value="Edit" class="btn btn-primary" />
			</div>
			
		</form>
		@endif
		@if(!$student)
		<form method="post" action="{{url('student')}}">
            {{csrf_field()}}
			<div class="form-group">
				<input type="text" name="first_name" class="form-control" placeholder="Enter Customer first Name" style="width: 50%;" />
			</div>
			<div class="form-group">
				<input type="text" name="last_name" class="form-control" placeholder="Enter Customer last Name" 
				style="width: 50%;"/>
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
				<th>Edit</th>
				<th>Delete</th>
			</tr>
			@foreach($students as $row)
			<tr>
				<td>{{$row['first_name']}}</td>
				<td>{{$row['last_name']}}</td>
				<td><a href="{{action('StudentController@edit',$row['id'])}}" class="btn btn-warning">Edit</a></td>
				<td>
					<form method="post" class="delete_form" action="{{action('StudentController@destroy',$row['id'])}}">
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
<script>
	$(document).ready(function(){
		$('.delete_form').on('submit', function(){
		if (confirm("Are you sure you want to delete this record?")) {
			return true;
		}
		else{
			return false;
		}
	});
	});
	
</script>

@endsection