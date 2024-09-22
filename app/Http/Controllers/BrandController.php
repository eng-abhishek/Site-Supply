<?php
namespace App\Http\Controllers;
use App\Brand;
use App\ProductCategory;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Str;
class BrandController extends Controller
{
    
 /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productCategory=Brand::orderBy('id','desc')->get();
        return view('admin.ProductFeature.brand.index',['category'=>$productCategory]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $data['category']=ProductCategory::where('type','p')->get();
      return view('admin.ProductFeature.brand.view',$data); 
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
            "name" => 'required',
            "logo"=>'required',
                         ]); 

        $sreq = new Brand;
        $sreq->name=$request->name; 
        $sreq->category_id=$request->categoryId;
        $sreq->productSubCate_id=$request->productSubCate_id;
        $sreq->url_slug=Str::slug($request->name, '-');

        if($request->logo){
        $imageName = time().'.'.$request->logo->extension();
        $request->logo->move(public_path('uploads/brandLogo'),$imageName);
        }else{
        $imageName='NULL';
        }
        $sreq->logo=$imageName; 
        if($request->homePageStatus){
        $sreq->homePageStatus=1;
        }else{
        $sreq->homePageStatus=0;
        }

        $sreq->save();
        \Session::put('success','Data Add Successfully.');
        return redirect('/brand');
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
     $data['editData']=Brand::find($id);
     $data['category']=ProductCategory::where('type','p')->get();
     $data['allSubCate']=productCategory::where(['type'=>'c','parent_id'=>$data['editData']->category_id])->get();
    
     return view('admin.ProductFeature.brand.edit',$data);
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
            "name" => 'required',
                          ]); 

        $sreq=Brand::find($request->input('editId'));
        $sreq->name=$request->name;
        $sreq->category_id=$request->categoryId;
        $sreq->productSubCate_id=$request->productSubCate_id;
        $sreq->url_slug=Str::slug($request->name, '-');
        
        if($request->file('logo')){
         $request->validate([
        'logo' => 'image|mimes:jpeg,png,jpg,gif,svg',
                         ]); 
       
        $imageName = time().'.'.$request->logo->extension();
        $sreq->logo=$imageName;
        $request->logo->move(public_path('uploads/brandLogo'), $imageName);
        }else{
        $sreq->logo=$request->input('OldImg');
            }
        if($request->homePageStatus){
        $sreq->homePageStatus=1;
        }else{
        $sreq->homePageStatus=0;
        }
            
     $sreq->update();
     \Session::put('success','Data Update Successfully.');
     return redirect('/brand');  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      Brand::find($id)->delete();
     \Session::put('warning','Data Remove Successfully.');
     return redirect('/brand');
    }

    public function updateBrandStatus(Request $request){

            $uDocData=Brand::find($request->input('id'));
            $uDocData->status=$request->CatStatus;
            $uDocData->update();
    }

}
