<!DOCTYPE html>
<html xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" lang="en">
    <head>
        <style>
    
        </style>
    </head>
    <body style="font-family:Arial Unicode MS, Helvetica , Sans-Serif;">
        <center> <h3 style="font-size:25px;">Tax Invoice</h3></center>
        <table style="table-layout: fixed; width: 100%;">
            <tbody>
                <tr>
                   <!-- <td class="">
                        <div>
                           
                               <p>Tax Invoice</p>
                        </div>
                    </td>
                    <td width="15%">
                        
                    </td>-->
                    <td>    
                        <table class="tbl-padded">
               
                            <caption style="text-transform: uppercase; text-align: left; font-size: 30pt;">
                                            <img src="https://sitesupply.in/assets/front-end/img/invoicelogo.png" alt="Company Logo" style="max-width:25%;">  
                               
                            </caption> 
                            <tbody>
                                <tr>
                                    <td style="padding:5px;">
                                        <strong >SITESUPPLY INFRATECH PRIVATE LIMITED</strong>
                                    </td>
                                   
                                </tr>
                                <tr>
                                    <td style="padding:2px;font-size:12px">
                                         <strong>ADD :604,AMBROSIA F OMAXE R2,GOMTI NAGAR EXTENSION,LUCKNOW ,U.P,INDIA-226010</strong>                       
                                    </td>
                                   
                                </tr>
                                <tr>
                                    <td style="padding:2px;font-size:12px">
                                        <strong >Contact Number: +91-7348481111</strong>                            
                                    </td>
                                   
                                </tr>
                                <tr>
                                    <td style="padding:2px;font-size:12px">
                                        <strong > Email: info@sitesupply.in</strong>                            
                                    </td>
                                </tr>
                              
                                <tr>
                                    <td style="padding:2px;font-size:12px">
                                        <strong >GSTIN Number: 09ABFCS1052B1ZR</strong>                                
                                    </td>
                                   
                                </tr>
                                 <tr>
                                    <td style="padding:2px;font-size:12px">
                                        <strong >State: 09 - Uttar Pradesh</strong>                                
                                    </td>
                                   
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
        
        <div style="padding-top: 1cm; padding-bottom: 1cm;">
            <table style="table-layout: fixed; width: 100%;">
                <tbody>
                    <tr>
                         <td>
                            <div style="padding-bottom: 10px;">
                                <strong style="text-transform: uppercase;">Bill To</strong>
                            </div>
                            <div>
                                                         @php
  $uid = $order[0]->user_id;
  $userInfo =  \App\User::find($uid);
  @endphp
  @php
if($order[0]->cmp_name){
$billTo=$order[0]->cmp_name;
}else{
$billTo=$userInfo->name;
}
@endphp

                                <p style="margin:2px;font-size:12px">{{$billTo}}</p>

                                <p style="margin:2px;font-size:12px">{{$order[0]->city}}, {{$order[0]->street}}, {{$order[0]->address}}, {{$order[0]->zip_code}}</p>
                                <p style="margin:2px;font-size:12px">Contact No: {{$userInfo->mobile_no}}</p>
                                 <p style="margin:2px;font-size:12px">GSTIN Number: @if($order[0]->gst_no) {{$order[0]->gst_no}} @else  {{N/A}} @endif</p>
                                   <p style="margin:2px;font-size:12px">State: 09 - Uttar Pradesh</p>
                               
                            </div>
                        </td>
                       
                        <td width="15%">
                            
                        </td>
                        
                         <td>
                            <div style="padding-bottom: 10px;">
                                <strong style="text-transform: uppercase;">Tax Invoice</strong>
                            </div>
                            <div>
                                <p style="margin:2px;font-size:12px">Invoice No: {{$order[0]->order_id}}</p>
                                <p style="margin:2px;font-size:12px">Place of Supply: {{$deliveredFrom}}</p>
                                <p style="margin:2px;font-size:12px">Date: {{date('d/m/yy h:i a',strtotime($order[0]->created_at))}}</p>
                            </div>
                        </td>
                       
                    </tr>
                </tbody>
            </table>
        </div>
       
        <div>
            <table class="ptab" style="table-layout: fixed; width: 100%;">
                <thead style="background: #e99016">
                    <tr>
                        <th  width="11%" align="left" style="border-top: 1px solid #eee; padding: 5px;font-size:12px">
                            S.NO
                        </th>
                        <th width="11%" align="left" style="border-top: 1px solid #eee; padding: 5px;font-size:12px">
                            Item
                        </th>
                        <th width="11%" align="left" style="border-top: 1px solid #eee; padding: 5px;font-size:12px">
                           HSN/SAC
                        </th>
                        <th width="11%" align="left" style="border-top: 1px solid #eee; padding: 5px;font-size:12px">
                           Quant
                        </th>
                         <th width="11%" align="left" style="border-top: 1px solid #eee; padding: 5px;font-size:12px">
                           Unit
                        </th>
                         <th width="11%" align="left" style="border-top: 1px solid #eee; padding: 5px;font-size:12px">
                          Price/Unit
                        </th>
                        <th width="11%" align="left" style="border-top: 1px solid #eee; padding: 5px;font-size:12px">
                          GST
                        </th>
                        
                        <th width="11%" align="right" style="border-top: 1px solid #eee; padding: 5px;font-size:12px">
                          Amount
                        </th>
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
                        <td style="border-top: 1px solid #eee; padding: 5px;font-size:12px">
                           {{$key+1}}
                        </td>
                        <td align="left" style="border-top: 1px #eee;font-size:12px">
                            {{$productVal->product_name}}
                        </td>
                        <td align="left" style="border-top: 1px solid #eee; padding: 5px;font-size:12px">
                            {{$productVal->hsn_code}}
                        </td>
                        <td align="left" style="border-top: 1px solid #eee; padding: 5px;font-size:12px">
                            {{$productVal->product_count}}
                        </td>
                         <td align="left" style="border-top: 1px solid #eee; padding: 5px;font-size:12px">
                            {{$productVal->product_qty}}
                        </td>
                         <td align="left" style="border-top: 1px solid #eee; padding: 5px;font-size:12px">
                            {{$productVal->price}}
                        </td>
                         <td align="left" style="border-top: 1px solid #eee; padding: 5px;font-size:12px">
                        {{floor($gstAmt)}} ({{$gst}})
                        </td>
                         <td align="left" style="border-top: 1px solid #eee; padding: 5px;font-size:12px">
                         {{$mrp}}
                        </td>
                    </tr>
