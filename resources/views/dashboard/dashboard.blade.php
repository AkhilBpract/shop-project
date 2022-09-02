<form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <p align="right" ><button class="btn btn-danger"type="submit">
                        {{ __('Logout') }}
                </button></p>
</form>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  </head>
  <body class="text-light bg-dark">
    
    <div class="container">
    <h2 ><u>Admin</u></h2>
        <div class="row mt-5">
       
            <div class="col-md-2" >
            <a href = "{{route('sales.index')}}" class="btn btn-outline-primary">Sale</a>
            </div>
            <div class="col-md-2">            
            <a href = "{{route('purchases.index')}}" class="btn btn-outline-primary">Purchase</a>            
            </div>

            <div class="col-md-2">
            <a href = "{{route('customers.index')}}" class="btn btn-outline-primary">Customers</a>
            </div>

            <div class="col-md-2">
            <a href = "{{route('vendors.index')}}" class="btn btn-outline-primary">Vendor</a>
           
            </div>

          
            <div class="col-md-2">
            <a href = "{{route('product_category.index')}}" class="btn btn-outline-primary">Category</a>
            </div>

            <div class="col-md-1">
            <a href = "{{route('product.index')}}" class="btn btn-outline-primary" >Products </a>
            </div>
            <div class="col-md-1">
            <a href = "{{route('report')}}" class="btn btn-outline-primary" >Report </a>
            </div>           

        </div>
    </div>

  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
  </body>
</html>