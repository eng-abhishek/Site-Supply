<?php

namespace App\Http\Controllers;
use App\Mail\ContactUs;
use App\EnquaryForm;
use Illuminate\Http\Request;
use Session;
use DB;
use Mail;

class EnquaryFormController extends Controller
{

    public function index()
    {    
        $data['category']=DB::table('enquary_forms')
          ->select('enquary_forms.created_at','enquary_forms.id','enquary_forms.contactNo','enquary_forms.name','enquary_forms.email','enquary_forms.description','products.name as productName')
          ->join('products','enquary_forms.product_id','=','products.id')
          ->orderBy('enquary_forms.id','DESC')
          ->get();
          
        return view('admin.enquiry.index',$data);  
    }

    public function detail($id)
    {
        $data['dealOfDayDetails']=DB::table('enquary_forms')
          ->select('enquary_forms.created_at','enquary_forms.id','enquary_forms.contactNo','enquary_forms.contactNo','enquary_forms.name','enquary_forms.email','enquary_forms.description','products.name as productName')
          ->join('products','enquary_forms.product_id','=','products.id')
          ->where('enquary_forms.id',$id)
          ->get();
          return view('admin.enquiry.detail',$data);  
    }


    public function store(Request $req)
    {
      $enqForm=new EnquaryForm;
      $enqForm->name=$req->name;
      $enqForm->email=$req->email;
      $userEmail=$req->email;
      $enqForm->description=$req->des;
      $enqForm->product_id=$req->product_id;
      $enqForm->contactNo=$req->contactNo;
      $enqForm->save();
      session::flash('enquiry_msg','Thank`s your Enquiry Submitted Successfully! Our team will contact you soon, please feel free to contact us: 91-00556677878');
      Mail::to([$userEmail])->cc('info@sitesupply.in')->send(new ContactUs($req->name,$req->email,$req->contactNo,$req->des));


$contact_no="7348481111";
$user_name=$req->name;
$user_contact_no=$req->contactNo;

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "http://2factor.in/API/V1/65a7129a-8c8d-11eb-a9bc-0200cd936042/ADDON_SERVICES/SEND/TSMS",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "{\"From\": \"SSUPLY\",\"To\": \"$contact_no\",\"TemplateName\": \"Enquiry SMS\", \"VAR1\": \"$user_name\", \"VAR2\":\"$user_contact_no\"}",
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo $response;
}

      return redirect('/');
    }

    public function storePage(Request $req){
      $enqForm=new EnquaryForm;
      $enqForm->name=$req->name;
      $enqForm->email=$req->email;
      $userEmail=$req->email;
      $enqForm->description=$req->des;
      $enqForm->product_id=$req->product_id;
      $enqForm->contactNo=$req->contactNo;
      $enqForm->save();
      session::flash('enquiry_msg','Thank`s your Enquiry Submitted Successfully! Our team will contact you soon, please feel free to contact us: 91-00556677878');
      Mail::to([$userEmail])->cc('info@sitesupply.in')->send(new ContactUs($req->name,$req->email,$req->contactNo,$req->des));
      return redirect('contact');
    }

}
