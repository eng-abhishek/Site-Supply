@extends('website.layout.layout')
@section('title',$productData[0]->meta_title)
@section('meta_description',$productData[0]->meta_des)
@section('meta_keywords',$productData[0]->meta_keyword)
@section('content')
 <style>
        .star-rating {
            animation: fade 5s;
            direction: rtl;
            display: inline-block;
            padding: 20px
        }
        span {
            animation: fade 2s;
        }
        .star-rating input[type=radio]{
            display: none
        }
        .star-rating label{
            color: #bbb;
            font-size: 18px;
            padding: 0;
            cursor: pointer;
            -webkit-transition: all .3s ease-in-out;
            transition: all .3s ease-in-out
        }
        .star-rating label:hover,
        .star-rating label:hover~label,
        .star-rating input[type=radio]:checked~label{
            color: #f2b600
        }
        
        span {
            font-size: 1.3em;
            font-weight: 500;
            color: #2b2f7f;
        }
        
        textarea {
            width: 100%;
            height: 100%;
        }
        
        .grid {
            grid-template-rows: 1fr 1fr;
        }
        body{
            background-color:#FAFAFA;
        }
        .product-detail img {
        border-right: none !important;
        }
        .padding50 {
        padding: 20px 0 50px 0;
        }
        @media screen and (max-width: 480px) {
            ul.breadcrumb {
    margin-left: -5px!important;
    justify-content: center!important;
    text-align: center!important;
    margin: -1px 0 auto 0px !important;
}
.owl-stage-outer {
        height: 243px;
  /*  margin-left: 48px !important;*/
}
       }
       @media screen and (max-width: 480px) {
    .openbutton, img {
    width: 25%;
}
}
    </style>
<hr>
<section class="sub-nav" style="background-color:#FAFAFA;">
    <div class="container">
    <div class="row">
    <ul class="breadcrumb text-left">
        <li><a href="#">Shops</a></li>
        <li><a href="#">{{$productData[0]->category_name}}</a></li>
        <li><a href="#">{{$productData[0]->name}}</a></li>
        <li><a href="#">Detail</a></li>
    </ul>
    </div>
    </div>
</section>
<section class="product-detail padding50">
    <div class="container">
            <div class="row" style="background-color:white;">
            <div class="col-lg-4 col-md-4 col-sm-12" style="padding-top:15px">
            <img src="{{asset('uploads/productImg/'.$productData[0]->image)}}" alt="">
            </div>
            <div class="col-lg-8 col-md-8 col-sm-12" style="border-left: 1px solid rgb(209,209,209) !important;padding-top:20px;padding-bottom:20px ">
             <h1><?php echo $productData[0]->name;?>  <span><strong>Categories:</strong><?php echo $productData[0]->category_name;?></span></h1>
              @if($productData[0]->rfq_status=='1')
              @else
             <h2>Rs.{{$productData[0]->price}} <img src="{{asset('assets/front-end/img/rating-star.jpg')}}" alt="" style="width:10%"> <span>({{$total_commpent}} customer review)</span></h2>
             @endif
             <p>
            <?php echo $productData[0]->product_short_des;?>
            </p>
            <hr>
            <div class="col-lg-12">
            <div class="number pageCounter" style="display:none">
           <input type="text" hidden name="productId" id="productId" value="<?php echo $productData[0]->id;?>">   
  <a href="javascript:void(0)" onclick="countDown(<?php echo $productData[0]->id;?>)"><span class="minus">-</span></a>
  <input type="number" value="<?php echo $productData[0]->min_order_count;?>" onkeyup="updateCart(<?php echo $productData[0]->id;?>)" id="getCounterVal" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"  maxlength = "5">
  <a href="javascript:void(0)" onclick="countUp(<?php echo $productData[0]->id;?>)"><span class="plus">+</span></a>
            </div>
    @if($productData[0]->rfq_status=='1')
    <a href="{{url('rfq/'.$productData[0]->id)}}"><button type="button" class="btn btn-primary add_to_cart_btn" >RAISE  &nbsp;RFQ</button></a>
    @else 
    <button type="button" class="btn btn-primary add_to_cart_btn" onclick="add_to_cart(<?php echo $productData[0]->id;?>,<?php echo $productData[0]->qty_id;?>,<?php echo $productData[0]->price_id;?>)">Add to Cart</button>
    <button type="button" style="border-radius: 0px;background: #e88f16;border: 1px solid #e88f16;font-size: 14px;height: 35px;" onclick="proceedToCart()" class="btn btn-primary">Proceed to Cart</button>
    @endif        
            </div>
             @if($productData[0]->min_order_count>1) 
             <h5 style="font-size: 14px; color:red;margin-top:8px"><i>*(Minimum Order Qty : {{$productData[0]->min_order_count}})</i></h5>
             @else
             @endif
            </div>
            </div>
    </div>
