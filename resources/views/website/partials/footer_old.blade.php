 <!-- footer -->
 
 
  <style>

   .new {
  padding: 25px 0px;
}

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
 

      <section class="footer">
  <div class="container">
    <div class="row">
      <div class="col-lg-2 col-md-4 col-sm-12">
        <h5>ABOUT</h5>
        <ul>
        <li><a href="{{url('about-us')}}">About Us</a></li>
        <li><a href="{{url('why-buy-from-site-supply')}}">Why Buy From SiteSupply</a></li>
       </ul>
      </div>
      <div class="col-lg-2 col-md-4 col-sm-12">
        <h5>HELP</h5>
        <ul>
        <li><a href="{{url('tern-and-condition')}}">Terms & Conditions</a></li>
        <li><a href="{{url('privacy-policy')}}">Privacy Policy</a></li>
        <li><a href="{{url('return-policy')}}">Refund & Cancellation</a></li>
       </ul>
      </div>
      <div class="col-lg-2 col-md-4 col-sm-12">
        <h5>SOCIAL</h5>
        <ul>
        <li><a href="#">Facebook</a></li>
        <li><a href="#">LinkedIn</a></li>
        <li><a href="#">Twitter</a></li>
       </ul>
      </div>
      <div class="col-lg-3 col-md-4 col-sm-12">
        <h5>RESOURCES</h5>
        <ul>
        <li><a href="#">Press</a></li>
        <li><a href="{{url('material-calculation')}}">Material Calculator</a></li>
       </ul>
      </div>
      <div class="col-lg-3 col-md-4 col-sm-12 pay-option">
        <h5>PAYMENT OPTION</h5>
        <ul>
        <li><a href=""><img src="{{asset('assets/front-end/img/visa.jpg')}}" alt=""> 
        <img src="{{asset('assets/front-end/img/master-card.jpg')}}" class="img2" alt=""></a></li>

        <li><a href=""><img src="{{asset('assets/front-end/img/paytm.jpg')}}" alt=""></a></li>
       </ul>
      </div>
    </div>
  </div>
</section>

<section class="copyright">
  <div class="container">
  <div class="row">
  <div class="col-lg-12 text-center">
  <span>&copy; 2020 SiteSupply Ltd. Trademarks and brands are the property of their respective owners.</span>
  </div>
  </div>
</div>
</section>

<!--   login Code  -->

<!-- Modal -->
<!-- <script src="https://kit.fontawesome.com/a076d05399.js"></script> -->
<div class="modal fade"  id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="top: -50px;position: fixed; z-index: 1111111;">
  <div class="modal-dialog"  style="position: fixed; right: 0px; background-color: white; top: -28px;">

    <div class="modal-content">      
      <div id="popup" >
        <div class="bg-image"></div>
        <div class="head">
          <div class="row">
            <div class="col-10 col-lg-10">
              <img src="{{asset('assets/front-end/img/Login_logo.png')}}" alt="">
            </div>
            <div class="col-2 col-lg-2" style="float: right;">
              <div id="btn1" data-bs-dismiss="modal" style=" outline:none; border:none">
                <svg color="white" style="font-size:1em;" xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
  <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
</svg>
              </div>
            </div>
          </div>
        </div>

        <div id="content" style="margin-top: 80px !important;">
          <div class="form">
            <h4 style="letter-spacing: -0.11px;">Sign In / Sign Up</h4>

            <input type="tel" id="mobile_no" autocomplete="off" name="mobile_no" placeholder="Enter Mobile Number">
            <button style="outline:none" type="button" onclick="lego()"> Proceed</button>
