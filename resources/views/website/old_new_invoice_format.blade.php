<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  <style>
  body {
  -webkit-print-color-adjust: exact;
  }
   .fa:before { color:green !important; }
   .table>thead>tr>th
   {
       border-bottom:none!important;
       margin-bottom:0px;
   }
   .table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th
   {
       border-top:none!important;
      margin-top:0px;
   }
  </style>
  
</head>
<body>
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-6">
          
    <!--1st table open--->
    <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" style="margin-bottom: 10%;margin-top: -70px;">
              
        <tbody class="vendorListHeading">
            <tr>
              <td align="center">
                <table class="col-600" width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                  <tbody>
                    <tr>
                      <td align="center" valign="top">
                        <table class="col-600" width="600" height="auto" border="0" align="center" cellpadding="0" cellspacing="0" style="margin-left: -18px;background-color: #e4e4e4 !important; border-radius: 0 0px 100px 0px; width: 100%; padding: 40px 0px 10px 10px; float: left;position:absolute;z-index:999;top:0;">
                          <tbody>
                            <tr>
                              <td height="20"></td>
                            </tr>
                            <tr>
                              <td align="left" style="line-height: 0px;"><img style="display:block; line-height:0px; font-size:0px; border:0px;padding-left: 0px;padding-bottom: 10px; margin-top: 40px;" src="{{asset('assets/front-end/img/invoicelogo.png')}}" width="25%" height="auto" alt="logo"></td>
                            </tr>
                            <tr>
                              <td align="justify" style="padding-bottom: 3px; padding-left:15px;font-family: 'Roboto', sans-serif; font-size:12px; color:#212529 !important;text-align: left;font-weight:bold"><b>SITESUPPLY INFRATECH PRIVATE LIMITED</b></td>
                            </tr>
                            <tr>
                              <td align="justify" style="padding-bottom: 3px; padding-left:15px;font-family: 'Roboto', sans-serif; font-size:12px; color:#212529 !important;text-align: left;">ADD :604,AMBROSIA F OMAXE R2,GOMTI NAGAR EXTENSION,LUCKNOW ,U.P,INDIA-226010</td>
                            </tr>
                            <tr>
                              <td align="justify" style="padding-bottom: 3px; padding-left:15px;font-family: 'Roboto', sans-serif; font-size:12px; color:#212529 !important;text-align: left;">Contact Number: +91-7348481111 <!-- Registration Number : 09ABFCS1052B1ZR --></td>
                            </tr>
                            <tr>
                              <td align="justify" style="padding-bottom: 3px; padding-left:15px;font-family: 'Roboto', sans-serif; font-size:12px; color:#212529 !important;text-align: left;">GSTIN Number: 09ABFCS1052B1ZR</td>
                            </tr>
                            <tr>
                              <td align="justify" style="padding-bottom: 3px; padding-left:15px;font-family: 'Roboto', sans-serif; font-size:12px; color:#212529 !important;text-align: left;">State: 09 - Uttar Pradesh</td>
                            </tr>
                            <tr>
                              <td align="justify" style="padding-bottom:20px;padding-left:15px;font-family: 'Roboto', sans-serif; font-size:12px; color:#212529 !important;text-align: left;">Email: info@sitesupply.in</td>
                            </tr>
                          </tbody>
                        </table>
                       
                      
                      </td>
                    </tr>
                  </tbody>
                </table>
              </td>
            </tr>
            </tbody>
          </table>
            <!--1st table close--->
            
              <!--2nd table open--->
              
        <table width="287" border="0" align="left" cellpadding="0" cellspacing="0" style="margin-bottom: 10%;margin-top: 25%;">
              
        <tbody class="vendorListHeading">
            <tr>
              <td align="center">
                <table class="col-600" width="600" border="0" align="left" cellpadding="0" cellspacing="0">
                  <tbody>
                    <tr>
                      <td align="center" valign="top">
                        <table class="col-600" width="600" height="auto" border="0" align="center" cellpadding="0" cellspacing="0" style="margin-left: -18px; width: 70%; padding: 0px 0px 0px 10px; float: left;position:absolute;z-index:999;top:0;">
                          <tbody>
                        
                            <tr>
                               <td align="justify" style="font-family: 'Roboto', sans-serif; font-size:12px; color:#212529 !important;text-align: left;">Bill To:</td>
                            </tr>
                         @php
  $uid = $order[0]->user_id;
  $userInfo =  \App\User::find($uid);
@endphp
                                          <tr align="left">
                                            <td style="font-family: 'HammersmithOne', sans-serif; font-size:25px; color:#2a3b4c !important; line-height:30px; font-weight: bold;">
