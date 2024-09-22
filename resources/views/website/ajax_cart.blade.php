<?php 
use App\ProductCategory;
use App\User;
use session;
if(session()->get('logedIn')){
$userInfo=User::find(session()->get('logedIn'));
$name=$userInfo->name;
$email=$userInfo->email;
}else{
$name='';
$email='';  
}
?>
<style>
   input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}
.nav-pills .nav-link
{
        margin-top: -20px;
}
.navbar-expand-lg .navbar-nav .nav-link
{
    padding: 45px 13px 0px 10px !important;
}
.lego-form-group input:checked + label:after
{
        top: 6.6px!important;
}
@media(max-width:414px)
{
    .row.scrollable .col-md-3.text-right .col-lg-6 , .col-lg-3.text-right.refreshShortCart .col-lg-6
    {
        width:50%;
        float:left;
        border-bottom: 1px solid rgb(51 51 51 / 15%);
        padding-top: 15px;
        padding-bottom: 15px;
    }
    body {
    background-color: transparent!important;
}
    .footer {
    background-color: #2e3841;
    padding: 30px 0 50px 0;
    margin-top: 0px;
}
    .col-lg-3.text-right.refreshShortCart hr{display:none;}
    .row.row2
    {
        
    margin-top: -20px;

    }
    .row.scrollable .col-md-3.text-right .col-lg-6.col-sm-4
    {
        
    }
    .row.scrollable .col-md-3.text-right , .col-lg-3.text-right.refreshShortCart
    {
        padding-left:30px!important;
        box-shadow: 0px 2px 12px grey!important;
        background: #ffff!important;
        height: auto!important;
    }
    .row.scrollable .col-md-3.text-right hr{border-top:none;}
    .nav-pills .nav-link
    {
    font-size: 10.3px;
    padding-left: 0;
    padding-right: 0;
    }
   .row.scrollable
    {
        height:385px;
        overflow-y:scroll;
        
    }
    /*#myCartDiv .col-md-2.col-md-7.col-sm-4 ,  #myCartDiv .col-md-3.col-md-2.col-sm-4 , #myCartDiv .col-md-2.col-md-2.col-sm-4 */
    /*{*/
    /*    width:25%;*/
    /*    float:left;*/
    /*}*/
     #myCartDiv .col-md-1.col-md-1
    {
          text-align: right!important;
          margin-top: -20px!important;
    }
      ul.nav.nav-pills span svg{width:8px!important;margin-top: 0px;}
.nav-pills .nav-link.active, .nav-pills .show>.nav-link
{
    padding-left: 2px;
    padding-right: 2px;
}

#myCartDiv h6
{
        font-size: 13px;
}
/*#myCartDiv h6.mobile-heading-six*/
/*{*/
/*    display:none;*/
/*}*/
}
@media(max-width:360px)
{
    .nav-pills .nav-link {
    font-size: 9.3px!important;
}
}
@media(max-width:375px)
{
    ul.nav.nav-pills span svg {
    width: 8px!important;
    margin-top: -3px;
    margin-left: -10px;
}
.nav-pills .nav-link {
    font-size: 10.3px;
}
}
    @media screen and (max-width: 480px) {
        ul.breadcrumb {
    margin: 0px 0 auto 0px !important;
}
.nav-item {
    margin-top: 9px;
}
.nav-link {
    display: block;
    padding: .2rem 0.6rem;
    font-size: 0.9em;
}

     .nav-pills{
       margin-bottom: 15px !important;
       padding-top: 10px !important;
       margin-left: 0px !important;
     }

     #myCartDiv img{
       width: 26% !important;
         
     }

      #myCartDiv input{
       margin-top:0px !important;
           text-align: center;
  
      }
#myCartDiv h6{margin:5px 0 5px 0!important;padding:0!important;}
      .table-head{
        display: none;
      }

      .buttons-top{
        display: none;
      }
      .buttons-bot{
        display: block !important;
      }


    }

</style>


