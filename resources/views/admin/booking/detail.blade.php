@extends('admin.layout.layout')
@section('title','Order Details')
@section('content')
  <!-- Right side column. Contains the navbar and content of the page -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Admin 
            <small>Site Supply</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
            <li><a href="#">Dashboard</a></li>
            <li class="active">Detail</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
    <!--       <div class="col-md-1"></div> -->
            <!-- left column -->
            <div class="col-md-12">
              <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title">Order Detail</h3>
                </div><!-- /.box-header -->
                <!-- form start -->

           <div class="row">
           <div class="col-sm-1"></div>
           <div class="col-sm-4 detailsBlod">Order ID</div>
           <div class="col-sm-2">:</div>  
           <div class="col-sm-5">{{$order[0]->order_id}}</div>    
           </div>

           <div class="row">
           <div class="col-sm-1"></div>
           <div class="col-sm-4 detailsBlod">Delivery Date</div>
           <div class="col-sm-2">:</div>  
           <div class="col-sm-5">{{date('d/m/Y',strtoTime($order[0]->delivery_date))}}</div>    
           </div>

           <div class="row">
           <div class="col-sm-1"></div>
           <div class="col-sm-4 detailsBlod">Delivery Time</div>
           <div class="col-sm-2">:</div>  
           <div class="col-sm-5">{{date('h:i A',strtoTime($order[0]->delivery_time))}}</div>    
           </div>

           <div class="row">
           <div class="col-sm-1"></div>
           <div class="col-sm-4 detailsBlod">Booking Date</div>
           <div class="col-sm-2">:</div>  
           <div class="col-sm-5">{{date('d/m/Y',strtoTime($order[0]->created_at))}}
           </div>    
           </div>

           <div class="row">
           <div class="col-sm-1"></div>
           <div class="col-sm-4 detailsBlod">Order Status</div>
           <div class="col-sm-2">:</div>  
           <div class="col-sm-5">{{$order[0]->status}}</div>    
           </div>
           
           <div class="row">
           <div class="col-sm-1"></div>
           <div class="col-sm-4 detailsBlod">Order Instruction</div>
           <div class="col-sm-2">:</div>  
           <div class="col-sm-5">{{$order[0]->comment}}</div>    
           </div>

           <div class="row">
           <div class="col-sm-1"></div>
           <div class="col-sm-4 detailsBlod">User Name</div>
           <div class="col-sm-2">:</div>  
           <div class="col-sm-5">{{$order[0]->name}}</div>    
           </div>
@if($order[0]->sitePersonName)
<div class="row">
           <div class="col-sm-1"></div>
           <div class="col-sm-4 detailsBlod">Site Person Name</div>
           <div class="col-sm-2">:</div>  
           <div class="col-sm-5">{{$order[0]->sitePersonName}}</div>    
           </div>
@else
@endif

@if($order[0]->sitePersonCNo)
  <div class="row">
           <div class="col-sm-1"></div>
           <div class="col-sm-4 detailsBlod">Site Person Contact No</div>
           <div class="col-sm-2">:</div>  
           <div class="col-sm-5">{{$order[0]->sitePersonCNo}}</div>    
           </div>
@else
@endif         
         
           <div class="row">
           <div class="col-sm-1"></div>
           <div class="col-sm-4 detailsBlod">User Email</div>
           <div class="col-sm-2">:</div>  
           <div class="col-sm-5">{{$order[0]->email}}</div>    
           </div>


           <div class="row">
           <div class="col-sm-1"></div>
           <div class="col-sm-4 detailsBlod">User City</div>
           <div class="col-sm-2">:</div>  
           <div class="col-sm-5">{{$order[0]->city}}</div>    
           </div>

           <div class="row">
           <div class="col-sm-1"></div>
           <div class="col-sm-4 detailsBlod">User Zip Code</div>
           <div class="col-sm-2">:</div>  
           <div class="col-sm-5">{{$order[0]->zip_code}}</div>    
           </div>

           <div class="row">
           <div class="col-sm-1"></div>
           <div class="col-sm-4 detailsBlod">User Address</div>
           <div class="col-sm-2">:</div>  
           <div class="col-sm-5">{{$order[0]->address}}</div>    
           </div>

@if($order[0]->cmp_name)
  <div class="row">
           <div class="col-sm-1"></div>
           <div class="col-sm-4 detailsBlod">Company Name</div>
           <div class="col-sm-2">:</div>  
           <div class="col-sm-5">{{$order[0]->cmp_name}}</div>    
  </div>
@else
@endif  
@if($order[0]->gst_no)
           <div class="row">
           <div class="col-sm-1"></div>
           <div class="col-sm-4 detailsBlod">GST No</div>
           <div class="col-sm-2">:</div>  
           <div class="col-sm-5">{{$order[0]->gst_no}}</div>    
           </div>
