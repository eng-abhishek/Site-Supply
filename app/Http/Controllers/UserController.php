<?php
namespace App\Http\Controllers;
error_reporting(1);
use Illuminate\Http\Request;
use App\User;
use App\Booking;
use App\Product;

use App\Outgoing_product;
use App\EnquaryForm;

class UserController extends Controller
{

    public function index(){

    $allUser=User::where('userType','2')->orderBy('id','DESC')->get();
    return view('admin.user.index',['allUser'=>$allUser]);
    }  

    public function userDetails($id){
    $data['dealOfDayDetails']=User::where('id',$id)->get();
    $data['totalBok']=count(Booking::where('user_id',$id)->get());
    return view('admin.user.detail',$data);
    }  

public function userProfile(){
$userdata= User::where('id',session()->get('logedIn'))->get();
$userdata[0]->id;
$totalOrder=count(Booking::where('user_id',$userdata[0]->id)->get());
$bookingDetails=Booking::where('user_id',$userdata[0]->id)->orderBy('id','desc')->take(20)->skip(0)->get();
return view('website.myaccount',['userdata'=>$userdata[0],'totalOrder'=>$totalOrder,'bookingDetails'=>$bookingDetails]);  
}

public function updateUserProfile(Request $request){
$userId=session()->get('logedIn');
$userInfo=User::find($userId);
$userInfo->name=$request->name;
$userInfo->email=$request->email;
$userInfo->city=$request->city;
$userInfo->zip_code=$request->zip_code;
$userInfo->country=$request->country;
$userInfo->landmarkAddress=$request->landmarkAddress;
$userInfo->street=$request->street;
$userInfo->userType='2';
$userInfo->about_user=$request->about_user;
$userInfo->save();
return redirect('user-profile');
}

public function showUserProfile(){
return view('website.user_profile');
}

public function addProfilePicrure(Request $request){
        $userId=User::where('email',session()->get('loginEmail'))->get();
   
        //return $request->file('userImg');
        $ureq=user::find($userId[0]->id);
        $imageName = time().'.'.$request->userImg->extension();  
        $sreq->userImg=$imageName;
        $request->userImg->move(public_path('uploads/user'), $imageName);
        $ureq->img=$imageName;
        $ureq->update();
        
        return redirect('user-profile');  
}

  public function orderSuccess(){
   return view('website.thanks');
  }

public function changeProfile(Request $request){
             $request->validate([
            'img'=>'required|image|mimes:jpeg,png,jpg,gif,svg',
                            ]); 
        $sreq=User::find($request->editId);
        $imageName = time().'.'.$request->img->extension();
        $request->img->move(public_path('uploads/user'),$imageName);
        $sreq->img=$imageName;
        $sreq->save();  
        return redirect('user-profile');
}

public function checkUserEmail(Request $request){
 $email=$request->input('user_email_id');
 $id=$request->input('id');
 $userEmail=User::where('email',$email)->get();
 if(empty($userEmail[0]->id)){
 echo"true";
 }else{
$userEmailSameId=User::where(['email'=>$email,'id'=>$id])->get();
if($userEmailSameId[0]->id){
 echo"true";
}else{
 echo"false";
}
}
}

public function viewBokNotification(){
Booking::where('notification_status','0')->update(['notification_status'=>'1']);
return redirect(url('order'));
}

public function viewEnquiryNotification(){
EnquaryForm::where('notification_status','0')->update(['notification_status'=>'1']);
return redirect(url('view-enquiry'));
}

public function getAllNotification(Request $req){
$enquiry=EnquaryForm::where('notification_status','0')->get()->count();
$booking=Booking::where('notification_status','0')->get()->count();
$total=$enquiry+$booking;
$notification=array('0'=>$enquiry,'1'=>$booking,'2'=>$total);
return $notification;
}

}
