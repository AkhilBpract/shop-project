<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    // protected $fillable = ['date','category_id','product_id','user_id','type','quantity','price','amount']; 

    protected $guarded = [];
    public function category()
    {
        return $this->hasOne(Category::class);
    }

    public function product()
    {
        return $this->hasOne(Product::class);
    }

    public function user()
    {
        return $this->hasOne(User::class);
    }
}
