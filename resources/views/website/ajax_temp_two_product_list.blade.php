<div class="row" style=" text-align:center;margin-left:-20px !important;margin-top:0px">

            <div class="col-lg-2half" style="background-color:#E5E5E5;padding:10px 0px 10px 0px; font-size:0.8em;font-weight:600;
            text-align:left;border-top-left-radius:8px;border-right:1px solid #D9D9D9">
                
            </div>
            <div class="col-lg-2half" style="background-color:#E5E5E5;padding:15px 0px 10px 0px;font-size:0.9em;font-weight:600;
             text-align:center;border-right:1px solid #D9D9D9">
                PRODUCT NAME
            </div>
            <div class="col-lg-1half" style="background-color:#E5E5E5;padding:10px 15px 10px 5px; font-size:0.9em;font-weight:600;
            text-align:center;border-right:1px solid #D9D9D9">
                DIAMETER <br> (in mm)
            </div>
            <div class="col-lg-1half" style="background-color:#E5E5E5;padding:10px 0px 10px 0px;font-size:0.9em;font-weight:600;
             text-align:center;border-right:1px solid #D9D9D9">
                PRICE <br> (PER PIECE)
            </div>
            <div class="col-lg-2" style="background-color:#E5E5E5;padding:10px 0px 10px 0px; font-size:0.9em;font-weight:600;
            text-align:center;border-right:1px solid #D9D9D9">
                ADD QUANTITY 
            </div>
            <div class="col-lg-2" style="background-color:#E5E5E5;padding:10px 0px 10px 0px;font-size:0.9em;font-weight:600;
             text-align:center;border-top-right-radius:8px;">
            TOTAL <br> AMOUNT
            </div>

@foreach($product as $productData)

            <div class="col-lg-2half" class="table-img" style="background-color:#ffff;
            padding:0px 0px 0px 29px; text-align:left;border-top-left-radius:0px;height:80%;
            border-right:1px solid #D9D9D9;border-left:1px solid #D9D9D9;font-size:.9em !important;border-bottom:1px solid #D9D9D9;">
                <img src="{{asset('uploads/productImg/'.$productData->image)}}" alt="" 
                width="80%" height="80%" style="margin:auto;margin-left: 23px;
    width: 57%">
            </div>
            <div class="col-lg-2half" style="background-color:#ffff; 
            padding:18px 0px 0px 0px; text-align:center;border-right:1px solid #D9D9D9;font-size:.9em !important;border-bottom:1px solid #D9D9D9;">
            {{$productData->name}}
            </div>

            <div class="col-lg-1half" style="background-color:#ffff;
            padding:18px 0px 0px 0px; text-align:center;border-right:1px solid #D9D9D9;font-size:.9em !important;border-bottom:1px solid #D9D9D9;">
              {{$productData->diameter}}
               {{$productData->qty}}              
            </div>
            
            <div class="col-lg-1half" style="background-color:#ffff; color:EA9418;
            padding:18px 0px 0px 0px; text-align:center;border-right:1px solid #D9D9D9;font-size:.9em !important;border-bottom:1px solid #D9D9D9;color:#EA9418; font-weight:600">
        @if($productData->rfq_status=='1')
        @else 
            <input type="text" name="unitPrice" hidden value="{{$productData->price}}" id="unitPrice{{$productData->id}}">
             INR {{$productData->price}}
        @endif     
            </div>

            <div class="col-lg-2" style="background-color:#ffff;
             padding:15px 0px 0px 0px; text-align:center;border-right:1px solid #D9D9D9;font-size:.9em !important;border-bottom:1px solid #D9D9D9">
@if($productData->rfq_status=='1')
<a href="{{url('rfq/'.$productData->id)}}"><button type="button" class="btn" style="padding:0px 19px 0px 20px;border: none;outline: none;background:linear-gradient(to right, #f7c328, #e88f16);color: white;border-radius: 4px;" name="btnRFQ">RFQ</button></a>
@else
<input placeholder="0" type="number" value="" name="pro_qty" id="pro_qty{{$productData->id}}" onkeyup="add_to_cart(<?php echo $productData->id;?>,<?php echo $productData->qty_id;?>,<?php echo $productData->price_id;?>)" style="width: 55%; padding-left:10px;background-color:#F7F5F5;border-radius:4px;border:none;height:24px">
@endif

            </div>

            <div class="col-lg-2" style="background-color:#ffff;
             padding:18px 0px 0px 0px; text-align:center;border-top-right-radius:0px;
            border-right:1px solid #D9D9D9;font-size:.9em !important;border-bottom:1px solid #D9D9D9;">
            INR.<font class="priceValInputBox" id="priceVal{{$productData->id}}"></font>
        
            </div>
            <div style="width: 100%; height:1px;border:1px solid #D9D9D9 "></div>

@endforeach


             <div class="col-lg-12 col-md-12 col-sm-12 text-right" style="margin-top: 10px; left:15px;margin-bottom:40px">
               
              <span style="position:relative;font-size:0.8em;top:-10px; margin-right:40px">
                Total Order Value:
                <span style="position: absolute; 
                
                right:8px;top:10px;color:black;font-size:1.5em;font-weight:600;
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
 /*
 *  STYLE 4
 */

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
@media(max-width:334px)
{
 
    div.categories-m .form-check 
    {
        margin-top: 30%!important;
    }
/*    .choose .container-fluid .row.lego-head .col-lg-7.col-md-8.col-sm-12 {*/
/*    bottom: -30%!important;*/
/*    position: absolute;*/
/*     height:auto!important;*/
/*}*/
    
}

