<?php
namespace App\Http\Controllers;
use App\Size;
use Illuminate\Http\Request;

class SizeController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productCategory=Size::orderBy('id','desc')->get();
        return view('admin.ProductFeature.size.index',['category'=>$productCategory]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('admin.ProductFeature.size.view'); 
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
                         ]); 

        $sreq = new Size;
        $sreq->name=$request->name; 
      
        $sreq->save();
        \Session::put('success','Data Add Successfully.');
        return redirect('/size');
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
     $editData=Size::find($id);
     return view('admin.ProductFeature.size.edit',['editData'=>$editData]);
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

        $sreq=Size::find($request->input('editId'));
        $sreq->name=$request->name;

        $sreq->update();
     \Session::put('success','Data Update Successfully.');
     return redirect('/size');  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      Size::find($id)->delete();
     \Session::put('warning','Data Remove Successfully.');
     return redirect('/size');
    }

    public function updateSizeStatus(Request $request){

            $uDocData=Size::find($request->input('id'));
            $uDocData->status=$request->CatStatus;
            $uDocData->update();
    }
}
