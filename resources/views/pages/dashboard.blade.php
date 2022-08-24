<!DOCTYPE html>
<html>
<head>
	<title>Test</title>
</head>
<body>
 

 
	<table border="1">
		<tr>
			<th>NO</th>
			<th>ID</th>
			<th>USERNAME</th>
			<th>ROLE</th>
			<th>EMAIL</th>
			<th>CABANG</th>
		</tr>
		@foreach($user as $p)
		<tr>
			<td>{{ $loop->iteration}}</td>
			<td>{{ $p->id }}</td>
			<td>{{ $p->username }}</td>
			<td>{{ $p->role }}</td>
			<td>{{ $p->email }}</td>
			<td>{{ $p->cabang }}</td>
		</tr>
		@endforeach
	</table>
 
 
</body>
</html>