@media(max-width:320px)
{
    
.choose .row.lego-head .col-lg-7.col-md-8.col-sm-12 h2
{
           margin-bottom: -23%!important;
}
.choose .row.lego-head .col-lg-7.col-md-8.col-sm-12 {
    top: 87%!important;
    position: absolute;
}
.categories-m .form-check.lego-check {
    padding-top: 237%!important;
}
.pr-heading.tiscon input {
    right: 50px!important;
}
.choose .row.lego-head .col-lg-7.col-md-8.col-sm-12 p {
    font-size: 9px!important;
    padding: 28px 0 0 0;
}

span.rupee
{
    
}
.choose h3 {
    font-size: 16px!important;
}
.pr-img span, .pr-heading span , .pr-img h3 , .pr-heading h3{
    font-size: 10px!important;
}
.pr-img.tata {
    padding-bottom: 19px!important;
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
        left: -55px;
        font-size: 17px!important;
        top: 10px;
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
              margin-bottom: -6%!important;
                  margin-top: -45%!important;
              
}
div.categories-m .form-check {
    padding-top: 205%!important;
}
.mobile {
    border-top: 1px solid rgb(51 51 51 / 4%);
    margin-top: -9.5%;
}
span.rupee
{
   left: 0px;
    font-size: 14px!important;
    top: 13px!important;
}
.mobile-proceed-cart button {
    margin-top: 20px;
    font-size: 13px;
    margin-left: 0%;
    width: 60%;
    margin-top: 10px!important;
}
.pr-img.tata {
    padding-bottom: 8px!important;
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
.categories-m .form-check
{
        padding-top: 185%!important;
}

.choose .row.lego-head .col-lg-7.col-md-8.col-sm-12
{
       
              margin: -45% 0 0 0; /*9 , 7%*/
      
}

.mobile
{
    border-top: 1px solid rgb(51 51 51 / 2%);
    margin-top: -9%;
}
.pr-heading.tiscon input
{
    right:60px;
}
.pr-img.tata {
    padding-bottom: 8px;
}
.pr-heading.tiscon {
    padding-bottom: 29px;
}
.pr-img span, .pr-heading span {
    font-size: 11px;
}
.choose .row.lego-head .col-lg-7.col-md-8.col-sm-12 h2 {
    margin-top: 0;
    margin-left: 0px;
    font-size: 14px!important;
}
.community .container-fluid {
    margin-top: 44% !important;
}
.mobile-proceed-cart span
{
    margin-right:13px!important;
}

}
@media only screen 
    and (min-device-width : 375px) 
    and (max-device-width : 667px) 
    and (width : 375px) 
    and (height : 559px) 
    and (orientation : portrait) 
    and (color : 8)
    and (device-aspect-ratio : 375/667)
    and (aspect-ratio : 375/559)
    and (device-pixel-ratio : 2)
    and (-webkit-min-device-pixel-ratio : 2)
{ 
    .choose .container-fluid .row.lego-head .col-lg-7.col-md-8.col-sm-12 
    {
    bottom: 0%!important;
    }
}
@media(max-width:412px)
{
    .choose .container-fluid .row.lego-head .col-lg-7.col-md-8.col-sm-12
    {
            bottom: 5%;
    }
}
@media(max-width:414px)
{
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
.choose
{
    padding:0;
}
.categories-slider {
    margin-top: 0px!important;
    padding-top: 30px!important;
}
.choose .lego-choose
{
        margin-top: -35px;
}
.choose .row.lego-head .col-lg-7.col-md-8.col-sm-12
{
    margin: -40% 0 0 0; /*16 , 13%*/
    left: 0;
    width: 100%;
    overflow-y: scroll!important;
    height: 100px!important;
}
.choose .row.lego-head .col-lg-3.col-md-4.col-sm-12 img
{
    visibility: hidden;
}
}
</style>

<!---Table for Mobile---->
<section class="m-tables">
<div class="container">

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
        <div class="pr-img tata">
           <span>{{$productData->diameter}}  {{$productData->qty}}</span>
             <h3>
             <span>Rs: {{$productData->price}} Per Piece</span>
            </h3>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="pr-heading tiscon">
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
        <div class="pr-img tata">
              <span>{{$productData->diameter}}  {{$productData->qty}}</span>
             <h3>
             <span>Rs: {{$productData->price}} Per Piece</span>
            </h3>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="pr-heading tiscon">
          <input placeholder="0" type="number" value="" name="pro_qty" id="Mo_pro_qty{{$productData->id}}" onmouseout="add_to_cart(<?php echo $productData->id;?>,<?php echo $productData->qty_id;?>,<?php echo $productData->price_id;?>)" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"  maxlength = "5">
          <h3 class="mobile-total" id="MobilePriceVal{{$productData->id}}">Rs: 0</h3>
          <input type="text" hidden class="MobilePriceValInputBox" id="Act_MobilePriceVal{{$productData->id}}"/>
        </div> 
    </div>
</div>
<div class="col-sm-12 diameter-bg-border"></div>

@endif
@endforeach
<div class="col-lg-12 col-md-12 col-sm-12 text-right mobile-proceed-cart" style="margin-top: 10px; left:15px;margin-bottom:40px">
            <span style="position:relative;font-size:0.8em;top:-10px; margin-right:40px">
                Total Order Value:
            <span class="rupee" style="position: absolute;right:8px;top:10px;color:black;font-size:1.5em;font-weight:600;
               ">
         INR <font id="Mo_totalAmt"></font>
                 <input type="text" name="totalAmtInputBox" hidden=""> 
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
</section>
<!---Table for Mobile---->
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