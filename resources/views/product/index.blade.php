
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  </head>
  <body>  
  <p align="right"><a href = "{{route('add_product')}}""><button type="submit" class="btn btn-outline-primary">+ Add Product</button></a>  </p>  
 <table class="table">
    <thead>
        <tr>
            <th>Category</th>
            <th>Product</th>
            <th>Vendor price</th>
            <th>Sale price</th>
            <th>Status</th>
            <th>Edit</th>
        </tr>
    </tead>
    <tbody>
      @foreach($datas as $data)
      @foreach($data->product as $products)
        <tr>
          <td>{{$data->category}}</td>
          <td>{{$products->product}}</td>  
          <td>{{$products->vendor_price}}</td> 
          <td>{{$products->sale_price}}</td> 
          <td>@if($products->active == 1)active @else Not Active @endif</td>  
          <td><a href="{{route('edit_product',$products->id)}}"  class="btn btn-outline-primary">Edit </a></td>        
        </tr>
        @endforeach
      @endforeach
     
    </tbody>
</table>
  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
  </body>
</html>