<?php

namespace App\Http\Controllers;

use App\CmpAddress;
use Illuminate\Http\Request;

class CmpAddressController extends Controller
{
    
public function index(){ 
$data['company_detail']=CmpAddress::where('id','1')->get();
return view('admin.cmp_address.view',$data);
}

public function update_cmp_address(Request $req){
      $cmpData=CmpAddress::find('1');
      $cmpData->location=$req->cmp_address;
      $cmpData->email=$req->cmp_email;
      $cmpData->contact_no=$req->cmp_contact_no; 
      $cmpData->description=$req->des;
      $cmpData->update();
      \Session::put('success','Data Update Successfully.');
      return redirect('view-company-address');
}
}
