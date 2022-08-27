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
    <div class="container">
        <div class="row">
            <div class="col-sm-9">
            <a href = "{{route('sale.create')}}" class="btn btn-outline-primary">New Sale</a>
            </div>
            <div class="col-sm-3">
            <p align="right"><a href = "{{route('dashboard')}}" class="btn btn-outline-primary">>> back to dashboard</a></p>
        </div>
    </div>
</div>
     

<div class="container">
 
  <table class="table">
    <u><h4>Sales Table</h4></u>
    <thead>
        <tr>
        <th>Name</th>        
        <th>edit</th>
        <th>Delete</th>
        <th>Product</th>
        <th>Delete</th>
        </tr>
    </teah>

    <tbody>
    
    </tbody>
    @foreach($sales_data as $data)
      <tr>
        <td>{{$data->user->name}}</td>       
        <td><a href="{{route('sale.edit',$data->id)}}"  class="btn btn-secondary">Edit </a></td>
        <td><form action="{{route('sale.destroy',$data->id)}}" method="POST">
              @csrf
              @method('delete')
              <button class="btn btn-danger" type="submit">delete</button> 
            </td> 
        </form> 
      </tr>
      @endforeach
    </table>

</div>
        
      
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
  </body>
</html>