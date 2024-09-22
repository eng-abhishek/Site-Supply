<?php
namespace App\Http\Controllers;
use App\Cart;
use App\product;
use App\ProductPrice;
use App\ProductCategory;
use App\Qty;
use App\City;
use App\Booking;
use App\Payment;
use App\User;
use DB;
use session;
use App;
use App\ShippingRange;
use Illuminate\Http\Request;
use App\Mail\bookingConfirmation;
use Razorpay\Api\Api;
use Redirect;
use Mail;
//error_reporting(1);
class CartController extends Controller
{

    public function checkMaxCountVal($product_id,$count){
  
    $minOrder=product::find($product_id)->min_order_count;

    if($count>=$minOrder){   
    return 1; 
    }else{
    return 0; 
    }
    }

    public function addToTmpCart(Request $req){

     $product_id=$req->input('product_id');
     $count=$req->input('count');
     $price_id=$req->input('price_id');
     $qty_id=$req->input('qty_id');

     if($this->checkMaxCountVal($product_id,$count)==0){
     $minOrder=product::find($product_id)->min_order_count;
     $ab[0]="0";
     $ab[1]=$minOrder;
     }else{
     $ab[0]="1";

    $productData=product::where('id',$product_id)->get();
    $productPrice=ProductPrice::where('id',$price_id)->get();
    $qtyData=Qty::where('id',$qty_id)->get();
    $subCategoryId=$productData[0]->sub_category_id; 
    if($count>0){
     $productCount=$count;  
    }else{
     $productCount=$productData[0]->min_order_count;   
    }

     $id=$productData[0]->id;
     $catId=product::where('id',$id)->first()->sub_category_id;
     $gst=ProductCategory::where('id',$catId)->first()->GST;
      
     $cart = session()->get('cart');

        if(!$cart) {
        
            $cart = [
                    $id => [

                         "count"=>$productCount,
                         "name" =>$productData[0]->name,
                         "image"=>$productData[0]->image,   
                         "qty"=>$qtyData[0]->name,
                         "price"=>$productPrice[0]->price,
                         "id"=>$productData[0]->id,
                         "subCategoryId"=>$subCategoryId,
                         "hsn_code"=>$productData[0]->hsn_code,
                         "gst"=>$gst,
                    ]
                    ];

             session()->put('cart', $cart);
                     }
       
               $cart[$id] = [
                       
                         "count"=>$productCount,
                         "name" =>$productData[0]->name,
                         "image"=>$productData[0]->image,   
                         "qty"=>$qtyData[0]->name,
                         "price"=>$productPrice[0]->price,
                         "id"=>$productData[0]->id,
                         "subCategoryId"=>$subCategoryId,  
                         "hsn_code"=>$productData[0]->hsn_code,
                         "gst"=>$gst,
                            ];
               session()->put('cart', $cart);
               
     }
     return $ab;
    }


