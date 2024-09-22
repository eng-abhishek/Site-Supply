<?php

namespace App\Http\Controllers;
use App\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Session;
error_reporting(1);

class ProductCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productCategory=ProductCategory::orderBy('id','desc')->get();
        return view('admin.productCategory.index',['category'=>$productCategory]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {  
      $parentData=ProductCategory::where('type','p')->orderBy('id','desc')->get();
      $city=city::where('status','1')->get();
      return view('admin.productCategory.view',['parent'=>$parentData,'city'=>$city]); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          // return $request->input();
          $request->validate([
            "category_name" => 'required',
            'category_img' => 'image|mimes:jpeg,png,jpg,gif,svg',
                         ]); 

        $sreq = new ProductCategory;
        $sreq->GST=$request->gst; 
        $sreq->name=$request->category_name; 
        $sreq->type=$request->type;
        $sreq->parent_id=$request->parent_id; 
        $sreq->templateName=$request->templateName;
        $sreq->shippingStatus=$request->shipingCharge;
        $sreq->meta_title=$request->meta_title;
        $sreq->meta_des=$request->meta_des;
        $sreq->meta_keyword=$request->meta_keyword;
        $sreq->city=$request->meta_keyword;
       

         if($request->parent_id){
          $cat_slug=ProductCategory::where('id',$request->parent_id)->first()->url_slug;
          $new_cat_slug=$cat_slug.'/'.Str::slug($request->category_name, '-');
          }else{
          $new_cat_slug=Str::slug($request->category_name, '-');
          }
        
        $sreq->url_slug=$new_cat_slug;

        if($request->cateStatus=='yes'){
        $sreq->cateDes=$request->cateDes;
        $sreq->cateDesStatus='1';
        }
        if($request->category_img){
        $imageName = time().'.'.$request->category_img->extension();
        $request->category_img->move(public_path('uploads/productCategory'),$imageName);
        }else{
        $imageName='NULL';
        }

        if($request->homePageStatus){
        $sreq->homePageStatus=1;
        }else{
        $sreq->homePageStatus=0;
        }
        $sreq->img=$imageName;
        $sreq->save();
        \Session::put('success','Data Add Successfully.');
        return redirect('/categories');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
     $editData=ProductCategory::find($id);
     $parentData=ProductCategory::where('type','p')->orderBy('id','desc')->get();
     $city=city::where('status','1')->get();
     return view('admin.productCategory.edit',['editData'=>$editData,'parent'=>$parentData,'city'=>$city]);
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
            "category_name" => 'required',
                          ]); 

        $sreq=ProductCategory::find($request->input('editId'));
        $sreq->name=$request->category_name; 
        $sreq->type=$request->type;
        $sreq->parent_id=$request->parent_id; 
        $sreq->templateName=$request->templateName; 
        $sreq->cateDes=$request->cateDes;
        $sreq->GST=$request->gst; 
        $sreq->shippingStatus=$request->shipingCharge;
        $sreq->cateDesStatus=$request->cateStatus;
        $sreq->meta_title=$request->meta_title;
        $sreq->meta_des=$request->meta_des;
        $sreq->meta_keyword=$request->meta_keyword;

        if($request->parent_id){
          $cat_slug=ProductCategory::where('id',$request->parent_id)->first()->url_slug;
          $new_cat_slug=$cat_slug.'/'.Str::slug($request->category_name, '-');
          }else{
          $new_cat_slug=Str::slug($request->category_name, '-');
          }
        
        $sreq->url_slug=$new_cat_slug;

        //$sreq->url_slug=$cat_slug.'/'.Str::slug($request->category_name, '-');
        // $sreq->url_slug=Str::slug($request->category_name, '-');
         if($request->file('category_img')){
         $request->validate([
        'category_img' => 'image|mimes:jpeg,png,jpg,gif,svg',
                         ]); 
       
        $imageName = time().'.'.$request->category_img->extension();
        $sreq->img=$imageName;
        $request->category_img->move(public_path('uploads/productCategory'), $imageName);
        }else{  
         $sreq->img=$request->input('OldImg');
           }

        if($request->homePageStatus){
        $sreq->homePageStatus=1;
        }else{
        $sreq->homePageStatus=0;
        }
      $sreq->update();
      \Session::put('success','Data Update Successfully.');
       return redirect('/categories');  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      ProductCategory::find($id)->delete();
     \Session::put('warning','Data Remove Successfully.');
     return redirect('/categories');
    }

    public function updateCategoryStatus(Request $request){

            $uDocData=ProductCategory::find($request->input('id'));
            $uDocData->status=$request->CatStatus;
            $uDocData->update();
    }

    public function set_subCategory_homePage_status(Request $request){
    $status='';    
    $id=$request->input('id');
    $checkCondition=ProductCategory::where(['homePageStatus'=>'1','type'=>'c'])->get(); 
    if($checkCondition[0]->id){
    $productCat=ProductCategory::where(['parent_id'=>$id,'type'=>'c'])->get();
    if($productCat[0]->id){
    $status=1;
    }else{
    $status=0;
    }
    }else{
    $status=1;
    }
    return $status;
    }

/*---------------- category page show on frontend --------------*/

    public function paroductCategory($url){

   $id=ProductCategory::where(['status'=>'1','url_slug'=>$url])->first()->id;
  // die;
    $data['childProductCategory']=ProductCategory::where(['status'=>'1','parent_id'=>$id,'type'=>'c'])->get();
  //  print_r($data['childProductCategory']);
    //die();

    $data['categoryName']=ProductCategory::select('name','meta_title','meta_des','meta_keyword','cateDes')->where(['status'=>'1','id'=>$id,'type'=>'p'])->get();
    $data['parenCatData']=productCategory::where(['type'=>'p','status'=>'1'])->orderBy('id','desc')->get();

    return view('website.category',$data);
    }
 }
