
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  </head>
  <body>  
  <a href="{{route('dashboard')}}" class="btn btn-info">Back</a>

    <div class="container">
    <div class="row">
      <div class="col-sm-9">
      <a href = "{{route('product.create')}}" class="btn btn-outline-primary">+ Add Product</button></a>
      </div>
      <div class="col-sm-3">
      <p align="right"><a href = "{{route('dashboard')}}" class="btn btn-outline-primary">>> back to dashboard</button></a></p>
      </div>
    </div>
  </div>
  
  @if(count($product) > 0) 
<div class="container">
 <table class="table" >
 <h4>Product </h4>
    <thead>
        <tr>
            <th>Category</th>
            <th>Product</th>
            <th>Vendor price</th>
            <th>Sale price</th>
            <th>Status</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </tead>
    <tbody >
    @foreach($product as $products)
       
        <tr>
            <td>{{$products->product_category->name}}</td>
            <td>{{$products->product}}</td> 
            <td>{{$products->vendor_price}}</td> 
            <td>{{$products->sale_price}}</td> 
            <td>@if($products->active == 1)active @else Not Active @endif</td> 
            <td><a href="{{route('product.edit',$products->id)}}" class="btn btn-secondary">Edit </a></td>
            <td><form action="{{route('product.destroy',$products->id)}}" method="POST">
            @csrf
            @method('delete')
            <button class="btn btn-danger" type="submit">delete</button> 
            </td> 
            </form> 
        </tr>
      
    @endforeach   
    </tbody>
</table> 
</div> 
@else <center> Empty</center>@endif
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
  </body>
</html>