<div class="container">
 <ul class="nav nav-pills" style="margin-bottom: 30px;">
    <li class="nav-item">
      <a class="nav-link active"  href="#">My Cart</a>
    </li>
    <span style="font-size:32px !important;font-weight:600 !important;margin-left:15px;margin-right:10px !important">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" font-weight="bold" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
</svg>
    </span>
  
    <li class="nav-item">
      <a class="nav-link"  href="#">Contact Details</a>
    </li>
      <span style="font-size:32px !important;font-weight:600 !important;margin-left:15px;margin-right:10px !important">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
</svg>
    </span>
    <li class="nav-item">
      <a class="nav-link"  href="#">Payment Details</a>
    </li>
      <span style="font-size:32px !important;font-weight:600 !important;margin-left:15px;margin-right:10px !important">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
</svg>
    </span>
    <li class="nav-item">
      <a class="nav-link" data-toggle="" href="#">Confirmation</a>
    </li>
  </ul>


<!-- my cart -->
<div class="row scrollable">

<div class="col-md-9 "  style="border-right: 1px solid grey;">
        <div class="row table-head">
        <div class="col-md-2 ">
        <h5>
        Product
        </h5>
        </div>

        <div class="col-md-3 ">
        <h5>
        Details
        </h5>
        </div>

        <div class="col-md-2 text-center">
        <h5>
        Quantity
        </h5>
        </div>
        <div class="col-md-2 text-center">
        <h5>
        Price
        </h5>
        </div>
        <div class="col-md-2 text-center ">
        <h5>
        Total
        </h5>
        </div>
        <div class="col-md-1 col-md-1 text-center">
        <h5>
        </h5>
        </div>
        </div>
        <hr>
<?php $total=0; $totalWithoutShippingCharge=0; $totalOnShippingCharge=0; $gstAmt=0;?>    
@foreach(session()->get('cart') as $cart)
<?php
$getGst=ProductCategory::where('id',$cart['subCategoryId'])->get();
//$gstAmt+=($getGst[0]->GST/100)*($cart['price'] * $cart['count']);
$gstAmt+=(($cart['price'] * $cart['count'])*($getGst[0]->GST))/(100+$getGst[0]->GST);

