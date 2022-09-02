<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>add - user</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  </head>
  <body>
  @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@if(session('status'))
        <div class="mt-1 mb-1 alert alert-success">
            {{ session('status') }}
        </div>
@endif
<a href="{{url()->previous() }}" class="btn btn-info">Back</a>
<div class="container">
    <p align="right"><a href = "{{route('dashboard')}}"><button type="submit" class="btn btn-outline-primary">>> back to dashboard</button></a>  </p>
</div> 
<center><h1><b>Create Category</b></h1></center>   
    <form method="POST" action ="{{route('product_category.store')}}">
        @csrf
        <div class="container mt-5">
            <div class="row">
            <div class="col-sm-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Category</label>
                        <input type="text" name="name" class="form-control" id="Enter Username" aria-describedby="emailHelp" placeholder="Enter Category">                       
                    </div>  
                      
                    <label>Active or Not</label>
                    <div class="form-check form-check-inline mt-3">
                        <input class="form-check-input" type="radio" name="active" id="inlineRadio1" value="1" checked>
                        <label class="form-check-label" for="inlineRadio1">Yes</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="active" id="inlineRadio2" value="0">
                        <label class="form-check-label" for="inlineRadio2">No</label>
                    </div>                          
            </div> 
            <div class="col-sm-6">
            <div class="form-group">
                        <label for="exampleInputEmail1">Description</label>
                        <input type="text" name="description" class="form-control" id="Enter Username" aria-describedby="emailHelp" placeholder="Enter Decription">                       
                    </div>
            </div>
                 
            <div class="pt-5">
              <input class="btn btn-primary " type="submit" value="Submit">
            </div>
           
        </div>
    </form> 
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
  </body>
</html>