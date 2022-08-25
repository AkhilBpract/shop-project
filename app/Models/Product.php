<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['category_id','product','vendor_price','sale_price','active'];
    // protected $guarded = [];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
