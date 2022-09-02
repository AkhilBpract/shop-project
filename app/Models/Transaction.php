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
    public static function getAmountWithDate($request)
    {         
        
        $amount = [];            
        $amount['sale'] = SELF::where( function($query) use($request){   

            $fromDate = date($request->from_date);
            $toDate = date($request->to_date);          

            $query->whereBetween('date',[$fromDate,$toDate])->where('type','sales');
            if($request->product_category_id ){
                $query->where('product_category_id',$request->product_category_id);
                if($request->product_id != "")
                    $query->where('product_id',$request->product_id);
            }    
        })->sum('amount'); 
        
         $amount['purchase'] = SELF::where( function($query) use($request){
            
            $fromDate = date($request->from_date);
            $toDate = date($request->to_date);
            
            $query->whereBetween('date',[$fromDate,$toDate])->where('type','purchase');
            if($request->product_category_id ){
                $query->where('product_category_id',$request->product_category_id);
                if($request->product_id != "")
                $query->where('product_id',$request->product_id);     
        }})->sum('amount');      
      
        return  $amount;
    }
    
    public function scopeSale($query)
    {
         return  $query->where('type','sales');
    }
    public function scopePurchase($query)
    {
         return  $query->where('type','purchase');
    }
}
 
