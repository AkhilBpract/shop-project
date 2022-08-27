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
   
    public function category()
    {
        return $this->belongsTo(ProductCategory::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
   
}
