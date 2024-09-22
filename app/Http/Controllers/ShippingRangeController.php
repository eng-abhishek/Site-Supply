<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ShippingRange;

class ShippingRangeController extends Controller
{
    
public function index(){

$data['first_row']=ShippingRange::find('1');
$data['second_row']=ShippingRange::find('2');
$data['third_row']=ShippingRange::find('3');
$data['fourth_row']=ShippingRange::find('4');

return view('admin.shipping.shipping',$data);	
}

public function update(Request $req){
$tblRowOne=ShippingRange::find('1');
$tblRowOne->min_amount=$req->minAmt1;
$tblRowOne->max_amount=$req->maxAmt1;
$tblRowOne->charge=$req->shipingAmt1;
$tblRowOne->update();


$tblRowTwo=ShippingRange::find('2');
$tblRowTwo->min_amount=$req->minAmt2;
$tblRowTwo->max_amount=$req->maxAmt2;
$tblRowTwo->charge=$req->shipingAmt2;
$tblRowTwo->update();


$tblRowThree=ShippingRange::find('3');
$tblRowThree->min_amount=$req->minAmt3;
$tblRowThree->max_amount=$req->maxAmt3;
$tblRowThree->charge=$req->shipingAmt3;
$tblRowThree->update();

$tblRowFour=ShippingRange::find('4');
$tblRowFour->min_amount=$req->minAmt4;
$tblRowFour->max_amount=$req->maxAmt4;
$tblRowFour->charge=$req->shipingAmt4;
$tblRowFour->update();
\Session::put('success','Data Update Successfully.');
return redirect('shipping-management');
}

}