    public function addToCart(Request $req){
    
     $product_id=$req->input('product_id');
     $price_id=$req->input('price_id');
     $qty_id=$req->input('qty_id');

     $count=$req->input('count');

    $productData=product::where('id',$product_id)->get();
    $productPrice=ProductPrice::where('id',$price_id)->get();
    $qtyData=Qty::where('id',$qty_id)->get();
 
if($count>0){
     $productCount=$count;  
}else{
     $productCount=$productData[0]->min_order_count;   
}

     $id=$productData[0]->id;

     $catId=product::where('id',$id)->first()->sub_category_id;
     
     $gst=ProductCategory::where('id',$catId)->first()->GST;
     $subCategoryId=$productData[0]->sub_category_id;
 
        $cart = session()->get('cart');

        if(!$cart) {
        
            $cart = [
                    $id => [
 
                         "count"=>$productCount,
                         "name" =>$productData[0]->name,
                         "image"=>$productData[0]->image,   
                         "qty"=>$qtyData[0]->name,
                         "price"=>$productPrice[0]->price,
                         "id"=>$productData[0]->id,
                         "subCategoryId"=>$subCategoryId,
                         "hsn_code"=>$productData[0]->hsn_code,
                         "gst"=>$gst,
                    ]
                    ];

             session()->put('cart', $cart);
                     }
               $cart[$id] = [
                       
                         "count"=>$productCount,
                         "name" =>$productData[0]->name,
                         "image"=>$productData[0]->image,   
                         "qty"=>$qtyData[0]->name,
                         "price"=>$productPrice[0]->price,
                         "id"=>$productData[0]->id,  
                         "subCategoryId"=>$subCategoryId,
                         "hsn_code"=>$productData[0]->hsn_code,
                         "gst"=>$gst,
                            ];
               session()->put('cart', $cart);        
    }
/*--------------------  add more ----------------------*/
          

/*--------------------  add more ----------------------*/

public function countUp(Request $req){
         $id=$req->id;

         $minOrderCount=product::select('min_order_count')->where('id',$id)->get();
         $cart=session()->get('cart');

         if($minOrderCount[0]->min_order_count==$req->InitalCount){
          $cart[$id]['count']=$minOrderCount[0]->min_order_count;
          $cart[$id]['count']++;
          session()->put('cart', $cart);
         }else{
          $cart[$id]['count']++;
          session()->put('cart', $cart);
         }  
         return $cart[$id]['count'];
}

public function countDown(Request $req){
          $id=$req->id;
 
          $minOrderCount=product::select('min_order_count')->where('id',$id)->get();

          if($req->InitalCount>$minOrderCount[0]->min_order_count){
          $cart=session()->get('cart');
          if($cart[$id]['count']>1){
          $cart[$id]['count']--;
          }
          session()->put('cart', $cart);
          return $cart[$id]['count'];
          }else{
          return $minOrderCount[0]->min_order_count;
          }
}

public function refreshCart(Request $req){
$data['first_row']=ShippingRange::find('1');
$data['second_row']=ShippingRange::find('2');
$data['third_row']=ShippingRange::find('3');
$data['fourth_row']=ShippingRange::find('4');

return view('website.ajax_cart',$data);
}

public function refreshShortCart(Request $req){
$data['first_row']=ShippingRange::find('1');
$data['second_row']=ShippingRange::find('2');
$data['third_row']=ShippingRange::find('3');
$data['fourth_row']=ShippingRange::find('4');

return view('website.ajax_short_cart',$data);
}

/*-------------- Destroy Cart  -----------------*/

        public function removeCart(){
        session()->forget('cart');
        return redirect('/'); 
        }

/*------ getCartCount -------*/

        public function getCartCount(){
        $val1=count(session('cart'));
        return $val1;
        }

        public function index(){
     
      if(empty(session()->get('locationId'))){
      $cityData=City::orderBy('id','ASC')->where('status','1')->limit('1')->get();
      session()->put('locationId',$cityData[0]->id);
      $cityId=session()->get('locationId');
      }else{
      $cityId=session()->get('locationId');
      } 
        $data['city']=City::find($cityId)->name;

        $data['first_row']=ShippingRange::find('1');
        $data['second_row']=ShippingRange::find('2');
        $data['third_row']=ShippingRange::find('3');
        $data['fourth_row']=ShippingRange::find('4');
        return view('website.mycart',$data);
        }