<?php
}
?>
                </tbody>
            </table>
        </div>

        <div style="border-top: 1px solid #eee;">
            <table style="table-layout: fixed; width: 100%; border-collapse: collapse;">
                <tbody>
                    <tr>
                        <td align="right" style="padding: 5px;font-size:13px">
                            Subtotal
                        </td>
                        <td align="right" width="20%" style="padding: 5px;font-size:13px">
                          {{$order[0]->non_act_totalAmt}}
                        </td>
                    </tr>
                    <tr>
                        <td align="right" style="padding: 5px;font-size:13px">
                            SGST
                        </td>
                        <td align="right" width="20%" style="padding: 5px;font-size:13px">
                        {{floor($order[0]->tax_amount/2)}}
                        </td>
                    </tr>
                    <tr>
                        <td align="right" style="padding: 5px;font-size:13px">
                            CGST 
                        </td>
                        <td align="right" width="20%" style="padding: 5px;font-size:13px">
                        {{floor($order[0]->tax_amount/2)}}
                        </td>
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
                        <td align="right" style="padding: 5px;font-size:13px;font-size:13px">
                         Delivery Charges
                        </td>
                        <td align="right" width="20%" style="padding: 5px;font-size:13px">
                       {{$discount}} 
                        </td>
                    </tr>

                    <tr>
                        <td align="right" style="padding: 5px;font-size:13px;font-size:13px">
                         Delivery Charges GST (18%)
                        </td>
                        <td align="right" width="20%" style="padding: 5px;font-size:13px">
                     {{$deliveryGstAmt}}      
                        </td>
                    </tr>


                    <tr style="background: #e99016;">
                        <td align="right" style="border-top: 2px solid #eee; padding: 8px;">
                            <span style="font-size: 13px;">
                                Total Amount        
                            </span>
                        </td>
                        <td align="right" width="20%" style="border-top: 2px solid #eee; padding: 8px;">
                            <strong style="font-size: 13px;">
                            {{$order[0]->product_total_price}}
                            </strong>
                        </td>
                    </tr>
                     <tr>
                        <td align="right" style="padding: 5px;font-size:13px;font-size:13px">
                         Payment Status
                        </td>
                        <td align="right" width="20%" style="padding: 5px;font-size:13px">
                        @if($order[0]->payment_mode=="cash"){{ COD }} @elseif($order[0]->payment_mode=="online") {{ Paid }} @else {{ Other }} @endif
                        </td>
                    </tr>
                    
                </tbody>
            </table>
        </div>
        
        
          <div style="margin-top:10px;">
              <table style="table-layout: fixed; width: 100%;">
             <thead style="background: #e99016;">
                    <tr>
                        <th   align="center" style="border-top: 1px solid #eee; padding: 5px;font-size:12px">
                            HSN/SAC
                        </th>
                        <th  align="center" style="border-top: 1px solid #eee; padding: 5px;font-size:12px">
                            Taxable value
                        </th>
                        <th colspan="2"  align="center" style="border-top: 1px solid #eee; padding: 5px;font-size:12px">
                           Centeral Tax
                         
                        </th>
                        <th colspan="2"    align="center" style="border-top: 1px solid #eee; padding: 5px;font-size:12px">
                           State Tax
                        </th>
                        <!--  <th colspan="2"    align="center" style="border-top: 1px solid #eee; padding: 5px;font-size:12px">
                           Delivery Tax
                        </th> -->
                         <th  align="center" style="border-top: 1px solid #eee; padding: 5px;font-size:12px">
                          Total
                        </th>
                         
                    </tr>
                    
                    <tr style="background: #e99016;border:1px solid gray">
                          <th align="left" width="20%" style=";font-size:10px">&nbsp;</th>
                         <th align="center" width="20%" style=";font-size:10px">&nbsp;</th>
                          
                        <th  align="center"  style="border:1px solid #eee;padding: 0px;font-size:10px">Rate</th>
                        <th  align="center" style="border:1px solid #eee;padding: 0px;font-size:10px"> Amount</th>
                            
                        <th  align="center"  style="border:1px solid #eee;padding: 0px;font-size:10px">Rate</th>
                        <th  align="center"  style="border:1px solid #eee;padding: 0px;font-size:10px"> Amount</th>
                          <th align="center"  style="border:1px solid #eee;padding: 0px;font-size:10px"> Total Tax Amount</th>
                        </tr>  
           </thead> 
                
                <tbody >
