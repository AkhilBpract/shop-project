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
    <h2 >{{Auth::user()->name}}</h2>
    @if(Auth::user()->hasRole('admin')) 
    <h4>Admin<h4>  
        <div class="row mt-5">
     

            <div class="col-md-2" >
            <a href = "{{route('sales.index')}}"class="btn btn-outline-primary">Sales</a>      
            </div>
            <div class="col-md-2">            
            <a href = "{{route('purchases.index')}}"class="btn btn-outline-primary">Purchases</a>            
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

            <div class="col-md-2">
                 
            <a href = "{{route('product.index')}}" class="btn btn-outline-primary" >Products</a>
          
            </div>
                   

        </div>
        <div class="row mt-5">
            <div class="col-md-2" >
            <a href = "{{route('employees.index')}}" class="btn btn-outline-primary">Employees</a>
            </div>
            <div class="col-md-2">
            <a href = "{{route('report')}}" class="btn btn-outline-primary" >Report </a>
            </div>   
        </div>
        @endif
        
    </div>

<div class="container">
  
  <div class="row">
  @if(Auth::user()->hasRole('sales department'))  
  <h4>Sales Department</h4>
            <div class="col-md-2" >        
            <a href = "{{route('sales.index')}}" class="btn btn-outline-primary">Sales</a>         
            </div>
            <div class="col-md-2">
           
            <a href = "{{route('customers.index')}}"  class="btn btn-outline-primary">Customers</a>
          
            </div>
            <div class="col-md-2">
           
            <a href = "{{route('product_category.index')}}" class="btn btn-outline-primary">Category</a>
           
            </div>

            <div class="col-md-2">
       
            <a href = "{{route('product.index')}}" class="btn btn-outline-primary" >Products</a>
          
            </div>
      @endif
  </div>
</div>

    
<div class="container">
@if(Auth::user()->hasRole('purchase department'))  
  <div class="row"> 
  <u><h4>Purchase Department</h4></u>
  
            <div class="col-md-2 ">            
            <a href = "{{route('purchases.index')}}" class="btn btn-outline-primary">Purchases</a>            
            </div>
            <div class="col-md-2">
            <a href = "{{route('vendors.index')}}" class="btn btn-outline-primary">Vendor</a>           
            </div>
            <div class="col-md-2">
           
            <a href = "{{route('product_category.index')}}" class="btn btn-outline-primary">Category</a>
           
            </div>

            <div class="col-md-2">
       
            <a href = "{{route('product.index')}}" class="btn btn-outline-primary" >Products</a>
          
            </div>
            @endif
  </div>
</div>
  

    
<div class="container">
@if(Auth::user()->hasRole('customer'))  

  <div class="row"> 
  <u><h4>Customer</h4></u>              
        <div class="col-md-2" >        
        <a href = "{{route('sales.index')}}" class="btn btn-outline-primary">Purchaces</a>         
        </div>
      @endif
  </div>
</div>


<div class="container">
@if(Auth::user()->hasRole('vendor'))  

  <div class="row"> 
  <u><h4>Vendor</h4></u>              
  <div class="col-md-2 ">            
            <a href = "{{route('purchases.index')}}" class="btn btn-outline-primary">Sale</a>            
            </div>
      @endif
  </div>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
  </body>
</html>