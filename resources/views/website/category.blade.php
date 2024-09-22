@extends('website.layout.layout')
@section('title',$categoryName[0]->meta_title)
@section('meta_description',$categoryName[0]->meta_des)
@section('meta_keywords',$categoryName[0]->meta_keyword)
@section('content')
<?php 
    use City;
    if(empty(session()->get('locationId'))){
    $cityData=City::orderBy('id','ASC')->limit('1')->get();
    session()->put('locationId',$cityData[0]->id);
    $cityId=session()->get('locationId');
    }else{
    $cityId=session()->get('locationId');
    } 
?>
<style>
    ul.breadcrumb li+li:before {
    padding: 8px;
    color: #fff;
    content: "/\00a0";
}
.categories-slider img
{
    width:100%;
}
.text-center a:hover{
      text-decoration: underline;
      text-decoration-color: #e88f16;
}

@media(max-width:320px)
{
    .community .container-fluid .cont {
    margin-top: -4% !important;
}
}
@media(max-width:375px)
{
    .community {
    min-height: 20vh!important;
}

.categories-page-image img {
    min-width: 100%!important;
    padding: 10px!important;
}
.categories-slider .content-overlay
{
    width:100%;
}
.cont h1 {
    margin: -44px 0 0 -80px!important;
}
.categories-page-image img {
    min-width: 100%!important;
}
}
@media(max-width:414px)
{
    .cont h1
    {
        margin: -60px 0 0 -80px;
    }
    .categories-slider img
    {
        height:110px!important;
        width:auto;
    }
    .categories-slider {
    margin-top: 0px!important;
    padding-top: 30px!important;
}
/*    .community .cont {*/
/*    padding: 100px 100px 0 100px;*/
/*}*/
    .cont ul.breadcrumb {
    margin: 0px 0 auto -87px !important;
}
.community
{
    height:18vh!important;
}
.categories-slider
{
        margin-top: 30px;
}
.categories-page-image img
{
     min-width: 100%!important;
}
.hover-box-m img {
    min-height: 200px !important;
    margin-bottom: 10px!important;
    margin-top: 20px;
}
}
  @media screen and (max-width: 480px) {
      .openbutton, img {
    width: 25%;
}
.hover-box-m img{
    width:100% !important;
}

ul.breadcrumb {
    margin: 90px 0 auto -210px !important;
}
.cont {
    padding: 82px!important;
}
.categories-page-image img {
    max-width: 70%!important;
    padding: 20px!important;
}

}




@media (max-width: 414px){
.community {
    margin-top: -2px !important;
    height: 13vh;
}
.categories-page-image img {
    max-width: 87%!important;
    padding: 18px!important;
    min-height:200px!important;
}

element.style {
    color: black;
    padding: 0px;
}
.categories-page-image h5{
    font-weight:600 !important;
}
.swiper-slide-active img{
  
    width: 251.667px;
    margin-right: 10px;
    /*margin-left:75px ;*/
}
}
</style>
<section class="community">
    <div class="container-fluid">
         <div class="row">
               <div class="col-md-12 cutdiv p0">
                     <div class="cont">
                           <h1>Category</h1>
                             <ul class="breadcrumb text-left" style="margin-top: 0px !important;padding: 10px 8px;color:white !important">
        <li><a style="color: white;" href="#">Category</a></li>
        <li><a style="color: white;" href="#">{{$categoryName[0]->name}}</a></li>
    
      </ul>
                     </div>  
                </div>
         </div>  
    </div> 
</section>

	<!-- header -->
     <!-- categories-slider-->
     <section class="categories-slider"  style="margin-top: 60px;">
     <div class="swiper2 swiper-container ">
        <div class="swiper-wrapper">
          @foreach($parenCatData as $parenCatDataVal)

<?php if(in_array($cityId,explode(',',$parenCatDataVal->city))){
?>
             <div class="swiper-slide">
               <a href="{{url('category/'.$parenCatDataVal->url_slug)}}" style="text-decoration:none;color:#fff">
               <img src="{{asset('uploads/productCategory/'.$parenCatDataVal->img)}}" style="height:100px" alt="#" class="img-fluid"></a>
               <div class="content-overlay">
               <a href="{{url('category/'.$parenCatDataVal->url_slug)}}" style="text-decoration:none;color:#fff"><p class="text-center">{{$parenCatDataVal->name}}</p></a>
             </div>
             </div>
<?php
}else{

}
?>
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
   <section class="categories-page-image" style="padding:0px 10px 40px 10px">
             <div class="container">
                   <div class="row text-center">
                    @foreach($childProductCategory as $childProductCategoryData)
                        <div class="col-md-3" style="margin-top:15px;width
                        
                        :50%;">
                              <div class="hover-box-m">
                                   <a href="{{url('category/'.$childProductCategoryData->url_slug)}}"><img src="{{asset('uploads/productCategory/'.$childProductCategoryData->img)}}" width="100%" style="box-shadow:0px 0px 8px silver;margin-bottom:10px;height:255px;"></a>
                                   <a href="{{url('category/'.$childProductCategoryData->url_slug)}}"><h5  style="color:black;padding:0px">{{$childProductCategoryData->name}}</h5></a>
                              </div>
                        </div>
                     @endforeach   
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
</script>
@endsection
@endsection