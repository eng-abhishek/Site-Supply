@extends('website.layout.layout')
@section('content')    
     <style>
        .why{
            text-align: center;

        }
        .imgs{
            margin-top: 70px;
        }

        .imgs img{
            margin-bottom: 45px;
        }
      
        .lego {
            width: max-content;
            margin: auto;

        }

        .lego span {
            /* padding-top: 50px !important; */
            top: 2px !important;
            padding-left: 10px !important;
        }

@media(max-width:414px)
{
    .main-navigtaion .navbar-brand img {
    min-width: 24% !important;
    margin: 0px 0 0 50px !important;
}
}
        @media only screen and (max-width: 800px) {

            .lego img {
                width: 15% !important;
                margin: auto !important;
            }

            .lego span {
                font-size: 12px !important;
            }

            .legoz{
                padding-left:15px !important;
                padding-right:15px !important;
                text-align: left !important;
            }
            .legoa{
                margin-top: 20px !important;
            }
        }
    </style>

    <section class="why">
            	<div class="container">                
                    <div class="row">
                        <div class="col-lg-12">                        
                            <h1 style="font-size: 2em; margin-top:130px">
                                Why Site Supply
                            </h1>
                        </div>
                        </div>
                        <div class="row imgs">
                        <div class="col-lg-4 col-md-4 col-sm-4">
                        <img src="{{asset('assets/front-end/img/why/NoPath - Copy (10).png')}}" alt="" width="60%"> <br>
                        <span style="font-size: 1.3em !important; font-weight:600;">Browse your favourite <br> suppliers</span>
                        <p style="margin-top: 20px; color:grey;font-size:1em !important">
                            Choose a supplier and fill your
                         <br>   cart with the products you
                        <br>  need.
                        </p>
                        </div>
                       
                        <div class="col-lg-4 col-md-4 col-sm-4">
                        <img src="{{asset('assets/front-end/img/why/NoPath - Copy (11).png')}}" alt=""  width="60%"> <br>
                        <span style="font-size: 1.3em !important; font-weight:600;">Get it delivered when you <br> need it</span>
                        <p style="margin-top: 20px; color:grey;font-size:1em !important">
                        We notify the supplier to start <br>
                        preparing your order. Once it's <br>
                        good-to-go we'll pick it up and <br>
                        deliver it.    
                        </p>
                        </div>

                        <div class="col-lg-4 col-md-4 col-sm-4">
                        <img src="{{asset('assets/front-end/img/why/NoPath - Copy (12).png')}}" alt=""  width="60%"> <br>
                        <span style="font-size: 1.3em !important; font-weight:600;">Focus on what matters</span>
                        <p style="margin-top: 52px; color:grey;font-size:1em !important">
                        You can get back to focusing on <br>
                        what matters most knowing <br>
                        your materials are on their way.
                        </p>
                        </div>
                       </div>                
                      </div>
                 
            <div class="container-fluid" style="background-color: #FBFBFB;margin-top:40px">
                <div class="row">
                    <div class="col-lg-12">
                        <p class="legoz" style="margin-top: 50px; color:#4F4F4F;font-size:1.1em;padding: 10px 80px 20px 80px">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem
aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo
enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos
qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet,
consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam
aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit
laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea
voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla
pariatur
                        </p>
                    </div>
                </div>

                <div class="row legoa" style="margin-top: 40px; padding-bottom:60px">
                    <div class="col-lg-3 col-6">
                        <span style="font-size: 2.4em; font-weight:800;color:#F1970B">100%</span>
                        <h1>Price Production</h1>
                    </div>
                    <div class="col-lg-3 col-6">
                        <span style="font-size: 2.4em; font-weight:800;color:#F1970B">Better</span>
                        <h1>Construction</h1>
                    </div>
                    <div class="col-lg-3 col-6">
                        <span style="font-size: 2.4em; font-weight:800;color:#F1970B">Fastest</span>
                        <h1>Construction</h1>
                    </div>
                    <div class="col-lg-3 col-6">
                        <span style="font-size: 2.4em; font-weight:800;color:#F1970B">Cheaper</span>
                        <h1>Construction</h1>
                    </div>                   
                </div>
            </div>

        <div class="container-fluid" style="background-color: #E4E1E1; padding-top:10px;padding-bottom:8px">
            <div class="row lego1">

                <div class="col-4 col-lg-4">

                    <div class="lego">

                        <img src="{{asset('assets/front-end/img/chatting.png')}}" alt="" width="25%">
                        <span style=" font-size: 15px; color:grey; padding: 15px 0px 0px 5px !important; font-weight:600">

                        <a href="javascript:void(Tawk_API.toggle())" style="color: grey;">Chat With Us</a>    
                        </span>
                    </div>
                </div>
                <div class="col-4 col-lg-4">

                    <div class="lego">
                        <img src="{{asset('assets/front-end/img/phone.png')}}" alt="" width="30%">
                        <span style=" font-size: 15px; color:grey; padding: 15px 0px 0px 5px !important;  font-weight:600">    
                        <a style="color: grey;" href="tel:+7071310320">Call Us</a>
                        </span>
                    </div>

                </div>
                <div class="col-4 col-lg-4">
                    <div class="lego">
                        <img src="{{asset('assets/front-end/img/help.png')}}" alt="" width="30%">
                        <span style=" font-size: 15px; color:grey; padding-top:15px; font-weight:600">
                        <a style="color: grey;" href="{{url('faq')}}">FAQ</a>                            
                        </span>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection