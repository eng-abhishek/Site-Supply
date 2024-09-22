@extends('website.layout.layout')
@section('content')
<style type="text/css">
#bokingInfo .form-control{
color:black !important;
}
  .choose-box {
  display: block !important;
}
.hover-box-m:hover {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}

.hover-box-m:hover h4 {
  font-size: 1.02em !important;
}

.hover-box-m {
  margin-bottom: 22px;
  margin-right: 0px;
  padding-top: 10px;
  padding-bottom: 10px;
  text-align: center;
}

.hover-box-m img {
  margin: auto;
}
.hover-box-m h4 {
  font-size: 1em;
  font-weight: 600 !important;
  margin-top: 9px;
  margin-bottom: 2px !important;
  color: rgb(58, 51, 51);
}

body{
  background-color:#FAFAFA;
}
.hover-box-m h5 {
  font-size: 1em !important;
  margin-bottom: 15px !important;
}

@media only screen and (min-width: 800px) {
  .choose {
    margin-left: 46px;
    margin-right: 80px;
  }
  #ajaxProductList {
    margin-left: -20px !important;
  }
  .lego-choose{
    margin-right: -75px !important;
  }
  .lego-inr{
    margin-top: 14px !important;
  }
  .lego-head{
   
    height: 165px;
    width: 98.5%;
    margin-left: 1px;
    /* margin: auto; */
    float: left;
    background-color: white;
  }
  .lego-head img{
    width: 90%;
    height: 93%;
  }
  .lego-check{
  margin-top: 17px;
  margin-bottom: 0px;
  padding-left: 35px;
  padding-bottom: 20px;
  width: 200px;
  background-color: white;
}

}

.lego-cart {
  text-align: center;
  background-color: #e88f16;
  padding-top: 4px;
  padding-bottom: 4px;
}
.lego-cart a {
  color: white;
  font-size: 0.8em !important;
}
.lego-show a {
  font-size: 0.8em !important;
  color: #e88f16;
}

.hover-box-m span {
  top: -1px !important;
  font-size: 0.8em !important;
}
.bottom-pagination .page-link:hover{
      background: linear-gradient(to right, #f7c328, #e88f16);
      color:white;
}
.col-lg-1half{
  width: 12.5%;
}
.col-lg-2half{
  width: 20.8%;
}

ul.breadcrumb li+li:before {
    padding: 8px;
    color: #fff;
    content: "/\00a0";
}

    .table-img img:hover{
      background-color: white !important;
    }

    ul.breadcrumb li+li:before {
    padding: 8px;
    color: black;
    content: "/\00a0";
}

@media only screen and (min-width: 800px) {
.lego-nav{
    margin:20px 50px 20px 55px;
}
}

.nav-pills .nav-link.active, .nav-pills .show>.nav-link {
    color: #fff;
    background: linear-gradient(to right, #f7c328, #e88f16);
}

.nav-pills a {
    color: #e88f16;
    text-decoration: none;
    background-color: transparent;
}

.tab-content h5{
    font-weight: 600;
}

.tab-content{
    margin-top: 15px;
}
  .line1{
            border: 1px solid #cccccc;
        }
        .flatpickr-day 
        {
            font-size:14px !important;
        }
        .flatpickr-time .flatpickr-time-separator
        {
            font-size:30px;
        }

      
</style>

<style>
  
    @media screen and (max-width: 480px) {
         .openbutton, img {
    width: 25%;
}
     .nav-pills{
       margin-bottom: 15px !important;
       padding-top: 10px !important;
       margin-left: 0px !important;
     }

  
      .buttons-top{
        display: none;
      }
      .buttons-bot{
        display: block !important;
      }
      
      #paymentdetails{
          width: 95%;
    margin: auto;
      }


    }

</style>


<style>
    .lego-form-group {
  display: block;
  margin-bottom: 15px;
}

.lego-form-group input {
  padding: 0;
  height: initial;
  width: initial;
  margin-bottom: 0;
  display: none;
  cursor: pointer;
}

.lego-form-group label {
  position: relative;
  cursor: pointer;
}

.lego-form-group label:before {
  content:'';
  -webkit-appearance: none;
  background-color: #F8C629;

  box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05), inset 0px -15px 10px -12px rgba(0, 0, 0, 0.05);
  padding: 7px;
  display: inline-block;
  position: relative;
  vertical-align: middle;
  cursor: pointer;
  margin-right: 5px;
}

.lego-form-group input:checked + label:after {
    content: '';
    display: block;
    position: absolute;
    top: 6.6px;
    left: 5px;
    width: 5px;
    height: 10px;
    border: solid #fff;
    border-width: 0px 2px 2px 0;
    transform: rotate(45deg);
}
    
</style>


<script src="https://kit.fontawesome.com/a076d05399.js"></script>
<?php 
use App\City;
use App\User;
$cityId=session()->get('locationId');
$cityName=City::select('name')->where('id',session()->get('locationId'))->get();
$allCity=City::where('status','1')->get();
$userData=User::where('mobile_no',session()->get('mobile_no'))->get();
error_reporting(1);
?>
<hr>
<section class="sub-nav">
    <div class="container">
    <div class="row">
    <ul class="breadcrumb text-left">
        <li><a href="{{url()}}"><b>Home</b></a></li>
        <li><a href="#">Shopping</a></li>
      </ul>
    </div>
    </div>
</section>

<!------- tab 1 ------------->
 <section id="mycart" class="freshCart">
@include('website.ajax_cart')
  </section>
<!------- tab 1 ------------->

<!------- tab 2 ------------->



    <section id="contactdetails" style="display: none;">
            <div class="container">
    <ul class="nav nav-pills" style="margin-bottom: 30px;">
    <li class="nav-item">
      <a class="nav-link"  href="#">My Cart</a>
    </li>
    <span style="font-size:32px !important;font-weight:600 !important;margin-left:15px;margin-right:10px !important">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" font-weight="bold" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
</svg>
    </span>
  
    <li class="nav-item">
      <a class="nav-link active"  href="#">Contact Details</a>
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
    <form method="post" action="{{url('saveBooking')}}" name="bokingInfo" id="bokingInfoSSPLY">
    <div class="row">
    <div class="col-lg-9"  style="border-right: 1px solid grey;">      
    <div class="container">

          <div class="row">
            <div class="col-lg-6">   
             <div class="form-group">
             <label for="date">
              <h6 style="font-weight: 600;"> Delivery Date</h6>    
             </label>
             <input type="text" style="margin-top: 0px;" style="height:30px" class="form-control date" name="deliveryDate"  format="data-fv-date___format" placeholder="Select Date" required="">
             </div>
            </div>

            <div class="col-lg-6">
                <div class="form-group">
             <label for="time">
                <h6 style="font-weight: 600;"> Delivery Time</h6>             
            </label>
             <input type="text" style="margin-top: 0px;" class="form-control time" style="height:30px" name="deliveryTime" placeholder="Select Time" required="">
             </div>
            </div>

             <div class="col-lg-6 col-md-4 col-sm-12" style="margin-top: 10px;">
              <div class="form-group">
              <input type="text" class="form-control" <?php if($userData[0]->name){ echo"readonly";}else{ } ?> id="user_name" name="user_name" placeholder="Name" value="{{$userData[0]->name}}" required="">
             </div>
            </div>

             <div class="col-lg-6 col-md-4 col-sm-12" style="margin-top: 10px;">
             <div class="form-group">
             <input type="number" class="form-control" id="user_mobile_no" name="mobile" placeholder="Mobile Number" style="color: #797975 !important;" readonly value="{{session()->get('mobile_no')}}" required="">
             </div>
            </div>

        </div> <br> <br>
        

        <div class="row">
            <div class="col-lg-6 col-md-4 col-sm-12">
             <h5>Shipping Address</h5>
             
              <div class="form-group" style="margin-top: 30px;">
              <input type="text" class="form-control" id="street" name="street" placeholder="Street" value="{{$userData[0]->street}}" required="">
             </div>
            <div class="form-group">   
           <input type="text" id="city" name="city" value="{{$city}}" readonly="" class="form-control">  
            </div>
             <div class="form-group">
             <input type="number" class="form-control" id="zip" name="zipcode" placeholder="ZIP Code" value="{{$userData[0]->zip_code}}" required="">
             </div>
             <div class="form-group">
             <input type="text" class="form-control" id="landmark" name="landmark" value="{{$userData[0]->landmarkAddress}}" placeholder="Landmark" required="">
             </div>
             </div>
             
            <div class="col-lg-6 col-md-4 col-sm-12">
            <h5>Note</h5>
            <span style="font-size: 1em;">Add special instructions for your order</span>
            <div class="form-group">
            <textarea class="form-control" rows="5" id="comment" name="comment" required=""></textarea>
            </div>
            
             <div class="form-group">
             <input type="text" <?php if($userData[0]->email){ echo"readonly";}else{ } ?> value="{{$userData[0]->email}}" class="form-control" id="user_email_id" name="user_email_id" placeholder="Email Id" style="color: #797975 !important;" required="">
             <input type="text" name="id" id="id" value="{{$userData[0]->id}}" hidden>
             </div>
          
            </div>
            
           <div class="col-lg-6 col-md-4 col-sm-12" style="margin-top: 10px;">
              <div class="form-group">
              <input type="text" class="form-control" id="sitePersonName" name="sitePersonName" placeholder="Site Person's Name">
             </div>
             </div>
            
             <div class="col-lg-6 col-md-4 col-sm-12" style="margin-top: 10px;">
              <div class="form-group">
             <input type="number" class="form-control" id="sitePersonMobileNo" name="sitePersonMobileNo" placeholder="Site Person's Mobile Number">
             </div>
             </div>
     
              <div class="col-lg-6 col-md-6 col-sm-6" style="margin-top: 35px;">
                  <div class="lego-form-group">
                        <!--<input  type="checkbox" id="ShippingSameAsBilling" name="ShippingSameAsBilling" required="">-->
                        <!--<label for="ShippingSameAsBilling"> Billing Address is same as shipping address.</label><br>-->
                        <input  onchange="showhide(this.checked)"  type="checkbox" id="html1" name="gstn">
                        <label for="html1"> Do you have a GST Number?</label>
                  </div>
              </div>

              <div class="col-lg-6 col-md-6 col-sm-6" style="margin-top: 35px;">
             <!--  <button class="btn btn-primary" type="submit" name="btnSubmit" value="Submit">Sumnit</button> -->
              </div>


            <script>
              function showhide(checked){
                if(checked === true){
                  $('#gst_no').prop('required',true);
                  $('#cmp_name').prop('required',true);
                  document.getElementById("hiddenfield").style.display = "block";
                }
                if(checked === false){
                   $('#gst_no').prop('required',false);
                   $('#cmp_name').prop('required',false);    
                  document.getElementById("hiddenfield").style.display = "none";
                }
              }
            </script>
         </div>
