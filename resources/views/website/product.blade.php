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
  border:none;
}
.navbar-expand-lg .navbar-nav .nav-link
{
        padding: 45px 13px 0px 10px !important
}
.hover-box-m:hover h4 {
  font-size: 1.02em !important;
}

.hover-box-m {
  
  margin-bottom: 22px !important;
  margin-right: 0px !important;
  padding-top: 13px !important;
  padding-bottom: 13px !important;
  text-align: center !important;
  padding-left: 5px !important;
  padding-right: 5px !important;
  border: 1px solid #F0EDED !important;
  background-color: white !important;
}

.hover-box-m img {
  margin: auto;
}
.hover-box-m h4 {
  font-size: 1em !important;
  font-weight: 600 !important;
  margin-top: 9px;
  margin-bottom: 2px !important;
  color:#585757;
}
.hover-box-m h4:hover{
  color:#e88f16;
  cursor: pointer;
}

.hover-box-m h5 {
  font-size: 1em !important;
  margin-bottom: 15px !important;
}

@media(max-width:375px)
{
    .hover-box-m span.lego-price {
    margin-left: -11px !important;
}

.cont h1 {
    margin: -50px 0 0 -100px;
}

}
@media(max-width:320px)
{
    .cont h1 {
   position: absolute;
    z-index: 9;
    bottom: 84%;
}
.cont ul.breadcrumb {
    margin: 0px 0 auto -110px !important;
    position: absolute;
    z-index: 9;
    bottom: 72%;
    left: 118px;
}
}
@media(max-width:360px)
{
    .hover-box-m span.lego-price {
       left: 31px !important;
}
.cont h1 {
    margin: -45px 0 0 -100px;
}
}
@media(max-width:414px)
{
    .choose input , .choose h6 , .choose select , .choose .categories-m , .choose #getOnlyBrandFilter{display:none;}
    .hover-box-m
    {
        width:50%;
        padding-bottom:10px!important;
    }
    span.lego-span
    {
        visibility:visible!important;
    }
    .hover-list:hover ul li {
    margin-left: -17px;
   
    box-shadow: inset 0px -1px 0px rgb(0 0 0 / 12%);
  
    padding: 2px 0px 0 0;
}
    #ajaxProductList .col-4 input
    {
       display:block!important;
    }
        .lego-cart
    {
        margin-top: 27px !important;
        margin-bottom: 0px !important;
    }
    .hover-box-m h5 {
     margin-bottom: -20px !important; 
}
    .hover-box-m span.lego-price
    {
            margin-left: -60px !important;
    }
}
@media only screen and (min-width: 800px) {
  .choose {
    margin-left: 46px;
    margin-right: 0px;
  }
  #ajaxProductList {
    left: -90px !important;
    margin-top: 45px !important;
  }
  .lego-sort{
    left:-90px !important;
    margin-top: 45px !important;
  }
  .hover-box-m {
  
  margin-bottom: 22px !important;
  margin-right: 24px !important;
  padding-top: 13px !important;
  padding-bottom: 13px !important;
  text-align: center !important;
  padding-left: 5px !important;
  padding-right: 5px !important;

}

  .categories-m {
    -ms-flex: 0 0 33.333333% !important;
    flex: 0 0 25.333333% !important;
    max-width: 29.333333% !important;
    
}

.choose input[type=search] {
    float: left;
    width: 86% !important;
}

.col-lg-8 {
    -ms-flex: 0 0 66.666667% !important;
    flex: 0 0 74.60% !important;
    max-width: 81.666667% !important;
}
.col-lg-3 {
    -ms-flex: 0 0 25% !important;
    flex: 0 0 24% !important;
    max-width: 22% !important;
}

.choose h3 {
    font-weight: 600;
    font-size: 20px;
    color: #333333;
    margin: 15px 0 20px -19px !important;
}

.lego-check{
  margin-top: 45px;
  margin-bottom: 0px;
  padding-left: 34px !important;
  padding-bottom: 20px;
  width: 200px;
  background-color: white;
}

}