if($getGst[0]->shippingStatus=='1'){
  $totalOnShippingCharge+=$cart['price'] * $cart['count'];
}else{
  $totalWithoutShippingCharge+=$cart['price'] * $cart['count'];
}
?>
   <div class="row buttons-top" id="myCartDiv" >
        <div class="col-lg-2 col-md-7 col-sm-4">
        <img src="{{asset('uploads/productImg/'.$cart['image'])}}" alt="" width="40%">
        </div>

        <div class="col-lg-3 col-md-2 col-sm-4">
        <h6 style="font-weight: 500;color:#2E3841;margin-top:25px">{{$cart['name']}}</h6>
        </div>

        <div class="col-lg-2 col-md-2 col-sm-4 text-center" style="margin-top: 23px;">
        <input value="{{$cart['count']}}" type="number" onkeyup="updateCart(<?php echo $cart['id'];?>)" id="getCounterValue<?php echo $cart['id'];?>" style="width: 65%; padding-left:10px;background-color:#F7F5F5;border-radius:4px;border:none;height:24px" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"  maxlength="5">
      
        </div>
        <div class="col-lg-2 col-md-2 col-sm-4 text-center">
         <h6 style="font-weight: 500;color:#e88f16;margin-top:25px">Rs. {{$cart['price']}}</h6>
        </div>
        <div class="col-lg-2 col-md-2 col-sm-4 text-center">
         <h6 style="font-weight: 500;color:#e88f16;margin-top:25px">Rs. {{$cart['price'] * $cart['count']}}</h6>
        </div>
        <div class="col-lg-1 col-md-1 text-center" style="margin-top: 23px;">
       <a href="javascript:void(0)" onclick="removeItem(<?php echo $cart['id'];?>)" style="text-decoration:none;color:black"><i style="color:red" class="fa fa-times" aria-hidden="true"></i></a>
        </div>
        </div>
        
        
        <!------------ Mobile -------->

        <div class="row buttons-bot" id="myCartDiv" style="display: none;">
        <div class="col-md-2 col-md-7 col-sm-4">
          <div class="row">
            <div class="col-6 text-center">
              
              <h6 class="mobile-heading-six" style="font-weight: 600;padding-top:10px">Product</h6>
            </div>
            <div class="col-6 text-center">

              <img src="{{asset('uploads/productImg/'.$cart['image'])}}" alt="" width="40%">
            </div>
          </div>
        </div>

        <div class="col-md-3 col-md-2 col-sm-4">
            <div class="row">
            <div class="col-6 text-center">
              
              <h6 style="font-weight: 600;padding-top:25px">Product Name</h6>
            </div>
            <div class="col-6 text-center">

              <h6 style="font-weight: 500;color:#2E3841;margin-top:25px">{{$cart['name']}}</h6>
            </div>
          </div>
        </div>

        <div class="col-md-2 col-md-2 col-sm-4 text-center" style="margin-top: 23px;">
      
        <div class="row">
            <div class="col-6">
              
              <h6 style="font-weight: 600;padding-top:25px">Quantity</h6>
            </div>
            <div class="col-6">

              <!--<input value="{{$cart['count']}}" type="number" onmouseout="updateCart(<?php echo $cart['id'];?>)" id="getCounterValue<?php echo $cart['id'];?>" style="width: 55%; padding-left:10px;background-color:#F7F5F5;border-radius:4px;border:none;height:24px" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"  maxlength="5">-->
            
              <input value="{{$cart['count']}}" type="number" onkeyup="updateCart(<?php echo $cart['id'];?>)" id="getCounterValueOnMo<?php echo $cart['id'];?>" style="width: 65%; padding-left:10px;background-color:#F7F5F5;border-radius:4px;border:none;height:24px" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"  maxlength="5">
      
            
            </div>
          </div>
        </div>
        <div class="col-md-2 col-md-2 col-sm-4 text-center">
        
        
        <div class="row">
            <div class="col-6 text-center">
              
              <h6 style="font-weight: 600;padding-top:25px">Price</h6>
            </div>
            <div class="col-6">

              <h6 style="font-weight: 500;color:#e88f16;margin-top:25px">Rs. {{$cart['price']}}</h6>
            </div>
          </div>


        </div>
        <div class="col-md-2 col-md-2 col-sm-4 text-center">
        
        <div class="row">
            <div class="col-6 text-center">
              
              <h6 style="font-weight: 600;padding-top:25px">Total</h6>
            </div>
            <div class="col-6">

              <h6 style="font-weight: 500;color:#e88f16;margin-top:25px">Rs. {{$cart['price'] * $cart['count']}}</h6>
            </div>
          </div>
        
        </div>
        <div class="col-md-1 col-md-1 text-center" style="margin-top: 23px;">
       <a href="javascript:void(0)" onclick="removeItem(<?php echo $cart['id'];?>)" style="text-decoration:none;color:black"><i style="color:red" class="fa fa-times" aria-hidden="true"></i></a>
        </div>
        </div><hr>
        <?php $total+=$cart['price'] * $cart['count']; ?>
         @endforeach

        <br>    
        <div class="row buttons-top">
              <div class="col-md-6">
               <button style="margin-left:20px; background: linear-gradient(to right, #f7c328, #e88f16); border:none; color:white;padding:3px 8px 3px 8px;border-radius:4px">
               <a style="color:white" href="{{url('shop')}}">
               <svg color="white" style="padding-bottom: 3px;" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-left" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"/>
</svg>
               Continue Shoppping</a>
            </button>
            </div>
           
           @if(session()->get('logedIn'))
            <div class="col-md-6">
            <button onclick="bokInfo()" style="margin-right:50px; background: linear-gradient(to right, #f7c328, #e88f16); border:none; color:white;padding:3px 8px 3px 8px;border-radius:4px;float:right">
            <a style="color:white" href="#">Continue to Checkout
            <svg color="white" style="padding-bottom: 3px;" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
  </svg>
            </a>
            </button>
            </div> 
            @else 
            <div class="col-md-6">
            <button data-bs-toggle="modal" data-bs-target="#exampleModal" style="margin-right:50px; background: linear-gradient(to right, #f7c328, #e88f16); border:none; color:white;padding:3px 8px 3px 8px;border-radius:4px;float:right">
            <a style="color:white" href="#">Continue to Checkout
            <svg color="white" style="padding-bottom: 3px;" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
