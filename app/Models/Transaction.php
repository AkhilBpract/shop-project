<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    // protected $fillable = ['date','category_id','product_id','user_id','type','quantity','price','amount']; 

    protected $guarded = [];
    protected $fillable = ['date','product_category_id','product_id','user_id','type','quantity','price','amount']; 
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function product_category()
    {
        return $this->belongsTo(ProductCategory::class);
    }
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
   
   
}
