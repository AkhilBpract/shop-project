<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>add - user</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  </head>
  <body>
  @if(session('status'))
        <div class="mt-1 mb-1 alert alert-success">
            {{ session('status') }}
        </div>
@endif
<a href="{{url()->previous() }}" class="btn btn-info">Back</a>
  <div class="container">
  <div class="row">
      <div class="col-sm-9">      
        <a href="{{ route('product_category.create') }}" class="btn btn-outline-primary">+Create Category</a>
      </div>
      <div class ="col-sm-3">
        <p align="right"><a href = "{{route('dashboard')}}""><button type="submit" class="btn btn-outline-primary">>> back to dashboard</button></a>  </p>
      </div>
  </div>
  </div>
 <div class="container">
  <table class="table">  
    <thead>
        <tr>
      
        <th>Categories</h>        
        <th>Edit</h>
        <th>Delete</h>
        </tr>
    </teah>
   
    <tbody>
    @foreach($category as $data)
    
        <tr>
       
        <td>{{$data->name}}</td> 

        <td><a href="{{route('product_category.edit',$data->id)}}"  class="btn btn-secondary">Edit </a></td>

           <td>         
          <form action="{{route('product_category.destroy',$data->id)}}" method="POST">
          @method('delete')
          @csrf
          <button class="btn btn-danger" type="submit">delete</button> 
          </form>           
          </td>     
          </tr>
        @endforeach
    </tbody>
</table>
</div>
     
        
      
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
  </body>
</html>