</svg>
            </a>
            </button>
            </div> 
            @endif
        </div>






              <div class="row buttons-bot" style="display: none;">
              <div class="col-md-6 text-center">
               <button style="margin-left:0px; background: linear-gradient(to right, #f7c328, #e88f16); border:none; color:white;padding:3px 8px 3px 8px;border-radius:4px">
               <a style="color:white" href="{{url('shop')}}">
               <svg color="white" style="padding-bottom: 3px;" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-left" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"/>
</svg>
               Continue Shoppping</a>
            </button>
            </div>
           
           @if(session()->get('logedIn'))
            <div class="col-md-6 text-center">
            <button onclick="bokInfo()" style="margin-right:0px; background: linear-gradient(to right, #f7c328, #e88f16); border:none; color:white;padding:3px 8px 3px 8px;border-radius:4px; margin-top:5px">
            <a style="color:white" href="#">Continue to Checkout
            <svg color="white" style="padding-bottom: 3px;" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
  </svg>
            </a>
            </button>
            </div> 
            @else 
            <div class="col-md-6 text-center">
            <button data-bs-toggle="modal" data-bs-target="#exampleModal" style=" background: linear-gradient(to right, #f7c328, #e88f16); border:none; color:white;padding:3px 8px 3px 8px;border-radius:4px;margin-top:5px">
            <a style="color:white" href="#">Continue to Checkout
            <svg color="white" style="padding-bottom: 3px;" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
</svg>
            </a>
            </button>
            </div> 
            @endif
        </div>
        <br>
</div>

<div class="col-md-3 text-right" style="background-color: white;margin-top:20px; padding-top:20px;
padding-left:5px;heighT:95%;padding-bottom:20px;" >
    <div class="row">
        <div class="col-lg-6" style="font-weight: 600;">Product Total</div>
        <div class="col-lg-6">Rs. <?php echo (int)($total-$gstAmt);?></div>
    <br>
    
        <div class="col-lg-6" style="font-weight: 600;">Shipping</div>
<?php 
$shipingCharge=0;

if(((int)$totalOnShippingCharge<=$first_row->max_amount) && ((int)$totalOnShippingCharge>=$first_row->min_amount)){
$shipingCharge=$first_row->charge;

}elseif(((int)$totalOnShippingCharge<=$second_row->max_amount) && ((int)$totalOnShippingCharge>=$second_row->min_amount)){
$shipingCharge=$second_row->charge;

}elseif(((int)$totalOnShippingCharge<=$third_row->max_amount) && ((int)$totalOnShippingCharge>=$third_row->min_amount)){
$shipingCharge=$third_row->charge;

}elseif(((int)$totalOnShippingCharge>0)){
$shipingCharge=$fourth_row->charge;
}else{
$shipingCharge=0;
}   
?>

        <div class="col-lg-6 col-sm-4" style="display:inline;">Rs. {{$shipingCharge}}</div>
          <br>
    
        <div class="col-lg-6 col-sm-4" style="font-weight: 600;display:inline;">Total GST</div>
        <div class="col-lg-6 col-sm-4">Rs. <?php echo (int)$gstAmt;?></div>

    </div>
    <hr>

    <div class="row row2">
        <div class="col-lg-6 col-sm-4" style="font-weight: 600;display:inline;">Subtotal</div>
        <div class="col-lg-6 col-sm-4" style="color:#e88f16;font-weight:600:display:inline;">Rs. <?php echo ((int)$total+(int)$shipingCharge);?></div>

        <br> 
        <br>

        <div class="col-lg-6 col-sm-4" style="font-weight: 600;display:inline;">Total Payable</div>
        <div class="col-lg-6 col-sm-4" style="font-weight:500;display:inline;">Rs. <?php echo ((int)$total+(int)$shipingCharge);?></div>         
    </div>
</div>

</div>
</div>