.lego-cart {
  text-align: center;
      background: linear-gradient(to right, #f7c328, #e88f16);
  padding-top: 4px;
  padding-bottom: 4px;
  width: 70%;
  margin: auto;
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
.lego-page{
  background-color: white !important;
}
body{
  background-color:#F9F9F9 !important;
}
button:active {
    outline: none !important;
    border: none !important;
}
input button:focus {outline:none;}
  
input:checked  {
  background-color: black;
}
ul.breadcrumb li+li:before {
    padding: 8px;
    color: #fff !important;
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
    .pageCounter{
      display:none;
      padding-top:0px;
    }
</style>
<style>
     @media screen and (max-width: 480px) {
     
         @media (max-width: 440px){

ul.breadcrumb {

    margin: 90px 0 auto -230px !important;

}

.swiper-slide img{

    width:92%;

    margin-left:0px;

    height:120px;

    

}



.categories-slider{

    padding-top:30px !important;

}



.choose input{

    float:none !important;

}

.custom-select {

    width: 50%;

    margin-left: -57px;

    margin-top: 23px;

    font-size: 10px;

}

.lego-cart {

    text-align: center;

    background: linear-gradient(to right, #f7c328, #e88f16);

    padding-top: 4px;

    padding-bottom: 4px;

    width: 80%;

    margin: auto;

    margin-top: 33px !important;

    margin-bottom: 20px !important;

}



.plusminus {

    margin-top: 35px !important;

    margin-left: 17px !important;

}

.categories-m {

    width: 100%;

    position: static !important;

    top: 90%;

    left: 0px;

    display: inline-flex;

    border: none !important;

   

    

}

.categories-m .form-check {

    padding-left: 30px;

    margin-left: 0px !important;

    width: 100%;

    margin-top: 30px !important;

    padding-top:15px !important;

    padding-bottom:10px !important;

}

#getOnlyBrandFilter{

    margin-top:30px !important;

}



.pagination {

    display: none;

}

.hover-box-m h4 {

    font-size: 0.65em!important;

    font-weight: 600 !important;

    margin-top: 9px;

    margin-bottom: 2px !important;

    color: #585757;

}

.hover-box-m span {

    top: 194px !important;

    left: 33px !important;

}

.hover-box-m .lego-span {

    left: 35px !important;
    color:#606060!important;
    top: 0px !important;

}

.hover-box-m .lego-span {

    left: 35px !important;
    color:#606060!important;
    top: 0px !important;

}

#getOnlyBrandFilter{

    margin-top:0px !important;

    

}

 #ajaxProductList {

    left: -7px !important;

    margin-top: 45px !important;
    overflow-x: hidden;
  }

  .hover-box img{

      width:auto !important;

      

  }
  .community{
      margin-top:0px !important;
  }
  input[type='radio']:after {
    width: 15px;
    height: 15px;
    border-radius: 15px;
    top: 0.4px !important;
    left: 0.4px !important;
    position: relative;
    background-color: #E5E3E3;
    content: '';
    display: inline-block;
    visibility: visible;
    border: 1px solid #fff;
}
#getOnlyBrandFilter {
    margin-top: 30px !important;
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
                           <ul class="breadcrumb text-left " style="margin-top: 0px !important;    padding: 10px 8px;color:white !important">
        <li><a style="color: white;" href="#">Shops</a></li>
        <li><a style="color: white;" href="#">         
         @if(empty($product[0]->cate_name))Brand
        @else 
        {{$product[0]->cate_name}}
        @endif
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
             <a href="{{url('category/'.$categoryData->url_slug)}}" style="text-decoration:none;color:#fff">
             <img src="{{asset('uploads/productCategory/'.$categoryData->img)}}" style="height:100px" alt="#" class="img-fluid"></a>
            <div class="content-overlay">
              <a href="{{url('category/'.$categoryData->url_slug)}}" style="text-decoration:none;color:#fff"><p class="text-center">{{$categoryData->name}}</p></a>
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
<section class="choose"  style=" background-color:#F9F9F9 !important">
    <div class="container-fluid" style=" background-color:#F9F9F9 !important">
        <div class="row">
            <div class="col-lg-3 col-md-4 col-sm-12">
            <h6>Choose by :</h6><br>
            <input style="outline:none;width: 75% !important;float:left" type="search" placeholder="Search for product..." name="findSearchData" onkeyup="findSearchData(this.value)" required>
                            
            </div>

            <div class="col-lg-5 col-md-4 col-sm-12">
              
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 text-right lego-sort" >
                <h6 class="sort-by" style="font-size:14px">Sort by </h6>
                <!-- <input type="text" placeholder="Price, Low to High"> -->
                <select class="custom-select OrderFilter" id="price"  style="background-color: white;" onchange="getDataUsingProiceFilter(this.value)">
                  <option value="h_to_l">Price, High to Low</option>
                  <option value="l_to_h">Price, Low to High</option>
                 </select>  
            </div>
             </div>
           <div class="row">
           
            <div class="col-lg-4 col-md-4 col-sm-6 categories-m" style="margin-top: 0px;" >
                <div class="form-check lego-check" style="border: 1px solid #F0EDED">
                <h3 style="left: 0px;">Categories</h3>
             
              @foreach($category as $categoryData) 
                    <label class="form-check-label" for="categoryFilter">
                      <input type="radio" class="form-check-input" onclick="gotoCategoryPage('<?php echo $categoryData->url_slug;?>')" <?php if($cate_id==$categoryData->id){echo"checked";}else{ }?> id="categoryFilter" name="radioFilter" value="<?php echo "categoryFilter=".$categoryData->id;?>">{{$categoryData->name}}
                    </label><br>
                @endforeach 
                  </div>

                  <div class="form-check  lego-check" id="getOnlyBrandFilter" style="border: 1px solid #F0EDED;margin-top:-10px ">
                  <h3 style="margin-top: 10px;" style="border: 1px solid #F0EDED">Brands</h3>

@foreach($brand as $brandData)
                    <label class="form-check-label" for="brandFilter">
                    <input type="radio" <?php if($brand_id==$brandData->id){echo"checked";}else{ }?> class="form-check-input" onclick="getBrandFilterData(<?php echo $brandData->url_slug;?>)" id="brandFilter" name="radioFilter" value="<?php echo "brandFilter=".$brandData->id;?>">{{$brandData->name}}
                    </label><br>
 @endforeach  
                    </div> 
             </div>  
             <input type="text" hidden name="brandVal" value="" id="brandVal">
             <input type="text"  hidden name="brandId" value="" id="brandId">

<div class="col-lg-8 col-md-8 col-sm-6" id="ajaxProductList" style="margin-top: 20px;left:-88px">
@include('website.ajax_product')
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

function gotoCategoryPage(id){
window.location.href='<?php echo url('category')?>'+'/'+id;
}

 function getCategoryFilterData(id){
$('#brandFilter').removeAttr('checked');

 $.ajax({
 url:"{{url('getCategoryFilterData')}}",
 method:'post',
 data:{id:id,"_token":'{{csrf_token()}}'},  
 success:function(data){
 $('#ajaxProductList').html(data);

 }
 });

 $.ajax({
 url:"{{url('getOnlyBrandFilter')}}",
 method:'post',
 data:{id:id,"_token":'{{csrf_token()}}'},  
 success:function(data){
 $('#getOnlyBrandFilter').html(data);
// console.log(data);
 }
 });
 }


function getBrandFilterData(id){
$('#categoryFilter').removeAttr('checked');  
  
 $.ajax({
 url:"{{url('getBrandFilterData')}}",
 method:'post',
 data:{id:id,"_token":'{{csrf_token()}}'},  
 success:function(data){
 $('#ajaxProductList').html(data);
 }
 });
 }

 function getDataUsingProiceFilter(data){
var filterType='';
var brandVal='';
var brandId='';

filterType = $('input[name="radioFilter"]:checked').val();
if(filterType){

}else{
brandVal=$('#brandVal').val();
brandId=$('#brandId').val();
}

 $.ajax({
 url:"{{url('getDataUsingProiceFilter')}}",
 method:'post',
 data:{filterType:filterType,data:data,brandVal:brandVal,brandId:brandId,"_token":'{{csrf_token()}}'},  
 success:function(data){
 $('#ajaxProductList').html(data);
 }
 });
 }

 function findSearchData(val){
var filterType='';
var brandVal='';
var brandId='';
filterType = $('input[name="radioFilter"]:checked').val();

if(filterType){

}else{
brandVal=$('#brandVal').val();
brandId=$('#brandId').val();
}

 $.ajax({
 url:"{{url('findSearchData')}}",
 method:'post',
 data:{filterType:filterType,data:val,brandVal:brandVal,brandId:brandId,"_token":'{{csrf_token()}}'},  
 success:function(data){
  $('#ajaxProductList').html(data);

 }
 });
 }
/*------------- Add To Cart --------------*/

function add_to_cart(product_id,qty_id,price_id){
 $.ajax({
 url:"{{url('add_to_cart')}}",
 method:'post',
 data:{product_id:product_id,qty_id:qty_id,price_id:price_id,"_token":'{{csrf_token()}}'},  
 success:function(data){
 $('.pointer').show();
 $('.pointer').delay(3000).fadeOut('slow');
$('#pageCounter'+product_id).show();
$('#pageCart'+product_id).hide();
 }
 });
 setTimeout(function(){
 getCartCount();

 },1000)
}

/*----------- Pagination Fetch Data -----------*/
$(document).on('click','.paginationValue a', function(e){
e.preventDefault();
var filterType='';
var orderType='';
var brandType='';
var brandId='';

orderType=$('.OrderFilter').val();
filterType = $('input[name="radioFilter"]:checked').val();

brandType=$('#brandVal').val();
brandId=$('#brandId').val();

var page=$(this).attr('href').split('page=')[1];
$.ajax({
url:"{{url('get_ajaxPaginationData')}}"+'?page='+page,
data:{filterType:filterType,orderType:orderType,brandType:brandType,brandId:brandId},
success:function(data){
$('#ajaxProductList').html(data);
}
});
});

/*----------- Pagination Fetch Data -----------*/

 function countDown(id){
 var InitalCount=$('#getCounterValue'+id).val();
 $.ajax({
 url:"{{url('countDown')}}",
 method:'post',
 data:{id:id,InitalCount:InitalCount,"_token":'{{csrf_token()}}'},  
 success:function(data){
$('#getCounterVal').val(data);
$('.pointer').html('Item update To cart');
$('.pointer').show();
$('.pointer').delay(3000).fadeOut('slow');
$('#getCounterValue'+id).val(data);
 }
 });
}
 
 function countUp(id){
 var InitalCount=$('#getCounterValue'+id).val();
 $.ajax({
 url:"{{url('countUp')}}",
 method:'post',
 data:{id:id,InitalCount:InitalCount,"_token":'{{csrf_token()}}'},  
 success:function(data){
$('#getCounterVal').val(data);
$('.pointer').html('Item update To cart');
$('.pointer').show();
$('.pointer').delay(3000).fadeOut('slow');
$('#getCounterValue'+id).val(parseInt(data));
 // document.getElementById("getCounterVal"+id).value = data;
 }
 });
 }

 function updateCart(id){
 var eachCount=$('#getCounterValue'+id).val();
 $.ajax({
 url:"{{url('update-cart-product-list-page')}}",
 method:'post',
 data:{id:id,count:$('#getCounterValue'+id).val(),"_token":'{{csrf_token()}}'},  
 success:function(data){

if(Number(data)>Number(eachCount)){
setTimeout(function(){
var new_eachCount=$('#getCounterValue'+id).val();
if(Number(data)>Number(new_eachCount)){
$('#getCounterValue'+id).val(data);
}
},3000)
}else{
$('.pointer').html('Item update To cart');
$('.pointer').show();
$('.pointer').delay(3000).fadeOut('slow');
}

}
})
}


</script>
@endsection
@endsection