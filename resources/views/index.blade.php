<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<style>
	table, th, td {
		font-size:20px;
		width:2000px;
		margin-top: 20px;
	}

	th {
		background-color: #00BFFF;
		font-size: 25px;
		color: black;
	}
    .btn{
        font-size: 25px;
    }

    /* th {
		background-color: #9F81F7;
		font-size: 25px;
		color: black;
	} */
	/* td {
		background-color:#CECEF6;
		
		color: black;
	} */
.containe{
    background-color: #CCFFFF;
    margin-left:50px ;
    margin-right:50px ;
}
.search{
 width: 400px;
 height:47px;
}
.search-container{
    text-align: center;
}
.body{
        background-image: url('https://eaut.edu.vn/wp-content/uploads/2020/12/nganh-quan-tri-du-lich-va-lu-hanh-4.jpg');
    }

</style>
<body>
<div class="body">
<div class="containe">
@if(Session::has('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
        </div>
        @endif
    
    <center><h2>LIST TOURS</h2></center>
    <div class="tab">
    <button type="button" class="btn btn-warning" onclick="window.location='{{ route('tours.create') }}'">Add a new tour</button>

  </div>
 
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Image</th>
                <th>Type tour</th>
                <th>Schedule</th>
                <th>Depart</th> 
                <th>Number people<th>  
                <th>Price</th>             
                <!-- <th width="280px">Action</th> -->
            </tr>
        </thead>
		
        <tbody>
            @php
                $stt=0;
            @endphp
            @foreach($tours as $tou)

            <tr>
                <td>{{ ++$stt }}</td>
                <td>{{ $tou->nam }}</td>
                <td><img src="/images/{{ $tou->image}}" style="width: 200px; height:150px;" onclick="window.location='/tours/{{ $tou->id }}'" />   </td>
                <td>{{ $tou->typetour }}</td>
                <td>{{ $tou->schedul}}</td>
                <td>{{ $tou->depart}}</td>
                <td>{{ $tou->numpeople}}</td>
                <td>{{ $tou->price}}</td>
                <!-- <td>
                    <form action="{{ route('tours.destroy', $tou['id']) }}" method="post">
                    <button type="button" class="btn btn-success"onclick="window.location='/tours/{{ $tou->id }}/edit'">Edit</button>
                            @csrf
                            @method('delete') 
							&nbsp;&nbsp;&nbsp;&nbsp;
                    <button name="delete" class="btn btn-danger" type="submit">Delete</button>
                    </form>
                </td> -->

            </tr>
            @endforeach
        </tbody>
    </table>
	</div>
    </div>
    </div>
</body>
</html>