@php
if($order[0]->cmp_name){
$billTo=$order[0]->cmp_name;
}else{
$billTo=$userInfo->name;
}
@endphp
                                            {{$billTo}}</td>
                                          </tr>
                                          
                        <tr>
                                            <td align="justify" style="font-family: 'Roboto', sans-serif; font-size:12px; color:#212529 !important;text-align: left;">{{$order[0]->city}}, {{$order[0]->street}}, {{$order[0]->address}}, {{$order[0]->zip_code}}</td>
                                          </tr>
                                          <tr>
                                            <td height="10"></td>
                                          </tr>
                                        
                                          <tr>
                                            <td align="justify" style="font-family: 'Roboto', sans-serif; font-size:12px; color:#212529 !important;text-align: left;"><b>Contact No:</b> {{$userInfo->mobile_no}}</td>
                                          </tr>
                                                          <tr>
                                            <td height="10"></td>
                                          </tr>
                                          <tr>
                                            <td align="justify" style="font-family: 'Roboto', sans-serif; font-size:12px; color:#212529 !important;text-align: left;"><b>GSTIN Number:</b>
@if($order[0]->gst_no) {{$order[0]->gst_no}} @else  {{N/A}} @endif
                                              </td>
                                          </tr>
                                          <tr>
                                            <td height="10"></td>
                                          </tr>
                                          <tr>
                                            <td align="justify" style="font-family: 'Roboto', sans-serif; font-size:12px; color:#212529 !important; text-align: left;padding-bottom: 0px;"><b>State:</b> 09 - Uttar Pradesh</td>
                                          </tr>
                          </tbody>
                        </table>
                       
                      
                      </td>
                    </tr>
                  </tbody>
                </table>
              </td>
            </tr>
            </tbody>
          </table>
          
            <!--2nd table close--->
            
             <!--3rd table open--->
              
        <table width="287" border="0" align="right" cellpadding="0" cellspacing="0" style="margin-bottom: 0;margin-top: 25%;">
              
        <tbody class="vendorListHeading">
            <tr>
              <td align="center">
                <table class="col-600" width="287" border="0" align="right" cellpadding="0" cellspacing="0">
                  <tbody>
                    <tr>
                      <td align="center" valign="top">
                        <table class="col-600" width="600" height="auto" border="0" align="center" cellpadding="0" cellspacing="0" style="margin-left: -18px; width: 60%; padding: 0px 0px 0px 20%;">
                          <tbody>
                        
                            <tr>
                               <td style="font-family: 'HammersmithOne', sans-serif; font-size:25px; color:#2a3b4c !important; line-height:30px; font-weight: bold;text-align:right;">Tax Invoice</td>
                            </tr>
                       <tr>  
                                  <td height="10"></td>
                                  </tr>
                                  <tr>
                                    <td align="justify" style="padding-left: 7px; font-family: 'Roboto', sans-serif; font-size:12px; color:#212529 !important;text-align:right;"><b>Invoice No:</b>{{$order[0]->non_act_totalAmt}}</td>
                                  </tr>
                                  <tr>
                                    <td height="10"></td>
                                  </tr>
                                  <tr>
                                    <td align="justify" style="padding-left: 7px; font-family: 'Roboto', sans-serif; font-size:12px; color:#212529 !important;text-align:right;"><b>Place of Supply:</b> 09-Uttar Pradesh</td>
                                  </tr>
                                  <tr>
                                    <td height="10"></td>
                                  </tr>
                                  <tr>
                                    <td align="justify" style="padding-left: 7px; font-family: 'Roboto', sans-serif; font-size:12px; color:#212529 !important;text-align:right;"><b>Date:</b> {{date('d/m/yy h:i a',strtotime($order[0]->created_at))}}</td>
                                  </tr>
                          </tbody>
                        </table>
                       
                      
                      </td>
                    </tr>
                  </tbody>
                </table>
              </td>
            </tr>
            </tbody>
          </table>
          
            <!--3rd table close--->
            
        <!--4th table open--->
        
        <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
          <!-- START HEADER/BANNER -->
          <tbody class="vendorListHeading">
  
            <!-- START WHAT WE DO -->
            
            <tr>
              <td align="center" style="padding-top: 13.3%;">
                <table class="table col-600" width="600" border="0" align="center" cellpadding="0" cellspacing="0" style="padding: 10px 0 0px 0;margin-left: -12px;margin-right: -12px;font-family: 'Roboto', sans-serif;font-size: 12px;">
                  <thead>
                      <tr>
                      <th style="background: #e99016 !important;vertical-align: middle;padding: 0px 0px 0px 10px;border-radius: 20px 0px 0px 0px;text-align: left;border-left: none!important;border-right: none!important;"><span style="color:#fff !important;">#</span></th>
                      <th style="background: #e99016 !important;vertical-align: middle;padding: 10px;text-align: left;"><span style="color:#fff !important;border-bottom: none!important;border-left: none!important;border-right: none!important;border-top: none!important;">Item Name</span></th>
                      <th style="background: #e99016 !important;padding: 10px;text-align: left;"><span style="color:#fff !important;border-bottom: none!important;border-left: none!important;border-right: none!important;border-top: none!important;">HSN/SAC</span></th>
                      <th style="background: #e99016 !important;vertical-align: middle;padding: 10px;text-align: right;"><span style="color:#fff !important;border-bottom: none!important;border-left: none!important;border-right: none!important;border-top: none!important;">Quantity</span></th>
                      <th style="background: #e99016 !important;vertical-align: middle;padding: 10px;text-align: right;"><span style="color:#fff !important;border-bottom: none!important;border-left: none!important;border-right: none!important;border-top: none!important;">Unit</span></th>
                      <th style="background: #e99016 !important;padding: 10px;text-align: right;"><span style="color:#fff !important;border-bottom: none!important;border-left: none!important;border-right: none!important;border-top: none!important;">Price/Units</span></th>
                      <th style="background: #e99016 !important;vertical-align: middle;padding: 10px;text-align: right;"><span style="color:#fff !important;border-bottom: none!important;border-left: none!important;border-right: none!important;border-top: none!important;">GST</span></th>
                      <th style="background: #e99016 !important;vertical-align: middle;padding: 10px;border-radius: 0px 20px 0px 0px;text-align: right;border-bottom: none!important;border-left: none!important;border-right: none!important;border-top: none!important;"><span style="color:#fff !important;">Amount</span></th>
                    </tr>
                  </thead>
            
                  <tbody>

