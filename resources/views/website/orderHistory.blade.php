@extends('website.layout.layout')
@section('content')
<?php 
error_reporting(1);
?>
<section style="margin-top:200px">
       <div class="container" >
            <div class="row">
                  <div class="col-md-6" style="background:white;padding:12px;">
                      <p>Order Details</p>
                        <div class="table-responsive">
                              <table class="table table-bordered">
                                     <tr>
                                         <td>Order ID</td>
                                         <td>{{$order[0]->order_id}}</td>
                                      </tr>
                                       <tr>
                                         <td>User Name</td>
                                         <td>{{$order[0]->name}}</td>
                                     </tr>
                                     @if($order[0]->sitePersonName)
                                       <tr>
                                         <td>Site Person Name</td>
                                         <td>{{$order[0]->sitePersonName}}</td>
                                     </tr>
                                     @else
                                     @endif
                                     @if($order[0]->sitePersonCNo)
                                       <tr>
                                         <td>Site Person Contact No</td>
                                         <td>{{$order[0]->sitePersonCNo}}</td>
                                     </tr>
                                     @else
                                     @endif

                                       <tr>

                                         <td>User Contact No</td>
                                         <td>{{$order[0]->mobile_no}}</td>
                                     </tr>
                                       <tr>
                                         <td>User Email</td>
                                         <td>{{$order[0]->email}}</td>
                                     </tr>
                                       <tr>
                                     <td>User Zip Code</td>
                                         <td>{{$order[0]->zip_code}}</td>
                                     </tr>
                                      <tr>
                                         <td>User City</td>
                                         <td>{{$order[0]->city}}</td>
                                     </tr>
                                      <tr>
                                         <td>User Landmark Address</td>
                                         <td>{{$order[0]->address}}</td>
                                     </tr>
                                       
                                     @if($order[0]->cmp_name)
                                       <tr>
                                         <td>Company Name</td>
                                         <td>{{$order[0]->cmp_name}}</td>
                                       </tr>
                                     @else
                                     @endif
                                     @if($order[0]->gst_no)
                                       <tr>
                                         <td>GST No</td>
                                         <td>{{$order[0]->gst_no}}</td>
                                       </tr>
                                     @else
                                     @endif

                                     @if($order[0]->shippingCharge)
                                       <tr>
                                         <td>Shipping Charge</td>
                                         <td>{{$order[0]->shippingCharge}}</td>
                                       </tr>
                                     @else
                                     @endif

                                     @if($order[0]->applyShipChargAmt)
                                       <tr>
                                         <td>Apply Shipping Charge On Amount</td>
                                         <td>{{$order[0]->applyShipChargAmt}}</td>
                                       </tr>
                                     @else
                                     @endif

                                    @if($order[0]->tax_amount)
                                       <tr>
                                         <td>Tax Amount</td>
                                         <td>{{$order[0]->tax_amount}}</td>
                                       </tr>
                                     @else
                                     @endif

                                       <tr>
                                         <td>Delivery Date</td>
                                         <td>{{date('d/m/yy h:i A',strtotime($order[0]->delivery_date))}}</td>
                                     </tr>
                                       <tr>
                                         <td>Delivery Time</td>
                                         <td>{{date('h:i A',strtotime($order[0]->delivery_time))}}</td>
                                       </tr>
                                       <tr>
                                         <td>Booking Date</td>
                                         <td>{{date('d/m/yy h:i A',strtotime($order[0]->created_at))}}</td>
                                      </tr>




                                        <tr>
                                         <td>User Instruction</td>
                                         <td>{{$order[0]->comment}}</td>
                                     </tr>
                                     <tr>
                                         <td>User Comment</td>
                                         <td>{{$order[0]->user_comment}}</td>
                                     </tr>
                                     
                                      <tr>
                                         <td>User Rating</td>
                                         <td>{{$order[0]->user_rate}}</td>
                                     </tr>
                                   
                                      <tr>
                                         <td>Payment Mode</td>
                                         <td>{{$order[0]->payment_mode}}</td>
                                      </tr>
                                      
                                      <tr>
                                      <td>Payment Status</td>
                                      <td>{{$order[0]->payment_status}}</td>
                                      </tr>
                                      @if($order[0]->payment_status=='Paid')
                                       <tr>
                                         <td>Transaction Id</td>
                                         <td>{{$order[0]->transation_id}}</td>
                                     </tr>
                                      @else
                                      @endif 
                                      <tr>
                                         <td>Total Amount</td>
                                         <td><i class="fa fa-inr"></i>{{$order[0]->product_total_price}}</td>
                                     </tr>
                                  
                              </table>
                        </div>
                  </div>
                  <div class="col-md-6" style="background:white;padding:15px">
                      <p>Order Items</p>
                       <div class="table-responsive">
                           <table class="table table-bordered table-hovered">
                                 <thead>
                                      <tr>
                                          <th>Product Name</th>
                                          <th>Price</th>
                                          <th>Qty</th>
                                     
                                          <th>Amount</th>
                                      </tr>
                                 </thead> 
                                 <tbody>
                                      <?php 
foreach ($productItemDetails as $keyprice=>$productPriceVal){
?>
          <tr>
              
              <td>{{$productPriceVal->product_name}}</td>
              <td><i class="fa fa-inr"></i>{{$productPriceVal->price}}</td>
              <td>{{$productPriceVal->product_count}}  {{str_replace('Per',' ',$productPriceVal->product_qty)}} </td>
            
              <td><i class="fa fa-inr"></i>{{$productPriceVal->product_count * $productPriceVal->price}}</td>
          </tr>
<?php } ?>          
                                 </tbody>
                           </table>
                       </div>
                  </div>
            </div>
       </div>
</section>

@endsection