        public function saveBooking(Request $req){

        parse_str($_POST['bokinfo'],$anv);
        $total=0;
        foreach(session('cart') as $cartData){
          $total+=$cartData['price'];
         }
      
$total=0; $totalWithoutShippingCharge=0; $totalOnShippingCharge=0; $gstAmt=0;      
foreach(session()->get('cart') as $cart){

$getGst=ProductCategory::where('id',$cart['subCategoryId'])->get();
$gstAmt+=(($cart['price'] * $cart['count'])*($getGst[0]->GST))/(100+$getGst[0]->GST);

if($getGst[0]->shippingStatus=='1'){
  $totalOnShippingCharge+=$cart['price'] * $cart['count'];
}else{
  $totalWithoutShippingCharge+=$cart['price'] * $cart['count'];
}

$total+=$cart['price'] * $cart['count'];
}
        $first_row=ShippingRange::find('1');
        $second_row=ShippingRange::find('2');
        $third_row=ShippingRange::find('3');
        $fourth_row=ShippingRange::find('4');

$shipingCharge=0;

if(((int)$totalOnShippingCharge<=$first_row->max_amount) && ((int)$totalOnShippingCharge>=$first_row->min_amount)){
$shipingCharge=$first_row->charge;

}elseif(((int)$totalOnShippingCharge<=$second_row->max_amount) && ((int)$totalOnShippingCharge>=$second_row->min_amount)){
$shipingCharge=$second_row->charge;

}elseif(((int)$totalOnShippingCharge<=$third_row->max_amount) && ((int)$totalOnShippingCharge>=$third_row->min_amount)){
$shipingCharge=$third_row->charge;

}elseif(((int)$totalOnShippingCharge>0)){
$shipingCharge=$fourth_row->charge;
}else{
$shipingCharge=0;
}  

         $chkUser=User::where(['mobile_no'=>$anv['mobile'],'userType'=>'2'])->get();
         if($chkUser[0]->id){

         if(empty($chkUser[0]->name) && empty($chkUser[0]->email)){
         $userInfoData=User::find($chkUser[0]->id);
 
         $userInfoData->name=$anv['user_name'];
         $userInfoData->mobile_no=$anv['mobile'];
         $userInfoData->landmarkAddress=$anv['landmark'];
         $userInfoData->city=$anv['city'];
         $userInfoData->zip_code=$anv['zipcode'];
         $userInfoData->email=$anv['user_email_id'];

         $userInfoData->cmp_name=$anv['cmp_name'];
         $userInfoData->gst_no=$anv['gst_no'];
     
         $userInfoData->update();

         }else{

         }
        if(session()->get('orderId')){
         $dataval=Booking::where('order_id',session()->get('orderId'))->get();
         $booking=Booking::find($dataval[0]->id); 
         $booking->status= 'pending';
         $booking->street= $anv['street'];
         $booking->city= $anv['city'];
         $booking->zip_code= $anv['zipcode'];
         $booking->address=$anv['landmark'];
         $booking->comment= $anv['comment'];
         
         $booking->delivery_date=$anv['deliveryDate'];
         $booking->delivery_time=$anv['deliveryTime'];
         $booking->cmp_name=$anv['cmp_name'];
         $booking->gst_no=$anv['gst_no'];

         $booking->sitePersonName=$anv['sitePersonName'];
         $booking->sitePersonCNo=$anv['sitePersonMobileNo'];

         $booking->tax_amount=$gstAmt;
         $booking->applyShipChargAmt=$totalOnShippingCharge;
         $booking->shippingCharge=$shipingCharge;

         $booking->user_id=session()->get('logedIn');

         $booking->product_total_price=$total + $shipingCharge;
         $booking->non_act_totalAmt=$total-$gstAmt;
         $booking->order_id=session()->get('orderId');
         $booking->update();

         $bokId=$dataval[0]->id;
         }else{

         session()->put('orderId','#'.mt_rand(100000, 999999));
         $booking=new Booking;
         $booking->status= 'pending';
         $booking->street= $anv['street'];
         $booking->city= $anv['city'];
         $booking->zip_code= $anv['zipcode'];
         $booking->address=$anv['landmark'];
         $booking->comment= $anv['comment'];
         
         $booking->delivery_date=$anv['deliveryDate'];
         $booking->delivery_time=$anv['deliveryTime'];
         $booking->cmp_name=$anv['cmp_name'];
         $booking->gst_no=$anv['gst_no'];

         $booking->sitePersonName=$anv['sitePersonName'];
         $booking->sitePersonCNo=$anv['sitePersonMobileNo'];

         $booking->tax_amount=$gstAmt;
         $booking->applyShipChargAmt=$totalOnShippingCharge;
         $booking->shippingCharge=$shipingCharge;

         $booking->user_id=session()->get('logedIn');

         $booking->product_total_price=$total + $shipingCharge;
         $booking->non_act_totalAmt=$total-$gstAmt;
         $booking->order_id=session()->get('orderId');
         $booking->save();
         $bokId=$booking->id;

         }
         }
         else{
         $userInfo=new User; 
         $userInfo->name=$anv['user_name'];
         $userInfo->mobile_no=$anv['mobile'];
         $userInfo->landmarkAddress=$anv['landmark'];
         $userInfo->city=$anv['city'];
         $userInfo->zip_code=$anv['zipcode'];
         $userInfo->userType=2;
         $userInfo->email=$anv['user_email_id'];

         $userInfo->cmp_name=$anv['cmp_name'];
         $userInfo->gst_no=$anv['gst_no'];
     
         $userInfo->save();
         $lastUserId=$userInfo->id;

         if(session()->get('orderId')){

         $dataval=Booking::where('order_id',session()->get('orderId'))->get();
         $booking=Booking::find($dataval[0]->id);

         $booking->street= $anv['street'];
         $booking->city= $anv['city'];
         $booking->zip_code= $anv['zipcode'];
         $booking->address=$anv['landmark'];
         $booking->comment= $anv['comment'];
         $booking->status= 'pending';
         $booking->delivery_date=$anv['deliveryDate'];
         $booking->delivery_time=$anv['deliveryTime'];
         $booking->sitePersonName=$anv['sitePersonName'];
         $booking->sitePersonCNo=$anv['sitePersonMobileNo'];

         $booking->tax_amount=$gstAmt;
         $booking->applyShipChargAmt=$totalOnShippingCharge;
         $booking->shippingCharge=$shipingCharge;

         $booking->user_id=$lastUserId;
         $booking->product_total_price=$total + $shipingCharge;
         $booking->non_act_totalAmt=$total-$gstAmt;
         $booking->order_id=session()->get('orderId');
         $booking->cmp_name=$anv['cmp_name'];
         $booking->gst_no=$anv['gst_no'];
         $booking->update();

         $bokId=$dataval[0]->id;


         }else{


         session()->put('orderId','#'.mt_rand(100000, 999999));
         $booking=new Booking;
         $booking->street= $anv['street'];
         $booking->status= 'pending';
         $booking->city= $anv['city'];
         $booking->zip_code= $anv['zipcode'];
         $booking->address=$anv['landmark'];
         $booking->comment= $anv['comment'];
      
         $booking->delivery_date=$anv['deliveryDate'];
         $booking->delivery_time=$anv['deliveryTime'];
         $booking->sitePersonName=$anv['sitePersonName'];
         $booking->sitePersonCNo=$anv['sitePersonMobileNo'];

         $booking->tax_amount=$gstAmt;
         $booking->applyShipChargAmt=$totalOnShippingCharge;
         $booking->shippingCharge=$shipingCharge;

         $booking->user_id=$lastUserId;
         $booking->product_total_price=$total + $shipingCharge;
         $booking->non_act_totalAmt=$total-$gstAmt;
         $booking->order_id=session()->get('orderId');
         $booking->cmp_name=$anv['cmp_name'];
         $booking->gst_no=$anv['gst_no'];
 
         //echo"<pre";
        // print_r($booking);
         $booking->save();
         $bokId=$booking->id;
         }
         }

                  session()->put('bok_id',$bokId);
                 // echo"<pre>";
                 // print_r(session('cart'));
                 // die;
                 $pyData=Payment::where('booking_id',$booking->id)->get();
                  if($pyData[0]->id){
                 
                   foreach(session('cart') as $cartData){
                   Payment::where('booking_id',$booking->id)->delete();
                   $payment=new Payment;
                   $payment->product_name=$cartData['name'];
                   $payment->price=$cartData['price'];
                   $payment->product_qty=$cartData['qty'];
                   $payment->product_img=$cartData['image'];
                   $payment->product_count=$cartData['count'];
                   $payment->booking_id=$booking->id;
                   $payment->hsn_code=$cartData['hsn_code'];
                   $payment->gst=$cartData['gst'];
                   
                   $payment->save();
                   }
                   }else{
                   foreach(session('cart') as $cartData){
                   $payment=new Payment;
                   $payment->product_name=$cartData['name'];
                   $payment->price=$cartData['price'];
                   $payment->product_qty=$cartData['qty'];
                   $payment->product_img=$cartData['image'];
                   $payment->product_count=$cartData['count'];
                   $payment->booking_id=$booking->id;
                   $payment->hsn_code=$cartData['hsn_code'];
                   $payment->gst=$cartData['gst'];
                   $payment->save();
                   }
                   }
//                    echo"<pre>";
//                    print_r($payment);
// die;
         $userEmail=$anv['user_email_id'];
        }

