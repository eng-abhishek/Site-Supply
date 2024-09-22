 <div class="row" style=" text-align:center;margin-left:-20px !important;margin-top:0px">

            <div class="col-lg-2" style="background-color:#E5E5E5;padding:10px 0px 10px 0px; font-size:0.8em;font-weight:600;
            text-align:left;border-top-left-radius:8px;border-right:1px solid #D9D9D9">
                
            </div>
            <div class="col-lg-1half" style="background-color:#E5E5E5;padding:15px 0px 10px 0px;font-size:0.9em;font-weight:600;
             text-align:center;border-right:1px solid #D9D9D9">
                PRODUCT NAME
            </div>
            <div class="col-lg-1half" style="background-color:#E5E5E5;padding:10px 15px 10px 5px; font-size:0.9em;font-weight:600;
            text-align:center;border-right:1px solid #D9D9D9">
                DIAMETER <br> (in mm)
            </div>
           
            <div class="col-lg-2" style="background-color:#E5E5E5;padding:10px 0px 10px 0px;font-size:0.9em;font-weight:600;
             text-align:center;border-right:1px solid #D9D9D9">
                PRICE <br> (PER BUNDLE)
            </div>

            <div class="col-lg-2" style="background-color:#E5E5E5;padding:10px 0px 10px 0px;font-size:0.9em;font-weight:600;
             text-align:center;border-right:1px solid #D9D9D9">
                PIECE <br> (PER BUNDLE)
            </div>

            <div class="col-lg-1half" style="background-color:#E5E5E5;padding:10px 0px 10px 0px; font-size:0.9em;font-weight:600;
            text-align:center;border-right:1px solid #D9D9D9">
                ADD QUANTITY 
            </div>

            <div class="col-lg-1half" style="background-color:#E5E5E5;padding:10px 0px 10px 0px;font-size:0.9em;font-weight:600;
             text-align:center;border-top-right-radius:8px;">
            TOTAL <br> AMOUNT
            </div>

           <!--------- First Row --------->
           @foreach($product as $productData)
           <div class="col-lg-2" class="table-img" style="background-color:#ffff;
            padding:5px 8px; text-align:left;border-top-left-radius:0px;height:80%;
            border-right:1px solid #D9D9D9;border-left:1px solid #D9D9D9;font-size:.9em !important;border-bottom:1px solid #D9D9D9;">
            <img src="{{asset('uploads/productImg/'.$productData->image)}}" alt="" width="80%" height="80%" style="margin:auto;margin-left: 23px;width:50%"> 
              
            </div>
            <div class="col-lg-1half" style="background-color:#ffff; 
            padding:18px 0px 0px 0px; text-align:center;border-right:1px solid #D9D9D9;font-size:.8em !important;border-bottom:1px solid #D9D9D9;">
              {{$productData->name}}
            </div>
            <div class="col-lg-1half" style="background-color:#ffff;
            padding:18px 0px 0px 0px; text-align:center;border-right:1px solid #D9D9D9;font-size:.9em !important;border-bottom:1px solid #D9D9D9;">
               {{$productData->diameter}} 
               {{$productData->qty}}
            </div>
           
            <div class="col-lg-2" style="background-color:#ffff; color:EA9418;
            padding:18px 0px 0px 0px; text-align:center;border-right:1px solid #D9D9D9;font-size:.9em !important;border-bottom:1px solid #D9D9D9;color:#EA9418; font-weight:600">
              @if($productData->rfq_status=='1')
              @else       
             INR {{$productData->price}}
            <input type="text" name="unitPrice" hidden value="{{$productData->price}}" id="unitPrice{{$productData->id}}">       
              @endif 
            </div>

            <div class="col-lg-2" style="background-color:#ffff;
             padding:18px 0px 0px 0px; text-align:center;border-top-right-radius:0px;
            border-right:1px solid #D9D9D9;font-size:.9em !important;border-bottom:1px solid #D9D9D9;">
          @if($productData->rfq_status=='1')
          @else 
          {{$productData->piece_per_bundal}}
          @endif
            </div>

            <div class="col-lg-1half" style="background-color:#ffff;
             padding:15px 0px 0px 0px; text-align:center;border-right:1px solid #D9D9D9;font-size:.9em !important;border-bottom:1px solid #D9D9D9">
              @if($productData->rfq_status=='1')
              <a href="{{url('rfq/'.$productData->id)}}"><button type="button" class="btn" style="padding: 0px 19px 0px 20px;border: none;outline: none;background:linear-gradient(to right, #f7c328, #e88f16);color: white;border-radius: 4px;" name="btnRFQ">RFQ</button></a>
              @else   
                <input placeholder="0" type="number" value="" name="pro_qty" id="pro_qty{{$productData->id}}" onkeyup="add_to_cart(<?php echo $productData->id;?>,<?php echo $productData->qty_id;?>,<?php echo $productData->price_id;?>)" style="width: 55%; padding-left:10px;background-color:#F7F5F5;border-radius:4px;border:none;height:24px" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"  maxlength = "5"> 
               @endif        
            </div>
    
            <div class="col-lg-1half" style="background-color:#ffff;
             padding:18px 0px 0px 0px; text-align:center;border-top-right-radius:0px;
            border-right:1px solid #D9D9D9;font-size:.9em !important;border-bottom:1px solid #D9D9D9;">
           INR <font class="priceValInputBox" id="priceVal{{$productData->id}}"></font>
            </div>

            <div style="width: 100%; height:1px;border:1px solid #D9D9D9 "></div>
            @endforeach
            <!-------- end  First Row ------->


            <div class="col-lg-12 col-md-12 col-sm-12 text-right" style="margin-top: 10px; left:15px;margin-bottom:40px">
            <span style="position:relative;font-size:0.8em;top:-10px; margin-right:40px">
                Total Order Value:
            <span style="position: absolute;right:8px;top:10px;color:black;font-size:1.5em;font-weight:600;
               ">
         INR <font id="totalAmt"></font>
                 <input type="text" name="totalAmtInputBox" id="totalAmtInputBox" hidden=""> 
            </span >
            </span>  
           <button style="padding:5px 20px 5px 20px;border:none;outline:none;
                background: linear-gradient(to right, #f7c328, #e88f16);color:white
                     ;border-radius:4px" onclick="checkCartForListTmp()">
              <a href="javascript:void(0)" style="color:white"> Proceed To cart </a>     
            </button>
              </div>
              </div>
</section>
 <style>
 .choose .row.lego-head .col-lg-7.col-md-8.col-sm-12
 {
         overflow-y: scroll;
         height:150px;
 }
  .choose .row.lego-head .col-lg-7.col-md-8.col-sm-12::-webkit-scrollbar-track
{
    -webkit-box-shadow: inset 0 0 2px rgb(0 0 0 / 16%);
    background-color: #F5F5F5;;
	background-color: #F5F5F5;
}

 .choose .row.lego-head .col-lg-7.col-md-8.col-sm-12::-webkit-scrollbar
{
	width: 4px;
	background-color: #F5F5F5;
}

 .choose .row.lego-head .col-lg-7.col-md-8.col-sm-12::-webkit-scrollbar-thumb
{
	background-color: rgb(0 0 0 / 5%);
}
 @media (max-width: 334px)
 {
.choose .row.lego-head .col-lg-7.col-md-8.col-sm-12 h2 {
    position: absolute!important;
    bottom: -118px!important;
}
}
 @media(max-width:414px)
 {
     .choose .row.lego-head .col-lg-7.col-md-8.col-sm-12 h2
     {
                 margin-top: 0%;
                 font-weight: 600;
     }
     .choose .lego-choose {
    margin-top: -35px;
}
     .choose .row.lego-head .col-lg-7.col-md-8.col-sm-12
     {
        
     }
     .choose
     {
         margin-top:-50%;
     }
     .categories-m .form-check {
    /*padding-bottom: 20px;*/
    /*padding-top: 168%;*/
    /*position: absolute;*/
    /*padding-left: 61px !important;*/
    /*margin-left: 0;*/
    /*width: 100%;*/
    /*margin-top: 35px !important;*/
    /*border: none;*/
    /*z-index: 99999;*/
        display: none;
}
.cont
{
    padding:100px 100px 0 100px;
}
.categories-slider {
    margin-top: 0px!important;
    padding-top: 30px!important;
}
 }


@media(max-width:320px)
{
    
.choose .row.lego-head .col-lg-7.col-md-8.col-sm-12
{
           bottom: 10%!important;
}
.categories-m .form-check.lego-check {
    padding-top: 227%!important;
}
.pr-heading input {
    right: 50px!important;
}
.choose .row.lego-head .col-lg-7.col-md-8.col-sm-12 h2 {
   margin-top: 0%!important;
    position: absolute!important;
    bottom: 0px!important;
}
.choose h3 {
    font-size: 16px!important;
}
.mobile-proceed-cart
{
    top: -10px;
}
.pr-img span, .pr-heading span {
    font-size: 11px;
}
.pr-heading {
    padding-bottom: 57px;
}
.pr-img {
    margin-bottom: -21px!important;
}
.mobile-proceed-cart span {
    margin-right: 67px!important;
    margin: 0 auto;
    margin-block: 10px;
    text-align: center;
    display: inline-block;
}
.mobile-proceed-cart span.rupee
{
      left: -60px!important;
    font-size: 17px!important;
    margin-top: -4px!important;
}
.mobile-proceed-cart button{padding: 5px 5px 5px 5px!important;margin-top: 0px!important;
    font-size: 13px!important;}
.choose .row.lego-head .col-lg-7.col-md-8.col-sm-12 h2
{
    font-size: 16px!important;
    margin-top: 10px;
    position: absolute;
}
.community .container-fluid .row {
    margin-top: 57% !important;
}
.cont ul.breadcrumb
{
        position: absolute;
    z-index: 99;
    top: 40px;
}
.cont h1 {
    margin: -200px 0 0 -102px;
    font-size: 20px;
}
}
                  
@media(max-width:360px)
{
    
.choose .row.lego-head .col-lg-7.col-md-8.col-sm-12
{
           bottom: 8%!important;
}
.choose {
    margin-top: -40%;
}
div.categories-m .form-check {
    padding-top: 205%!important;
}
.choose .row.lego-head .col-lg-7.col-md-8.col-sm-12 h2
{
        position: static;
}
.choose .row.lego-head .col-lg-3.col-md-4.col-sm-12
{
    padding-top:0px;
}
.choose .row.lego-head .col-lg-3.col-md-4.col-sm-12 img {
    margin-top: 40px!important;
}
ul.breadcrumb {
    margin: 0px 0 auto -110px !important;
}
.community {
    margin-top: 45% !important;
}
.pr-img {
    padding-bottom: 9px!important;
}
.mobile-proceed-cart span.rupee
{
        left: 0px;
    font-size: 17px!important;
    top: 20px!important;
}
.mobile-proceed-cart button{margin-top: 20px;
    font-size: 13px;margin-left: 0%;
    width: 60%;
}
}
@media(max-width:375px)
{
    .choose h3
{
    font-size: 18px;
    margin-left: -20px;
}
.categories-slider .content-overlay
{
    width:100%;
}
.categories-m .form-check {
    padding-top: 185%!important;
}
.pr-heading {
    padding-bottom: 51px;
}
.community .container-fluid {
    margin-top: 44% !important;
}
.pr-img span, .pr-heading span {
    font-size: 11px;
}
.choose .row.lego-head .col-lg-7.col-md-8.col-sm-12 h2
{
    margin-top: 0px;
    margin-left: 0px;
    font-size: 14px!important;
}

.pr-heading input
{
    right:60px;
}
.choose .row.lego-head .col-lg-3.col-md-4.col-sm-12 img
{
        margin-top: 20px;
}
.pr-img {
    padding-bottom: 9px;
}
.mobile-proceed-cart span
{
    margin-right:13px!important;
}

}
</style>
<!---Table for Mobile---->
<section class="m-tables">
<div class="container">
<div class="row">
<div class="col-md-12">
    
<div class="col-sm-12 mobile">
    <div class="col-sm-12 diameter-bg">
<div class="col-sm-6">
    <h3>
        Diameter
    </h3>
</div> 
<div class="col-sm-6">
        <h3>
        Quantity
    </h3>
</div> 
</div>
    @foreach($product as $key=>$productData)
    @if($key==1)
    <div class="col-sm-6">
        <div class="pr-img">
            <span> {{$productData->diameter}}  {{$productData->qty}}</span>
            <h3>
               <span>Rs: {{$productData->price}} Per Bundle</span>
            </h3>
            <h3>
                <span>{{$productData->piece_per_bundal}} Piece Per Bundle</span>
            </h3>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="pr-heading">
         <input placeholder="0" type="number" value="" name="pro_qty" id="Mo_pro_qty{{$productData->id}}" onmouseout="add_to_cart(<?php echo $productData->id;?>,<?php echo $productData->qty_id;?>,<?php echo $productData->price_id;?>)" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"  maxlength = "5">
            <h3 class="mobile-total" id="MobilePriceVal{{$productData->id}}">Rs: 0</h3>
          <input type="text" hidden class="MobilePriceValInputBox" id="Act_MobilePriceVal{{$productData->id}}"/>    
        </div> 
    </div>
</div>
<div class="col-sm-12 diameter-bg-border"></div>
@else

<div class="col-sm-12 mobile">
    <div class="col-sm-6">
        <div class="pr-img">
            <span>{{$productData->diameter}}  {{$productData->qty}}</span>
            <h3>
               <span>Rs: {{$productData->price}} Per Bundle</span>
            </h3>
            <h3>
                 <span>{{$productData->piece_per_bundal}} Piece Per Bundle</span>
            </h3>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="pr-heading">
         <input placeholder="0" type="number" value="" name="pro_qty" id="Mo_pro_qty{{$productData->id}}" onmouseout="add_to_cart(<?php echo $productData->id;?>,<?php echo $productData->qty_id;?>,<?php echo $productData->price_id;?>)" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"  maxlength = "5">
            <h3 class="mobile-total" id="MobilePriceVal{{$productData->id}}">Rs: 0</h3>
             <input type="text" hidden class="MobilePriceValInputBox" id="Act_MobilePriceVal{{$productData->id}}"/>
        </div> 
    </div>
</div>
<div class="col-sm-12 diameter-bg-border"></div>
@endif
@endforeach
<!--<div class="col-sm-12 diameter-bg-border"></div>-->
<!--<div class="col-sm-12 mobile">-->
<!--    <div class="col-sm-6">-->
<!--        <div class="pr-img">-->
            
          
<!--            <span>12 mm</span>-->
<!--            <h3>-->
<!--               <span>Rs: <i class="fa fa-inr" aria-hidden="true"></i> 860 Per Bundle</span>-->
<!--            </h3>-->
                 
<!--            <h3>-->
<!--                <span>Rs: <i class="fa fa-inr" aria-hidden="true"></i> 4 Per Piece</span>-->
                
<!--            </h3>-->
            
<!--        </div>-->

<!--    </div>-->
<!--    <div class="col-sm-6">-->
<!--        <div class="pr-heading">-->

      
           
<!--         <input placeholder="0" type="number" id="quantity" name="quantity">-->
<!--            <h3 class="mobile-total">RS - 860</h3>-->
<!--        </div> -->
<!--    </div>-->
<!--</div>-->


<!--<div class="col-sm-12 diameter-bg-border"></div>-->
<!--<div class="col-sm-12 mobile">-->
<!--    <div class="col-sm-6">-->
<!--        <div class="pr-img">-->
            
          
<!--            <span>25 mm</span>-->
<!--            <h3>-->
<!--               <span>Rs: <i class="fa fa-inr" aria-hidden="true"></i> 600 Per Bundle</span>-->
<!--            </h3>-->
                 
<!--            <h3>-->
<!--               <span>Rs: <i class="fa fa-inr" aria-hidden="true"></i> 50 Per Piece</span>-->
                
<!--            </h3>-->
            
<!--        </div>-->

<!--    </div>-->
<!--    <div class="col-sm-6">-->
<!--        <div class="pr-heading">-->

      
           
<!--         <input placeholder="0" type="number" id="quantity" name="quantity">-->
<!--            <h3 class="mobile-total">RS - 600</h3>-->
<!--        </div> -->
<!--    </div>-->
<!--</div>-->


<div class="col-sm-12 diameter-bg-border"></div>
<div class="col-lg-12 col-md-12 col-sm-12 text-right mobile-proceed-cart" style="margin-top: 10px; left:15px;margin-bottom:40px">
            <span style="position:relative;font-size:0.8em;top:-10px; margin-right:40px">
                Total Order Value:
            <span class="rupee" style="position: absolute;right:8px;top:10px;color:black;font-size:1.5em;font-weight:600;
               ">
         INR <font id="Mo_totalAmt"></font>
                 <input type="text" name="totalAmtInputBox" id="totalAmtInputBox" hidden=""> 
            </span>
            </span>  
           <button style="padding:5px 20px 5px 20px;border:none;outline:none;
                background: linear-gradient(to right, #f7c328, #e88f16);color:white
                     ;border-radius:4px" onclick="checkCartForListTmp()">
              <a href="javascript:void(0)" style="color:white"> Proceed To cart </a>     
            </button>
              </div>
              
              
              
                  </div>
</div>
</div>
</section>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
<script type="text/javascript">
var QtyInput = (function () {
	var $qtyInputs = $(".qty-input");

	if (!$qtyInputs.length) {
		return;
	}

	var $inputs = $qtyInputs.find(".product-qty");
	var $countBtn = $qtyInputs.find(".qty-count");
	var qtyMin = parseInt($inputs.attr("min"));
	var qtyMax = parseInt($inputs.attr("max"));

	$inputs.change(function () {
		var $this = $(this);
		var $minusBtn = $this.siblings(".qty-count--minus");
		var $addBtn = $this.siblings(".qty-count--add");
		var qty = parseInt($this.val());

		if (isNaN(qty) || qty <= qtyMin) {
			$this.val(qtyMin);
			$minusBtn.attr("disabled", true);
		} else {
			$minusBtn.attr("disabled", false);
			
			if(qty >= qtyMax){
				$this.val(qtyMax);
				$addBtn.attr('disabled', true);
			} else {
				$this.val(qty);
				$addBtn.attr('disabled', false);
			}
		}
	});

	$countBtn.click(function () {
		var operator = this.dataset.action;
		var $this = $(this);
		var $input = $this.siblings(".product-qty");
		var qty = parseInt($input.val());

		if (operator == "add") {
			qty += 1;
			if (qty >= qtyMin + 1) {
				$this.siblings(".qty-count--minus").attr("disabled", false);
			}

			if (qty >= qtyMax) {
				$this.attr("disabled", true);
			}
		} else {
			qty = qty <= qtyMin ? qtyMin : (qty -= 1);
			
			if (qty == qtyMin) {
				$this.attr("disabled", true);
			}

			if (qty < qtyMax) {
				$this.siblings(".qty-count--add").attr("disabled", false);
			}
		}

		$input.val(qty);
	});
})();

</script>