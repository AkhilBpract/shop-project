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
        // $from = date($request->from_date);
        // $to = date($request->to_date);        
        // $salesAmount = SELF::whereBetween('date',[$from,$to])->where('type','customer')->sum('amount');
        // $purchaseAmount = SELF::whereBetween('date',[$from,$to])->where('type','vendor')->sum('amount');
        $amount = [];
        $amount['sale'] = SELF::where( function($query) use($request){
            $fromDate = date($request->from_date);
            $toDate = date($request->to_date);
            $query->whereBetween('date',[$fromDate,$toDate]);
            if($request->product_category_id){
            $query->where('product_category_id',$request->product_category_id)
            ->where('product_id',$request->product_id)->where('type','customer');     
        }})->sum('amount'); 

         $amount['purchase'] = SELF::where( function($query) use($request){
            $fromDate = date($request->from_date);
            $toDate = date($request->to_date);
            $query->whereBetween('date',[$fromDate,$toDate]);
            if($request->product_category_id){
            $query->where('product_category_id',$request->product_category_id)
            ->where('product_id',$request->product_id)->where('type','vendor');     
        }})->sum('amount'); 
        // $amount['result'] = $sale - $purchase; 
        return  $amount;
    }
    

}
 
