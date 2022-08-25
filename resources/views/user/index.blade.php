<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>add - user</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  </head>
  <body>
  <form action="{{ route('add_user') }}" method="GET">                    
    <button type="submit" class="btn btn-outline-primary">Add User</button>
  </form>
 
  <table class="table">
    <h4>Customer/Vandor</h4>
    <thead>
        <tr>
        <th>Name</h>
        <th>Address</h>
        <th>Status</h>
        <th>Edit</h>
        </tr>
    </teah>
   
    <tbody>
    @foreach($user as $user)
        <tr>
        <td>{{$user->name}}</td>
        <td>{{$user->address}}</td>
        <td>@if($user->active == 1)active @else not in active @endif</td>
        <td><a href="{{route('edit_user',$user->id)}}"  class="btn btn-outline-primary">Edit </a></td>
        </tr>
        @endforeach
    </tbody>
</table>
<a href = "{{route('dashboard')}}"><button type="submit" class="btn btn-outline-primary">>> back to dashboard</button></a>
       
        
      
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
  </body>
</html>product_category