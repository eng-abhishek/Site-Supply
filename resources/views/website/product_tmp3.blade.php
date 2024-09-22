@extends('website.layout.layout')
@section('title',$singleCateInfo->meta_title)
@section('meta_description',$singleCateInfo->meta_des)
@section('meta_keywords',$singleCateInfo->meta_keyword)
@section('content')
<style>
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

input[type='radio']:after {
        width: 15px;
        height: 15px;
        border-radius: 15px;
        top: -2px;
        left: -1px;
        position: relative;
        background-color: #E5E3E3;
        content: '';
        display: inline-block;
        visibility: visible;
        border: 1px solid #fff;
    }
    input[type='radio']:checked:after {
        width: 15px;
        height: 15px;
        border-radius: 15px;
        top: -2px;
        left: -1px;
        position: relative;
        background-color: #ffa500;
        content: '';
        display: inline-block;
        visibility: visible;
        border: 1px solid #fff;
    }
    .table-img img:hover{
      background-color: white !important;
    }
    
    .categories-m input{
  outline: none !important;
}

 @media (max-width: 440px){

     .community {
    margin-top:0px !important;
}
ul.breadcrumb {
    margin: 0px 0 auto -212px !important;
}
.lego-check{
    border:none !important;
}
.lego-head img {
    width: 78% !important;
    box-shadow: 2px 1px 10px 6px #d2d2d4;
}
.categories-m .form-check {
    padding-bottom: 20px;
    padding-top: 19px;
    padding-left: 61px !important;
    margin-left: 0;
    width: 100%;
    margin-top: 35px !important;
    border: none;
}
  input[type='radio']:after {
    width: 15px;
    height: 15px;
    border-radius: 15px;
   top: -1.6px !important;
    left: -0.6px !important;
    position: relative;
    background-color: #E5E3E3;
    content: '';
    display: inline-block;
    visibility: visible;
    border: 1px solid #fff;
}
.swiper-slide-active img{
  
    width: 251.667px;
    margin-right: 10px;
}
.categories-m {
    bottom: 0;
    top: 600px !important;
}

.categories-m {
    bottom: 0;
    top: 610px !important;
}
 .openbutton, img {
    width: 25%;
}
 }
    
</style>
<section class="community" style="margin-top: 94px;">
<div class="container-fluid">
         <div class="row">
               <div class="col-md-12 cutdiv p0">
                     <div class="cont" style="padding-top: 84px !important;">
                           <h1>Products</h1>
                           <ul class="breadcrumb text-left" style="margin-top: 0px !important;    padding: 10px 8px;color:white">
        <li><a style="color: white;" href="#">Shops</a></li>
        <li><a style="color: white;" href="#">         
        TMT BAR
                 </a></li>
    </ul>
                     </div>  
                </div>
         </div>  
</div> 
</section>

	   <!-- header -->
     <!-- categories-slider-->
    <section class="categories-slider" style="padding-top: 60px; margin-top:0px; background-color:#F9F9F9">
     <div class="swiper2 swiper-container">
        <div class="swiper-wrapper">
         @foreach($category as $categoryData)
           <div class="swiper-slide">
             <a href="{{url('product-category/'.$categoryData->url_slug)}}" style="text-decoration:none;color:#fff">
             <img src="{{asset('uploads/productCategory/'.$categoryData->img)}}" style="height:100px" alt="#" class="img-fluid"></a>
            <div class="content-overlay">
              <a href="{{url('product-category/'.$categoryData->url_slug)}}" style="text-decoration:none;color:#fff"><p class="text-center">{{$categoryData->name}}</p></a>
            </div>
            </div>
         @endforeach
        </div>
        <!-- Add Arrows -->
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
        <!-- Add Pagination -->
         <div class="swiper-pagination"></div>
     </div>
    </section>
      <!-- categories end -->
   
    <section class="choose">
    <div class="container-fluid" >
    <div class="row lego-head" >

            <div class="col-lg-3 col-md-4 col-sm-12"   style="padding-left: 55px;" style="background-color:white">        
           <img src="{{asset('uploads/productCategory/'.$singleCateInfo->img)}}" alt="" width="95%" style="height:165px;" height="95%" style="height: 160px;">
            </div>
            <div class="col-lg-7 col-md-8 col-sm-12 "  style="background-color:white">

              <h2 style="padding-top: 20px; font-size:24px">
              
              {{$singleCateInfo->name}}
              </h2> 
              @if($singleCateInfo->cateDesStatus=='1')
              {!! $singleCateInfo->cateDes !!}
              @else
              @endif
            </div>
            <div class="col-lg-2" style="background-color: #FAFAFA; ">
            </div>

        </div>
        <div class="row lego-choose" >
        <div class="col-lg-3 col-md-4 col-sm-6 categories-m" style="margin-top: 15px;">
               
                    <div class="form-check  lego-check" style="border: 1px solid #F0EDED" >
                    <h3 style="margin-top: 10px;" style="border: 1px solid #F0EDED">Brands</h3> 
              
               @foreach($brand as $brandData)
                    <label class="form-check-label" for="brandFilter">
                    <input type="radio" <?php if($subCatId==$brandData->id){echo"checked";}else{ }?> class="form-check-input" onclick="redirectSubcatePage(<?php echo $brandData->parent_id;?>)" id="brandFilter" name="radioFilter" value="<?php echo "brandFilter=".$brandData->id;?>">{{$brandData->name}}
                    </label><br>
                  @endforeach 
            
                    </div>                
                  </div>
