<?php

namespace App\Http\Controllers;

use App\RFQ;
use Illuminate\Http\Request;
use App\product;
use App\ProductCategory;
use App\Brand;
use DB;
use Session;

class RFQController extends Controller
{
     public function index(){
     $data['rfq']=DB::table('r_f_q_s')
                  ->select('r_f_q_s.id','r_f_q_s.rfq_no','r_f_q_s.user_contact_no','r_f_q_s.city','r_f_q_s.user_email','r_f_q_s.address','r_f_q_s.product_des','products.name as productName','products.name as productName','r_f_q_s.personName','r_f_q_s.created_at')
                  ->join('products','r_f_q_s.product_id','=','products.id')
                  ->orderBy('r_f_q_s.id','DESC')
                  ->get();
     return view('admin.rfq.index',$data);
     }

     public function rfq($id=''){
         $Month=date('M');
         $Date=date('d');
         $Hr=date('H');
         $Min=date('i');
         $Sec=date('s');
         $data['rfqNo']=$Month.'_'.$Date.'_'.$Hr.$Min.$Sec;
         $data['allProduct']=product::select('id','name')->where(['status'=>'1','rfq_status'=>'1'])->get();
     
         if($id){
         $productDetails=product::select('id','category_id','sub_category_id','brand_id')->where('id',$id)->get();
         $data['productIdSelt']=$productDetails[0]->id;
         $data['categoryIdSelt']=ProductCategory::find($productDetails[0]->category_id)->name;

         $data['brandIdSelt']=Brand::find($productDetails[0]->brand_id)->name;

         }else{

         }
         return view('website.rfq',$data);
         }

    public function getProductCateBrand(Request $req){

         $id=$req->input('id');
         $productDetails=product::select('id','category_id','sub_category_id','brand_id')->where('id',$id)->get();
      
         $data[0]['categoryIdSelt']=ProductCategory::find($productDetails[0]->category_id)->name;
         $data[1]['brandIdSelt']=Brand::find($productDetails[0]->brand_id)->name;
          return $data;
    }

    public function detail($id)
    {
    $data['dealOfDayDetails']=DB::table('r_f_q_s')
                  ->select('r_f_q_s.id','r_f_q_s.rfq_no','r_f_q_s.user_contact_no','r_f_q_s.city','r_f_q_s.user_email','r_f_q_s.address','r_f_q_s.product_des','products.image','products.name as productName','r_f_q_s.pro_cate_id as proCatName','r_f_q_s.pro_brand_id as brandName','r_f_q_s.personName','r_f_q_s.created_at')
                  ->join('products','r_f_q_s.product_id','=','products.id')
                  ->where('r_f_q_s.id',$id)
                  ->get();
     return view('admin.rfq.detail',$data);   
    }

    public function store(Request $request)
    {
       $addData=new RFQ;
       $addData->rfq_no=$request->rfqno;
       $addData->product_id=$request->product_id;
       $addData->pro_cate_id=$request->product_cate_id;
       $addData->pro_brand_id=$request->brand_id;
       $addData->user_contact_no=$request->mobile_no;
       $addData->user_email=$request->email;
       $addData->city=$request->city;
       $addData->address=$request->address;
       $addData->product_des=$request->des;
       $addData->personName=$request->personName;
       
       $addData->save();  
       Session::flash('rfqmsg', 'Your Request Send Successfully Thank`s!');
       return redirect(url('rfq'));       
    }

    public function show(RFQ $rFQ)
    {
        //
    }

    public function edit(RFQ $rFQ)
    {
        //
    }

    public function update(Request $request, RFQ $rFQ)
    {
        //
    }

    public function destroy(RFQ $rFQ)
    {
        //
    }
}
