<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>add - user</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  </head>
  <body>
  <div class="container">
    <div class="row">
      <div class="col-sm-9">
      <a href = "{{route('vendor.create')}}" class="btn btn-outline-primary">+ Create Vendor</a>  
      </div>
      <div class="col-sm-3">
      <p align="right"><a href = "{{route('dashboard')}}" class="btn btn-outline-primary">>> back to dashboard</button></a></p>
      </div>
    </div>
  </div>

  <div class="container">
 
    <table class="table">
      <h4>Customer</h4>
      <thead>
          <tr>
          <th>Name</h>
          <th>Address</h>
          <th>Email</h>
          <th>Status</h>
          <th>Edit</h>
          <th>Delete</h>
          </tr>
      </teah>
    
      <tbody>
      @foreach($user as $user)
          <tr>
          <td>{{$user->name}}</td>
          <td>{{$user->address}}</td>
          <td>{{$user->email}}</td>
          <td>@if($user->active == 1)active @else not in active @endif</td>
          <td><a href="{{route('vendor.edit',$user->id)}}"  class="btn btn-secondary">Edit </a></td>
          <td><form action="{{route('vendor.destroy',$user->id)}}" method="POST">
              @csrf
              @method('delete')
              <button class="btn btn-danger" type="submit">delete</button> 
            </td> 
          </tr>
          @endforeach
      </tbody>
    </table>
</div>

       
        
      
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
  </body>
</html>