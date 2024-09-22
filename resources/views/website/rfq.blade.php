@extends('website.layout.layout')
@section('title','RFQ')
@section('content')
<?php error_reporting(1);?>
<style type="text/css">
.product-form-border
 {
     border:1px solid rgb(51 51 51 / 17%);
     margin-top: 13%;
     margin-bottom: 5%;
     box-shadow: 0px 2px 8px rgb(128 128 128 / 80%);
 }

 .product-form-border h1{padding-top: 30px;}
 .product-form-border p{margin-bottom: 0px;}

  .product-form-border textarea.form-control.des
 {
   height: 120px!important;
   width: 106%!important;
 }
 .product-form-border .col-lg-4.col-md-4.col-sm-6
 {
    display: inline-block;
    float: left;
 }
 .col-lg-4.col-md-4.col-sm-4.email-address
 {
    position: absolute;
    z-index: 9;
    right: -100%;
    top: 0px;  
 }
 .col-lg-12.col-md-12.col-sm-12.city
 {
    padding-left: 0;
    padding-right: 0;
    margin-left: -110%;
 }
 .col-lg-12.col-md-12.col-sm-12.address
 {
    padding-left: 0;
    padding-right: 0;
    margin-top: -25%;
 }
 .col-lg-12.col-md-12.col-sm-12.desc
 {
     position: inherit;
     width: 94.85%;
 }
 .alert-success
 {
     margin: 20px auto;
    background: -webkit-linear-gradient(to right, #f7c328, #e88f16);
    /* background: linear-gradient(to right, #f7c328, #e88f16); */
    color: #1e1e1e;
    border: none;
    background: #ffa428;
 }
 .close
 {
     text-shadow: none;
     opacity: 10;
     color: #1e1e1e;
 }
 @media(max-width:1024px)
 {
    .col-lg-12.col-md-12.col-sm-12.address
    {
        margin-top: -30%;
    }
    .col-lg-12.col-md-12.col-sm-12.desc
    {
        max-width: 95%;
        margin-left: 0;
        margin-top: 0;
    }
 }
 @media(max-width:768px)
 {
    .col-lg-12.col-md-12.col-sm-12.address
    {
        margin-top: -42%;
    }
    .col-lg-12.col-md-12.col-sm-12.desc
    {
        max-width: 95%;
        margin-left: 0;
        margin-top: 0;
    }
 }
 @media(max-width:414px)
 {
 .col-lg-12.col-md-12.col-sm-12.email-address {
    position: unset;
    /* z-index: 9; */
    right: 0;
    top: 0px;
    padding-left: 0;
    padding-right: 0;
}
.col-lg-12.col-md-12.col-sm-12.address {
    margin-top: -22%;
}
.col-lg-12.col-md-12.col-sm-12.desc {
    max-width: 95%;
    margin-left: 0;
    margin-top: 0;
}
.product-form
{
    padding-left: 10px;
    padding-right: 10px;
}
.col-lg-12.col-md-12.col-sm-12.city
{
    margin-left: 0;
    margin-bottom: 80px;
}
}
@media screen and (max-width: 480px) {
    .openbutton, img {
    width: 25%;
}
}
</style>
    <!---product form open---->
    <section class="product-form">
    <div class="container text-center product-form-border">
        <div class="row">
            <div class="col-lg-12">
                <h1>REQUEST FOR QUOTATION</h1>
                <p>Please mention information as precise as possible.</p>
            </div>
            @if(Session::has('rfqmsg'))
           <p class="alert alert-success alert-dismissible" style="text-align:center">{{Session::get('rfqmsg')}} <button type="button" class="close" data-dismiss="alert">&times;</button></p>
           @endif
            <div class="col-md-12">
                <div class="c-form">
                 <form id="rfqForm" method="post" action="{{url('store-rfq')}}">
                  <div class="col-lg-4 col-md-4 col-sm-6"> 
                   <div class="form-group text-left">
                      <label>RSQ Number</label>
                      <input type="text" name="rfqno" value="{{$rfqNo}}" readonly class="form-control name" placeholder="Rsq number">
                   </div>
                   </div>

                   <div class="col-lg-4 col-md-4 col-sm-6"> 
                   <div class="form-group text-left">
                    <label>Product Name </label>
                    <select class="form-control product_id" name="product_id" onchange="getProCateBrand(this.value)" required="">
                     <option value="">-- Select Product Name---</option>
                     @foreach($allProduct as $allProductData) 
                     <option value="{{$allProductData->id}}" <?php if($allProductData->id==$productIdSelt){ echo"selected";}?>>{{$allProductData->name}}</option>
                     @endforeach
                    </select>
                 </div>
              </div>

                <div class="col-lg-4 col-md-4 col-sm-6"> 
                 <div class="form-group text-left">
                    <label>Product Category </label>
                  <input type="text" class="form-control" readonly name="product_cate_id" id="product_cate_id" value="{{$categoryIdSelt}}" placeholder="Enter Product Category">
                 </div>
              </div>

               <div class="col-lg-4 col-md-4 col-sm-6">
                 <div class="form-group text-left">
                    <label>Product Brand </label>
                    <input type="text" class="form-control" readonly name="brand_id" id="brand_id" value="{{$brandIdSelt}}" placeholder="Enter Product Brand">
                 </div>
              </div>

                  @csrf

               <div class="col-lg-4 col-md-4 col-sm-6">
                   <div class="form-group text-left">
                      <label>Person Name</label>
                      <input type="text" name="personName" class="form-control" placeholder="Person Name" required="">
                   </div>
                </div>

            <div class="col-lg-4 col-md-4 col-sm-6">
                 <div class="form-group text-left">
                     <div class="form-group">
                      <label>Contact Number</label>
                      <input type="text" name="mobile_no" value="{{session()->get('mobile_no')}}" class="form-control contactNo" placeholder="Contact No" required="">
                   </div>
                </div>
             </div>


              <div class="col-lg-4 col-md-4 col-sm-6 email-address">
                   <div class="form-group text-left">
                      <label>Email Address</label>
                      <input type="email" name="email" class="form-control email" placeholder="Email">
                   </div>
                </div>

               <div class="col-lg-4 col-md-4 col-sm-6">
                   <div class="form-group text-left">
                    <label>City</label>
                    <input type="text" name="city" class="form-control city" placeholder="City" required=""> 
                   </div>
                </div>

                <div class="col-lg-4 col-md-4 col-sm-6">  
                 <div class="form-group text-left">
                    <label>Address</label>
                    <input type="text" name="address" class="form-control name" placeholder="Address" required="">
                 </div>
                 </div>

                <div class="col-lg-12 col-md-12 col-sm-12 desc">
                   <div class="form-group text-left">
                      <label>Comment</label>
                     <textarea class="form-control des" cols="5" rows="5" name="des" placeholder="Comment.." required=""></textarea>
                   </div>
                 </div>

                   <center><button type="submit" style="padding: 4px 28px;" class="theme-btn-2">Submit</button></center>
                 </form>
             </div>
            </div>
        </div>
    </div>
    </section>
  <!---product form close---->
@section('script')
<script type="text/javascript">
   $('#rfqForm').validate({
 rules:{
  personName:{
   required:true,
   maxlength:25,
   minlength:3,
  },     
  product_id:{
   required:true,   
  },
  product_cate_id:{
   required:true,
  },
  brand_id:{
   required:true,
  },
  mobile_no:{
   number:true,      
   required:true,
   maxlength:10,
   minlength:10,
  },
  email:{
  email:true,
  },
  city:{
  required:true,
  maxlength:25,
  minlength:3,
  },
  address:{
  required:true,
  maxlength:35,
  minlength:3,
  },
  des:{
  required:true,
  maxlength:150,
  minlength:10, 
  }
 },
 messages:{
  personName:{
  required:'Please enter person name',       
  },      
  mobile_no:{
    required:'Please enter contact no',   
   },  
   city:{
    required:'Please enter city',   
   },     
   address:{
    required:'Please enter address',   
   },     
   des:{
   required:'Please enter comment',       
   },     
   email:{
   email:'Please enter valide email id',         
   },     
   product_id:{
   required:'Please select product name', 
   },
   product_cate_id:{
   required:"Please select product category",
   },
   brand_id:{
   required:"Please select brand",
   } 
}
});

function getProCateBrand(id){
$.ajax({
url:"{{url('getProductCateBrand')}}",
method:'POST',
data:{'id':id,'_token':'{{csrf_token()}}'},
success:function(data){
 $('#product_cate_id').val(data[0].categoryIdSelt);
 $('#brand_id').val(data[1].brandIdSelt);
 
}   
})
}

</script>
@endsection
@endsection
