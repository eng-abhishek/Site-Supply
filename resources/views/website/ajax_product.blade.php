<style>
 input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}
    .plusminus  input[type=text] {
    float: right;
    padding: 0 !important;
    margin-top: 0 !important;
    margin-right: 0 !important;
    border: none;
    font-size: 13px;
    color: #494949;
    background: #fff;
    box-shadow: none !important;
    border: 1px solid #80808075;
    width: 70%;
}
@media(max-width:414px)
{
    .choose {
    padding: 0px 0 0px 0;
    margin-top: -50px;
    margin-bottom: -40px;
}
.hover-box-m
{
    padding-bottom:0px!important;
}
}
@media screen and (min-width: 792px) {
 .plusminus{
     margin-left:25px !important;
 }
}
@media screen and (max-width: 600px) {
   .hover-box-m .lego-price{
    margin-top: 195px !important;
    margin-left:8px !important;

  }
  .hover-box-m .lego-span {
    left: 35px !important;
    top: 0px !important;
}
}


</style>
<div class="row">
@foreach($product as $productData)
                    <div class="col-lg-3 col-md-3 col-sm-6 hover-box-m" >
                    <div class="hover-box">
@if($productData->rfq_status=='1')
                    <a href="{{url('product/'.$productData->url_slug)}}">
                    <img src="{{asset('uploads/productImg/'.$productData->image)}}" style="height:120px" alt="">
                    </a>
@else
                    <a href="{{url('product/'.$productData->url_slug)}}">
                    <img src="{{asset('uploads/productImg/'.$productData->image)}}" style="height:120px" alt="">
                    </a>
@endif
                      <div class="lego-show">
                    </div>
                    </div>
                    
@if($productData->rfq_status=='1')
                      <a href="{{url('product/'.$productData->url_slug)}}" style="text-decoration:none"><h4>{{$productData->name}}</h4></a> 
                      <h5>
                      <span class="lego-price" style="font-size: 15.5px !important;top:0px ">&nbsp;</span>
                      <span>&nbsp;</span>
                      <span class="lego-span"></span>
                      </h5>
   <a href="{{url('product/'.$productData->url_slug)}}" style="text-decoration:none;color:white">  
   <div class="lego-cart" id="pageCart<?php echo $productData->id;?>">
    RFQ
  </div>
   </a>
@else
                      <a href="{{url('product/'.$productData->url_slug)}}" style="text-decoration:none"><h4>{{$productData->name}}</h4></a> 
                      <h5>
                      <span class="lego-price" style="font-size: 15.5px !important;top:0px !important">Rs {{$productData->price}}</span>
                      <span></span>
                      <span class="lego-span">{{$productData->qty}}</span>
                      </h5>
    <div class="plusminus number pageCounter" id="pageCounter<?php echo $productData->id;?>">
    <input type="text" hidden name="productId" id="productId" value="<?php echo $productData->id;?>">  
                      <div class="row">
                      <div class="col-2"></div>
                      <div class="col-1 text-center" onclick="countDown(<?php echo $productData->id;?>)" style="background: linear-gradient(to right, #f7c328, #e88f16);color:white;padding-left:9px;padding-bottom:1px">
                      <a style="color: white; text-decoration: none;" href="javascript:void(0)">-</a>
                      </div>
                      <div class="col-4" style="padding: 0px;">                    
  <input style="width: 100%; font-size:0.9em;text-align:center; border:none !important;outline: none;background:#F9F9F9;;height:100%;padding-bottom:0px" type="number" value="{{$productData->min_order_count}}" onkeyup="updateCart(<?php echo $productData->id;?>)" id="getCounterValue<?php echo $productData->id;?>" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"  maxlength = "5">
                      </div>
                      <div class="col-1 text-center" style="background: linear-gradient(to right, #f7c328, #e88f16);color:white;padding-left:9px;padding-bottom:1px;padding-right:17px">
                      <a style="color: white; text-decoration: none;" onclick="countUp(<?php echo $productData->id;?>)" class="plus" href="javascript:void(0)">+</a>
                      </div>
                      <div class="col-"></div>
                      </div>
                      </div>

   
   <div class="lego-cart" id="pageCart<?php echo $productData->id;?>">
   <a href="javascript:void(0)" onclick="add_to_cart(<?php echo $productData->id;?>,<?php echo $productData->qty_id;?>,<?php echo $productData->price_id;?>)">
  <svg xmlns="http://www.w3.org/2000/svg" style="padding-bottom:4px" width="18" height="18" fill="currentColor" class="bi bi-cart-plus-fill" viewBox="0 0 16 16">
  <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zM9 5.5V7h1.5a.5.5 0 0 1 0 1H9v1.5a.5.5 0 0 1-1 0V8H6.5a.5.5 0 0 1 0-1H8V5.5a.5.5 0 0 1 1 0z"></path>
  </svg>
 Add to Cart
    </a>
  </div>
@endif
 </div>
@endforeach
         <div class="col-lg-12 bottom-pagination">
                 <ul class="pagination justify-content-center paginationValue">
                   {!! $product->links() !!}
                 </ul>
            </div>
</div><!--end of col-lg-8-row--->
