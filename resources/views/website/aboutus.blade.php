@extends('website.layout.layout')
@section('content')
  <!-- about us section  -->
    <style>
@media(max-width:375px)
{
    .lego1 p {
    font-size: 13px!important;
}
}

@media(max-width:320px)
{
    .lego1 h3 {
    font-size: 15px!important;
}
.testimonials.p50 h1, .ourstory h1, .featuredin h1, .container h1 {
    font-size: 15px!important;
}
.owl-dots
{
    display:none!important;
}
.testimonials
{
    padding:50px 0 0 0!important;
}
}
        .hero-sec{
            margin-top:120px;
            background-image: url('{{asset('assets/front-end/img/about/Group 180.png')}}');
            /* background-repeat: no-repeat; */
            background-attachment: fixed;
            /* background-size: cover; */
        }
        .hero-content{
            width: 70%;
            padding: 90px 60px 60px 100px ;

        }
        .hero-content h1,h4{
            color: white;
        }
        .hero-content h1{
            font-size: 3.2em;
        }
        .checkmark-sec{
            margin-top: 45px;
        }
        .quest-box{
            border:1px solid #C5C5C5;
            padding: 18px 10px 18px 20px;
            font-size: 1.2em;
            margin-bottom: 15px;
            box-shadow: 2px 2px 0px 0px #EAE8E8;
            color: #5F5E5E;
            font-weight: 600;
        }
       

       @media screen and (max-width: 650px) {

             .hero-content{
            width: 100%;
            padding: 40px 10px 40px 10px ;
            text-align: center;

        }
        .checkmark-sec{
            width: 100% !important;
        }
        .checkmark-sec img{
            width: 80% !important;
            padding-top: 5px !important;
        }
        .testi{
            grid-template-columns: 1fr !important;
        }
        .legox img{
            width: 100% !important;
            margin-bottom: 20px !important;

        }
        .legoy{

            margin:45px 15px 95px 15px !important;
            
        }
     
       .lego1{
           width: 100% !important;
           padding-left: 10px !important;
           margin-top: 0px !important;
       }

       .legoa{
           width: max-content;
           margin: auto;
           padding-top: 0px !important;
           margin-top: 0px !important;
       }
      

       .legoz{
           margin:5px 15px 25px 10px !important;

       }

       .legom{
           margin-top: 25px !important;
       }
       .legom img{
           width: 100% !important;
           float: left;
       }
       .legod{
           margin:15px 15px 15px 15px !important;

       }

        .legoe{
            padding-left: 15px !important; 
            padding-top:45px !important;
            padding-bottom:25px !important;
            
        }
       .legoe img{
           width: 100%;
           float: left !important;

       }

       .ourstory{
           width: 100% !important;
       }
       .legoh{
           float: none !important;
           margin-top: 10px;
       }




         
}


 .testimonials{position: relative;background-repeat: no-repeat;background-size: cover;padding:50px 0;}