<!-------- GST Info --------->
              <div class="row" id="hiddenfield" style="display: none;">
               <div class="col-lg-5 col-md-4 col-sm-12" style="margin-top: 0px;" >  
              <div  class="form-group" >
              <input type="text" style="margin-top: 0px;" class="form-control" id="gst_no" name="gst_no" onchange="checkValideGST()" placeholder="GST Number">
             </div>
            </div>
            <div   class="col-lg-5 col-md-4 col-sm-12" style="margin-top: 0px;">
              <div   class="form-group" >
                <input   type="text" style="margin-top: 0px;" class="form-control" id="cmp_name" name="cmp_name" placeholder="Company Name">
             </div>
            </div>
          </div>

<!-------- GST Info --------->

      </div>
       <hr>
      <br>
    
            <div class="row buttons-top">
            <div class="col-lg-6">
               <button onclick="mycart()" style="margin-left:20px; background: linear-gradient(to right, #f7c328, #e88f16); border:none; color:white;padding:3px 8px 3px 8px;border-radius:4px">
               <a style="color:white" href="javascript:void(0)">
               <svg color="white" style="padding-bottom: 3px;" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-left" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"/>
</svg>
               Back to Cart </a>
            </button>
            </div>
            <div class="col-lg-6">
            <button style="margin-right:50px; background: linear-gradient(to right, #f7c328, #e88f16); border:none; color:white;padding:3px 8px 3px 8px;border-radius:4px;float:right;width:220px !important" type="submit" class="btnsaveBok" name="btnsubmitDesk">Continue to Payment
            <a style="color:white" href="javascript:void(0)">
            <svg color="white" style="padding-bottom: 3px;" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
           </svg>
             </a>
            </button>
            </div>
           </div>
           
           
           
           <div class="row buttons-bot" style="display: none;">
            <div class="col-lg-6 text-center">
               <button onclick="mycart()" style="margin-left:0px; background: linear-gradient(to right, #f7c328, #e88f16); border:none; color:white;padding:3px 8px 3px 8px;border-radius:4px;width:220px !important">
               <a style="color:white" href="javascript:void(0)">
               <svg color="white" style="padding-bottom: 3px;" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-left" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"/>
