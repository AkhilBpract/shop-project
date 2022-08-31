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

<div class="container">
    <p align="right"><a href = "{{route('dashboard')}}"><button type="submit" class="btn btn-outline-primary">>> back to dashboard</button></a>  </p>
</div> 
<center><h1><b>Report</b></h1></center>   
    <form method="GET" action ="{{route('profitreport')}}">
        
        <div class="container mt-5">
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">From Date</label>
                        <input type="date" name="from_date" class="form-control" id="Enter Username" aria-describedby="emailHelp" placeholder="Enter Username">                       
                    </div>  
                    <div class="form-group">
                            <label for="exampleFormControlSelect1">Product Category</label>
                            <select class="form-control"  name="product_category_id" id="category_id">
                           <option>-select-</option>
                            @foreach($product_category as $item)
                            <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach                
                        </select>
                    </div> 
                                           
                </div> 
            <div class="col-sm-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">To Date</label>
                        <input type="date" name="to_date" class="form-control" id="Enter Username" aria-describedby="emailHelp" placeholder="Enter Username">                       
                    </div>
                    <div class="form-group">
                            <label for="exampleFormControlSelect1">product </label>
                            <select class="form-control"  name="product_id" id="product_id">                           
                                                                                  
                            </select> 
                    </div>
            </div>
                 
            <div class="pt-5">
              <input class="btn btn-primary " type="submit" value="Result">
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





