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
<a href="{{route('dashboard')}}" class="btn btn-info">Back</a>
    <div class="container">
        <div class="row">
      
            <div class="col-sm-9">
            @if(Auth::user()->hasRole('admin') ||Auth::user()->hasRole('sales department') ) 
            <a href = "{{route('sales.create')}}" class="btn btn-outline-primary">Create Sales</a>
            @endif
            </div>
           
            <div class="col-sm-3">
            <p align="right"><a href = "{{route('dashboard')}}" class="btn btn-outline-primary">>> back to dashboard</a></p>
        </div>
    </div>
</div>
@if(count($sales_data) > 0)  

<div class="container">

  <table class="table">
    <h4>Sales </h4>
    <thead>
        <tr>
        <th>Name</th>        
        <th>edit</th>
        <th>Delete</th>
        <th>Product</th>
        <th>Sale Amount</th>
        <th>Quantity</th>
        <th>Totsl Amount</th>
        @if(Auth::user()->hasRole('admin') ||Auth::user()->hasRole('sales department') ) 
        <th>Edit</th>
        <th>Delete</th>
        @endif
        </tr>
    </teah>

    <tbody>
    
    </tbody>
    @foreach($sales_data as $data)
      <tr>
      <td>{{$loop->iteration}}</td> 
        <td>{{$data->user->name}}</td>   
        <td>{{$data->product_category->name}}</td> 
        <td>{{$data->product->product}}</td> 
        <td>{{$data->price}}</td> 
        <td>{{$data->quantity}}</td> 
        <td>{{$data->amount}}</td>
        @if(Auth::user()->hasRole('admin') ||Auth::user()->hasRole('sales department') ) 
        <td><a href="{{route('sales.edit',$data->id)}}"  class="btn btn-secondary">Edit </a></td>
        <td><form action="{{route('sales.destroy',$data->id)}}" method="POST">
              @csrf
              @method('delete')
              <button class="btn btn-danger" type="submit">delete</button> 
            </td> 
        </form> 
        @endif
      </tr>
      @endforeach
    </table>
   

</div>
        
     @else <center>Empty   </center> @endif 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
  </body>
</html>