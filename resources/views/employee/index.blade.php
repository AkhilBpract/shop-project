
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  </head>
  <body>  
  <a href="{{url()->previous() }}" class="btn btn-info">Back</a>

    <div class="container">
    <div class="row">
      <div class="col-sm-9">
      <a href = "{{route('employees.create')}}" class="btn btn-outline-primary">+ Add Employee</button></a>
      </div>
      <div class="col-sm-3">
      <p align="right"><a href = "{{route('dashboard')}}" class="btn btn-outline-primary">>> back to dashboard</button></a></p>
      </div>
    </div>
  </div>
  

<div class="container">
 <table class="table" >
 <h4>Employees </h4>
    <thead>
      <tr>
        <th>Name</th>
        <th>Edit</th>
      </tr>
    </tead>
    <tbody >
    @foreach($employees as $user)
      <tr>       
        <td>{{$user ->name }}</td>
        <td><a href="{{route('employees.edit',$user->id)}}"  class="btn btn-secondary">Edit </a></td>
    @endforeach
    </tbody>
</table> 
</div> 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
  </body>
</html>