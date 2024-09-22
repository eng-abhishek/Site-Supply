<?php

namespace App\Http\Controllers;

use App\Home;
use App\Banner;
use App\Brand;
use App\Location;
use App\City;
use App\Product;
use App\ProductCategory;
use App\Testimonial;
use App\CmpAddress;
use Session;
use DB;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    if(empty(session()->get('locationId'))){
    $cityData=City::orderBy('id','ASC')->limit('1')->get();
    session()->put('locationId',$cityData[0]->id);
    $cityId=session()->get('locationId');
    }else{
    $cityId=session()->get('locationId');
    } 

      $banner=Banner::where(['status'=>'1'])->get();
      
      $categoryFirstFour=ProductCategory::where(['status'=>'1','homePageStatus'=>'1','type'=>'p'])->limit(4)->get();
    
      $categoryAllAftFour=ProductCategory::where(['status'=>'1','homePageStatus'=>'1','type'=>'p'])->limit(400)->skip(4)->get();

      $subCategory=ProductCategory::where(['status'=>'1','homePageStatus'=>'1','type'=>'c','parent_id'=>'11'])->take(4)->skip(0)->orderBy('id','ASC')->get(); 
      $brand=Brand::where(['status'=>'1','homePageStatus'=>'1'])->get();
      $testimonial=Testimonial::where('status','1')->get();
      $product=Product::orderBy('id','desc')->get();
      $cmpAddress=CmpAddress::find(1)->get();

      $bestProduct=DB::table('product_prices')
           ->select('products.url_slug','products.rfq_status','products.diameter','products.min_order_count','product_categories.name as cate_name','products.id','products.sub_category_id','products.category_id','products.name','products.image','product_prices.price','qties.name as qty','qties.id as qty_id','product_prices.id as price_id')
           ->join('products','product_prices.product_id','=','products.id')
           ->join('product_categories','product_categories.id','=','products.sub_category_id')
           ->join('qties','qties.id','=','products.quantity_id')
           ->where(['product_prices.city_id'=>$cityId,'products.stock_status'=>'1','products.bestOfferStatus'=>'1'])
            ->get();

      return view('website.index',['banner'=>$banner,'categoryFirstFour'=>$categoryFirstFour,'categoryAllAftFour'=>$categoryAllAftFour,'subCategory'=>$subCategory,'brand'=>$brand,'testimonial'=>$testimonial,'product'=>$product,'cmpAddress'=>$cmpAddress[0],'bestProduct'=>$bestProduct]);
     }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
 
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Home  $home
     * @return \Illuminate\Http\Response
     */
    public function show(Home $home)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Home  $home
     * @return \Illuminate\Http\Response
     */
    public function edit(Home $home)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Home  $home
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Home $home)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Home  $home
     * @return \Illuminate\Http\Response
     */
    public function destroy(Home $home)
    {

    }

    public function get_onkeyup_search_data(Request $request){
        
       if(empty(session()->get('locationId'))){
       $cityData=City::orderBy('id','ASC')->limit('1')->get();
       session()->put('locationId',$cityData[0]->id);
       $cityId=session()->get('locationId');
       }else{
       $cityId=session()->get('locationId');
        } 
        
    $output='';
    $output.='<ul class="searchBoxStyle">';
    $searchVal=$request->input('searchVal');
    
           $searchProduct=DB::table('product_prices')
           ->select('products.url_slug','products.id','products.name')
           ->join('products','product_prices.product_id','=','products.id')
           ->where('products.name', 'LIKE', "%{$searchVal}%")
           ->where(['product_prices.city_id'=>$cityId,'products.stock_status'=>'1','products.status'=>'1'])
           ->get();
    

    foreach ($searchProduct as $searchValue) {
    $url=url('product-details/'.$searchValue->url_slug);
    $output.='<a style="text-decoration:none;color:black" href="'.$url.'"><li>'.$searchValue->name.'</li></a><hr>'; 
    }
    $output.='<ul>';
    return $output;
    }

   public function setLocationId(Request $req){
   if(empty(session()->get('locationId'))){
   $cityData=City::orderBy('id','ASC')->limit('1')->get();
   session()->put('locationId',$cityData[0]->id);
   }else{
   session()->put('locationId',$req->id);
   }
   }

    public function contactUs()
    {
      $product=Product::orderBy('id','desc')->get();  
       $cmpAddress=CmpAddress::find(1)->get();
      return view('website.contact',['product'=>$product,'cmpAddress'=>$cmpAddress[0]]);  
    }
    
    public function services()
    {
      // $product=Product::orderBy('id','desc')->get();  
      return view('website.service');
    }

    public function aboutUs(){
    $testimonial=Testimonial::where('status','1')->get();
    return view('website.aboutus',['testimonial'=>$testimonial]);
    }
    public function getMoreBrand(){
    $brand=Brand::where(['status'=>'1','homePageStatus'=>'1'])->get();
    $output='';
  
    foreach ($brand as $key => $brandData){
    $imgPath=asset('uploads/brandLogo/'.$brandData->logo);
    $brandUrl=url('brand/'.$brandData->id);
    $output.='<div class="col-md-2" style="width:33.3%;padding:10px;"><a href="'.$brandUrl.'"><img class="" src="'.$imgPath.'" alt="" style="width:90%!important;height:80px"></a></div>';  
    }
    
     return $output;
    }

}