<?php
$amount_sum=0; 
foreach ($productItemDetails as $key=>$productVal){
  $mrp=$productVal->price*$productVal->product_count;

  $count_sum+=$productVal->product_count;
  $amount_sum+=$mrp;
  $item_gst=floor(($mrp/100)*18);
  if($productVal->gst){
  $gst=$productVal->gst."%";
  }
  $gstAmt=(($productVal->price*$productVal->product_count)*($productVal->gst))/(100+$productVal->gst);
 $gstTotalAmount+=$gstAmt;
?>
                      <tr>
                      <td style="text-align:left;padding: 10px 0px 10px 6px;">{{$key+1}}</td>
                      <td style="padding: 10px 0px 10px 6px;">{{$productVal->product_name}}</td>
                      <td style="padding: 10px 0px 10px 6px;">{{$productVal->hsn_code}}</td>
                      <td style="padding: 10px 10px 10px 6px;text-align:right;"><i class="fa fa-inr"></i>{{$productVal->product_count}}</td>
                      <td style="padding: 10px 10px 10px 6px;text-align:right;"><i class="fa fa-inr"></i>{{$productVal->product_qty}}</td>
                      <td style="text-align: right;padding-right: 10px!important;padding-left: 0px!important;">{{$productVal->price}}</td>
                      <td style="text-align: right;padding-right: 8px!important;padding-left: 0px!important;"><i class="fa fa-inr"></i>{{floor($gstAmt)}} ({{$gst}})<br>
                       </td>
                      <td style="text-align: right;padding-right: 5px!important;padding-left: 0px!important;"><i class="fa fa-inr"></i>{{$mrp}}</td>
                      </tr>
<?php
}
?>

                    <tr>
                      <td style="background: #e99016 !important;vertical-align: middle;padding: 4px!important; border-radius: 0px 0px 0px 20px;"></td>
                      <td style="background: #e99016 !important;vertical-align: middle;padding: 4px!important;color:#fff !important;">Total</td>
                      <td style="background: #e99016 !important;vertical-align: middle;padding: 4px!important;"></td>
                      <td style="background: #e99016 !important;vertical-align: middle;padding: 4px 10px 4px 4px!important;color:#fff !important;text-align: right;"><i class="fa fa-inr"></i>{{$count_sum}}</td>
                      <td style="background: #e99016 !important;vertical-align: middle;padding: 4px!important;"></td>
                      <td style="background: #e99016 !important;vertical-align: middle;padding: 4px!important;"></td>
                      <td style="background: #e99016 !important;vertical-align: middle;padding: 4px!important;text-align: right;color:#fff !important; padding-left: 0px!important;"><i class="fa fa-inr"></i>{{floor($gstTotalAmount)}}</td>
                      <td style="background: #e99016 !important;vertical-align: middle;padding: 4px!important;text-align: right;color:#fff !important; padding-left: 0px !important;"><i class="fa fa-inr"></i>{{$amount_sum}}</td>
                    </tr>


                    <tr>
                      <td style="text-align: left;padding: 5px 10px 5px 6px; text-align: right;" colspan="7">Subtotal</td>
                      <td style="text-align: right;padding-right: 3px!important;padding-left: 0px!important;"><i class="fa fa-inr"></i>{{$order[0]->non_act_totalAmt}}</td>
                    </tr>

