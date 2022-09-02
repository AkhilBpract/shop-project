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
      <center><u><h1>Report</h1></u></center>
        <h4><p>SalesAmount : $ {{$salesAmount}}</p></h4>
        <h4><p>PurchaseAmount : $ {{$purchaseAmount}}</p></h4>
        @if($message == "loss")
          <h4><p class="text-danger">Result : {{$message}} : $ {{$report}} </p></h4>
          @else <h4><p class="text-success">Result : {{$message}} : $ {{$report}}  </p></h4>
        @endif
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
  </body>
</html>