<?php

namespace App\Http\Controllers;

use App\Location;
use App\City;
use DB;
use Illuminate\Http\Request;

class LocationController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $location=DB::table('cities')->select('locations.id','locations.status','locations.name as location','cities.name as city')->join('locations','cities.id','=','locations.city_id')->get();
        return view('admin.location.index',['category'=>$location]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $city=City::where('status','1')->get();
      return view('admin.location.view',['city'=>$city]); 
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
            "city" => 'required',
            "location"=>'required|min:3|max:20',
                         ]); 

        $sreq = new Location;
        $sreq->city_id=$request->city;
        $sreq->name=$request->location;       
        $sreq->save();
        \Session::put('success','Data Add Successfully.');
        return redirect('/location');
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
     $editData=Location::find($id);
     $city=City::where('status','1')->get();
     return view('admin.location.edit',['editData'=>$editData,'city'=>$city]);
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
            "city" => 'required',
            "location"=>'required|min:3|max:20',
                         ]); 

         $sreq=Location::find($request->input('editId'));
         $sreq->city_id=$request->city;
        $sreq->name=$request->location;  

        $sreq->update();
     \Session::put('success','Data Update Successfully.');
     return redirect('/location');  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      Location::find($id)->delete();
     \Session::put('warning','Data Remove Successfully.');
     return redirect('/location');
    }

    public function updateLocationStatus(Request $request){

            $uDocData=Location::find($request->input('id'));
            $uDocData->status=$request->CatStatus;
            $uDocData->update();
    }
}