</section>
<section class="review">
<div class="container">
<div class="row">
<div class="col-lg-12">
<div class="tab">
  <button class="tablinks description_btn" onclick="openreview(event, 'London')">Description</button>
  <button class="tablinks review_btn" onclick="openreview(event, 'Paris')">Review({{$total_commpent}})</button>
</div>
<hr>
<div id="London" class="tabcontent" style="display: block;">
  <p class="text-justify"><?php echo $productData[0]->description;?></p>
</div>
<div id="Paris" class="tabcontent">
<div id="commentRating">
@include('website.comment_review_ajax')
</div>
<form method="post" action="{{url('product-review')}}">
  <div class="form-group">
    <label for="exampleInputEmail1">Enter Your Review</label>
    <textarea placeholder="Enter Your Review" name="comment" class="form-control"></textarea>
  </div>

<div style="font-size: 1.4em; font-weight: 500; width: max-content; margin: auto; padding-left: 0px; padding-right: 0px;">
 Rate Us
<div class="star-rating">
  <input type="radio" name='rating' id="5-stars" value="5"/>
  <label for="5-stars" class="star">&#9733;</label>
  <input type="radio" name='rating' id="4-stars" value="4"/>
  <label for="4-stars" class="star">&#9733;</label>
  <input type="radio" name='rating' id="3-stars" value="3"/>
  <label for="3-stars" class="star">&#9733;</label>
  <input type="radio" name='rating' id="2-stars" value="2"/>
  <label for="2-stars" class="star">&#9733;</label>
  <input type="radio" name='rating' id="1-star" value="1" required=""/>
  <label for="1-star" class="star">&#9733;</label>
</div>
@csrf
</div>

<input type="text" id="loginUserId" value="{{session()->get('logedIn')}}" hidden="">
<input type="text" name="productId" value="{{$productData[0]->id}}" hidden="">
  <div class="form-group">
    <button type="submit" class="btn btn-warning productRating">Submit</button>
  </div>
</form>
</div>

</div>
</div>
</div>
</section>
<section class="background-color-one padding50 related-product">
          <div class="container">
              <div class="row">
                  <div class="col-md-12">
                        <h1 class="text-left">Related Products</h1>
                  </div>  
              </div>
              <div class="row pt-20">
                <div class="col-md-12">
<div class="owl-slider">
<div id="carousel" class="owl-carousel owl-loaded owl-drag">  
<div class="owl-stage-outer owl-height" style="height: 217px;">
<div class="owl-stage" style="transform: translate3d(0px, 0px, 0px); transition: all 0.8s ease 0s; width: 1332px;">
@foreach($productCate as $productCateData)
<div class="owl-item active" style="width: 222px;">  
<div class="item" style="margin:10px">
    <a href="{{url('product/'.$productCateData->url_slug)}}"><img class="owl-lazy" data-src="{{asset('uploads/productImg/'.$productCateData->image)}}" alt="" src="{{asset('uploads/productImg/'.$productCateData->image)}}" style="background:#e88f16!important;opacity:1;height:160px;"></a>
    <a href="{{url('product/'.$productCateData->url_slug)}}" style="text-decoration:none;padding-top:10px"><h4 style="padding-top:20px">{{$productCateData->name}}</h4></a>
     <h5>Rs {{$productCateData->price}}</h5>
 </div>
</div>
  @endforeach
</div>
</div>
<div class="owl-nav">
<button type="button" role="presentation" class="owl-prev"><span aria-label="Previous">‹</span></button>
<button type="button" role="presentation" class="owl-next"><span aria-label="Next">›</span></button></div>
<div class="owl-dots disabled"></div></div>
</div>  
                </div>  
              </div>    
          </div>
        </section>
