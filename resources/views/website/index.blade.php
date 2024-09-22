@extends('website.layout.layout')
@section('content')
<?php 
    use App\City;
    if(empty(session()->get('locationId'))){
    $cityData=City::orderBy('id','ASC')->limit('1')->get();
    session()->put('locationId',$cityData[0]->id);
    $cityId=session()->get('locationId');
    }else{
    $cityId=session()->get('locationId');
    } 
?>
<style>
   .owl-nav button.owl-prev { left: -43px; }
   .owl-nav button.owl-next { right: -13px; }
.navbar-expand-lg .navbar-nav .nav-link
{
        padding: 45px 13px 0px 10px !important;
}
.carousel-caption p
{
        margin-top: 50%;
}
.carousel-caption .fa.fa-angle-down
{
    font-size:25px!important;
}
#catsec
{
    padding-top:10px;
}
@media(max-width:360px)
{
    #demo .carousel-inner {
    height: 430px!important;
}
.carousel-indicators {
    bottom: 240px!important;
}
}
@media(max-width:414px)
{
    .owl-nav button.owl-next {
    right: -13px;
    top: 40%;
}
.carousel-control-next-icon, .carousel-control-prev-icon
{
    width:10px;
    height:10px;
    top: 20px;
}
#demo .carousel-inner {
    height: auto!important;
}
#catsec {
    padding-top: 70%;
}
.carousel-indicators {
    bottom: 300px;
}

 .hover-list:hover ul li {
    padding-top: 5px!important;
    background: white;
    display: block;
    box-shadow: 0 0 2rem 0 rgb(136 152 170 / 18%) !important;
    padding-bottom: 5px;
    padding-left: 5px;
}
.hover-list:hover ul
{
    margin-top: 5px;
    min-width: 50px;
    position: absolute;
    z-index: 1;
    margin-left: -5px;
}
}

@media(max-width:375px)
{
    #demo.carousel
    {
        margin-top:166px!important;
    }
    .carousel-indicators {
    bottom: 330px!important;
}
#demo .carousel-inner {
    height: auto!important;
}

}
@media(max-width:320px)
{
    .bg-gradient {
    height: 1100px!important;
}
}
  @media screen and (max-width: 480px) {
      .excel-lego1{
          padding-top:22px !important;
      }

       .excel-lego2{
          margin-top:10px !important;
      }
      .excel-lego{
          margin-top:-1px !important;
      }
.openbutton, img {
    width: 100% !important;
}
.carousel {
    margin-top: 90px!important;
    margin-bottom: -100px;
}

   .owl-nav button.owl-prev {
    left: -10px;
}
.testimonials .testi .item .profile img {
    border-radius: 80%;
    width: 50px;
    height: 92px;
    object-fit: contain;
    margin-top: -5px;
}
.testimonials .testi .item .profile .information {
    padding-left: 0px !important;
    margin-bottom: 20px;
}

}
#name-error{
    
        position: absolute;
    top: 50px;
    left: 85px;
}
#email-error{
    
        position: absolute;
       top: 135px;
    left: 152px;

}
#product_id-error{
      position: absolute;
       top: 221px;
    left: 237px;
}
#des-error{
         position: absolute;
    top: 307px;
    left: 113px;
}

.theme-btn-2 {
    text-decoration: none;
    color: #fff;
    font-weight: 400;
    font-size: 19px;
    padding: 5px 26px;
    background-image: linear-gradient(to right, #f8c729 , #e99016);
    border-radius: 5px;
    border: none;
    margin-top: 10px;
}
.theme-btn {
    text-decoration: none;
    color: #fff;
    font-weight: 500;
    font-size: 19px;
    padding: 8px 24px;
    background-image: linear-gradient(to right, #f8c729 , #e99016);
    border-radius: 5px;
}

.owl-carousel .owl-item img {
    display: block;
    width: 90%;
     box-shadow: 0px 2px 12px grey;
     
}
#carousel .item{
           padding: 12px 0px;
           margin-right:10px;
           transition: transform 0.5s;

        }
           #carousel .item:hover{
           transform:  translateY(-10px);
         }
 .box1 h4 {
    font-weight: 600;
    font-size: 1.1em !important;
    margin-top: 18px !important;
}
.testimonials {
    position: relative;
    background-repeat: no-repeat;
    background-size: cover;
    padding: 10px 0 50px 0 !important;
}
 
