<!DOCTYPE html>
<html lang="en">
<head>
	{{-- BootSRap css cdn --}}
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	{{-- BootSRap js cdn --}}
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	
	<title>To Do list</title>
	<meta charset="utf-8">
</head>
<body>
	<div class="container">
		<div class="col-md-offset-2 col-md-8">
			<div class="row">
				<h1>To Do List</h1>
			</div>
			{{--Pemisah--}}
			<div class="row">
					{{-- Success Notif --}}
					@if (Session::has('success'))
						<div class="alert alert-success">
							<strong>Success:</strong> {{Session::get('success')}}
						</div>
					@endif

					{{-- Error Notif --}}
					@if($errors -> has('newTaskName'))
						<div class="alert alert-danger">
							<p>{{ $errors -> first('newTaskName') }} </p>
						</div>
								
					@endif
				<form action="{{ route('task.store') }}" method="POST">
					{{ csrf_field()}}
					<div class="col-md-9">
						<input type="text" name="newTaskName" class='form-control' value="{{old('newTaskName')}}">
						
					</div>
					<div class="col-md-3">
						<input type="submit" name="" class='btn btn-primary btn-block' >
					</div>
				</form>
			</div>
			{{-- Show Data --}}
			@if(count($storedTasks) > 0)
				<div class="row">
					<table class="table">
						<thead>
							<tr>
								<th>Task #</th>
								<th>Name</th>
								<th>Edit</th>
								<th>Delete</th>
							</tr>
						</thead>
						<tbody>
							@foreach($storedTasks as $data)
							<tr>
								<th>{{ $data -> id}}</th>
								<td>{{ $data -> name}}</td>
								<td>
									
								</td>
								{{-- anu make function edit nyaeta HREF nu dihandap ieu, tingali kana route weh--}}
								<td><a href="/task/{{ $data -> id }}/edit" class="btn btn-default">Edit</a></td>
								<td>
									<form action="/task/{{ $data -> id}}{{--{{ route('task.destroy', ['task' => $data -> id])}}--}}" method="post">
										{{ csrf_field() }}
										<input type="hidden" name="_method" value="DELETE">
										<input type="submit" name="" class="btn btn-danger" value="Delete">
									</form>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
				@endif
				<div class="row text-center">
					{{ $storedTasks -> links()}}		
				</div>	
		</div>
	</div>
</body>
</html>