@else
@endif  
@if($order[0]->shippingCharge)
           <div class="row">
           <div class="col-sm-1"></div>
           <div class="col-sm-4 detailsBlod">Shipping Charge</div>
           <div class="col-sm-2">:</div>  
           <div class="col-sm-5"><i class="fa fa-inr"></i>{{$order[0]->shippingCharge}}</div>    
           </div>
@else
@endif
@if($order[0]->applyShipChargAmt)
           <div class="row">
           <div class="col-sm-1"></div>
           <div class="col-sm-4 detailsBlod">Apply Shipping Charge On Amount</div>
           <div class="col-sm-2">:</div>  
           <div class="col-sm-5"><i class="fa fa-inr"></i>{{$order[0]->applyShipChargAmt}}</div>    
           </div>
@else
@endif
@if($order[0]->tax_amount)
           <div class="row">
           <div class="col-sm-1"></div>
           <div class="col-sm-4 detailsBlod">Tax Amount</div>
           <div class="col-sm-2">:</div>  
           <div class="col-sm-5"><i class="fa fa-inr"></i>{{$order[0]->tax_amount}}</div>    
           </div>
@else
@endif
           <div class="row">
           <div class="col-sm-1"></div>
           <div class="col-sm-4 detailsBlod">User Rating</div>
           <div class="col-sm-2">:</div>  
           <div class="col-sm-5">{{$order[0]->user_rate}}</div>    
           </div>

           <div class="row">
           <div class="col-sm-1"></div>
           <div class="col-sm-4 detailsBlod">User Comment</div>
           <div class="col-sm-2">:</div>  
           <div class="col-sm-5">{{$order[0]->user_comment}}</div>    
           </div>
           
           <div class="row">
           <div class="col-sm-1"></div>
           <div class="col-sm-4 detailsBlod">Product Total Amount</div>
           <div class="col-sm-2">:</div>  
           <div class="col-sm-5"><i class="fa fa-inr"></i> {{$order[0]->non_act_totalAmt}}</div>    
           </div>

           <div class="row">
           <div class="col-sm-1"></div>
           <div class="col-sm-4 detailsBlod">Total Pay Amount</div>
           <div class="col-sm-2">:</div>  
           <div class="col-sm-5"><i class="fa fa-inr"></i> {{$order[0]->product_total_price}}</div>    
           </div>
           


           <div class="row">
           <div class="col-sm-1"></div>
           <div class="col-sm-4 detailsBlod">Transation Id</div>
           <div class="col-sm-2">:</div>  
           <div class="col-sm-5">{{$order[0]->transation_id}}</div>    
           </div>

           <div class="row">
           <div class="col-sm-1"></div>
           <div class="col-sm-4 detailsBlod">Payment Mode</div>
           <div class="col-sm-2">:</div>  
           <div class="col-sm-5">{{$order[0]->payment_mode}}</div>    
           </div>

           <div class="row">
           <div class="col-sm-1"></div>
           <div class="col-sm-4 detailsBlod">Order Item</div>
           <div class="col-sm-3"></div>  
           <div class="col-sm-2"></div>  
           <div class="col-sm-2"></div>    
           </div>
           <br>
           <hr>
           <div class="row">
           <div class="col-sm-1"></div>
        
           <div class="col-sm-2"><b>Name</b></div>  
           <div class="col-sm-2"><b>Price</b></div>  
           <div class="col-sm-2"><b>Qty</b></div>    
         <!--   <div class="col-sm-1"><b>Tax</b></div>    --> 
           <div class="col-sm-1"><b>Count</b></div> 
           <div class="col-sm-1"><b>Total</b></div> 
           </div>
           <?php 
foreach ($productItemDetails as $keyprice=>$productPriceVal){
 if($productPriceVal->id){
?>
           <div class="row" style="padding-top:15px">  
           <div class="col-sm-1"></div> 
        
           <div class="col-sm-2">{{$productPriceVal->product_name}}</div>  
           <div class="col-sm-2"><i class="fa fa-inr"></i> {{$productPriceVal->price}}</div> 
           <div class="col-sm-2">{{$productPriceVal->product_qty}}</div> 
           <div class="col-sm-1">{{$productPriceVal->product_count}}</div>
           <div class="col-sm-1">{{ $productPriceVal->price*$productPriceVal->product_count}}</div>
           </div>
<?php
 }  }
  ?>
           <div class="row">
           <div class="col-sm-1"></div>
           <div class="col-sm-4 detailsBlod"></div>
           <div class="col-sm-3"></div>  
           <div class="col-sm-2"></div>  
           <div class="col-sm-2">
           <a class="dropdown-item" target="_blank" href="{{url(asset('uploads/invoices/'.$order[0]->invoice))}}"><button type="button" style="margin-bottom:10px;" class="btn btn-primary">Get Invoice</button></a>
           <br>
           </div>    
           </div>

           </div><!-- /.box -->
            </div><!--/.col (left) -->
            <!-- right column -->
          <!--   <div class="col-md-1"></div> -->
          </div>   <!-- /.row -->
        </section><!-- /.content -->

      </div><!-- /.content-wrapper -->

@endsection



      