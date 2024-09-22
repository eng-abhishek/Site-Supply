<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Product;
use App\Booking;
use App\User;
use App\Brand;
use DB;

class AdminController extends Controller
{
  public function adminDashboard(){
  
   $data['total_cancel_order']=count(Booking::where('status','cancel')->get());
   $data['total_requested_order']=count(Booking::where('status','requested')->get());
   $data['total_order']=count(Booking::all());
   $data['total_product']=count(Product::all());
   $data['total_user']=count(User::where('role_id','2')->get());
   $data['total_brand']=count(Brand::all());
    $records = DB::table('bookings')->select(DB::raw('*'))
                  ->whereRaw('Date(created_at) = CURDATE()')->get();
    // dd(count($records));
    $data['today_order'] =count($records);
   return view('admin.index',$data);
  }

}