<!-- 
            <input type="tel" id="userinput" name="" placeholder="Enter Mobile Number">
            <button style="outline:none" type="submit" onclick="lego()"> Proceed</button> -->
 
                 <br>
                 <div class="new">
  <form>
    <div class="lego-form-group">
      <input type="checkbox" id="html">
      <label for="html">
         <h6  style="font-size: 0.8em; padding-left:5px;margin-top:-19px !important;margin-left:14px">
              By signing in you agree to our
              <span style="font-size: 1em; top:0px">terms and conditions</span>
            </h6>
      </label>
    </div>
  </form>
           </div>
          </div>
        </div>
        
        <div id="content1">
          <div class="form">
           <h4 style="letter-spacing: -0.11px;">Sign In / Sign Up</h4>
            <div style="width: 100%; text-align:center; margin-top:32px;">
              <h5 style=" font-size:1em;font-weight:600" id="showOtp">
              </h5>
            </div>
            <div>
              <input style="width: 95%; position:relative; margin-top:10px" type="text" name="otp" id="btnMatchOtp" autocomplete="off" placeholder="Enter OTP">
              <a href="javascript:void(0)" onclick="resendOTP()" style="font-size: 0.8em; position:absolute; top:375px; right:50px">Resend OTP</a>
            </div>
             <button style="outline:none;background:#FF9800 !important" type="button" onclick="btnMatchOtp1()">Login</button>
          <br>
           
          </div>
        </div>

      </div>
    </div>
  </div>
</div>
<!-- end login -->



   <!-- footerr -->
   <!-- scripts -->
   <!--      <script src="{{asset('assets/front-end/js/jquery.min.js')}}"></script> -->
        <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js'></script>
         <script type="text/javascript" src="{{asset('assets/front-end/js/custom.js')}}"></script>
         <script src='https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js'></script>
        <script type="text/javascript" src="{{asset('assets/front-end/js/bootstrap.min.js')}}"></script>

        <script src='https://unpkg.com/swiper/swiper-bundle.min.js'></script>
        <script src="https://kit.fontawesome.com/a076d05399.js"></script>
<!-- for login  -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
<!-- end login -->
<!--- js validation --->
 <script src="{{asset('assets/jquery-validation/js/jquery.validate.min.js')}}" type="text/javascript"></script> 
  <script src=" https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js" type="text/javascript"></script> 

 <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<!--- End js validation --->
    <!-- scripts -->
    <script type="text/javascript">
    
$("#enquiryForm").submit(function(){
var name=$("#enquiryForm .name").val();
var email=$("#enquiryForm .email").val();
var product_id=$("#enquiryForm .product_id").val();
var des=$("#enquiryForm .des").val();

const re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

if(name=='' || (name.length<=2 || name.length>=31)){
 alert('Please Enter Min Length of Name Should Be 3 & Max 30');
 
 return false;
    }else if(email=='' || (!re.test(email))){
 alert('Please Enter validate Email Id');

 return false;

    }else if(product_id==''){
 alert('Please Select Required Product');

 return false;

  }else if(des==''||(des.length<=19 || des.length>=151)){

 alert('Please Enter Min Length of Comment Should Be 20 & Max 150');

 return false;

    }else{
 return true;
    }   
});

function filterProduct(){
var searchVal=$('.searchVal').val();
if(searchVal==''){
$('#searchList').html('');
}else{

$.ajax({
url:"{{url('get_onkeyup_search_data')}}",
method:'POST',
data:{searchVal:searchVal,"_token":'{{csrf_token()}}'},
success:function(data){
$('#searchList').html(data);
}
});
}
}

function empityCart(){
$.ajax({
url:"{{url('empity-cart')}}",
method:'POST',
data:{"_token":'{{csrf_token()}}'},
success:function(data){

}
});
}

function setlocation(id){
currentUrl='';
if($('.badge').html()>0){
var con=confirm('If you change the city then again required to add the product');
if(con == true){

$.ajax({
url:"{{url('change-location')}}",
method:'POST',
data:{id:id,"_token":'{{csrf_token()}}'},
success:function(data){
window.location.href='<?php echo url('/');?>';
}
});
empityCart();
}else{
return false;
}
}else{

$.ajax({
url:"{{url('change-location')}}",
method:'POST',
data:{id:id,"_token":'{{csrf_token()}}'},
success:function(data){
var currentUrl=window.location.href.split('#')[0];
window.location.href=currentUrl;
}
});

}
}

function checkCartForListTmp(){
if($('.badge').html()>0){
window.location.href="{{url('cart')}}";
}else{
  alert('Oop`s your cart Is Empity');
  event.preventDefault();
}
}

