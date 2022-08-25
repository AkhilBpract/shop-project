<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>add - user</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  </head>
  <body>
    <div class="containerfuild">
        <div class="row">
            <div class="col-sm-10">
            <a href = "{{route('transaction')}}" class="btn btn-outline-primary">New Transaction</a>
            </div>
            <div class="col-sm-2">
            <p align="right"><a href = "{{route('dashboard')}}" class="btn btn-outline-primary">>> back to dashboard</a></p>
        </div>
    </div>
</div>
      

<div class="container">
 
  <table class="table">
    <u><h4>Transactions Table</h4></u>
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
    @foreach($datas as $data)

        <tr>
        <td>{{$data->user->name}}</td>
                
        </tr>
        @endforeach
    </tbody>
    </table>

</div>
        
      
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
  </body>
</html>