.testimonials::before{content:'';position: absolute;right:0;left:0;top:0;bottom:0;background:#fff}
.testimonials .title {text-align: center;margin-bottom: 50px;position: relative;padding: 20px 0;max-width: 600px;margin: 0 auto;}
.testimonials .title h5 {color: #EB6D2F;line-height: 1.2em;font-size: 18px;font-weight: 900;margin-bottom: -3px;}
.testimonials .title h2 {color: #5A3733;line-height: 1.2em;font-weight: 900;font-size: 41px;letter-spacing: -1px;margin:0}
.testimonials .title img {margin-top: -10px;}
.testimonials .title p {margin: 0 0 10px;margin-bottom: 0;color: #5A3733;}
.testimonials .testi .item {background: #f5f5f5;padding: 50px 30px;box-shadow:0 0 8px gray;}
.testimonials .testi .item .profile {display:flex;padding-left: 15px;}
.testimonials .testi .item .profile img {border-radius: 100%;width:50px;height:50px;object-fit:cover}
.testimonials .testi .item .profile .information {padding-left:20px;margin-bottom:15px}
.testimonials .testi .item .profile .information .stars i {color:#ffd832}
.testimonials .testi .item .profile .information p {font-size: 22px;margin: 0px auto 0px;color: black;font-weight: 800;line-height: 1;padding-bottom: 5px;}
.testimonials .testi .item .profile .information span {color:black;font-weight:600;margin-top: 10px;line-height: 1.6em;font-size: 14px;}
.testimonials .testi .item>p {margin-bottom: 5px;padding:0px 10px;font-size: 16px;line-height: 1.6em;display: block;z-index: 2;color: #515d72;}
.testimonials .testi .item .icon {text-align: center;}
.testimonials .testi .item .icon i {font-size: 32px;color: #FFD832;}
.testimonials .testi .owl-item
{
	padding:10px;
}

.owl-dots button.owl-dot.active {
    background-color: white;
}

.owl-carousel .owl-nav button.owl-next, .owl-carousel .owl-nav button.owl-prev, .owl-carousel button.owl-dot {
    background: white;
}
@media screen and (max-width: 480px) {
    .openbutton, img {
    width: 25%;
}
.hero-sec {
    margin-top: 0 !important;
}
    </style>

  <section class="aboutus">
            <div class="container-fluid hero-sec">
                    <div class="hero-content">
                         <h1>About Us</h1>
                                <div class="checkmark-sec">
                                    <div class="row checkmark-sec" style="width: 90%;">
                                        <div class="col-2 col-lg-1" style="padding-left: 10px; margin-bottom:5px">
                                            <img src="{{asset('assets/front-end/img/about/check-mark.png')}}" alt="" width="86%">
                                        </div>
                                        <div class="col-10 col-lg-11" style="padding-left: 0px;  margin-bottom:5px">
                                            <h4 style="font-size: 1.4em; font-weight:500">Lowest pricing direct from suppliers</h4>
                                        </div>
                                        <div class="col-2 col-lg-1" style="padding-left: 10px;  margin-bottom:5px">
                                            <img src="{{asset('assets/front-end/img/about/check-mark.png')}}" alt="" width="86%">
                                        </div>
                                        <div class="col-10 col-lg-11" style="padding-left: 0px;  margin-bottom:5px">
                                            <h4 style="font-size: 1.4em; font-weight:500">Wide Selection of building materials available online</h4>
                                        </div>
                                        <div class="col-2 col-lg-1" style="padding-left: 10px;  margin-bottom:5px">
                                            <img src="{{asset('assets/front-end/img/about/check-mark.png')}}" alt="" width="86%">
                                        </div>
                                        <div class="col-10 col-lg-11" style="padding-left: 0px;  margin-bottom:5px">
                                            <h4 style="font-size: 1.4em; font-weight:500">Reliable shipping across the USA and Canada</h4>
                                        </div>
                                    </div>
                                </div>
                        </div>
                     </div>
            <div class="container-fluid">
            <div class="row legoy" style="margin:95px 15px 95px 55px;">
                <div class="col-12 col-lg-6 legox">
                    <img src="{{asset('assets/front-end/img/about/Group 179.png')}}" alt="" width="90%">
                </div>
                <div class="col-12 col-lg-6">
                    <div class="lego1" style="width: 80%; margin:auto; margin-top:10px;padding-left:20px">
                        <h3 style="color: black;letter-spacing:0.4px; font-size:1.8em">Unbeatable Selection At The Best Value</h3>
                        <p class="mobile-para" style="color:#3d3d3d; margin: 35px 0px 25px 0px; font-weight:500 !important">
                            We connect you directly with our suppliers so that you
                            can choose from a huge online selection of home
                            improvement products - often up to 50% off traditional
                            retail.
                        </p>

                        <p style="color:#3d3d3d; margin: 35px 0px 25px 0px;">Not sure which product is right for you? We offer up to
                        <span style="color:#ff8c00; font-size:1.1em;top:1px">5 free products samples</span>, shipped overnight, to your
                        doorstep.
                        </p>

                        <div class="legoa">
                            <button style="background-image: linear-gradient(to right, #f8c729 , #e99016) !important; border:none; padding:3px 12px 3px 12px;border-radius:4px; color:white; font-weight:600;letter-spacing:0.2px;margin-top:10px">
                            
                            <a href="{{url('shop')}}" style="color:white"> Shop Now </a>   
                        </button>
                    </div>
                    </div>
                </div>
            </div>
            </div>

            <div class="container-fluid">
            <div class="row legoz" style="margin:105px 15px 105px 55px;">
              <div class="col-12 col-lg-6">
                    <div class="lego1" style="width: 90%; margin:auto; margin-top:70px;padding-left:0px">
                        <h3 style="color: black;letter-spacing:0.4px; font-size:1.8em">From Our Website, To Your Project Site</h3>
                        <p style="color:#3d3d3d; margin: 35px 0px 25px 0px;font-weight:500 !important">
                           Once you've placed your order, logistics team and
                            shipping partners plan and coordinate the delivery to
                            ensure you receive your products where and when you
                            want them, hassle free.
                            <div class="legoa">
                                <button style="background-image: linear-gradient(to right, #f8c729 , #e99016) !important; border:none; padding:1px 20px 1px 20px;border-radius:4px; color:white; font-weight:600;letter-spacing:0.2px;margin-top:45px">
                                
                                <a href="" style="color:white"> About Shipping </a>   
                            </button>
                        </div>
                    </div>   
                </div>
                <div class="col-12 col-lg-6 legom">
                    <img src="{{asset('assets/front-end/img/about/Group 174.png')}}" alt="" width="90%">
                </div>
            </div>
          </div>
            
            <div class="container-fluid">
            <div class="row legod" style="margin:105px 15px 55px 55px;">
              <div class="col-12 col-lg-5 legoe" style="padding-left: 55px; padding-top:95px">
                    <img style="float: right;" src="{{asset('assets/front-end/img/about/conv.png')}}" alt="" width="100%">
                </div>
              
              <div class="col-12 col-lg-7">
                    <div class="lego1" style="width: 90%; margin:auto; margin-top:40px;padding-left:10px">
                        <h3 style="color: black;letter-spacing:0.4px; font-size:1.8em">We Support You Every Step Of The Way!</h3>
                        <p style="color:#3d3d3d; margin: 35px 0px 25px 0px;font-weight:500 !important">
                          Our customer service team is available to assist you at each stage
                            of your home improvement journey, our Learning Center and blog
                            offers a wealth of DIY tips and home inspiration and our Design
                            Center helps you visualize your new space in 2D or 3D.

                       
                        <p style="color:#3d3d3d; margin: 35px 0px 25px 0px;font-weight:500 !important">
                            Plus, you can rest easy because your purchase is backed by our
30 Day Money Back Guarantee.
                        </p>

                        <div class="legoa">
                            <button style="background-image: linear-gradient(to right, #f8c729 , #e99016) !important;border:none; padding:1px 20px 1px 20px;border-radius:4px; color:white; font-weight:600;letter-spacing:0.2px;margin-top:45px">
                            <a href="{{url('contact')}}" style="color:white"> Contact Us </a>   
                        </button>
                    </div>
                    </div>
                </div>
            </div>
            </div>

       <!-- testimonial -->
           <section class="testimonials p50">
              <div class="container">
              <div class="row">
              <div class="col-md-12">
              <h1 class="text-center">
              Here’s Why 15,000+ Customers Order Building
              Materials from Sitesupply
              </h1>
              </div>  
              </div>
              <div class="row" style="margin-top:40px;">
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
                    <p>
                   {!! substr($testimonialData->des,0,250) !!}
                    </p>
                    </div>
                   @endforeach 
                  </div>
                  </div> 
                  </div>  
                  </div>  
                </section>
       <!-- testimonial -->
       <div class="container-fluid">
           <div class="ourstory" style="width: 80%; margin:auto;text-align:center; margin-top:30px; margin-bottom:40px">
               <h1 style="font-size: 2.5em;">Our Story</h1>
               <h1 style="font-size: 1.8em; margin-top:14px;color:#696868 !important">
                   Making home improvement and commercial projects simple
               </h1>

               <div style="width: 84%; margin:auto; color:#8E8E8E !important">

                   <p style="margin-top: 25px; margin-bottom:18px;">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
                    magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                    Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                </p>
                
                <p  style="margin-top: 5px; margin-bottom:18px;">
                    Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem
                    aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo
                    enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores
                    eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet,
                    consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam
                    aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit
                    laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea
                    voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla
                    pariatur?"
                   
                </p>
            </div>
           </div>
       </div>
            
       <div class="container-fluid" style="background-color:#F5F5F5;">
           <div class="featuredin" style="text-align: center; padding-top:50px; padding-bottom:50px">
               <h1 style="font-size: 2em !important;">
                   Featured In
               </h1>

               <div class="row" style="width: 80%; margin:auto;margin-top:45px; margin-bottom:25px">
                   <div class="col-12 col-lg-3 col-md-2 col-sm-6">
                       <img class="legoh" src="{{asset('assets/front-end/img/about/NoPath - Copy (5).png')}}" alt="" width="20%" style="float: right;">
                   </div>
                   <div class="col-12 col-lg-2 col-md-2 col-sm-6">
                       <img class="legoh" src="{{asset('assets/front-end/img/about/NoPath - Copy (6).png')}}" alt="" width="50%"  style="padding-top: 15px;">
                   </div>
                   <div class="col-12 col-lg-2 col-md-2 col-sm-6">
                       <img class="legoh" src="{{asset('assets/front-end/img/about/NoPath - Copy (7).png')}}" alt="" width="50%"  style="padding-top: 15px;">
                   </div>
                   <div class="col-12 col-lg-2 col-md-2 col-sm-6">
                       <img class="legoh" src="{{asset('assets/front-end/img/about/NoPath - Copy (8).png')}}" alt="" width="70%"  style="padding-top: 25px;">
                   </div>
                   <div class="col-12 col-lg-3 col-md-2 col-sm-6">
                       <img class="legoh" src="{{asset('assets/front-end/img/about/NoPath - Copy (9).png')}}" alt="" width="35%"  style="padding-top: 15px;float:left">
                   </div>
               </div>
           </div>
       </div>


       <div class="container" style="margin-top: 65px; margin-bottom:65px">
           <h1 style="font-size: 1.7em; margin-bottom: 40px;">
               Frequently Asked Questions
           </h1>

           <div class="quest-box" >
               Do I have to be a professional to buy from Sitesupply?
           </div>
           <div class="quest-box">
               How do I obtain samples?
           </div>
           <div class="quest-box">
               I want to buy from Sitesupply. What are my options?
           </div>
           <div class="quest-box">
               Does Site supply ship to residences? How does that work?
           </div>
       </div>
  </section>
@endsection