</svg>
               Back to Cart </a>
            </button>
            </div>
            <div class="col-lg-6 text-center">
            <button style="margin-right:0px; background: linear-gradient(to right, #f7c328, #e88f16); border:none; color:white;padding:3px 8px 3px 8px;border-radius:4px;margin-top:5px;width:220px !important" type="submit" class="btnsubmitMobile" name="btnsubmitMobile">Continue to Payment
            <a style="color:white" href="javascript:void(0)">
            <svg color="white" style="padding-bottom: 3px;" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
           </svg>
             </a>
            </button>
            </div>
           </div>
           
          <br>
        </div>

<div class="col-lg-3 text-right refreshShortCart" style="background-color:white;margin-top:20px; padding-top:20px;
padding-left:5px;heighT:95%;padding-bottom:20px;">

</div>
      </div>
      </form> <!---------- end form ------>
      </div>
    </section>

<!------- tab 2 ------------->

<!------- tab 3 ------------->

    <section id="paymentdetails" style="display: none;">

 <div class="container">
 <ul class="nav nav-pills" style="margin-bottom: 30px;">
    <li class="nav-item">
      <a class="nav-link"  href="#">My Cart</a>
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
      <a class="nav-link active"  href="#">Payment Details</a>
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
                  <div class="row">
<div class="col-lg-9 form-check" style="border-right: 1px solid grey;">

                   <div class="row">
                          <div class="col-lg-12">
                           <label class="form-check-label" for="paymentTypeOnline">
                      <input type="radio" class="form-check-input"  id="paymentTypeOnline" name="paymentType" checked required="" value="Online">
                       <h6  style="font-weight: 600;">Online</h6>
                    </label>
                            </div>
                        </div>
                     <br>
                      <div class="row">
                            <div class="col-lg-12">
                      <label class="form-check-label" for="paymentTypeCOD">
                    <input type="radio" class="form-check-input" id="paymentTypeCOD" name="paymentType" required="" value="COD">
                       <h6  style="font-weight: 600;">Cash on Delivery</h6>
                    </label><br>
                            </div>
                        </div>
                     <hr>
                   <br>
        
        <div class="row buttons-top">

            <div class="col-lg-6">
               <button onclick="mycart()" style="margin-left:20px; background: linear-gradient(to right, #f7c328, #e88f16); border:none; color:white;padding:3px 8px 3px 8px;border-radius:4px">
               <a style="color:white" href="#">
               <svg color="white" style="padding-bottom: 3px;" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-left" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"/>
</svg>
               Edit Cart </a>
            </button>
            </div>
            <div class="col-lg-6">
                  <button style="margin-right:50px; background: linear-gradient(to right, #f7c328, #e88f16); border:none; color:white;padding:3px 8px 3px 8px;border-radius:4px;float:right">
             <a style="color:white" href="javascript:void(0)" onclick="checkPaymentMode()">Place Order
            <svg color="white" style="padding-bottom: 3px;" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
</svg>
            </a>
            </button>
            </div>
           </div>
           
            <div class="row buttons-bot" style="display: none;">
            <div class="col-lg-6 text-center">
               <button onclick="mycart()" style="margin-left:0px; background: linear-gradient(to right, #f7c328, #e88f16); border:none; color:white;width:220px !important;padding:3px 8px 3px 8px;border-radius:4px;width:220px !important">
               <a style="color:white" href="#">
               <svg color="white" style="padding-bottom: 3px;" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-left" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"/>
</svg>
               Edit Cart </a>
            </button>
            </div>
            <div class="col-lg-6 text-center">
                  <button style="margin-right:0px; background: linear-gradient(to right, #f7c328, #e88f16); border:none; color:white;width:220px !important;padding:3px 8px 3px 8px;border-radius:4px;margin-top:5px;width:220px !important">
              <a style="color:white" href="javascript:void(0)" onclick="checkPaymentMode()">Place Order
            <svg color="white" style="padding-bottom: 3px;" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
</svg>
            </a>
            </button>
            </div>
           </div>
  
        <br>
    </div>
  <div class="col-lg-3 text-right refreshShortCart" style="background-color: white;margin-top:20px; padding-top:20px;
padding-left:5px;heighT:95%;padding-bottom:20px;">
  </div>
  </div>
  </div>
 </section>
 <input type="text" hidden name="csrf_input" value="{{ csrf_token() }}" class="csrf_input">
             
