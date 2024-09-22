<?php

namespace App\Http\Controllers;
use App\product;
use Illuminate\Http\Request;
use App\City;
use App\ProductCategory;
use App\ProductPrice;
use App\Brand;
use App\Qty;
use session;
use DB;
use Illuminate\Support\Str;
error_reporting(1);

class ProductController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productCate=DB::table('products')
            ->select('products.id as id','products.name as productName','products.image as productImg','product_categories.name as productCateName','products.status')
            ->join('product_categories','products.category_id','=','product_categories.id')
            ->where('product_categories.type','p')
            ->orderBy('products.id','desc')
            ->get();
        return view('admin.product.index',['category'=>$productCate]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $brand=Brand::where('status','1')->get();
       $quantity=Qty::where('status','1')->get();
       $parentData=productCategory::where('type','p')->orderBy('id','desc')->get();
       $city=city::where('status','1')->get();
       return view('admin.product.view',['parentData'=>$parentData,'city'=>$city,'brand'=>$brand,'quantity'=>$quantity]); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    public function store(Request $request)
    {

      $request->validate([
            "product_name" => 'required',
            'product_img'=>'required|image|mimes:jpeg,png,jpg,gif,svg',
            "productSubCate_id" => 'required',
                            ]);

       $catName=ProductCategory::find($request->productSubCate_id)->name;

        $sreq = new product;
        $sreq->name=$request->product_name; 
        $sreq->category_id=$request->category_id;
        $sreq->sub_category_id=$request->productSubCate_id;
        $sreq->brand_id=$request->brand_id;  
        $sreq->description=$request->description;
        $sreq->product_short_des=$request->short_description;
        $sreq->hsn_code=$request->hsn_code;
        $sreq->meta_title=$request->meta_title;
        $sreq->meta_des=$request->meta_des;
        $sreq->meta_keyword=$request->meta_keyword;
            
        $sreq->url_slug=Str::slug($request->product_name, '-');
        $sreq->cat_url_slug=Str::slug($catName, '-');
        if($request->product_img){
        $imageName = time().'.'.$request->product_img->extension();
        $request->product_img->move(public_path('uploads/productImg'),$imageName);
        }else{
        $imageName='NULL';
        }
        $sreq->image=$imageName;

       if($request->rfq=='yes'){

if(($request->tempType==2) ||($request->tempType==3)){

        $firDim=$request->diameter; 
        $firqty=$request->quantity_id;

}else{
        $getFirstQtyId=Qty::orderBy('id','desc')->take(1)->skip(0)->get(); 
        $firqty=$getFirstQtyId[0]->id; 
        $firDim=0;       
}

        $sreq->min_order_count=1;
        $sreq->quantity_id=$firqty;
        $sreq->piece_per_bundal=0;
        $sreq->diameter=$firDim;
        $sreq->stock_status=1;
        $sreq->rfq_status=1;

        }else{
        $sreq->min_order_count=$request->min_order_count;
        $sreq->quantity_id=$request->quantity_id;
        $sreq->piece_per_bundal=$request->piece_per_bundal;
        $sreq->diameter=$request->diameter;

        if($request->stock_status){
        $sreq->stock_status=1;
         }else{
        $sreq->stock_status=0;
         }
         }
 /*---- end step one -----*/       
        $sreq->save();
        $productId=$sreq->id;

 /*---- start step two -----*/       
       if($request->rfq=='yes'){

        $getAllCity= DB::table('cities')->get();

        foreach ($getAllCity as $key => $getAllCityData){

        $productPrice=new ProductPrice;
        $productPrice->product_id=$productId;
        $productPrice->price=1;
        $productPrice->city_id=$getAllCityData->id;
        $productPrice->save();

        }
        }else{

        $cityChkBox=$request->cityChkBox;
        $j=0;
        for($k=0;$k<count($request->cityPrice);$k++){
         echo"<pre>";
        if($request->cityPrice[$k]=='null' || empty($request->cityPrice[$k])){
            
        }else{
            
        $productPriceUp=new ProductPrice;
        $productPriceUp->product_id=$productId;
        $productPriceUp->price=$request->cityPrice[$k];
        $productPriceUp->city_id=$cityChkBox[$j];
        $productPriceUp->save();
        //print_r($productPriceUp);
         $j++;
         }
         }
       }

 /*---- end step two -----*/       

        \Session::put('success','Data Add Successfully.');
        return redirect('/product');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $productSubCateId=product::find($id)->sub_category_id;
 
        $productCateId=product::find($id)->category_id;
       
        $templateId=productCategory::select('templateName','parent_id')->where(['type'=>'c','id'=>$productSubCateId])->get();
        $allSubCate=productCategory::where(['type'=>'c','parent_id'=>$templateId[0]->parent_id])->get();
        $productCate=DB::table('products')
            ->select('products.hsn_code','products.meta_keyword','products.meta_des','products.meta_title','products.rfq_status','products.diameter','products.piece_per_bundal','products.min_order_count','products.description','products.product_short_des','products.stock_status','products.id as id','products.category_id as cat_id','products.name as productName','products.image as productImg','product_categories.name as productCateName','products.status','products.brand_id','products.quantity_id')
            ->join('product_categories','products.category_id','=','product_categories.id')
            ->where(['product_categories.type'=>'p','products.id'=>$id])
            ->get();

        $productPrice=DB::table('product_prices')
                      ->select('product_prices.city_id','product_prices.price','cities.name')
                      ->join('cities','product_prices.city_id','=','cities.id')
                      ->where('product_prices.product_id',$id)
                      ->get();

        $productPriceId=DB::table('product_prices')
                      ->select('product_prices.city_id','product_prices.price','cities.name')
                      ->join('cities','product_prices.city_id','=','cities.id')
                      ->where('product_prices.product_id',$id)
                      ->pluck('product_prices.city_id')
                      ->toArray();

                    
       $parentData=productCategory::where('type','p')->orderBy('id','desc')->get();
  
       $cityId=city::where('status','1')->pluck('id')->toArray();


$city=array();
foreach($cityId as $key => $cityIdVal){
if(in_array($cityIdVal,$productPriceId)){
     
       }else{

       $city[]=city::where(['status'=>'1','id'=>$cityIdVal])->get();

       }
}
       $quantity=Qty::where('status','1')->get();

       $brand=Brand::where(['status'=>'1','category_id'=>$productCateId])->get();

       return view('admin.product.edit',['parentData'=>$parentData,'city'=>$city,'allSubCate'=>$allSubCate,'productSubCateId'=>$productSubCateId,'productCate'=>$productCate[0],'productPrice'=>$productPrice,'brand'=>$brand,'quantity'=>$quantity,'templateId'=>$templateId]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
            $request->validate([
            "product_name" => 'required',
            "productSubCate_id" => 'required',
                              ]); 

        $catName=ProductCategory::find($request->productSubCate_id)->name;    
        $sreq=product::find($request->input('editId'));
        $sreq->name=$request->product_name; 
        $sreq->category_id=$request->category_id;
        $sreq->sub_category_id=$request->productSubCate_id;
        $sreq->brand_id=$request->brand_id;
        $sreq->description=$request->description; 
        $sreq->product_short_des=$request->short_description;
        $sreq->meta_title=$request->meta_title;
        $sreq->meta_des=$request->meta_des;
        $sreq->meta_keyword=$request->meta_keyword;
        $sreq->url_slug=Str::slug($request->product_name, '-');
        $sreq->cat_url_slug=Str::slug($catName, '-');
        $sreq->hsn_code=$request->hsn_code;

        if($request->stock_status){
        $sreq->stock_status=1;
              }else{
        $sreq->stock_status=0;
                   }

        if($request->file('product_img')){
         $request->validate([
        'product_img' => 'image|mimes:jpeg,png,jpg,gif,svg',
                         ]); 
       
        $imageName = time().'.'.$request->product_img->extension();
        $sreq->image=$imageName;
        $request->product_img->move(public_path('uploads/productImg'), $imageName);
         }else{   
         $sreq->image=$request->input('OldImg');
             }

        if($request->rfq=='1'){

        if(($request->tempType==2) ||($request->tempType==3)){

        $firDim=$request->diameter; 
        $firqty=$request->quantity_id;

        }else{
        $getFirstQtyId=Qty::orderBy('id','desc')->take(1)->skip(0)->get(); 
        $firqty=$getFirstQtyId[0]->id; 
        $firDim=0;       
        }

        $sreq->min_order_count=1;
        $sreq->quantity_id=$firqty;
        $sreq->piece_per_bundal=0;
        $sreq->diameter=$firDim;
        $sreq->stock_status=1;
        $sreq->rfq_status=1;


        }else{
        $sreq->min_order_count=$request->min_order_count;
        $sreq->quantity_id=$request->quantity_id; 
        $sreq->piece_per_bundal=$request->piece_per_bundal;     
        $sreq->diameter=$request->diameter;
        }
   
        $sreq->update();
      
        $productId=$request->input('editId');
        ProductPrice::where('product_id',$productId)->delete();
        $cityChkBox=$request->cityChkBox;

        if($request->rfq=='1'){

        $getAllCity= DB::table('cities')->get();

        foreach ($getAllCity as $key => $getAllCityData){

        $productPrice=new ProductPrice;
        $productPrice->product_id=$productId;
        $productPrice->price=1;
        $productPrice->city_id=$getAllCityData->id;
        $productPrice->save();
        }
        }else{

        $j=0;
        for($i=0;$i<count($request->cityPrice);$i++){

        if($request->cityPrice[$i]=='null' || empty($request->cityPrice[$i])){

        }else{

        $productPrice=new ProductPrice;
        $productPrice->product_id=$productId;
        $productPrice->price=$request->cityPrice[$i];
        $productPrice->city_id=$cityChkBox[$j];
        $productPrice->save();
         $j++;
         }
         }

        }
     

      \Session::put('success','Data Update Successfully.');
      return redirect('/product');  
    }

public function bestSelling(){

 $data['product']=Product::where(['status'=>'1','stock_status'=>'1'])->get()->toArray();

return view('admin.bestOffer.bestoffer',$data);
}

public function addBestSellingProduct(Request $request){

  $producval=product::where('status','1')->get()->toArray();
  $str=$request->input('product');

  foreach ($producval as $key => $productval){
  if(in_array($productval['id'],$str)){
  $update=product::find($productval['id']);
  $update->bestOfferStatus='1';
  $update->update();
  }else{
  $update=product::find($productval['id']);
  $update->bestOfferStatus='0';
  $update->update();
  }
  }
  \Session::put('success','Data Update Successfully.'); 
  return redirect('best-selling');
}

public function getBestSellingProduct(){
return product::select('id')->where('bestOfferStatus','1')->get()->toArray();
 }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      product::find($id)->delete();
      ProductPrice::where('product_id',$id)->delete();
     \Session::put('warning','Data Remove Successfully.');
     return redirect('/product');
    }

    public function updateProductStatus(Request $request){

            $uDocData=product::find($request->input('id'));
            $uDocData->status=$request->CatStatus;
            $uDocData->update();
    }

     public function getProductSubCategory(Request $request){
     $id=$request->id;
     $productData=productCategory::where('parent_id',$id)->get();

     $productBrand=Brand::where('category_id',$id)->get();
     
     $output1='<select class="form-control" name="productSubCate_id" required><option value="">-- Select Product Sub-Category --</option>';
      
     foreach ($productData as $productDataVal){
     $output1.='<option value="'.$productDataVal->id.'">'.$productDataVal->name.'</option>';
     }
     $output1.='</select>';

     $output2='<select class="form-control" name="brand_id" required><option value="">-- Select Brand --</option>';
      
     foreach ($productBrand as $productBrandVal){
     $output2.='<option value="'.$productBrandVal->id.'">'.$productBrandVal->name.'</option>';
     }
     $output2.='</select>';
     $output=array();
     $output[0]=$output1;
     $output[1]=$output2;
     return $output;
     }

     public function checkBrandStatus(Request $request){
     $request->input();
     }

    public function updateCategoryStatus(Request $request){
            $uDocData=product::find($request->input('id'));
            $uDocData->status=$request->CatStatus;
            $uDocData->update();
    }

    public function details($id){
       $productCate=DB::table('products')
            ->select('products.hsn_code','products.description','products.product_short_des','products.sub_category_id as SubCatId','products.id as id','products.name as productName','products.image as productImg','product_categories.name as productCateName','products.status','brands.name as brand_name','qties.id as qty_id')
            ->join('product_categories','products.category_id','=','product_categories.id')
            ->join('brands','products.brand_id','=','brands.id')
            ->join('qties','qties.id','=','products.quantity_id')
            ->where(['product_categories.type'=>'p','products.id'=>$id])
            ->get();
// echo"<pre>";
//        print_r($productCate);
//         die;
       $productSubCategory=productCategory::select('name')->where('id',$productCate[0]->SubCatId)->get();

            $productPriceDetails=DB::table('product_prices')
            ->select('product_prices.price','cities.name')
            ->join('cities','product_prices.city_id','=','cities.id')
            ->where('product_prices.product_id',$id)
            ->get();

    return view('admin.product.detail',['dealOfDayDetails'=>$productCate,'productSubCategory'=>$productSubCategory,'productPriceDetails'=>$productPriceDetails]); 
        }

    public function shopByProductCate($param1='',$url=''){

    if(empty(session()->get('locationId'))){
    $cityData=City::orderBy('id','ASC')->limit('1')->get();
    session()->put('locationId',$cityData[0]->id);
    $cityId=session()->get('locationId');
    }else{
    $cityId=session()->get('locationId');
    } 

    $new_url=$param1.'/'.$url;

    $data['category']=ProductCategory::where(['status'=>'1','type'=>'p'])->get();

    $data['singleCateInfo']=ProductCategory::where(['url_slug'=>$new_url,'type'=>'c'])->first();

    $id=$data['singleCateInfo']->id;
    $parentId=$data['singleCateInfo']->parent_id;
    $data['parentCateInfo']=ProductCategory::find($parentId);

    $templateName=ProductCategory::find($id)->templateName;
    $data['template_Id']=$templateName;

          if($id){

             $productCateId=ProductCategory::select('parent_id')->where(['status'=>'1','id'=>$id])->get();
             
        
            $data['product']=DB::table('product_prices')
           ->select('products.url_slug','products.rfq_status','products.piece_per_bundal','products.diameter','products.min_order_count','product_categories.img as cateImage','product_categories.name as cate_name','products.id','products.name','products.image','product_prices.price','qties.name as qty','qties.id as qty_id','product_prices.id as price_id')
           ->join('products','product_prices.product_id','=','products.id')
           ->join('product_categories','product_categories.id','=','products.category_id')
           ->join('qties','qties.id','=','products.quantity_id')
           ->where(['product_prices.city_id'=>$cityId,'products.stock_status'=>'1','products.status'=>'1','products.sub_category_id'=>$id])
           ->orderBy('product_prices.price','DESC')
           ->paginate(16); 
           
            $data['totalProduct']=count($data['product']);
                
            $data['cate_id']=$productCateId[0]->parent_id;
            $data['use_tmpCate']=$id;
             
if($templateName=='1'){
 
$data['brand']=DB::table('brands')
->select('brands.id','brands.name')
->join('product_categories','brands.category_id','=','product_categories.parent_id')
->where(['brands.status'=>'1','brands.category_id'=>$productCateId[0]->parent_id,'product_categories.templateName'=>'1'])
->groupBy('brands.id')
->get();
  
      
}elseif($templateName=='2'){
$data['subCatId']=$id;
$getParentId=ProductCategory::where(['status'=>'1','id'=>$id])->get();

$data['brand']=ProductCategory::where(['status'=>'1','parent_id'=>$getParentId[0]->parent_id])->get();

$data['product']=DB::table('product_prices')
           ->select('products.url_slug','products.rfq_status','products.piece_per_bundal','products.diameter','products.min_order_count','product_categories.img as cateImage','product_categories.name as cate_name','products.id','products.name','products.image','product_prices.price','qties.name as qty','qties.id as qty_id','product_prices.id as price_id')
           ->join('products','product_prices.product_id','=','products.id')
           ->join('product_categories','product_categories.id','=','products.category_id')
           ->join('qties','qties.id','=','products.quantity_id')
           ->where(['product_prices.city_id'=>$cityId,'products.stock_status'=>'1','products.status'=>'1','products.sub_category_id'=>$id])
           ->orderBy('products.diameter','ASC')
           ->paginate(16);

return view('website.product_tmp2',$data);  

}elseif($templateName=='3'){

$getParentId=ProductCategory::where(['status'=>'1','id'=>$id])->get();
$data['subCatId']=$id;
$data['brand']=ProductCategory::where(['status'=>'1','parent_id'=>$getParentId[0]->parent_id])->get();

$data['product']=DB::table('product_prices')
           ->select('products.url_slug','products.rfq_status','products.piece_per_bundal','products.diameter','products.min_order_count','product_categories.img as cateImage','product_categories.name as cate_name','products.id','products.name','products.image','product_prices.price','qties.name as qty','qties.id as qty_id','product_prices.id as price_id')
           ->join('products','product_prices.product_id','=','products.id')
           ->join('product_categories','product_categories.id','=','products.category_id')
           ->join('qties','qties.id','=','products.quantity_id')
           ->where(['product_prices.city_id'=>$cityId,'products.stock_status'=>'1','products.status'=>'1','products.sub_category_id'=>$id])
           ->orderBy('products.diameter','ASC')
           ->paginate(16);
return view('website.product_tmp3',$data);  

}
return view('website.product',$data);
}
}


    public function shopByProduct($param1='',$url=''){
    if(empty(session()->get('locationId'))){
    $cityData=City::orderBy('id','ASC')->limit('1')->get();
    session()->put('locationId',$cityData[0]->id);
    $cityId=session()->get('locationId');
    }else{
    $cityId=session()->get('locationId');
    } 

    $new_url=$param1.'/'.$url;

    $data['category']=ProductCategory::where(['status'=>'1','type'=>'p'])->get();

    $data['singleCateInfo']=ProductCategory::where(['url_slug'=>$new_url,'type'=>'c'])->first();

    $id=$data['singleCateInfo']->id;
    $parentId=$data['singleCateInfo']->parent_id;
    $data['parentCateInfo']=ProductCategory::find($parentId);

    $templateName=ProductCategory::find($id)->templateName;
    $data['template_Id']=$templateName;


            $data['brand']=DB::table('brands')
          ->select('brands.id','brands.name','product_categories.id as cat_id')
          ->join('product_categories','brands.category_id','=','product_categories.parent_id') 
          ->where(['brands.status'=>'1','product_categories.templateName'=>'1'])
          ->groupBy('brands.id')
          ->get();  
            
           $data['product']=DB::table('product_prices')
           ->select('products.url_slug','products.rfq_status','products.diameter','products.min_order_count','product_categories.name as cate_name','products.id','products.sub_category_id','products.category_id','products.name','products.image','product_prices.price','qties.name as qty','qties.id as qty_id','product_prices.id as price_id')
           ->join('products','product_prices.product_id','=','products.id')
           ->join('product_categories','product_categories.id','=','products.sub_category_id')
           ->join('qties','qties.id','=','products.quantity_id')
           ->where(['product_prices.city_id'=>$cityId,'products.stock_status'=>'1','products.status'=>'1','product_categories.templateName'=>'1'])
           ->orderBy('product_prices.price','DESC')
           ->paginate(16);
            $data['totalProduct']=count($data['product']);
                
             return view('website.product',$data);
          }

 /*-----------------------------------------------------------*/

    public function get_ajaxPaginationData(Request $request){

    if(empty(session()->get('locationId'))){
    $cityData=City::orderBy('id','ASC')->limit('1')->get();
    session()->put('locationId',$cityData[0]->id);
    $cityId=session()->get('locationId');
    }else{
    $cityId=session()->get('locationId');
    }
          $product=DB::table('product_prices')
          ->select('products.url_slug','products.rfq_status','products.diameter','products.min_order_count','product_categories.name as cate_name','products.id','products.sub_category_id','products.category_id','products.name','products.image','product_prices.price','qties.name as qty','qties.id as qty_id','product_prices.id as price_id')
          ->join('products','product_prices.product_id','=','products.id')
          ->join('product_categories','product_categories.id','=','products.sub_category_id')
          ->join('qties','qties.id','=','products.quantity_id')
          ->where(['product_prices.city_id'=>$cityId,'products.stock_status'=>'1','products.status'=>'1','product_categories.templateName'=>'1'])
          ->orderBy('product_prices.price','DESC')
          ->paginate(16);
    
           return view('website.ajax_product',['product'=>$product])->render();
           }
           
   

      public function getBrandFilterData(Request $req){
         
       if(empty(session()->get('locationId'))){
       $cityData=City::orderBy('id','ASC')->limit('1')->get();
       session()->put('locationId',$cityData[0]->id);
       $cityId=session()->get('locationId');
       }else{
       $cityId=session()->get('locationId');
        } 

            $product=DB::table('product_prices')
           ->select('products.url_slug','products.rfq_status','products.diameter','products.min_order_count','products.id','products.name','products.image','product_prices.price','qties.name as qty','qties.id as qty_id','product_prices.id as price_id')
           ->join('products','product_prices.product_id','=','products.id')
           ->join('brands','products.brand_id','=','brands.id')
           ->join('product_categories','product_categories.id','=','products.sub_category_id')
           ->join('qties','qties.id','=','products.quantity_id')
           ->where(['product_prices.city_id'=>$cityId,'products.stock_status'=>'1','brands.id'=>$req->id])
           ->paginate(16);
           return view('website.ajax_product',['product'=>$product])->render();
      }

/*--------------------------------*/

        public function getDataUsingProiceFilter(Request $req){

      //  return $req->input();

       $format=$req->input('data');
       if(empty(session()->get('locationId'))){
       $cityData=City::orderBy('id','ASC')->limit('1')->get();
       session()->put('locationId',$cityData[0]->id);
       $cityId=session()->get('locationId');
       }else{
       $cityId=session()->get('locationId');
        } 

/*------------ brand filter ----------*/
        
          if($req->input('brandVal')=='brand'){
           $brandId=$req->input('brandId');

           $totalProduct=DB::table('product_prices')
           ->select('products.id','products.name','products.image','product_prices.price','qties.name as qty','qties.id as qty_id','product_prices.id as price_id')
           ->join('products','product_prices.product_id','=','products.id')
           ->join('brands','products.brand_id','=','brands.id')
           ->join('qties','qties.id','=','products.quantity_id')
           ->where(['product_prices.city_id'=>$cityId,'products.stock_status'=>'1','brands.id'=>$brandId])
           ->get();

          if($format=='l_to_h'){

           $product=DB::table('product_prices')
           ->select('products.rfq_status','products.min_order_count','products.id','products.name','products.image','product_prices.price','qties.name as qty','qties.id as qty_id','product_prices.id as price_id')
           ->join('products','product_prices.product_id','=','products.id')
           ->join('brands','products.brand_id','=','brands.id')
           ->join('qties','qties.id','=','products.quantity_id')
           ->where(['product_prices.city_id'=>$cityId,'products.stock_status'=>'1','brands.id'=>$brandId])
           ->orderBy('product_prices.price','ASC')
           ->paginate(16);
           return view('website.ajax_product',['product'=>$product,'totalProduct'=>count($totalProduct)])->render(); 
      }else{

           $product=DB::table('product_prices')
           ->select('products.rfq_status','products.min_order_count','products.id','products.name','products.image','product_prices.price','qties.name as qty','qties.id as qty_id','product_prices.id as price_id')
           ->join('products','product_prices.product_id','=','products.id')
           ->join('brands','products.brand_id','=','brands.id')
           ->join('qties','qties.id','=','products.quantity_id')
           ->where(['product_prices.city_id'=>$cityId,'products.stock_status'=>'1','brands.id'=>$brandId])
           ->orderBy('product_prices.price','DESC')
           ->paginate(16);
          return view('website.ajax_product',['product'=>$product,'totalProduct'=>count($totalProduct)])->render(); 
      }
      }
       
/*------------ radio filter ----------*/
       $filter=explode('=',$req->input('filterType'));
       $filterId=$filter[1];

       if($filter[0]=="categoryFilter"){
    
      $totalProduct=DB::table('product_prices')
           ->select('products.id','products.name','products.image','product_prices.price','qties.name as qty','qties.id as qty_id','product_prices.id as price_id')
           ->join('products','product_prices.product_id','=','products.id')
           ->join('product_categories','products.category_id','=','product_categories.id')
           ->join('qties','qties.id','=','products.quantity_id')
           ->where(['product_prices.city_id'=>$cityId,'products.stock_status'=>'1','product_categories.id'=>$filterId])
           ->get();

       if($format=='l_to_h'){

           $product=DB::table('product_prices')
           ->select('products.rfq_status','products.min_order_count','products.id','products.name','products.image','product_prices.price','qties.name as qty','qties.id as qty_id','product_prices.id as price_id')
           ->join('products','product_prices.product_id','=','products.id')
           ->join('product_categories','products.category_id','=','product_categories.id')
           ->join('qties','qties.id','=','products.quantity_id')
           ->where(['product_prices.city_id'=>$cityId,'products.stock_status'=>'1','product_categories.id'=>$filterId])
           ->orderBy('product_prices.price','ASC')
           ->paginate(16);

          return view('website.ajax_product',['product'=>$product,'totalProduct'=>count($totalProduct)])->render(); 
       }else{

           $product=DB::table('product_prices')
           ->select('products.rfq_status','products.min_order_count','products.id','products.name','products.image','product_prices.price','qties.name as qty','qties.id as qty_id','product_prices.id as price_id')
           ->join('products','product_prices.product_id','=','products.id')
           ->join('product_categories','products.category_id','=','product_categories.id')
           ->join('qties','qties.id','=','products.quantity_id')
           ->where(['product_prices.city_id'=>$cityId,'products.stock_status'=>'1','product_categories.id'=>$filterId])
           ->orderBy('product_prices.price','DESC')
           ->paginate(16);
            return view('website.ajax_product',['product'=>$product,'totalProduct'=>count($totalProduct)])->render(); 
        }
        }elseif($filter[0]=='brandFilter'){

           $totalProduct=DB::table('product_prices')
           ->select('products.rfq_status','products.id','products.name','products.image','product_prices.price','qties.name as qty','qties.id as qty_id','product_prices.id as price_id')
           ->join('products','product_prices.product_id','=','products.id')
           ->join('brands','products.brand_id','=','brands.id')
           ->join('qties','qties.id','=','products.quantity_id')
           ->where(['product_prices.city_id'=>$cityId,'products.stock_status'=>'1','brands.id'=>$filterId])
           ->get();

        if($format=='l_to_h'){

           $product=DB::table('product_prices')
           ->select('products.rfq_status','products.min_order_count','products.id','products.name','products.image','product_prices.price','qties.name as qty','qties.id as qty_id','product_prices.id as price_id')
           ->join('products','product_prices.product_id','=','products.id')
           ->join('brands','products.brand_id','=','brands.id')
           ->join('qties','qties.id','=','products.quantity_id')
           ->where(['product_prices.city_id'=>$cityId,'products.stock_status'=>'1','brands.id'=>$filterId])
           ->orderBy('product_prices.price','ASC')
           ->paginate(16);
           
           $itemFound=count($productData);
           return view('website.ajax_product',['product'=>$product,'totalProduct'=>count($totalProduct)])->render(); 
            }else{

           $product=DB::table('product_prices')
           ->select('products.rfq_status','products.min_order_count','products.id','products.name','products.image','product_prices.price','qties.name as qty','qties.id as qty_id','product_prices.id as price_id')
           ->join('products','product_prices.product_id','=','products.id')
           ->join('brands','products.brand_id','=','brands.id')
           ->join('qties','qties.id','=','products.quantity_id')
           ->where(['product_prices.city_id'=>$cityId,'products.stock_status'=>'1','brands.id'=>$filterId])
           ->orderBy('product_prices.price','DESC')
           ->paginate(16);

           return view('website.ajax_product',['product'=>$product,'totalProduct'=>count($totalProduct)])->render(); 
           }
          }else{

            $totalProduct=DB::table('product_prices')
           ->select('products.id','products.name','products.image','product_prices.price','qties.name as qty','qties.id as qty_id','product_prices.id as price_id')
           ->join('products','product_prices.product_id','=','products.id')
           ->join('brands','products.brand_id','=','brands.id')
           ->join('qties','qties.id','=','products.quantity_id')
           ->where(['product_prices.city_id'=>$cityId,'products.stock_status'=>'1'])
           ->get();

        if($format=='l_to_h'){
            $product=DB::table('product_prices')
           ->select('products.rfq_status','products.min_order_count','products.id','products.name','products.image','product_prices.price','qties.name as qty','qties.id as qty_id','product_prices.id as price_id')
           ->join('products','product_prices.product_id','=','products.id')
           ->join('brands','products.brand_id','=','brands.id')
           ->join('qties','qties.id','=','products.quantity_id')
           ->where(['product_prices.city_id'=>$cityId,'products.stock_status'=>'1'])
           ->orderBy('product_prices.price','ASC')
           ->paginate(16);
           return view('website.ajax_product',['product'=>$product,'totalProduct'=>count($totalProduct)])->render(); 

        }else{
            $product=DB::table('product_prices')
           ->select('products.rfq_status','products.min_order_count','products.id','products.name','products.image','product_prices.price','qties.name as qty','qties.id as qty_id','product_prices.id as price_id')
           ->join('products','product_prices.product_id','=','products.id')
           ->join('brands','products.brand_id','=','brands.id') 
           ->join('qties','qties.id','=','products.quantity_id')
           ->where(['product_prices.city_id'=>$cityId,'products.stock_status'=>'1'])
           ->orderBy('product_prices.price','DESC')
           ->paginate(16);
           return view('website.ajax_product',['product'=>$product,'totalProduct'=>count($totalProduct)])->render(); 
        }
        }
        }

/*---------- choose by filter  ------------*/

        public function findSearchData(Request $req){

         if(empty(session()->get('locationId'))){
         $cityData=City::orderBy('id','ASC')->limit('1')->get();
         session()->put('locationId',$cityData[0]->id);
         $cityId=session()->get('locationId');
         }else{
         $cityId=session()->get('locationId');
         } 
        
        $brandVal=$req->input('brandVal');
        $brandId=$req->input('brandId');  
       
           if($brandVal=='brand'){
            $product=DB::table('product_prices')
          ->select('products.rfq_status','products.min_order_count','products.id','products.name','products.image','product_prices.price','qties.name as qty','qties.id as qty_id','product_prices.id as price_id')
           ->join('products','product_prices.product_id','=','products.id')
           ->join('brands','products.brand_id','=','brands.id')
           ->join('qties','qties.id','=','products.quantity_id')
           ->join('product_categories','products.sub_category_id','=','product_categories.id')
           ->where(['product_prices.city_id'=>$cityId,'products.stock_status'=>'1','brands.id'=>$brandId,'products.status'=>'1','product_categories.templateName'=>'1'])
           ->where('products.name','like','%'.$req->data.'%')
           ->orderBy('product_prices.price','ASC')
           ->paginate(16);
            return view('website.ajax_product',['product'=>$product])->render(); 
        }


        $filter=explode('=',$req->input('filterType'));
        $filterId=$filter[1];

          if($filter[0]=='categoryFilter'){
           
            $product=DB::table('product_prices')
           ->select('products.rfq_status','products.min_order_count','products.id','products.name','products.image','product_prices.price','qties.name as qty','qties.id as qty_id','product_prices.id as price_id')
           ->join('products','product_prices.product_id','=','products.id')
           ->join('product_categories','products.sub_category_id','=','product_categories.id')
           ->join('qties','qties.id','=','products.quantity_id')
           ->where(['product_prices.city_id'=>$cityId,'products.stock_status'=>'1','product_categories.id'=>$filterId,'products.status'=>'1','product_categories.templateName'=>'1'])
            ->where('products.name','like','%'.$req->data.'%')
           ->orderBy('product_prices.price','DESC')
           ->paginate(16);

           return view('website.ajax_product',['product'=>$product])->render(); 
      
           }elseif($filter[0]=='brandFilter'){
 
          $product=DB::table('product_prices')
           ->select('products.rfq_status','products.min_order_count','products.id','products.name','products.image','product_prices.price','qties.name as qty','qties.id as qty_id','product_prices.id as price_id')
           ->join('products','product_prices.product_id','=','products.id')
           ->join('brands','products.brand_id','=','brands.id')
           ->join('qties','qties.id','=','products.quantity_id')
           ->join('product_categories','products.sub_category_id','=','product_categories.id')
           ->where(['product_prices.city_id'=>$cityId,'products.stock_status'=>'1','brands.id'=>$filterId,'product_categories.templateName'=>'1','products.status'=>'1'])
           ->where('products.name','like','%'.$req->data.'%')
           ->orderBy('product_prices.price','ASC')
           ->paginate(16);
            return view('website.ajax_product',['product'=>$product])->render(); 
        }else{

        $product=DB::table('product_prices')
        ->select('products.rfq_status','products.min_order_count','products.id','products.name','products.image','product_prices.price','qties.name as qty','qties.id as qty_id','product_prices.id as price_id')
        ->join('products','product_prices.product_id','=','products.id')
        ->join('brands','products.brand_id','=','brands.id')
        ->join('product_categories','products.sub_category_id','=','product_categories.id')
        ->join('qties','qties.id','=','products.quantity_id')
        ->where('products.name','like','%'.$req->data.'%')
        ->where(['product_prices.city_id'=>$cityId,'products.stock_status'=>'1','products.status'=>'1','product_categories.templateName'=>'1'])
        ->paginate(16);
         return view('website.ajax_product',['product'=>$product])->render(); 
        }  
        }


/*---------- choose by filter  ------------*/

/*---------- Brand By Product -------------*/

    public function brand_filter($filterurl){

    $data['brandId']=request()->segment(2);
    $data['type']=request()->segment(1); 

    if(empty(session()->get('locationId'))){
    $cityData=City::orderBy('id','ASC')->limit('1')->get();
    session()->put('locationId',$cityData[0]->id);
    $cityId=session()->get('locationId');
    }else{
    $cityId=session()->get('locationId');
    } 
    $data['category']=ProductCategory::where(['status'=>'1','type'=>'p'])->get();

    $filterId=Brand::where('url_slug',$filterurl)->first()->id;
    
    $categoryId=Brand::find($filterId)->category_id;
    $subCategoryId=Brand::find($filterId)->productSubCate_id;

    $productCateId=ProductCategory::select('parent_id')->where(['status'=>'1','id'=>$id])->get();
    $data['totalProduct']=count($data['product']);
           $data['brand_id']=$filterId;

    $subCatId=ProductCategory::where(['parent_id'=>$categoryId,'id'=>$subCategoryId])->get();

    $data['singleCateInfo']=ProductCategory::find($subCatId[0]->id);

    if($subCatId[0]->templateName=='1'){
          $data['brand']=DB::table('brands')
          ->select('brands.id','brands.name')
          ->join('product_categories','brands.category_id','=','product_categories.parent_id')
          ->where(['brands.status'=>'1','brands.category_id'=>$categoryId,'product_categories.templateName'=>$subCatId[0]->templateName])
          ->groupBy('brands.id')
          ->get();

           $data['product']=DB::table('product_prices')
           ->select('products.rfq_status','product_categories.templateName','products.min_order_count','products.id','products.name','products.image','product_prices.price','qties.name as qty','qties.id as qty_id','product_prices.id as price_id')
           ->join('products','product_prices.product_id','=','products.id')
           ->join('brands','products.brand_id','=','brands.id')
           ->join('qties','qties.id','=','products.quantity_id')
           ->join('product_categories','product_categories.id','=','products.sub_category_id')
           ->where(['product_prices.city_id'=>$cityId,'products.status'=>'1','products.stock_status'=>'1','brands.id'=>$filterId,'product_categories.templateName'=>'1'])
           ->orderBy('product_prices.price','DESC')
           ->paginate(16);
     
            return view('website.product',$data);

}elseif($subCatId[0]->templateName=='2'){

$data['brand']=ProductCategory::where(['status'=>'1','parent_id'=>$categoryId])->get();

$data['product']=DB::table('product_prices')
           ->select('products.rfq_status','products.piece_per_bundal','products.diameter','products.min_order_count','product_categories.img as cateImage','product_categories.name as cate_name','products.id','products.name','products.image','product_prices.price','qties.name as qty','qties.id as qty_id','product_prices.id as price_id')
           ->join('products','product_prices.product_id','=','products.id')
           ->join('product_categories','product_categories.id','=','products.sub_category_id')
           ->join('brands','products.brand_id','=','brands.id')
           ->join('qties','qties.id','=','products.quantity_id')
           ->where(['product_prices.city_id'=>$cityId,'products.stock_status'=>'1','products.status'=>'1','products.brand_id'=>$filterId,'product_categories.templateName'=>2])
           ->orderBy('products.diameter','ASC')
           ->paginate(16);
          
return view('website.product_tmp2',$data);

}elseif($subCatId[0]->templateName=='3'){

$data['brand']=ProductCategory::where(['status'=>'1','parent_id'=>$categoryId])->get();

$data['product']=DB::table('product_prices')
           ->select('products.rfq_status','product_categories.templateName','products.min_order_count','products.id','products.name','products.image','product_prices.price','qties.name as qty','qties.id as qty_id','product_prices.id as price_id')
           ->join('products','product_prices.product_id','=','products.id')
           ->join('brands','products.brand_id','=','brands.id')
           ->join('qties','qties.id','=','products.quantity_id')
           ->join('product_categories','product_categories.id','=','products.sub_category_id')
           ->where(['product_prices.city_id'=>$cityId,'products.stock_status'=>'1','products.status'=>'1','products.brand_id'=>$filterId,'product_categories.templateName'=>'3'])
            ->orderBy('products.diameter','ASC')
           ->paginate(16);

return view('website.product_tmp3',$data);  
}else{

}
           
  }


public function ajax_pagination_brand_filter(Request $request){
          
           $totalProduct=DB::table('product_prices')
           ->select('products.id','products.name','products.image','product_prices.price','qties.name as qty','qties.id as qty_id','product_prices.id as price_id')
           ->join('products','product_prices.product_id','=','products.id')
           ->join('brands','products.brand_id','=','brands.id')
           ->join('qties','qties.id','=','products.quantity_id')
           ->where(['product_prices.city_id'=>$cityId,'products.stock_status'=>'1','brands.id'=>$filterId])
           ->get();

           $product=DB::table('product_prices')
           ->select('products.rfq_status','products.min_order_count','products.id','products.name','products.image','product_prices.price','qties.name as qty','qties.id as qty_id','product_prices.id as price_id')
           ->join('products','product_prices.product_id','=','products.id')
           ->join('brands','products.brand_id','=','brands.id')
           ->join('qties','qties.id','=','products.quantity_id')
           ->where(['product_prices.city_id'=>$cityId,'products.stock_status'=>'1','brands.id'=>$filterId])
           ->orderBy('product_prices.price','DESC')
           ->paginate(16);
           return view('website.ajax_product',['product'=>$product,'totalProduct'=>count($totalProduct)])->render();
}

      public function productDetails($url){

       if(empty(session()->get('locationId'))){
       $cityData=City::orderBy('id','ASC')->limit('1')->get();
       session()->put('locationId',$cityData[0]->id);
       $cityId=session()->get('locationId');
       }else{
       $cityId=session()->get('locationId');
        } 

         $subCatId=product::where('url_slug',$url)->first()->id;

         $id=product::find($subCatId)->sub_category_id;
         $tmpVal=ProductCategory::find($id)->templateName;
  
    $data['category']=ProductCategory::where(['status'=>'1','type'=>'p'])->get();

    $data['singleCateInfo']=ProductCategory::find($id);
    $parentId=$data['singleCateInfo']->parent_id;
    $data['parentCateInfo']=ProductCategory::find($parentId);

        if($tmpVal=='1'){

         $data['productData']=DB::table('product_prices')
           ->select('products.meta_title','products.meta_des','products.meta_keyword','products.rfq_status','products.min_order_count','products.id','products.name','products.category_id','products.image','product_prices.price','product_categories.name as category_name','products.description','products.product_short_des','qties.name as qty','qties.id as qty_id','product_prices.id as price_id')
           ->join('products','product_prices.product_id','=','products.id')
           ->join('product_categories','products.category_id','=','product_categories.id')
           ->join('qties','qties.id','=','products.quantity_id')  
           ->where(['product_prices.city_id'=>$cityId,'products.stock_status'=>'1','products.id'=>$subCatId])
           ->get();
         $category_id=$data['productData'][0]->category_id;

         $data['productCate']=DB::table('product_prices')
           ->select('products.url_slug','products.id','products.name','products.category_id','products.image','product_prices.price','qties.name as qty','qties.id as qty_id','product_prices.id as price_id')
           ->join('products','product_prices.product_id','=','products.id')
           ->join('qties','qties.id','=','products.quantity_id')  
           ->where(['product_prices.city_id'=>$cityId,'products.stock_status'=>'1','products.category_id'=>$category_id])
           ->get();
        
          $data['reviewComment']=DB::table('review_comments')
          ->select('users.name','users.img','review_comments.rate','review_comments.description')
          ->join('users','review_comments.user_id','=','users.id')
          ->where('review_comments.product_id',$subCatId)
          ->paginate(5);

          $totalRecord=DB::table('review_comments')
          ->select('users.name','users.img','review_comments.rate','review_comments.description')
          ->join('users','review_comments.user_id','=','users.id')
          ->where('review_comments.product_id',$subCatId)
          ->get();
          $data['total_commpent']=count($totalRecord);

         return view('website.product_detail',$data);
         }elseif($tmpVal=='2'){


$data['subCatId']=$id;
$getParentId=ProductCategory::where(['status'=>'1','id'=>$id])->get();

$data['brand']=ProductCategory::where(['status'=>'1','parent_id'=>$getParentId[0]->parent_id])->get();

$data['product']=DB::table('product_prices')
           ->select('products.meta_title','products.meta_des','products.meta_keyword','products.rfq_status','products.piece_per_bundal','products.diameter','products.min_order_count','product_categories.img as cateImage','product_categories.name as cate_name','products.id','products.name','products.image','product_prices.price','qties.name as qty','qties.id as qty_id','product_prices.id as price_id')
           ->join('products','product_prices.product_id','=','products.id')
           ->join('product_categories','product_categories.id','=','products.category_id')
           ->join('qties','qties.id','=','products.quantity_id')
           ->where(['product_prices.city_id'=>$cityId,'products.stock_status'=>'1','products.sub_category_id'=>$id])
           ->orderBy('products.diameter','ASC')
           ->paginate(16);

return view('website.product_tmp2',$data);


         }elseif($tmpVal=='3'){


$getParentId=ProductCategory::where(['status'=>'1','id'=>$id])->get();
$data['subCatId']=$id;
$data['brand']=ProductCategory::where(['status'=>'1','parent_id'=>$getParentId[0]->parent_id])->get();

$data['product']=DB::table('product_prices')
           ->select('products.meta_title','products.meta_des','products.meta_keyword','products.rfq_status','products.piece_per_bundal','products.diameter','products.min_order_count','product_categories.img as cateImage','product_categories.name as cate_name','products.id','products.name','products.image','product_prices.price','qties.name as qty','qties.id as qty_id','product_prices.id as price_id')
           ->join('products','product_prices.product_id','=','products.id')
           ->join('product_categories','product_categories.id','=','products.category_id')
           ->join('qties','qties.id','=','products.quantity_id')
           ->where(['product_prices.city_id'=>$cityId,'products.stock_status'=>'1','products.sub_category_id'=>$id])
           ->orderBy('products.diameter','ASC')
           ->paginate(16);
           return view('website.product_tmp3',$data);
           }else{

           }
           }

         public function checkTemplateType(Request $req){
         $templateName=ProductCategory::select('templateName')->where('id',$req->id)->get();
         return $templateName[0]->templateName;
         }

    }