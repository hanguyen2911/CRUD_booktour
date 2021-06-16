<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <link rel="stylesheet" href="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>




</head>
<style>
    .body{
        background-image: url('https://eaut.edu.vn/wp-content/uploads/2020/12/nganh-quan-tri-du-lich-va-lu-hanh-4.jpg');
    }
    .container{
        width:900px;
     
    }
 .card-columns{
    display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 10px;
 }
 .card {
     padding: 10px 5px;
  text-align: center;
  background-color: #CCFFFF	;
 }

</style>

<body>
    <div class="body">
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
<ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" href="#">Link 1</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Link 2</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Link 3</a>
    </li>
  </ul>
</nav>
    <div class="container">
        
        @if(Session::has('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
        </div>
        @endif

        <center>
            <h2>SHOW TOURS</h2>
        </center>
        <div class="tab">
            <!-- <button type="button" class="btn btn-warning" onclick="window.location='{{ route('tours.create') }}'">Add a new tour</button> -->


        </div>



    
        @php
        $stt=0;
        @endphp
        <div class="card-columns">
        @foreach($tours as $tou)
            
                <div class="card" style="width:300px">
                <img src="/images/{{ $tou->image}}" style="width: 200px; height:150px;" onclick="window.location='/tours/{{ $tou->id }}'" /> 
                    <div class="card-body">
                        <h4 class="card-title">{{ $tou->nam }}</h4>
                        <p class="card-title">{{ $tou->typetour }}</p>
                        <p class="card-title">{{ $tou->schedul }}</p>
                        <p class="card-title">{{ $tou->depart }}</p>
                        <p class="card-title">{{ $tou->numpeople }}</p>
                        <p class="card-title">{{ $tou->price }}</p>
                        <!-- <a href="#" class="btn btn-primary stretched-link">See Profile</a> -->
                
                </div>
            </div>
    
        <!-- <tr>
                <td>{{ ++$stt }}</td>
                <td>{{ $tou->nam }}</td>
                <td><img src="/images/{{ $tou->image}}" style="width: 200px; height:150px;" onclick="window.location='/tours/{{ $tou->id }}'" />   </td>
                <td>{{ $tou->typetour }}</td>
                <td>{{ $tou->schedul}}</td>
                <td>{{ $tou->depart}}</td>
                <td>{{ $tou->numpeople}}</td>
                <td>{{ $tou->price}}</td> -->
        <!-- <td>
                    <form action="{{ route('tours.destroy', $tou['id']) }}" method="post">
                    <button type="button" class="btn btn-success"onclick="window.location='/tours/{{ $tou->id }}/edit'">Edit</button>
                            @csrf
                            @method('delete') 
							&nbsp;&nbsp;&nbsp;&nbsp;
                    <button name="delete" class="btn btn-danger" type="submit">Delete</button>
                    </form>
                </td> -->

   
        @endforeach
        </tbody>
        
    </div>

    </div>
    <footer>
        <div style="background:black">
  <center><p style="background:while">Author: Ha Nguyen</p></center>
  <br>
  <center><p><a  style="background:while" href="mailto:hege@example.com">haha@example.com</a></p></center>
  </div>
  </div>
</footer>
</body>

</html>