<?php
use DB;
use App\Payment;
foreach ($productItemDetails as $key=>$productValForHSN){
    $hsn1[]=$productValForHSN->hsn_code;
    $bokId=$productValForHSN->booking_id;
}
$hsn=array_unique($hsn1);
for($i=0;$i<count($hsn);$i++){

$user_data =Payment::select('product_count','gst',DB::raw('SUM(price) AS price'))->where(['booking_id'=>$bokId,'hsn_code'=>$hsn[$i]])->get();

$productPrice=$user_data[0]->product_count*$user_data[0]->price;

$halfgstRate=floor($user_data[0]->gst/2);

$gstApplicableAmount=($productPrice*$user_data[0]->gst)/(100+$user_data[0]->gst);

$costprice=$productPrice-$gstApplicableAmount;

$GSTAmount=$costprice*($user_data[0]->gst/100);

$halfGstAMT=floor($GSTAmount/2);

$totalhalfGstAMT+=($GSTAmount/2);
$totalcostPrice+=$costprice;
$totalActPrice+=$productPrice;
$allTotalTax+=$GSTAmount;
?>
                  <tr style="background: #eee">
                        <td style="font-size:12px" align="center">{{$hsn[$i]}}</td>
                        <td style="font-size:12px" align="center">{{floor($costprice)}}</td>
                        <td style="font-size:12px" align="center">{{$halfgstRate}}%</td>
                        <td style="font-size:12px" align="center">{{$halfGstAMT}}</td>
                        <td style="font-size:12px" align="center">{{$halfgstRate}}%</td>
                        <td style="font-size:12px" align="center">{{$halfGstAMT}}</td>
                        <td style="font-size:12px" align="center">{{$GSTAmount}}</td>
                    </tr>

<?php
}
?>

                     <tr style="background: #eee">
                        <td align="right" style="border-top: 2px solid #eee; padding: 4px;">
                            <span style="font-size: 13px;">
                                Total Amount        
                            </span>
                        </td>
                        <td align="Center"  style="border-top: 2px solid #eee; padding: 4px;">
                            <strong style="font-size: 13px;">
                            {{floor($totalcostPrice)}}
                            </strong>
                        </td>
                         <td align="center"  style="border-top: 2px solid #eee; padding: 4px;">
                            <strong style="font-size: 13px;">
                            &nbsp;
                            </strong>
                        </td>
                         <td align="center" style="border-top: 2px solid #eee; padding: 4px;">
                            <strong style="font-size: 13px;">
                           {{floor($totalhalfGstAMT)}}
                            </strong>
                        </td>
                         <td align="center"  style="border-top: 2px solid #eee; padding: 4px;">
                            <strong style="font-size: 13px;">
                            &nbsp;
                            </strong>
                        </td>
                          <td align="center"  style="border-top: 2px solid #eee; padding: 4px;">
                            <strong style="font-size: 13px;">
                            {{floor($totalhalfGstAMT)}}
                            </strong>
                        </td>
                         <td align="center"  style="border-top: 2px solid #eee; padding: 4px;">
                            <strong style="font-size: 13px;">
                            {{floor($allTotalTax)}}
                            </strong>
                        </td>
                    </tr>
                      
                </tbody>
            </table>
            
         
        </div>
        <br>
        <br>
        <br>
        <br>
         <br>
        <br>
        <br>
        <br>
        <br>
        <br>      
        <div>
            <div style="padding-top:0px; padding-bottom: 1cm;width:50%">
                <div>
                    <strong>Term & Condition</strong>
                </div>
                <p style="font-size: 11px; line-height: 14pt;">
                    Terms & Conditions: E.& O.E.
                </p>
                <p style="font-size: 11px; line-height: 14pt;">
                    1. Goods once sold will not be taken back.
                </p>
                <p style="font-size: 11px; line-height: 14pt;">
                    2. Subject to LUCKNOW Jurisdiction only.
                </p>

                  <p>From: SITESUPPLY INFRATECH PRIVATE LIMITED</p>
                 <img src="https://sitesupply.in/assets/front-end/img/authorized-signatory.png" alt="Company Logo" style="width: 70%;">
                <div>
                    <strong></strong>
                </div>
            </div>
        </div>
</body>

</html>