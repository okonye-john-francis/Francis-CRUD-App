@extends('master')

@section('content')

<div class="row">
	<div class="col-md-12">

		<br/>
		<h3 align="center">Edit Record</h3>
		<br/>
		@if(count($errors)>0)
        
        <div class="alert alert-danger">
        	<ul>
        		@foreach($errors->all() as $error)
                  <li>{{$error}}</li>
        		@endforeach
        	</ul>
        </div>
		@endif
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
	</div>
</div>

@endsection