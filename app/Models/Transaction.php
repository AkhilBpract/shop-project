<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    public function category()
    {
        return $this->hasMany(Category::class)->with('product');
    }
    public function user()
    {
        return $thirs->hasOne(User::class);
    }
}
