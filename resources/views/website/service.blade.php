@extends('website.layout.layout')
@section('content')
<style>
    .max1 {
    background-size: cover;
    margin-top: 91px !important;
}
@media screen and (max-width: 480px) {
  .max1 {
    background-size: cover;
    margin-top: 0px !important;
}
.dots .button {
    width:14% !important;
}
.openbutton, img {
    width: 25%;
}
}

@media(max-width:375px)
{
    .max2 p , .max4 p , .right p
{
    font-size:13px!important;
}
.right p {
   padding-right: 45px;
    text-align: justify;
}
.max5 h1 {
    font-size: 18px;
}
}

@media(max-width:320px)
{
    .max2 h1 ,.max4 h1 , .right h5 , .max5 h1{
    font-size: 15px;
    }
}
</style>
    <!-- service section  -->
    <section class="service">
    <div class="container-fluid max1" style="background-image: url('{{asset('assets/front-end/img/Group 154.png')}}');">
            <div class="container max2">
                <h1>
                    A Building Materials Supplier, <br>
                    By Builders, For Builders
                </h1>

                <p>
                    Weʼre not your average building materials supplier,
                    weʼre also builders. Thatʼs why we take material quality
                    and delivery seriously.
                </p>
            </div>
        </div>

        <div class="container-fluid max3">
            <div class="container max4">
                <h1>
                    From Takeoff to Delivery, We Can <br>
                    Do As Much As You Need
                </h1>
                <p>
                    Thereʼs more that goes into supplying materials than just delivery.
                    We can help you from start to finish - from planning materials to
                    when and how you need them to arrive onsite.
                </p>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 left">
                    <div class="img-blur">
                        <div class="items">
                            <div class="item active">
                                <img src="{{asset('assets/front-end/img/Group 163.png')}}">
                            </div>
                            <div class="item prev">
                                <img src="{{asset('assets/front-end/img/Group 163.png')}}">
                            </div>

                            <div class="item prev">
                                <img src="{{asset('assets/front-end/img/Group 163.png')}}">
                            </div>
                        </div>
                    </div>

                    <div class="dots" style="margin-top: 180px;">
                        <img class="button" src="{{asset('assets/front-end/img/Ellipse 9.png')}}" alt="">
                        <img class="button" src="{{asset('assets/front-end/img/Ellipse 9.png')}}" alt="">
                        <img class="button" src="{{asset('assets/front-end/img/Ellipse 7.png')}}" alt="">
                        <img class="button" src="{{asset('assets/front-end/img/Ellipse 9.png')}}" alt="">
                        <img class="button" src="{{asset('assets/front-end/img/Ellipse 9.png')}}" alt="">
                    </div>
                </div>


                <div class="col-lg-6 right">
                    <h5>
                        Walk-In Service
                    </h5>
                    <p>
                        Our experienced drivers can drop materials
                        anywhere on the ground floor of your job site. That
                        means fewer steps for you and your crew - and letʼs
                        be honest, as builders at the end of the day, we feel
                        every single one.
                    </p>

                </div>
            </div>
        </div>


        <div class="container-fluid max3">
            <div class="container max5">
                <h1>
                    The More You Order, The More You <br>
                    Save
                </h1>
                <h5 style="font-weight: 600; font-size:18px;padding-bottom:20px">
                    Rs.60 flat fee or Rs.100/month
                </h5>
                <p>
                    Our simple and upfront pricing has made us the building material
                    supplier of choice for professional builders. Order on-demand or
                    get tons of savings with our subscription service.
                </p>
                <center>
                    <button style="color: white; font-weight: 600; border: none; background-image: url('{{asset('assets/front-end/img/rect.png')}}'); padding: 2px 10px 2px 10px; margin-bottom:50px">
                        See Pricing
                    </button>
                </center>
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