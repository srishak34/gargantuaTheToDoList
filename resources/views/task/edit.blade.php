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
					@if($errors -> has('newEditTask'))
						<div class="alert alert-danger">
							<p>{{ $errors -> first('newEditTask') }} </p>
						</div>
								
					@endif
					
					{{-- Edit --}}

					<div class="row">
						<form action="{{route('task.update', ['id' => $underEdit -> id])}}" method="post">
							<div class="form-group">
								<input type="text" name="newEditTask" class="form-control input-lg" value="{{ $underEdit -> name}}">
							</div>
							{{ csrf_field()}}
							<input type="hidden" name="_method" value="put">
							<input type="Submit" name="" value="Save Changes" class="btn btn-success btn-lg">
							<a href="" class="btn btn-danger btn-lg pull-right">Go Back</a>
						</form>
					</div>
			</div>
		</div>
	</div>
</body>
</html>