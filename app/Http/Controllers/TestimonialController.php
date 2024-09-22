<?php

namespace App\Http\Controllers;

use App\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productCategory=Testimonial::orderBy('id','desc')->get();
        return view('admin.testimonial.index',['category'=>$productCategory]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {  
     return view('admin.testimonial.view'); 
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
            "name" => 'required|min:5|max:30',
            'img' => 'image|mimes:jpeg,png,jpg,gif,svg',
            'des'=>'required',
                         ]); 
        $sreq = new Testimonial;
        $sreq->name=$request->name; 
        $sreq->designation=$request->designation;
        $sreq->des=$request->des;

        if($request->img){
        $imageName = time().'.'.$request->img->extension();
        $request->img->move(public_path('uploads/testimonial'),$imageName);
        }else{
        $imageName='NULL';
        }

        $sreq->img=$imageName;

        $sreq->save();
        \Session::put('success','Data Add Successfully.');
        return redirect('/testimonial');
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
     $editData=Testimonial::find($id);
     return view('admin.testimonial.edit',['editData'=>$editData]);
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
            "name" => 'required|min:5|max:30',
            'img' => 'image|mimes:jpeg,png,jpg,gif,svg',
            'des'=>'required',
                          ]); 

        $sreq=Testimonial::find($request->input('editId'));
        $sreq->name=$request->name; 
        $sreq->designation=$request->designation;
        $sreq->des=$request->des;
         if($request->file('img')){
         $request->validate([
        'img' => 'image|mimes:jpeg,png,jpg,gif,svg',
                         ]); 
       
        $imageName = time().'.'.$request->img->extension();
        $sreq->img=$imageName;
        $request->img->move(public_path('uploads/testimonial'), $imageName);
        }else{ 
         $sreq->img=$request->input('OldImg');
             }
      $sreq->update();
     \Session::put('success','Data Update Successfully.');
     return redirect('/testimonial');  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      Testimonial::find($id)->delete();
     \Session::put('warning','Data Remove Successfully.');
     return redirect('/testimonial');
    }

    public function updateTestimonialStatus(Request $request){

            $uDocData=Testimonial::find($request->input('id'));
            $uDocData->status=$request->CatStatus;
            $uDocData->update();
    }

    public function details(Request $request){
    $testData=Testimonial::where('id',$request->id)->get();
    return view('admin.testimonial.detail',['dealOfDayDetails'=>$testData]);
    }
    
    public function getMoreTestimonialData(Request $request){
    $uDocData=Testimonial::find($request->input('id'));   
    $imgUrl=url('uploads/testimonial/'.$uDocData->img);
    $output='';
    $output.='<div class="modal-body text-center" style="padding:5p 5px;z-index:999999 ">
                        <div style="width:110px; height:110px; margin:0px auto 20px auto;">
                            <img src="'.$imgUrl.'" class="img-circle"
                                style="width:100%; height:100%; object-fit:cover; border-radius: 100px;" alt="">
                              
                        </div>

                        <div style="margin-bottom:20px;">
                            <h3 style="color:#f7c228;font-size:20px">'.$uDocData->name.'</h3>
                            <center><span style="font-size:15px; font-weight: 600;">'.$uDocData->designation.'</span></center>
                        </div>
                        <div>
                            <p style="font-weight: 400;">'.$uDocData->des.'</p>
                        </div>
                    </div>
    ';
    return $output;
    }
}