<tr>
                      <td colspan="7" style="text-align: left;padding: 5px 10px 5px 6px; text-align: right;">GST</td>
                      <td style="text-align: right; padding-right: 3px!important;padding-left: 0px!important;"><i class="fa fa-inr"></i>{{$order[0]->tax_amount}}</td>
                    </tr>

<?php
if($order[0]->shippingCharge){
$discount=$order[0]->shippingCharge;

$deliveryGstAmt=floor(($discount*18/(100+$discount)));

}else{
$discount="Free";  
$deliveryGstAmt=0;
}
?>

                    <tr>
                      <td colspan="7" style="text-align: left;border-bottom: none!important;padding: 5px 10px 5px 6px; text-align: right; border-left: none!important;">Delivery Charges</td>
                      <td style="border-bottom: none!important;text-align: right; padding-right: 3px!important; border-right:none!important; padding-left: 0px!important; border-left: none!important;"><i class="fa fa-inr"></i>{{$discount}}</td>
                    </tr>

                    
                    <tr>
                      <td colspan="7" style="text-align: left;border-bottom: none!important;padding: 5px 10px 5px 6px; text-align: right; border-left:noneimportant;">Delivery Charges GST</td>
                      <td style="border-bottom: none!important;text-align: right; padding-right: 3px!important; border-right: none!important; padding-left: 0px!important; border-left: none!important;"><i class="fa fa-inr"></i>{{$deliveryGstAmt}}</td>
                    </tr>

                    <tr style="background-color:#e99016 !important;vertical-align: middle;padding: 4px!important;">
                      <td colspan="7" style="text-align: left;color:#fff !important;background-color:#e99016 !important;vertical-align: middle;border-bottom: none!important;padding-bottom: 5px!important;padding: 10px 10px 10px 6px;text-align: right;border-left: none!important;">Total</td>
                      <td style="background-color:#e99016 !important;border-bottom: none!important;text-align: right;color:#fff !important;padding-left: 0px!important;padding-right: 3px!important; border-right: none!important; padding-bottom: 5px!important;padding: 10px 10px 10px 6px;border-left: none!important; text-align: right;"><i class="fa fa-inr"></i>{{$order[0]->product_total_price}}</td>
                    </tr>
                    <tr>
                      <td colspan="7" style="text-align: left;border-bottom: none!important;padding: 5px 10px 5px 6px; text-align: right; border-left: none!important;">Payment Status</td>
                      <td style="border-bottom: none!important;text-align: right; padding-right: 3px!important; border-right: none!important; border-left: none!important;padding-left: 0px!important;font-weight:bold;">@if($order[0]->payment_mode=='cash'){{COD}} @else {{Paid}} @endif</td>
                    </tr>
                <!--     <tr>
                      <td colspan="7" style="text-align: left;border-bottom: none!important;padding: 5px 10px 5px 6px; text-align: right; border-left: none!important;">Balance</td>
                      <td style="border-bottom: none!important;text-align: right; padding-right: 3px!important; border-right: none!important; border-left: none!important; padding-left: 0px!important;">0.00</td>
                    </tr> -->
                  </tbody>
                </table><!-- END WHAT WE DO -->
                    
            <!--4th table close--->
                               
        <!--5th table open--->
              
        <table width="287" border="0" align="left" cellpadding="0" cellspacing="0" style="margin-bottom: 0;margin-top:0;">
              
        <tbody class="vendorListHeading">
            <tr>
              <td align="left">
                <table class="col-600" width="287" border="0" align="left" cellpadding="0" cellspacing="0">
                  <tbody>
                    <tr>
                      <td align="center" valign="top">
                        <table class="col-600" width="600" height="auto" border="0" align="left" cellpadding="0" cellspacing="0" style="margin-left: -18px; width: 100%; padding: 0px 0px 0px 0;">
                          <tbody>
                        
                          <tr align="left">
                          <td style="font-family: 'Raleway', Arial, sans-serif; font-size:16px; color: #212121 !important; line-height:22px; font-weight: bold;">Invoice Amount</td>
                          </tr>
                          <tr align="left">
                          <td style="font-family: 'Roboto', sans-serif; font-size:12px; color: #212529 !important; line-height:24px;"><i class="fa fa-inr"></i>{{$order[0]->non_act_totalAmt}}</td>
                          </tr>
                          
                          <tr align="left">
                                                              <td style="font-family: 'Raleway', Arial, sans-serif; font-size:16px; color: #212121 !important; line-height:22px; font-weight: bold;">Terms And Conditions</td>
                                                            </tr>
                                                            <tr align="left">
                                                              <td style="font-family: 'Roboto', sans-serif; font-size:12px; color: #212529 !important; line-height:24px;">Terms & Conditions: E.& O.E.</td>
                                                            </tr>
                                                            <tr align="left">
                                                              <td style="font-family: 'Roboto', sans-serif; font-size:12px; color: #212529 !important; line-height:24px;">1. Goods once sold will not be taken back.</td>
                                                            </tr>
                                                            <tr align="left">
                                                              <td style="font-family: 'Roboto', sans-serif; font-size:12px; color: #212529 !important; line-height:24px;">2. Subject to LUCKNOW Jurisdiction only.</td>
                                                            </tr>
                                                            <tr align="left">
                                                              <td style="font-family: 'Roboto', sans-serif; font-size:12px; color: #212529 !important; line-height:24px;">3.Interest @ 18% p.a. will be charged if th e payment is not made with in the stipulated time.</td>
                                                            </tr>
                                                            <tr>
                                                              <td height="10px"></td>
                                                            </tr>
                                                      
                          </tbody>
                        </table>
                       
                      
                      </td>
                    </tr>
                  </tbody>
                </table>
              </td>
            </tr>
            </tbody>
          </table>
          
            <!--5th table close--->
            
            <!---6th table open--->
            
                    <table width="287" border="0" align="left" cellpadding="0" cellspacing="0" style="margin-bottom: 0;margin-top:20%;">
              
        <tbody class="vendorListHeading">
            <tr>
              <td align="left">
                <table class="col-600" width="287" border="0" align="left" cellpadding="0" cellspacing="0">
                  <tbody>
                    <tr>
                      <td align="center" valign="top">
                        <table class="col-600" width="600" height="auto" border="0" align="left" cellpadding="0" cellspacing="0" style="margin-left: -18px; width: 100%; padding: 0px 0px 0px 0;">
                          <tbody>
                        
                                                             <tr>
                                                              <td style="padding-left: 15px;font-family: 'Roboto', sans-serif; font-size:12px; color: #212529 !important; line-height:24px;">For, Sitesupply</td>
                                                            </tr>
                                                                <tr>
                                                              <td height="20"></td>
                                                            </tr>
                                                            <tr align="left">
                                                                <img style="display:block;margin-top: 34px;margin-left:-50px;width:60%;float:left;" src="{{asset('assets/front-end/img/authorized-signatory.png')}}"  alt="logo">
                                                              
                                                                
                                                            </tr>
                                                           
                        </tr>           
                          </tbody>
                        </table>
                       
                      
                      </td>
                    </tr>
                  </tbody>
                </table>
              </td>
            </tr>
            </tbody>
          </table>
            
            <!---6th table close--->
                    <tr>
                        <td align="center">
                            <table class="col-600" width="100%" border="0" align="center" cellpadding="0" cellspacing="0" style="">
                              <tbody>
                                <tr>
                                  <td>
                                    <table class="col3" width="183" border="0" align="left" cellpadding="0" cellspacing="0" style="margin-top:17%;">
                                      <tbody>
                                  
                                    <tr>
                                      <td align="center">
                                        <table class="col-600" width="600" border="0" align="center" cellpadding="0" cellspacing="0" style="">
                                          <tbody>
                                            <tr>
                                              <td height="10"></td>
                                            </tr>
                                            <tr>
                                              <td>
                                                <table class="col3" width="183" border="0" align="left" cellpadding="0" cellspacing="0">
                                                  <tbody>
                                                    <tr>
                                                      <td align="center">
                                                        <table class="insider" width="600" border="0" align="center" cellpadding="0" cellspacing="0" style="padding-left: 20px;">
                                                          <tbody>
                                                          
                                                           
                                                        
                                                          
                                                          </tbody>
                                                        </table>
                                                      </td>
                                                    </tr>
                                                  </tbody>
                                                </table>
                                        
                                              </td>
                                            </tr>
                                          </tbody>
                                        </table>
                                      </td>
                                    </tr>
                                  </tbody>
                                </table>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</body>
</html>