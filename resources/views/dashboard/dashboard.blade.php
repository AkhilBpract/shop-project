<form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit">
                        {{ __('Logout') }}
                </button>
</form>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  </head>
  <body>
    
    <div class="container">
        <div class="row">
            <div class="col-md-2">
            <a href = "{{route('sale.index')}}" class="btn btn-outline-primary">Sales</a>
            </div>
            <div class="col-md-2">            
            <a href = "{{route('purchase.index')}}" class="btn btn-outline-primary">Purchase</a>            
            </div>

            <div class="col-md-2">
            <a href = "{{route('customer.index')}}" class="btn btn-outline-primary">Customers</a>
            </div>

            <div class="col-md-2">
            <a href = "{{route('product.index')}}" class="btn btn-outline-primary" >Products </a>
            </div>

          
            <div class="col-md-2">
            <a href = "{{route('product_category.index')}}" class="btn btn-outline-primary">Category</a>
            </div>

            <div class="col-md-2">
            <a href = "{{route('vendor.index')}}" class="btn btn-outline-primary">Vendor</a>
            </div>
            

            

        </div>
    </div>

  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
  </body>
</html>