<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['product_category_id','category_id','product','vendor_price','sale_price','active','description'];
    // protected $guarded = [];
    public function product()
    {
        return $this->hasOne(Sale::class);
    }
}
