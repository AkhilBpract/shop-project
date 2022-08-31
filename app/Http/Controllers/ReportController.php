<?php
namespace App\Http\Controllers;
use App\Models\Transaction;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function report()
    {
        $product_category = ProductCategory::get();
        return view('profitreport.search',compact('product_category'));
    }

    
    public function profitreport(Request $request)
    {   
        $amount = Transaction::getAmountWithDate($request);        
        $salesAmount = $amount['sale'];
        $purchaseAmount = $amount['purchase'];
        $result = $salesAmount-$purchaseAmount;
        
        if($result <= 0)
        {
            $report = abs($result);
            $message="loss";
            
        }else{
            $report = $result;
            $message="profit";
        
        }
        return view('profitreport.report',compact('report','message','salesAmount','purchaseAmount'));

    }
}
