<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Booking;
use App\Payment;
use App\User;
use DB;
use Mail;
use App\Mail\trackBookingStatus;

error_reporting(1);
class BookingController extends Controller
{
    public function index(){
        $data['booking']=DB::table('bookings')
         ->select('bookings.non_act_totalAmt','bookings.id','bookings.order_id','bookings.street','bookings.city','bookings.zip_code','bookings.comment','bookings.tax_amount','bookings.address','bookings.created_at','bookings.delivery_date','bookings.delivery_time','bookings.status','users.name','users.mobile_no')         
         ->join('users','users.id','=','bookings.user_id')
         ->orderBy('bookings.id','desc')
         ->get();     
         return view('admin.booking.index',$data);
       }

    public function cancelOrder(){
       $data['booking']=DB::table('bookings')
         ->select('bookings.non_act_totalAmt','bookings.id','bookings.order_id','bookings.street','bookings.city','bookings.zip_code','bookings.comment','bookings.tax_amount','bookings.address','bookings.created_at','bookings.delivery_date','bookings.delivery_time','bookings.status','users.name','users.mobile_no')         
         ->join('users','users.id','=','bookings.user_id')
         ->orderBy('bookings.id','desc')
         ->where('bookings.status','cancel')
         ->get();     
         return view('admin.booking.index',$data);
    }

    public function booking_detail($id){
        $data['order']=DB::table('bookings')
         ->select('bookings.payment_status','bookings.non_act_totalAmt','bookings.id','bookings.invoice','bookings.sitePersonName','bookings.sitePersonCNo','bookings.gst_no','bookings.shippingCharge','bookings.applyShipChargAmt','bookings.cmp_name','bookings.order_id','bookings.street','bookings.city','bookings.zip_code','bookings.comment','bookings.tax_amount','bookings.address','bookings.product_total_price','bookings.created_at','bookings.delivery_date','bookings.delivery_time','users.name','users.email','users.mobile_no','bookings.status','bookings.transation_id','bookings.payment_mode','bookings.user_rate','bookings.user_comment')
           ->join('users','users.id','=','bookings.user_id')
           ->where('bookings.id',$id)
           ->get();
         $data['productItemDetails']=Payment::where('booking_id',$data['order'][0]->id)->get();
            return view('admin.booking.detail',$data);
    }

    public function booking_history($id){
         $data['order']=DB::table('bookings')
         ->select('bookings.payment_status','bookings.non_act_totalAmt','bookings.id','bookings.order_id','bookings.sitePersonName','bookings.sitePersonCNo','bookings.gst_no','bookings.shippingCharge','bookings.applyShipChargAmt','bookings.cmp_name','bookings.street','bookings.city','bookings.zip_code','bookings.comment','bookings.tax_amount','bookings.address','bookings.product_total_price','bookings.created_at','bookings.delivery_date','bookings.delivery_time','users.name','users.email','users.mobile_no','bookings.status','bookings.transation_id','bookings.payment_mode','bookings.user_rate','bookings.user_comment')
           ->join('users','users.id','=','bookings.user_id')
           ->where('bookings.id',$id)
           ->get();
         $data['productItemDetails']=Payment::where('booking_id',$data['order'][0]->id)->get();
           return view('website.orderHistory',$data);
    }

     public function bookingReport(){
        $data['booking']=DB::table('bookings')
       ->select('bookings.non_act_totalAmt','bookings.id','bookings.order_id','bookings.sitePersonName','bookings.sitePersonCNo','bookings.gst_no','bookings.shippingCharge','bookings.applyShipChargAmt','bookings.cmp_name','bookings.street','bookings.city','bookings.zip_code','bookings.comment','bookings.tax_amount','bookings.address','bookings.product_total_price','bookings.created_at','bookings.delivery_date','bookings.delivery_time','users.name','users.email','users.mobile_no','bookings.status','bookings.transation_id','bookings.payment_mode','bookings.user_rate','bookings.user_comment')       
         ->join('users','users.id','=','bookings.user_id')
         ->orderBy('bookings.id','desc')
         ->get();     
         return view('admin.report.booking',$data);
       }

     public function user_cancel_order($id){
         $userBok=Booking::find($id);
         $userBok->status='cancel';
         $userBok->save();
         return redirect('user-profile');
      }

    public function payment(){
        $data['order']=DB::table('bookings')
          ->select('bookings.non_act_totalAmt','bookings.id','bookings.payment_status','bookings.order_id','bookings.street','bookings.city','bookings.zip_code','bookings.comment','bookings.tax_amount','bookings.address','bookings.product_total_price','bookings.created_at','bookings.delivery_date','bookings.delivery_time','users.name','users.email','users.mobile_no','bookings.status','bookings.transation_id','bookings.payment_mode','bookings.user_rate','bookings.user_comment')
        ->join('users','users.id','=','bookings.user_id')
        ->orderBy('bookings.id','desc')
        ->get();     
       return view('admin.report.payment',$data);
    }

    public function userReport(){
        $data=User::orderBy('id','desc')->where('role_id','2')->get()->toArray();  
        $order=array();
        foreach ($data as $key => $value){
        $order[]=$value;
        $order[$key]['count'][]=count(Booking::where('user_id',$value['id'])->get()->toArray());
        }
        return view('admin.report.user',['order'=>$order]);
    }

    public function changeBookingStatus(Request $req){
    $bok=Booking::find($req->id);
    $abc=User::find($bok->user_id);
    $userEmail=User::find($bok->user_id)->email;
  
    $userOrderId=$bok->order_id;
    $orderStatus=$req->curStatus;
    $bok->status=$req->curStatus;
    $bok->update();
    Mail::to([$userEmail])->cc('kipm1engg@gmail.com')->send(new trackBookingStatus($userOrderId,$orderStatus));
    }

    public function checkOrderStatusForCancel(Request $req){
    $userBok=Booking::find($req->id);
  
    if($userBok->status=='dispatch'){
          return 401;
         }elseif($userBok->status=='delivered'){
          return 402;
         }else{
    $userEmail=User::find($userBok->user_id)->email;
    $userOrderId=$userBok->order_id;     
    Mail::to([$userEmail])->cc('kipm1engg@gmail.com')->send(new trackBookingStatus($userOrderId,'cancel'));
      return 202;
         }
       
     }
}
