@extends('website.layout.layout')
@section('content')   
    <style>
        .head h6 {
            font-weight: 800;
            margin-top: 15px;
            margin-bottom: 30px;

        }

        @media (max-width:600px){

            .first{
                padding-left: 20px !important;
            }
            .address{
                margin-top: 50px !important;
                margin-bottom: 30px !important;

            }
            .head1{
                padding-left: 10px !important;

            }
           
            .order img{
                width: 50%;

            }
            .order{
                text-align: left;
                padding-left: 20px !important;
            }
           
        }

        .line1{
            border: 1px solid #cccccc;
        }
        .flatpickr-day 
        {
            font-size:14px !important;
        }
        .flatpickr-time .flatpickr-time-separator
        {
            font-size:30px;
        }
    </style>

    <section class="content">
        <div class="container-fluid">
            <div class="row" >
                <div class="col-lg-6 first" style="padding-bottom:50px;padding-left:80px;padding-top:100px">
             <form method="post" action="{{url('place-order')}}">
             <div class="row">
             <div class="col-sm-6" style="margin-top:60px;">
             <div class="form-group">
             <label for="date">Delivery Date</label>
             <input type="text"  style="height:30px" class="form-control date" name="deliveryDate"  placeholder="Select Date" required>
             </div>
             </div> 
              
             <div class="col-sm-6" style="margin-top:60px;">    
             <div class="form-group">
             <label for="time">Delivery Time</label>
             <input type="text" class="form-control time" style="height:30px" name="deliveryTime" placeholder="Select Time"   required>

             </div>
             </div> 
             </div>
@csrf
                    <div class="head">
                        <h6>Payment Details</h6>
                    </div>
                
                        <div class="row">
                            <div class="col-lg-4">
                                <input type="radio" id="mastercard" name="online" value="mastercard">
                                <label for="mastercard">

                                    <img src="{{asset('assets/front-end/img/mastercard.png')}}" alt="" width="60%" height="60%">

                                </label><br>

                            </div>
                            <div class="col-lg-4">
                                <input type="radio" id="mastercard" name="online" value="mastercard">
                                <label for="mastercard">

                                    <img src="{{asset('assets/front-end/img/visa.png')}}" alt="" width="60%" height="60%">

                                </label><br>

                            </div>
                            <div class="col-lg-4">
                                <input type="radio" id="mastercard" name="online" value="mastercard">
                                <label for="mastercard">

                                    <img src="{{asset('assets/front-end/img/paytm.png')}}" alt="" width="60%" height="60%">

                                </label><br>

                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <input type="radio" id="mastercard" name="cash" value="mastercard">
                                <label for="mastercard" style="font-size: 0.9em; margin-top:15px;font-weight:600">COD (Cash on Delivery)
                                </label><br>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-10">
                                <div class="form-group">
                                    <label for="usr" style="font-size: 0.9em; margin-top:15px;font-weight:600;color:grey">Name of Card:</label>
                                    <input style="height: 30px;" type="text" class="form-control" id="usr">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-10">
                                <div class="form-group">
                                    <label for="usr" style="font-size: 0.9em; margin-top:15px;font-weight:600;color:grey">Card Number:</label>
                                    <input style="height: 30px;" type="number" class="form-control" id="usr">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-5">
                                <div class="form-group">
                                    <label for="usr" style="font-size: 0.9em; margin-top:15px;font-weight:600;color:grey">Expiration Date</label>
                                    <br> <input style="height: 30px; width:30%;display:inline-block" type="number" class="form-control" id="usr">
                                    &nbsp; / &nbsp;<input style="height: 30px;  width:30%;display:inline-block" type="number" class="form-control" id="usr">
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <div class="form-group">
                                    <label for="usr" style="font-size: 0.9em; margin-top:15px;font-weight:600;color:grey">CVV
                                        <img src="{{asset('assets/front-end/img/information.png')}}" alt="" width="25%" height="25%" style="padding-bottom: 5px;">
                                    </label>
                                    <input style="height: 30px;" type="number" class="form-control" id="usr">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                 <button style="border: none;background-image:url('{{asset('assets/front-end/img/rect.png')}}'); width:35%; color:white;font-weight:500; padding:3px 0px 3px 0px; margin-top:15px" type="submit">Place Order</button>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="col-lg-6 order" style="background-color: #e5e4e2; padding-left:50px;padding-top:100px">

                    <div class="head">
                        <h6>Order Summary</h6>
                    </div>
<?php $total=0; ?>    
@foreach(session()->get('cart') as $cart)
                    <div class="row head1">
                        <div class="col-12 col-lg-2">
                            <img src="{{asset('uploads/productImg/'.$cart['image'])}}" alt="" width="100%">
                        </div>
                        <div class="col-6 col-lg-6" style="position:relative; margin-top:32px">
                            <span style="font-size: 0.8em; font-weight:600; text-align:left; position:absolute; bottom:0px;">{{$cart['name']}} ({{$cart['qty']}}) <br>Rs. {{$cart['price']}}</span>
                        </div>
                        <div class="col-6 col-lg-4" style="position:relative; margin-top:32px">
                            <span class="lego" style="font-size: 0.8em;font-weight:600">Rs. {{$cart['price'] * $cart['count']}}</span>
                        </div>
                    </div>
                    <hr class="line1">
<?php  $total+=$cart['price'] * $cart['count'];?>                    
@endforeach
                   
                    

                    <div class="row" style="font-size: 0.9em; font-weight:600;padding-left:10px">
                        <div style="font-weight: 500; color:black" class="col-6 col-lg-8 ">Subtotal</div>
                        <div class="col-6 col-lg-4 lego">Rs. {{$total}}</div>
                    </div>
                    <div class="row" style="font-size: 0.9em; font-weight:600;padding-left:10px">
                        <div  style="font-weight: 500;color:black" class="col-6 col-lg-8">Shipping</div>
                        <div class="col-6 col-lg-4 lego">Free</div>
                    </div>
                    <div class="row" style="font-size: 0.8em; font-weight:600;padding-left:10px">
                      <!--  <div  style="font-weight: 500; color:black" class="col-6 col-lg-8">GST</div> -->
                      <!--   <div class="col-6 col-lg-4 lego">Rs. 300</div> -->
                    </div>

                    <hr class="line1">

                    <div class="row"  style="padding-left:10px">
                        <div style="font-weight: 500; color:black; font-size:0.9em" class="col-6 col-lg-8" style="font-size: 0.6em; font-weight:600;">Total</div>
                        <div class="col-6 col-lg-4 lego" style="font-size: 1em; font-weight:700 !important;">Rs. {{$total}}</div>
                    </div>

                    <div class="row address" style="margin-top: 160px; padding-left:10px">
                      <!--   <div class="col-6 col-lg-8" style="font-size: 0.7em;">
                           <span style="font-weight: 600;font-size:1em;color:grey"> Shipping Address</span>  <br>
                            House no. 123, Noida UP
                        </div> -->
                       <!--  <div class="col-6 col-lg-4">
                            <a href="#" style="font-size: 0.8em;">Change Address</a>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    @section('script')

@endsection
@endsection

