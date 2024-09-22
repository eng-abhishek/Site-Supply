<?php

namespace App\Http\Controllers;

use App\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productCategory=Banner::orderBy('id','desc')->get();
        return view('admin.banner.index',['category'=>$productCategory]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('admin.banner.view'); 
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
            'img' =>'image|mimes:jpeg,png,jpg,gif,svg',
                         ]); 

        $sreq = new Banner;
        $sreq->title=$request->title; 
        $sreq->sub_title=$request->sub_title; 
       
        if($request->img){
        $imageName = time().'.'.$request->img->extension();
        $request->img->move(public_path('uploads/banner'),$imageName);
        }else{
        $imageName='NULL';
        }
        $sreq->img=$imageName; 
        $sreq->save();
        \Session::put('success','Data Add Successfully.');
        return redirect('/banner');
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
     $editData=Banner::find($id);
     return view('admin.banner.edit',['editData'=>$editData]);
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
        $sreq=Banner::find($request->input('editId'));
        $sreq->title=$request->title;
        $sreq->sub_title=$request->sub_title;
        
        if($request->file('img')){
         $request->validate([
         'img' =>'image|mimes:jpeg,png,jpg,gif,svg',
                         ]); 
       
        $imageName = time().'.'.$request->img->extension();
        $sreq->img=$imageName;
        $request->img->move(public_path('uploads/banner'), $imageName);
        }else{
        $sreq->img=$request->input('OldImg');
            }
     $sreq->update();
     \Session::put('success','Data Update Successfully.');
     return redirect('/banner');  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      Banner::find($id)->delete();
     \Session::put('warning','Data Remove Successfully.');
     return redirect('/banner');
    }

    public function updateBannerStatus(Request $request){

            $uDocData=Banner::find($request->input('id'));
            $uDocData->status=$request->CatStatus;
            $uDocData->update();
    }
}
