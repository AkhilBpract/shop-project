<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;
    protected $table = 'transactions';
    protected $guarded = [];
    protected $fillable = ['date','product_category_id','product_id','user_id','type','quantity','price','amount']; 
   

    

   
}