<!------- end tab 3 ------------->

@endsection
 <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
@section('script')
<script type="text/javascript">

 function countDown(id){
 $.ajax({
 url:"{{url('countDown')}}",
 method:'post',
 data:{id:id,"_token":'{{csrf_token()}}'},  
 success:function(data){
 setTimeout(function(){
 refreshCart();
 },500)

$('.pointer').html('Material updated');
$('.pointer').show();
$('.pointer').delay(3000).fadeOut('slow');

 }
 });
}
 
 function countUp(id){
 $.ajax({
 url:"{{url('countUp')}}",
 method:'post',
 data:{id:id,"_token":'{{csrf_token()}}'},  
 success:function(data){
 setTimeout(function(){
 refreshCart();
 },500)

$('.pointer').html('Material updated');
$('.pointer').show();
$('.pointer').delay(3000).fadeOut('slow');

 }
 });
 }

function removeItem(id){
  // alert(id);
 $.ajax({
 url:"{{url('removeItem')}}",
 method:'post',
 data:{id:id,"_token":'{{csrf_token()}}'},  
 success:function(data){
 setTimeout(function(){
 refreshCart();
 },500)

$('.pointer').html('Material removed');
$('.pointer').show();
$('.pointer').delay(3000).fadeOut('slow');
 }
 });
  getCartCount();
}

 function updateCart(id){

if($('#getCounterValue').val()){
    var counter=$('#getCounterValue'+id).val();
}else{
    var counter=$('#getCounterValueOnMo'+id).val();  
}

 $.ajax({
 url:"{{url('update-cart-product-list-page')}}",
 method:'post',
 data:{id:id,count:counter,"_token":'{{csrf_token()}}'},  
 success:function(data){
     
//$('#getCounterValue'+id).val(data);
$('.pointer').html('Item update To cart');
$('.pointer').show();
$('.pointer').delay(3000).fadeOut('slow');
setTimeout(function(){
refreshCart();
},500)
}
})
}

function refreshCart(){

 $.ajax({
 url:"{{url('refreshCart')}}",
 method:'post',
 data:{"_token":'{{csrf_token()}}'},  
 success:function(data){
   console.log(data);
$('.freshCart').html(data);
setTimeout(function(){
$('#mycart').html(data);    
},1000)

$('.pointer').html('Item update To cart');
$('.pointer').show();
$('.pointer').delay(3000).fadeOut('slow');

}
})
getCartCount();
}

function refreshShortCart(){
 $.ajax({
 url:"{{url('refreshShortCart')}}",
 method:'post',
 data:{"_token":'{{csrf_token()}}'},  
 success:function(data){
$('.refreshShortCart').html(data);
}
})
}


  function mycart(){
  document.getElementById("mycart").style.display = "block";
  document.getElementById("paymentdetails").style.display = "none";
  document.getElementById("contactdetails").style.display = "none";
  }

  function bokInfo(){
  if($('.badge').html()<=0){
  alert('Oop`s your Cart Is Empity');
  return false;
  }
  
  document.getElementById("mycart").style.display = "none";
  document.getElementById("contactdetails").style.display = "block";
  document.getElementById("paymentdetails").style.display = "none";
  refreshShortCart();
  }

$('#bokingInfoSSPLY').validate({
rules:{
user_name:{
required:true,
maxlength:30,
minlength:3,
},  
cmp_name:{
maxlength:50,
minlength:3,
         },     
deliveryDate:{
required:true,
  },
deliveryTime:{
required:true,
  },
mobile:{
required:true,
number:true,
maxlength:10,
minlength:10,
},  
street:{
required:true,
maxlength:30,
minlength:3,
},
zipcode:{
required:true,
maxlength:8,
minlength:3,
},
landmark:{
 required:true,   
maxlength:100,
minlength:5,  
},
comment:{
required:true,    
maxlength:100,
minlength:10,
},
user_email_id:{
email:true,
required:true,
     remote:{
          url: "<?php echo url('check-user-email');?>",
          type: "post",
          data:{emailId:$('#user_email_id').val(),id:$('#id').val(),"_token":'{{csrf_token()}}'},
            }    
}
},
messages:{
user_name:{ required:'Please enter user name', }, 
cmp_name:{ required:'Please enter company name', }, 
deliveryDate:{ required:'Please enter delivery date', },
deliveryTime:{ required:'Please enter delivery time', },
mobile:{ required:'Please enter contact no', },
street:{
required:'Please enter stree name',
},
zipcode:{
required:'Please enter zip code',

},
landmark:{
required:'Please enter landmark', 

},
comment:{
required:'Please enter note',  
  
},
user_email_id:{
required:'Please enter email id',      
remote:'This email id is already exist try other', 
}
}
});


