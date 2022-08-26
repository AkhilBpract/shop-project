<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    use HasFactory;

    protected $fillable = ['name','description','active'];

    public function product()
    {
        return $this->hasMany(Product::class);
    }
    
    public function setCategoryAttribute($category)
    {
        $this->attributes['category'] = strtolower($category);
        
    }   
    public function getCategoryAttribute($category)
    {
        // dd(1);
        return ucfirst($category);
    }
}
