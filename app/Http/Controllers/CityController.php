<?php

namespace App\Http\Controllers;

use App\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productCategory=City::orderBy('id','desc')->get();
        return view('admin.city.index',['category'=>$productCategory]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('admin.city.view'); 
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

        $sreq = new City;
        $sreq->name=$request->name; 
      
        $sreq->save();
        \Session::put('success','Data Add Successfully.');
        return redirect('/city');
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
     $editData=City::find($id);
     return view('admin.city.edit',['editData'=>$editData]);
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

        $sreq=City::find($request->input('editId'));
        $sreq->name=$request->name;

        $sreq->update();
     \Session::put('success','Data Update Successfully.');
     return redirect('/city');  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      City::find($id)->delete();
     \Session::put('warning','Data Remove Successfully.');
     return redirect('/city');
    }

    public function updateCityStatus(Request $request){

            $uDocData=City::find($request->input('id'));
            $uDocData->status=$request->CatStatus;
            $uDocData->update();
    }
}