$('#bokingInfoSSPLY').submit(function (e){
  e.preventDefault();
  var spinner = $('#loader');
  spinner.show();
  
  var url=$('#bokingInfoSSPLY').attr('action');
 
  var bokinfo=$('#bokingInfoSSPLY').serialize();
 if ($('#bokingInfoSSPLY').valid()){
  $.ajax({
    type: 'POST',
    url: url,
    async: true,
    data:{bokinfo,'_token':"{{csrf_token()}}"},
  }).done(function(resp) {
     
  document.getElementById("mycart").style.display = "none";
  document.getElementById("contactdetails").style.display = "none";
  document.getElementById("paymentdetails").style.display = "block";
  refreshShortCart();
  
      spinner.hide();
      
      
    //   alert(resp.status);
    });
  } else{
 spinner.fadeOut(500);      
return false;
}

});

function checkValideGST(){
var gstNO=$('#gst_no').val();
var reg = /^[0-9A-Za-z]+$/;

            var statecode = gstNO.substring(0, 2);
            var pancarno = gstNO.substring(2, 12);
            var entityNumber = gstNO.substring(12, 13);
            var defaultZvalue = gstNO.substring(13, 14);
            var checksumdigit = gstNO.substring(14, 15);
            if (gstNO.length != 15) {
                alert('GST Number is invalid');
                $('#gst_no').focus();
                return false;
            }
            if (pancarno.length != 10) {
                alert('GST number is invalid ');
                $('#gst_no').focus();
                return false;
            }
            if (defaultZvalue !== 'Z') {
                alert('GST Number is invalid Z not in Entered Gst Number');
                $('#gst_no').focus();
            }

            if (!($.isNumeric(statecode))) {
             
               alert('Please Enter Valid State Code');
            } else {
                $('#gst_no').focus();
           
            }

            if (reg.test(checksumdigit)){
                return true;
            } else {
                alert('GST number is invalid last character must be digit');
               $('#gst_no').focus();

            }
}

function checkPaymentMode(){

if($("input[type='radio'][id='paymentTypeOnline']:checked").val()=='Online'){

            var amount = $('.totalPayAmt').val();
            var total_amount = amount * 100;
            var options = {
                "key": "{{ Config::get('custom.razor_key') }}", // Enter the Key ID generated from the Dashboard
                "amount": total_amount, // Amount is in currency subunits. Default currency is INR. Hence, 10 refers to 1000 paise
                "currency": "INR",
                "name": "SSUPLY",
                "description": "SSUPLY",
                "image": "https://sitesupply.in/assets/front-end/img/logo.png",
                "order_id": "", //This is a sample Order ID. Pass the `id` obtained in the response of Step 1
                "handler": function (response){
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN':$('.csrf_input').val()
                        }
                    });
                    $.ajax({
                        type:'POST',
                        url:"{{url('razorpaypayment')}}",
                        data:{razorpay_payment_id:response.razorpay_payment_id,amount:amount},
                        success:function(data){
                        if(data==101){
                        window.location.href='{{url("rate")}}';
                        }else if(data==404){
                        alert('Oop`s something went wrong');   
                        }else{ }  
                        $('.totalPayAmt').val('');
                        }
                    });
                },
                "prefill": {
                    "name":$('.name').val(),
                    "email":$('.email').val(),
                    "contact":$('.contact').val(),
                },
                "theme": {
                    "color": "#F37254"
                }
            };
            var rzp1 = new Razorpay(options);
            rzp1.open();

}else if($('input[type="radio"][id="paymentTypeCOD"]:checked').val()=='COD'){

    $.ajax({
    type:'POST',
    url:"{{url('razorpaypayment')}}",
    data:{status:'COD','_token':'{{csrf_token()}}'},
    success:function(data){
    console.log(data);  
    if(data==150){
    window.location.href='{{url("rate")}}';
    }else if(data==404){
    alert('Oop`s something went wrong');   
    }else{ }  
    $('.totalPayAmt').val('');
    }
    });
    
}else{

alert('N S');

}
}
</script>
@endsection