</style>
<style>
    @media screen and (max-width: 480px) {
        .carousel {
    margin-top: 0px!important;
    margin-bottom: -100px;
}
.background-color-one .item {
    width: 60%;
    margin: 0px auto 0px 60px;
}
.testimonials .testi .item .profile img {
    border-radius: 80% !important;
    width: 93px !important;
    height: 92px !important;
    object-fit: contain;
    margin-top: -5px;
    margin-right: 12px !important;
}
.searchBoxStyle {
    margin-top: 10px;
    height: auto;
    background-color: #fbe6ad;
    position: absolute;
    z-index: 9999999;
    top: 78%;
    left: 1%;
    width: 92.5%;
    padding: 10px 0px 0 15px;
    list-style: none;
}
 .box1 h4 {
    font-weight: 600;
    font-size: .5em !important;
    margin-top: 5px !important;
}

 .box1 h5 {
   
    font-size: 9px !important
}
.box1 img{
    width:70% !important;
 
}
.cate-lego{
    margin-bottom:10px !important;
    margin-top:15px !important;
}
.cate-lego .col-md-3{
    margin-left:-10px !important;
}
.tile {
    width: 94% !important;
    margin: 10px;
    height: 100%;
    border-radius: 8px;
    cursor: pointer;
    position: relative;
    overflow: hidden;
}
.testimonials .modal {
    width:70% !important;
    
}
.cement img {
    height: 100px !important;
    width:100% !important;
}
#Vishal .modal-content {
    margin: auto;
    border: none;
    width: 85%;
    height:50%;
     margin-top:100px;
}
.modal-dialog {
    position: relative;
    width: auto;
    margin: 0 !important;
    pointer-events: none;
}
#Vishal button{
   display:none;
}

    }
    
    .c-form {
    padding: 5px 20px 20px 20px !important;
    padding-top: 19px !important;
}
.c-form input {
    border: none;
    background: #e4e4e4;
    font-size: 13px !important;
}
.c-form select {
    border: none;
    background: #e4e4e4;
    font-size: 13px !important;
}
.c-form textarea {
    border: none;
    background: #e4e4e4;
    font-size: 13px !important ;
}
.theme-btn-2 {
    text-decoration: none;
    color: #fff;
    font-weight: 400;
    font-size: 19px;
    padding: 5px 26px;
    background-image: linear-gradient(to right, #f8c729 , #e99016);
    border-radius: 5px;
    border: none;
    margin-top: 0px !important;
}
.mob-img
{
    width:50%;
}
    
</style>

  <div id="demo" class="carousel slide" data-ride="carousel" style="margin-top:90px">
    <ul class="carousel-indicators">
       @foreach($banner as $key=>$bannerData)
      <?php
      if($key==0){
      $status="active";
      }else{
      $status="";
      }
      ?>
      <li data-target="#demo" data-slide-to="{{$key}}" class="{{$status}}"></li>
       @endforeach
    </ul>
    <div class="carousel-inner" style="height:auto;width:100%;">
      @foreach($banner as $key=>$bannerData)
      <?php
      if($key==0){
      $status="active";
      }else{
      $status="";
      }
      ?>
      <div class="carousel-item <?php echo $status;?>">
      <img src="{{asset('uploads/banner/'.$bannerData->img)}}" alt="hero-img">
      <div class="carousel-caption">
       <h3><?php echo substr($bannerData->title,0,19);?><br><?php echo substr($bannerData->title,19,26);?><br><?php echo substr($bannerData->title,45,50);?></h3>
       <p><?php echo substr($bannerData->sub_title,0,60);?><br><?php echo substr($bannerData->sub_title,60,60);?><br><?php echo substr($bannerData->sub_title,120,100);?>.</p>
       <p class="animate__animated animate__bounce animate__infinite"><i class="fa fa-angle-down" aria-hidden="true" style="font-size:50px;" id="#catsec"></i></p>
      </div>   
      </div>
      @endforeach
      </div>
      
      <a class="carousel-control-prev" href="#demo" data-slide="prev">
        <span class="carousel-control-prev-icon"></span>
      </a>
      <a class="carousel-control-next" href="#demo" data-slide="next">
        <span class="carousel-control-next-icon"></span>
      </a>
  </div>
  <!-- header -->
  
  
   <!-- categories -->
        <section class="p50 categories" id="catsec">
          <div class="container">
              <div class="row">
                  <div class="col-md-12">
                        <h1 class="cate-lego text-center" style="margin-bottom:0px">Categories</h1>
                  </div>  
              </div>
              <div class="row" style="margin-bottom:-10px">

@foreach($categoryFirstFour as $categoryFirstFourData)

<?php if(in_array($city,extract(',',$categoryFirstFourData->city))){
?>
 <div class="col-lg-3 col-sm-3 col-md-3 col-xs-3 mob-img" style="margin-top:20px">
                      <div class="tile">
                        <div class="child" style="background-attachment: scroll;background:linear-gradient(rgba(0,0,0,0.4),rgba(0,0,0,0.4)),url(<?php echo asset('uploads/productCategory/'.$categoryFirstFourData->img);?>);background-size:contain;">
                        <a href="{{url('category/'.$categoryFirstFourData->url_slug)}}" style="text-decoration:none;"><p class="text-center">{{$categoryFirstFourData->name}}</p></a>
                        </div>
                      </div>
                     </div> 
<?php
}else{

} ?>       
@endforeach

              </div>  

                <div class="row">
                   @foreach($categoryAllAftFour as $categoryAllAftFourData)
                  <?php if(in_array($city,extract(',',$categoryAllAftFourData->city))){
?> 
                    <div class="col-lg-3 col-sm-3 col-md-3 col-xs-3 excel-lego" style="margin-top:20px!important;width:50%">
                      <div class="tile">
                        <div class="child" style="background-attachment: scroll;background:linear-gradient(rgba(0,0,0,0.4),rgba(0,0,0,0.4)),url(<?php echo asset('uploads/productCategory/'.$categoryAllAftFourData->img);?>);background-size:contain;">
                        <a href="{{url('category/'.$categoryAllAftFourData->url_slug)}}" style="text-decoration:none;"><p class="text-center">{{$categoryAllAftFourData->name}}</p></a>
                         </div>                             
                       </div>
                   </div>
 <?php
}else{

} ?>                  
                   @endforeach
                </div>

              <div class="row mt-30">

                   <div class="col-md-12  text-center" style="margin-top:15px">
                        <a href="{{url('shop')}}" class="theme-btn">Shop Now</a>
                   </div>
              </div>  
          </div>
        </section>

      <!-- categories end -->

      <!-- shop by brand -->
           <section class="background-color-one p50">
          <div class="container">
              <div class="row">
                  <div class="col-md-12">
                        <h1 class="text-center excel-lego2">Shop by Brand</h1>
                  </div>  
              </div>
             
              <div class="row pt-40 excel-lego1">
                <div class="col-md-12">
               <div class="owl-slider">
<div id="carousel" class="owl-carousel">
   @foreach($brand as $brandData)
   <a href="{{url('brand/'.$brandData->url_slug)}}">
  <div class="item">
  <img class="owl-lazy" data-src="{{asset('uploads/brandLogo/'.$brandData->logo)}}" alt="" style="height:200px">
  </div></a>
   @endforeach
</div>
</div>  
                </div>  
              </div>  
              <!--mobile view-->
                
    <div class="row pt-40 mobileshop-by-brand" id="getMoreBrand">
      <!--mobile view-->            
    @foreach($brand as $key=>$brandData)
    @if($key>8)
    @else
   <div class="col-md-2" style="width:33.3%;padding:10px;">
   <a href="{{url('brand/'.$brandData->url_slug)}}">
   <img class="" src="{{asset('uploads/brandLogo/'.$brandData->logo)}}" alt="" style="width:90%!important;height:80px">
   </a>
   </div>
    @endif 
   @endforeach
    <div class="col-md-12  text-center" style="margin-top:15px">
    <a href="javascript:void(0)" onclick="getMoreBrand()" class="theme-btn">Show More</a>
    </div>  
  </div>  
              </div> 
              <!--mobile view-->
          </div>
        </section>
       <!-- shop by brand -->

          <!-- shop by brand -->


<!-- shop by brand -->
           <section class=" cement">
          <div class="container">
              <div class="row">
                  <div class="col-md-12" style="padding-top:45px">
                        <h1 class="text-center excel-lego2">Best Selling</h1>
                  </div>  
              </div>
              <div class="row p40" style="padding-top:35px">
          <div class="col-md-6">
        
          </div>
            <div class="col-md-12 col-md-6">
              <div class="row text-center">
            @foreach($bestProduct as $bestProductData)
                 <div class="col-md-3 col-sm-3" style="width:50%;padding:10px;padding-top:0px">
                       <div class="box1">
                        
                        @if($bestProductData->rfq_status=='1')
                        <a href="{{url('rfq/'.$bestProductData->id)}}"><img src="{{asset('uploads/productImg/'.$bestProductData->image)}}" width="80%" height="150px"></a>
                        <a href="{{url('rfq/'.$bestProductData->id)}}" style="text-decoration:none;color:black">
                         <h4 class="text-center">{{$bestProductData->name}}</h4></a>
@else
                        <a href="{{url('product-details/'.$bestProductData->url_slug)}}"><img src="{{asset('uploads/productImg/'.$bestProductData->image)}}" width="80%" height="150px"></a>
                        <a href="{{url('product-details/'.$bestProductData->url_slug)}}" style="text-decoration:none;color:black">
                         <h4 class="text-center">{{$bestProductData->name}}</h4></a>
@endif                   
                          <h5 style="font-size:14px" class="text-center">
@if($bestProductData->rfq_status=='1')
RFQ
@else
Rs
 {{$bestProductData->price}}/
 @if($bestProductData->diameter)
 {{$bestProductData->diameter}} 
 @else

 @endif 
  {{$bestProductData->qty}}
@endif
       
                          </h5>
                        </div>   
                   </div>
              @endforeach 
                 </div>
           </div>
          
          </div>
          <div class="row mt-30">

                   <div class="col-md-12  text-center" style="margin-top:-36px">
                        <a href="{{url('shop')}}" class="theme-btn">Show More</a>
                   </div>
              </div>    
                </div>  

        </section>
       <!-- shop by brand -->

       <!-- shop by brand -->

       <!-- testimonial -->
           <section class="testimonials p50">
              <div class="container">
              <div class="row">
              <div class="col-md-12" style="margin-top:30px">
              <h1 class="text-center">
              Here’s Why 15,000+ Customers Order Building
              Materials from Sitesupply
              </h1>
              </div>  
              </div>
              
              <div class="row" style="margin-top:20px;">
                 <div class="col-md-12">
                       <div class="owl-carousel owl-theme testi">
              <!-- Single Starts -->
                 @foreach($testimonial as $testimonialData)
                  <div class="item">
                  <div class="profile">
                   <img src="{{asset('uploads/testimonial/'.$testimonialData->img)}}" alt="">
                      <div class="information">
                           <p>{{$testimonialData->name}}</p>
                          <span>{{$testimonialData->designation}}</span>
                      </div>
                    </div>
                    <p class="text-justify">
                   {!! substr($testimonialData->des,0,250) !!}
                     
                    </p>
                    <center onclick="getTestimonialData(<?php echo $testimonialData->id?>)"><a href="javascript:void(0)" style="text-align:center;padding-top:10px;text-decoration:none;color:#f7c228">Read More</a></center>
                    </div>
                   @endforeach 
                  </div>
                  </div> 
                  </div>  
                  </div>  
                </section>
       <!-- testimonial -->
       <!-- contact us -->
           <section class="bg-gradient p50" style="height:600px">
              <div class="container">
                   <div class="row">
                   <div class="col-md-6 text-col">
                  <h1>Contact Us</h1>
                  <h3><b>For</b> Corporate or Bulk Enquiry</h3>
 <p>{!! $cmpAddress->description !!}</p>
 <h4>Lucknow</h4>
 <ul>
  <li><i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;&nbsp;
  {{$cmpAddress->location}}
  </li>
  <li><i class="fa fa-envelope" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;&nbsp;{{$cmpAddress->email}}</li>
  <li><i class="fa fa-phone" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;&nbsp;+91-{{$cmpAddress->contact_no}}</li>
 </ul>
                   </div>

                       <div class="col-md-6 form-side">
                       <div class="c-form">
                        <form id="enquiryForm" method="post" action="{{url('store-enquiry')}}">
                          <div class="form-group">
                             <label>Name</label>
                             <input type="text" name="name" class="form-control name" placeholder="Name">
                          </div>  
                          @csrf
                         <div class="form-group">
                             <label>Contact Number</label>
                             <input type="text" name="contactNo" class="form-control contactNo" placeholder="Contact No">
                          </div>
                          <div class="form-group">
                             <label>Email Address</label>
                             <input type="text" name="email" class="form-control email" placeholder="Email">
                          </div>

                          <div class="form-group">
                             <label>Material you want to buy </label>
                             <select class="form-control product_id" name="product_id">
                              <option value="">-- Select Product ---</option>
                              @foreach($product as $productData) 
                              <option value="{{$productData->id}}">{{$productData->name}}
                              </option>
                              @endforeach    
                             </select>
                          </div>

                          <div class="form-group">
                             <label>Message</label>
                            <textarea class="form-control des" name="des" placeholder="Message.."></textarea>
                          </div>

                          <center><button type="submit" class="theme-btn-2">Submit</button></center>
                        </form>
                    </div>
                   </div> 
              </div>  
            </div>
           </section>
           
        <div class="modal fade" id="Vishal" tabindex="-1" aria-labelledby="VishalModalLabel" aria-hidden="true" style="width:100%;z-index:999999999">
        <div class="modal-dialog" style="width:100%;z-index:99999999999;margin-top:150px;">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="position: absolute;
    right: -20px;
    z-index: 99999999999;
    background: linear-gradient(to right, #f7c328, #e88f16);;
    border-radius: 50%;
    height: 40px;
    width: 40px;
    line-height: 40px;
    top: -20px;cursor:pointer">
          <span aria-hidden="true" style="font-size: 40px;top:0px;">&times;</span>
        </button>
            <div class="modal-content" style="border-radius: 15px;">

                <div class="modal-dialog modal-dialog-centered" id="getTestimonialDataForReadMore" style="width:100%">

                   
                </div>

            </div>
        </div>
    </div>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js'></script>

       <!-- contaxt us -->
@endsection
@section('script')
<script>
    
function getTestimonialData(id){
 $.ajax({
 url:"{{url('get-more-testimonial-data')}}",
 method:'post',
 data:{id:id,"_token":'{{csrf_token()}}'},  
 success:function(data){
 $('#getTestimonialDataForReadMore').html(data);   
 setTimeout(function(){
  $('#Vishal').modal('show');
 },800)    

 }
 });

}

function getMoreBrand(){
 $.ajax({
 url:"{{url('getMoreBrand')}}",
 method:'post',
 data:{"_token":'{{csrf_token()}}'},  
 success:function(data){
 $('#getMoreBrand').html(data);   
  }
 });
}
</script>
@endsection

<script>
        /* ==============================================
     LOADER -->
     =============================================== */

    /* ==============================================
     LOADER -->
     =============================================== */
</script>
