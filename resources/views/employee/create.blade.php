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
<a href="{{route('employees.index')}}"class="btn btn-info">Back</a>
<div class="container">
<p align="right"><a href = "{{route('dashboard')}}" class="btn btn-outline-primary">> back to dashboard</button></a>  </p>
</div>
<center><h1><b>Create Employee</b></h1></center>    
<form method="POST" action ="{{route('employees.store')}}">
        @csrf
        <div class="container mt-5">
            <div class="row">
            <div class="col-sm-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Employee Name</label>
                        <input type="text" name="name" class="form-control" id="Enter Username" aria-describedby="emailHelp" placeholder="Enter Username">                       
                    </div>
                    <div class="form-group mt-4">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="email" name="email" class="form-control" id="Enter Username" aria-describedby="emailHelp" placeholder="Enter Email">                       
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
                        <label for="exampleFormControlTextarea1">Address</label>
                        <textarea class="form-control" name="address" id="exampleFormControlTextarea1" rows="2"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                    </div>
                    <div class="form-group">
                            <label for="exampleFormControlSelect1">Roles</label>
                            <select  class="form-control"  name="role" id="exampleFormControlSelect2">
                            <option value = "">-select-</option>
                            @foreach($role as $item)
                            <option value= "{{$item->id}}" >{{$item->role}}</option>
                            @endforeach     
                        </select>
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