<input type="text" name="tmpId" id="tmpId" value="{{$template_Id}}" hidden="">           
<div class="col-lg-7 col-md-8 col-sm-6" id="ajaxProductList" style="margin-top: 35px;left:-52px">
@include('website.ajax_temp_three_product_list')
</div>

</div>
</div>
</section>
@section('script')
<script type="text/javascript">
  var swiper = new Swiper(".swiper-container",{
   slidesPerView: 1.5,
   spaceBetween: 10,
   centeredSlides: true,
   freeMode: true,
   grabCursor: true,
   loop: true,
   pagination: {
     el: ".swiper-pagination",
     clickable: true
   },
   autoplay: {
     delay: 4000,
     disableOnInteraction: false
   },
   navigation: {
     nextEl: ".swiper-button-next",
     prevEl: ".swiper-button-prev"
   },
   breakpoints: {
     500: {
       slidesPerView: 1
     },
     700: {
       slidesPerView: 7.5
     }
   }
 });



function add_to_cart(product_id,qty_id,price_id){
    
console.log('pro_id'+product_id);
console.log('qty_id'+qty_id);
console.log('price_id'+price_id);

var des_count=$('#pro_qty'+product_id).val();
var Mo_count=$('#Mo_pro_qty'+product_id).val();
if(des_count==''){
  count=Mo_count;
}else{
  count=des_count;  
}

console.log('count'+count);

var unitPrice=$('#unitPrice'+product_id).val();

if(count>0){

 $.ajax({
 url:"{{url('add_to_tmp_cart')}}",
 method:'post',
 dataType:'JSON',
 data:{product_id:product_id,qty_id:qty_id,price_id:price_id,count:count,"_token":'{{csrf_token()}}'},  
 success:function(data){
 console.log(data);
 if(data[0]=='0'){
 setTimeout(function(){
    //   alert($('#pro_qty'+product_id).val());
    //   alert(data[1]);
 if(Number($('#pro_qty'+product_id).val())>=Number(data[1])){
   
 }else{
  alert('Oop`s Required Min Order'+' '+data[1]);  
    return false;
 }
 },1000)
 }else if(data[0]=='1'){
 $('.pointer').show();
 $('.pointer').delay(3000).fadeOut('slow');
 $('#pageCounter'+product_id).show();
 $('#pageCart'+product_id).hide();
  applyRefreshUrl(count,unitPrice,product_id);

  return true;
 }else{

 }  
 }
 });

}else if(count<0){
alert('Oop`s Please Enter Valide Value');
}else{

 $.ajax({
 url:"{{url('removeItem')}}",
 method:'post',
 data:{id:product_id,"_token":'{{csrf_token()}}'},  
 success:function(data){
 $('#pageCounter'+product_id).show();
 $('#pageCart'+product_id).hide();
 applyRefreshUrl(count,unitPrice,product_id);
 }
 });
}

}

function applyRefreshUrl(count,unitPrice,product_id){
   setTimeout(function(){
 getCartCount();
 refresh_product_list(count,unitPrice,product_id);
 },1000)
}


function refresh_product_list(count,unitPrice,product_id){

var priceOfRow= count * unitPrice;
$('#priceVal'+product_id).html(priceOfRow);
$('#MobilePriceVal'+product_id).html('Rs: '+priceOfRow);
$('#Act_MobilePriceVal'+product_id).val(priceOfRow);
$('#priceValInputBox'+product_id).val(priceOfRow);

var total_amt=0;
$(".priceValInputBox").each(function( index ){
   total_amt += Number($( this ).html());
});

var Mo_total_amt=0;
$(".MobilePriceValInputBox").each(function( index ){
   Mo_total_amt += Number($( this ).val());
});
console.log(Mo_total_amt);

 $('#totalAmt').html(total_amt);
 $('#Mo_totalAmt').html(Mo_total_amt);
}

function redirectSubcatePage(id){
 window.location.href='<?php echo url('product-category')?>'+'/'+id;
 }
</script>
@endsection
@endsection
  