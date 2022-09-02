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
<p align="right"><a href = "{{route('dashboard')}}""><button type="submit" class="btn btn-outline-primary">>> back to dashboard</button></a>  </p>
</div>
<center><h1>Edit Product</h/></center>
<form method="POST" action ="{{route('product.update',$products->id)}}">
        @csrf
        @method('patch')
        <div class="container mt-5">            
            <div class="row">
            <div class="col-sm-6">                
                    
                    <div class="form-group">
                            <label for="exampleFormControlSelect1">Category</label>
                            <select class="form-control"  name="product_category_id" id="exampleFormControlSelect1">
                            @foreach($datas as $item)
                            <option value= "{{$item->id}}"{{($item->id == $products->product_category_id) ? 'selected' : ''}} >{{$item->name}}</option>
                            @endforeach     
                        </select>
                    </div>   
                    <div class="form-group">
                        <label for="exampleInputEmail1">Vendor Price</label>
                        <input type="text" name="vendor_price" value="{{$products->vendor_price}}" class="form-control" id="Enter Username" aria-describedby="emailHelp" placeholder="Enter Price">                       
                    </div>
                    
                    <label class="mt-2" for="exampleInputEmail1">Available or Not</label>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="active" id="inlineRadio1" value="1"{{ ($products->active=="1")? "checked" : "" }} >
                    <label class="form-check-label" for="inlineRadio1">Yes</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="active" id="inlineRadio2" value="0"  {{ ($products->active=="0")? "checked" : "" }}>
                    <label class="form-check-label" for="inlineRadio2">No</label>
                    </div>

            </div> 
                    
            <div class="col-sm-6">

                    <div class="form-group">
                        <label for="exampleInputEmail1">Product Name</label>
                        <input type="text" name="product" value="{{$products->product}}" class="form-control" id="Enter Username" aria-describedby="emailHelp" placeholder="Enter ProductName">                       
                    </div>
                    
                    <div class="form-group">
                        <label for="exampleInputEmail1">Sale Price</label>
                        <input type="text" name="sale_price" value="{{$products->sale_price}}"  class="form-control" id="Enter Username" aria-describedby="emailHelp" placeholder="Enter Price">                       
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Description</label>
                        <input type="text" name="description" value="{{$products->description}}" class="form-control" id="Enter " aria-describedby="emailHelp" placeholder="Enter Description">                       
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