$(document).ready(function(){

$('#checkCart').on('click',function(){

var url =$(this).attr('href');

if($('.badge').html()>0){
window.location.href="{{url('cart')}}";
}else{
  alert('Oop`s your cart Is Empity');
  event.preventDefault();
}
});


  jQuery("#carousel").owlCarousel({
  autoplay: true,
  lazyLoad: true,
  rewind: true,
  margin: 0,
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

 /*  login */
  function lego(){

    var mob = /^[1-9]{1}[0-9]{9}$/;
    var txtMobile = document.getElementById('mobile_no');
    if(mob.test(txtMobile.value) == false) {
      alert("Please enter valid mobile number.");
      txtMobile.focus();
      return false;
         }

 $.ajax({
 url:"{{url('getOTP')}}",
 method:'post',
 data:{"mobile_no":$('#mobile_no').val(),"_token":'{{csrf_token()}}'},  
 success:function(data){
$('#showOtp').html(data);
document.getElementById("content").style.display = "none";
document.getElementById("content1").style.display = "block";

 }
 });
}

function btnMatchOtp1(){
var otp='';
otp=$('#btnMatchOtp').val();  
 $.ajax({
 url:"{{url('matchOtp')}}",
 method:'post',
 data:{otp:otp,"_token":'{{csrf_token()}}'},  
 success:function(data){
 
 if(data=='0'){
alert('Please Enter Valide OTP');
    }else{
var currentUrl=window.location.href.split('#')[0];
window.location.href=currentUrl;
    } 
 }
 });
}

function resendOTP(){
 $.ajax({
 url:"{{url('resend-otp')}}",
 method:'post',
 data:{"_token":'{{csrf_token()}}'},  
 success:function(data){
 $('#showOtp').html(data);
  }
 });
}

 $('.login-btn').click(function() {
    $('.modal')
      
      
    $('#login-modal').modal('show');
    $('#Vishal').modal('hide');
  });
 /* end login */

function getCartCount(){
 $.ajax({
 url:"{{url('getCartCount')}}",
 method:'post',
 data:{"_token":'{{csrf_token()}}'},  
 success:function(data){
 $('.badge').html(data);
 }
 });
}

</script>
<script>


        const slider = document.querySelector(".items");
        const slides = document.querySelectorAll(".item");
        const button = document.querySelectorAll(".button");

        let current = Math.floor(Math.random() * slides.length);
        let prev = current > 0 ? current - 1 : slides.length - 1;
        let next = current < slides.length - 1 ? current + 1 : 0;

        const update = () => {
            slides.forEach(it => {
                it.classList.remove("active");
                it.classList.remove("prev");
                it.classList.remove("next");
            });

            slides[current].classList.add("active");
            slides[prev].classList.add("prev");
            slides[next].classList.add("next");
        }

        for (let i = 0; i < button.length; i++) {
            button[i].addEventListener("click", () => i == 0 ? gotoPrev() : gotoNext());
        }

        const gotoPrev = () => current > 0 ? gotoNum(current - 1) : gotoNum(slides.length - 1);
        const gotoNext = () => current < slides.length - 1 ? gotoNum(current + 1) : gotoNum(0);

        const gotoNum = number => {
            current = number;
            prev = current > 0 ? current - 1 : slides.length - 1;
            next = current < slides.length - 1 ? current + 1 : 0;

            update();
        }

        update();
    </script>
     <script>
      var fp = flatpickr(".date", {
      // dateFormat: "dd/mm/yy",
      minDate: "today",
      maxDate: new Date().fp_incr(7) // 14 days from now

    })
  </script>

<script>
$('.time').flatpickr(
    {
    enableTime: true,
    noCalendar: true,
    dateFormat: "H:i",
    minTime: "9:00",
    maxTime: "22:30",
    time_24hr: true,
})

</script>
<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/601126cec31c9117cb72ebe0/1et1fv6bg';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->

<!------ For fix header ------>
<script>
var prevScrollpos = window.pageYOffset;
window.onscroll = function() {
var currentScrollPos = window.pageYOffset;
  if (prevScrollpos > currentScrollPos) {
    document.getElementById("top-header").style.top = "0";
     document.getElementById("main-navigtaion").style.top = "43px";
  } else {
    document.getElementById("top-header").style.top = "-50px";
    document.getElementById("main-navigtaion").style.top = "0px";
  }
  prevScrollpos = currentScrollPos;
}
</script> 
<!------ end for fix header ------>

</body>
</html>