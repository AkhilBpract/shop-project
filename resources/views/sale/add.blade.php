<!doctype html>
<html lang="en">
  <head>
  <meta name="csrf-token" content="{{ csrf_token() }}" />
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
<div class="container">
<p align="right"><a href = "{{route('dashboard')}}" class="btn btn-outline-primary">> back to dashboard</button></a>  </p>
<center><h1>Create Sales</h1></center>
</div>
<form method="POST" action ="{{route('sale.store')}}">
    @csrf        
              
    <div class="container mt-3">
        <div class="row">
             
            <div class="col-sm-6">
                    <div class="form-group">
                            <label for="exampleFormControlSelect1">Customer Name </label>
                            <select class="form-control"  name="user_id" id="user_id">
                                <option>-select-</option>
                            @foreach($users as $data)
                            <option value="{{$data->id}}">{{$data->name}}</option>
                            @endforeach                        
                               
                        </select> 
                    </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">product </label>
                            <select class="form-control"  name="product_id" id="product_id">                           
                                                                                  
                            </select> 
                        </div>
     
                    <div class="form-group">
                        <label for="exampleInputPassword1">Quantity</label>
                        <input type="text" name="quantity" class="form-control" id="quantity_id"     placeholder="">
                    </div>    

            </div>
                    
            <div class="col-sm-6">

                    <div class="form-group">
                            <label for="exampleFormControlSelect1">Product Category</label>
                            <select class="form-control"  name="product_category_id" id="category_id">
                           
                            @foreach($category as $item)
                            <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach                
                        </select>
                    </div> 
                    
                    <div class="form-group">
                            <label for="exampleFormControlSelect1">price </label>
                            <input class="form-control" type="text" name="price"id="pirce_id">
                        
                    </div>  
                      <div class="form-group">
                        <label for="exampleInputPassword1">Amount</label>
                        <input type="text" name="amount" class="form-control" id="amount" placeholder="">
                    </div> 
                                           
          
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>


<script type="text/javascript">

$(document).ready(function ($) {
$("#category_id").click(function(e) {
    // console.log(1);

    $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        });
e.preventDefault();

var category_id =  $(this).val();
$.ajax({
url:"{{ route('get_product') }}",
dataType:'html',
type:"POST",
data: { category_id: category_id},

success:function (data) {
//   console.log(data);
    $("#product_id").html(data);

},
error:function (data) {
    $("#product_id").html('There was an error please contact administrator');

},
})
});
});
</script>



<script type="text/javascript">

$(document).ready(function ($) {
$("#product_id").click(function(e) {

    $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        });
e.preventDefault();

var product_id =  $(this).val();
$.ajax({
url:"{{ route('get_price') }}",
dataType:'json',
type:"POST",
data: { product_id: product_id},
success: function(res) {
    console.log(res);
    var price = res;
  $("#pirce_id").val(price);   
  

},
  

})
});
});
$("#quantity_id").keyup(function(){
    var qty= $(this).val();
    console.log(1);
    if(qty){  
  
    var price=$("#pirce_id").val();
    var amt= qty*price;
    $("#amount").val(amt);
  }
  });
</script>






