<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>add - user</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  </head>
  <body>
  <p align="right">     
    <a href="{{route('add_category')}}" class="btn btn-outline-primary">Add Category</a>
</p>
 
 
  <table class="table">  
    <thead>
        <tr>
        <th>Categories</h>        
        <th>Edit</h>
        </tr>
    </teah>
   
    <tbody>
    @foreach($category as $data)
        <tr>
        <td>{{$data->category}}</td>       
        <td><a href="{{route('edit_category',$data->id)}}" class="btn btn-outline-primary">Edit</a></td>
        </tr>
        @endforeach
    </tbody>
</table>
     
        
      
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
  </body>
</html>