        public function getOTP(Request $req){
        $mobilNo=$req->input('mobile_no');
        $checkUser=User::where('mobile_no',$mobilNo)->get();
        $otp=rand(10000,99999);
        session()->put('otp',$otp);
        session()->put('mobile_no',$mobilNo);
      //  http://2factor.in/API/V1/65a7129a-8c8d-11eb-a9bc-0200cd936042/SMS/7071310320/4499/SSUPLY
  $curl = curl_init();
  curl_setopt_array($curl, array(
  CURLOPT_URL => "https://2factor.in/API/V1/65a7129a-8c8d-11eb-a9bc-0200cd936042/SMS/".$mobilNo."/".$otp."/sitesupply+sms+otp",

  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_POSTFIELDS => "",
  CURLOPT_HTTPHEADER => array(
    "content-type: application/x-www-form-urlencoded"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
   $startSession=time();
   session()->put('start_session',$startSession);
  //echo $response;
}
        return $otp;
        }


        public function resendOTP(){
        session()->forget('otp');   
        $mobilNo=session()->get('mobile_no');  
        $otp=rand(10000,99999);
        session()->put('otp',$otp);
        
  $curl = curl_init();
  curl_setopt_array($curl, array(
  CURLOPT_URL => "https://2factor.in/API/V1/65a7129a-8c8d-11eb-a9bc-0200cd936042/SMS/".$mobilNo."/".$otp."/sitesupply+sms+otp",

  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_POSTFIELDS => "",
  CURLOPT_HTTPHEADER => array(
    "content-type: application/x-www-form-urlencoded"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
    $startSession=time();
   session()->put('start_session',$startSession);
 //  echo $response;
}       
        return $otp;       
        }


        public function matchOTP(Request $req){
        $expireTime=session()->get('start_session') + 1*60;
        // echo $expireTime.'exp';
        // echo time().'Act';
       if((time() > (session()->get('start_session') + 1*60) )){
           session()->forget('otp');
           $otp_erro="101";
           return $otp_erro; 
        }else{ 

        if($req->otp==session()->get('otp'))
            {
         session()->get('mobile_no');  
         $checkUser=User::where('mobile_no',session()->get('mobile_no'))->get();
       
         if($checkUser[0]->id){
         session()->put('logedIn',$checkUser[0]->id); 
            }else{
          $user=new User;
          $user->mobile_no=session()->get('mobile_no');  
          $user->userType='2';  
          $user->save();
         session()->put('logedIn',$user->id);  
            }
            }
        else{             
          $otp_error="102";
          return $otp_error;   
            }

        }
        }
        
    public function removeItem(Request $request)
    {
        if($request->id) {

        $cart = session()->get('cart');

        if(isset($cart[$request->id])) {

        unset($cart[$request->id]);

        session()->put('cart', $cart);
        }
        }
    }

    public function checkProductCount(Request $request){
   
        if($request->id){
        $cart = session()->get('cart');
        if(isset($cart[$request->id])){
        return $cart[$request->id]['count'];
        }
        }
    }

    public function updateCartProductListPage(Request $request){
    
       $minOrderCount=product::select('min_order_count')->where('id',$request->id)->get();
       $cart = session()->get('cart');
       if($request->count>=$minOrderCount[0]->min_order_count){
     
        $cart[$request->id]['count']=$request->count;
        session()->put('cart', $cart);
        
       return $cart[$request->id]['count']; 
        }
        $cart[$request->id]['count']=$minOrderCount[0]->min_order_count;
        session()->put('cart', $cart);
        return $minOrderCount[0]->min_order_count; 
     }

       public function userLogout(){
         session()->forget('logedIn');
         return redirect('/');    
        }

        /*--------------------*/

        public function generateInvoice($bokId){

         $data['order']=DB::table('bookings')
         ->select('bookings.payment_mode','bookings.id','bookings.user_id','bookings.gst_no','bookings.cmp_name','bookings.city','bookings.street','bookings.address','bookings.zip_code','bookings.non_act_totalAmt','bookings.id','bookings.sitePersonName','bookings.sitePersonCNo','bookings.gst_no','bookings.shippingCharge','bookings.applyShipChargAmt','bookings.cmp_name','bookings.order_id','bookings.city','bookings.tax_amount','bookings.product_total_price','bookings.created_at','bookings.delivery_date','bookings.delivery_time','users.name','users.email','users.mobile_no')
           ->join('users','users.id','=','bookings.user_id')
           ->where('bookings.id',$bokId)
           ->orderBy('bookings.id','desc')  
           ->get();
         $data['productItemDetails']=Payment::where('booking_id',$bokId)->get();
         //$pdfname = 'invoice'.$bokId.'.pdf';


    if(empty(session()->get('locationId'))){
    $cityData=City::orderBy('id','ASC')->limit('1')->get();
    session()->put('locationId',$cityData[0]->id);
    $cityId=session()->get('locationId');
    }else{
    $cityId=session()->get('locationId');
    }

        $DeliveredCity=City::where('id',$cityId)->first();
        $data['deliveredFrom']=$DeliveredCity->name;

        $pdfname = 'invoice'.$bokId.'.pdf';        
        $file_path = "public/uploads/invoices/".$pdfname;
        unlink($file_path);

         $pdf=App::make('dompdf.wrapper');
         $upBok=Booking::find($bokId);
         $upBok->invoice=$pdfname;
         $upBok->save();
       //return view('website.new_invoice_format',$data);
       return $pdf->loadView('website.new_invoice_format',$data)->save(public_path().'/uploads/invoices/'.$pdfname)->stream('hkd.pdf');
    //    return $pdf->loadView('website.new_invoice_format',$data)->save(public_path().'/uploads/invoices/'.$pdfname)->stream('hkd.pdf');
        }

        public function rate(){
        return view('website.thanks');
        }

        public function submitRating(Request $request){
            $upBok=Booking::find(session()->get('bok_id'));
            $upBok->user_rate=$request->rating;
            $upBok->user_comment=$request->user_comment;         
            $upBok->save();
            session()->forget('bok_id');
            session()->forget('orderId');
            session()->forget('cart');
            return redirect('/');
        }

        public function submitRatingFromUserProfile(Request $request){     
            $upBok=Booking::find($request->FeadBackEditId);
            $upBok->user_rate=$request->rating;
            $upBok->user_comment=$request->user_comment;
            $upBok->save();
            return redirect('user-profile');
        }

        public function empityCart(){
           session()->forget('cart');
        }

        public function payment(Request $request)
        {
         $userEmail=User::find(session()->get('logedIn'))->email;
         $userContactNo=User::find(session()->get('logedIn'))->mobile_no;
         $userName=User::find(session()->get('logedIn'))->name;
            // return $request->input();    
        // die;

        if($request->status=='COD'){

        $userEmail=User::find(session()->get('logedIn'))->email;
        $userOrderId=session()->get('orderId');

        $invoiceName='invoice'.session()->get('bok_id').'.pdf';
        Mail::to([$userEmail])->cc('info@sitesupply.in')->send(new bookingConfirmation($userOrderId,$invoiceName));

        $updatePyBok=Booking::find(session()->get('bok_id'));
        $updatePyBok->payment_mode='cash';
        $booking->status= 'requested';
        $updatePyBok->update();

$name=$userName;
$orderId=session()->get('orderId');;
$contact_no=$userContactNo,"7348481111";
$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => "http://2factor.in/API/V1/65a7129a-8c8d-11eb-a9bc-0200cd936042/ADDON_SERVICES/SEND/TSMS",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "{\"From\": \"SSUPLY\",\"To\": \"$contact_no\",\"TemplateName\": \"For Booking SMS\", \"VAR1\": \"$name\", \"VAR2\":\"$orderId\"}",
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo $response;
}

         return 150;
         }else{

        $input = $request->all();  
        $api = new Api(config('custom.razor_key'), config('custom.razor_secret'));
        $payment = $api->payment->fetch($input['razorpay_payment_id']);

        if(count($input)  && !empty($input['razorpay_payment_id'])) 
        {

            $updateBokByTrId=Booking::find(session()->get('bok_id'));
            $updateBokByTrId->transation_id=$input['razorpay_payment_id'];
            $updateBokByTrId->payment_mode='online';
            $updateBokByTrId->payment_status='Paid';
            $booking->status= 'requested';
            $updateBokByTrId->update();
            try 
            {
                $response = $api->payment->fetch($input['razorpay_payment_id'])->capture(array('amount'=>$payment['amount'])); 

        $userEmail=User::find(session()->get('logedIn'))->email;
        $userOrderId=session()->get('orderId');
        $invoiceName='invoice'.session()->get('bok_id').'.pdf';
        Mail::to([$userEmail])->cc('info@sitesupply.in')->send(new bookingConfirmation($userOrderId,$invoiceName));

            } 
            catch (\Exception $e) 
            {
                return  $e->getMessage();
                \Session::put('error',$e->getMessage());
                print_r(session()->get('error'));
                return 404;
            }            
          }

$name=$userName;
$orderId=session()->get('orderId');;
$contact_no=$userContactNo,"7348481111";
$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => "http://2factor.in/API/V1/65a7129a-8c8d-11eb-a9bc-0200cd936042/ADDON_SERVICES/SEND/TSMS",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "{\"From\": \"SSUPLY\",\"To\": \"$contact_no\",\"TemplateName\": \"For Booking SMS\", \"VAR1\": \"$name\", \"VAR2\":\"$orderId\"}",
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo $response;
}
          
        return 101;
         }

         $this->generateInvoice(session()->get('bok_id'));

        }
        
        public function changePaymentStatus(Request $request){
        $bokInfo=Booking::find($request->input('id'));
        $bokInfo->payment_status=$request->input('val');
        $bokInfo->update();
        }
}