<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use App\Booking;
use App\Payment_tbl;
use App\Outgoing_product;
use DB;
use Excel;
use Maatwebsite\Excel\Concerns\FromCollection;

class ReportController extends Controller
{
    
    public function bookingReportExcel(){
    return Excel::download(new ProductExport,'orderReport.xlsx');
    } 

    public function paymentReportExcel(){
    return Excel::download(new PaymentExport,'paymentReport.xlsx');
    }

    public function userReportExcel(){
    return Excel::download(new UserExport,'userReport.xlsx');
    }
}

class ProductExport implements FromCollection
{
	 public function collection(){
   return $order=DB::table('bookings')
       ->select('bookings.id','bookings.order_id','bookings.street','bookings.city','bookings.zip_code','bookings.comment','bookings.tax_amount','bookings.address','bookings.product_total_price','bookings.created_at','bookings.delivery_date','bookings.delivery_time','users.name','users.email','users.mobile_no','bookings.status','bookings.transation_id','bookings.payment_mode','bookings.user_rate','bookings.user_comment')       
         ->join('users','users.id','=','bookings.user_id')
         // ->orderBy('bookings.id','desc')
         ->get();
	}
}

class PaymentExport implements FromCollection
{
   public function collection(){
   return $payment=DB::table('bookings')
          ->select('bookings.id','bookings.order_id','bookings.street','bookings.city','bookings.zip_code','bookings.comment','bookings.tax_amount','bookings.address','bookings.product_total_price','bookings.created_at','bookings.delivery_date','bookings.delivery_time','users.name','users.email','users.mobile_no','bookings.status','bookings.transation_id','bookings.payment_mode','bookings.user_rate','bookings.user_comment')
        ->join('users','users.id','=','bookings.user_id')
        // ->orderBy('bookings.id','desc')
        ->get(); 
}
}

class UserExport implements FromCollection
{
   public function collection(){
   return $allUser=User::where('role_id','2')->get(); 
}

}