@section('script')

  <script type="text/javascript">
       $(document).ready(function(){
       // $('.pageCounter').hide();
       setTimeout(function(){
       checkProductCount();
        },1000)

  jQuery("#carousel").owlCarousel({
  autoplay: true,
  lazyLoad: true,
  rewind: true,
  margin: 10,
   /*
  animateOut: 'fadeOut',
  animateIn: 'fadeIn',
  */
  responsiveClass: true,
  autoHeight: true,
  autoplayTimeout: 7000,
  smartSpeed: 800,
  dots:false,
  nav: true,
  responsive: {
    0: {
      items: 1
    },

    600: {
      items: 4
    },

    1024: {
      items: 5
    },

    1366: {
      items: 5
    }
  }
});

 $('.testi.owl-carousel').owlCarousel({
  items: 3,
  margin:10,
  lazyLoad: true,
  dots:true,
  autoPlay: true,
  autoPlayTimeout: 3000,
  responsive:{
    0:{
      items:1,
    },
    600:{
      items:2,
    },
    1000:{
      items:3,
    }
  }
});
       });

/*------------- Add To Cart --------------*/

function add_to_cart(product_id,qty_id,price_id){
 $.ajax({
 url:"{{url('add_to_cart')}}",
 method:'post',
 data:{product_id:product_id,qty_id:qty_id,price_id:price_id,"_token":'{{csrf_token()}}'},  
 success:function(data){
 $('.pageCounter').show();
 $('.add_to_cart_btn').hide();
 
 }
 });
 setTimeout(function(){
 getCartCount();
 //checkProductCount();

 },1000)
}
 getCartCount();

 function countDown(id){
 var InitalCount=$('#getCounterVal').val(); 
 $.ajax({
 url:"{{url('countDown')}}",
 method:'post',
 data:{id:id,InitalCount:InitalCount,"_token":'{{csrf_token()}}'},  
 success:function(data){
// $('#getCounterVal').val(data);
document.getElementById("getCounterVal").value=Number(data); 
$('.pointer').html('Item update To cart');
$('.pointer').show();
$('.pointer').delay(3000).fadeOut('slow');

 }
 });
}
 
 function countUp(id){
 var InitalCount=$('#getCounterVal').val(); 
 $.ajax({
 url:"{{url('countUp')}}",
 method:'post',
 data:{id:id,InitalCount:InitalCount,"_token":'{{csrf_token()}}'},  
 success:function(data){
//$('#getCounterVal').val(data);
document.getElementById("getCounterVal").value=Number(data); 
$('.pointer').html('Item update To cart');
$('.pointer').show();
$('.pointer').delay(3000).fadeOut('slow');

 }
 });
 }

function checkProductCount(){
 var InitalCount=$('#getCounterVal').val(); 
 var id=$('#productId').val();
 $.ajax({
 url:"{{url('checkProductCount')}}",
 method:'post',
 data:{id:id,InitalCount:InitalCount,"_token":'{{csrf_token()}}'},  
 success:function(data){
 if(data>0){
document.getElementById("getCounterVal").value=Number(data); 
$('.pageCounter').show();
$('.add_to_cart_btn').hide();
 } 
 }
 });
}

/*---------------- rating product ------------*/

$('.productRating').on('click',function(e){
if($('#loginUserId').val()){

return true;
}else{
alert('Oop`s you would required to login for review & comments');
return false;
}
});

/*--------- review ---------------*/
 
$(document).on('click','.paginationValue a', function(e){
e.preventDefault();
var id=$('#productId').val();
var page=$(this).attr('href').split('page=')[1];
$.ajax({
url:"{{url('get_ajax_comment_rating')}}"+'?page='+page,
data:{id:id},
success:function(data){
$('#commentRating').html(data);
}
});
});

 function updateCart(id){
 var eachCount=$('#getCounterVal').val();

 $.ajax({
 url:"{{url('update-cart-product-list-page')}}",
 method:'post',
 data:{id:id,count:$('#getCounterVal').val(),"_token":'{{csrf_token()}}'},  
 success:function(data){

if(Number(data)>Number(eachCount)){
setTimeout(function(){
var new_eachCount=$('#getCounterVal').val();
if(Number(data)>Number(new_eachCount)){
$('#getCounterVal').val(data);
}
},3000)
}else{
$('.pointer').html('Item update To cart');
$('.pointer').show();
$('.pointer').delay(3000).fadeOut('slow');
}
}
});
}

function proceedToCart(){
  alert($('.badge').html());
  if($('.badge').html()<=0){
  alert('Oop`s your Cart Is Empity');
  return false;
  }else{
  window.location.href='<?php echo url('cart')?>';
  }

}
    </script>
@endsection
@endsection