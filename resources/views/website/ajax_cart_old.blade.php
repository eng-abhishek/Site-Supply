<style>

input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}
  
    @media screen and (max-width: 480px) {

     .nav-pills{
       margin-bottom: 15px !important;
       padding-top: 10px !important;
       margin-left: 12px !important;
     }

     #myCartDiv img{
       width: 50% !important;
     }

      #myCartDiv input{
       margin-top: 24px !important;
  
      }

      .table-head{
        display: none;
      }

      .buttons-top{
        display: none;
      }
      .buttons-bot{
        display: block !important;
      }
      ul.breadcrumb {
    margin: 0px 0 auto 115px !important;
}
.nav-link {
    display: block;
    padding: .5rem 0.5rem !important;
}
.nav-pills .nav-link {
    border-radius: .25rem;
    font-size: 0.8em !important;
}


    }

</style>


<div class="container">
 <ul class="nav nav-pills" style="margin-bottom: 30px;">
    <li class="nav-item">
      <a class="nav-link active"  href="#">My Cart</a>
    </li>
    <span style="font-size:32px !important;font-weight:600 !important;margin-left:15px;margin-right:10px !important">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" font-weight="bold" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
</svg>
    </span>
  
    <li class="nav-item">
      <a class="nav-link"  href="#">Contact Details</a>
    </li>
      <span style="font-size:32px !important;font-weight:600 !important;margin-left:15px;margin-right:10px !important">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
</svg>
    </span>
    <li class="nav-item">
      <a class="nav-link"  href="#">Payment Details</a>
    </li>
      <span style="font-size:32px !important;font-weight:600 !important;margin-left:15px;margin-right:10px !important">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
</svg>
    </span>
    <li class="nav-item">
      <a class="nav-link" data-toggle="" href="#">Confirmation</a>
    </li>
  </ul>


<!-- my cart -->
<div class="row">

<div class="col-md-9 "  style="border-right: 1px solid grey;">
        <div class="row table-head">
        <div class="col-md-2 ">
        <h5>
        Product
        </h5>
        </div>

        <div class="col-md-3 ">
        <h5>
        Details
        </h5>
        </div>

        <div class="col-md-2 text-center">
        <h5>
        Quantity
        </h5>
        </div>
        <div class="col-md-2 text-center">
        <h5>
        Price
        </h5>
        </div>
        <div class="col-md-2 text-center ">
        <h5>
        Total
        </h5>
        </div>
        <div class="col-md-1 col-md-1 text-center">
        <h5>
        </h5>
        </div>
        </div>
        <hr>
<?php $total=0; ?>    
@foreach(session()->get('cart') as $cart)

   <div class="row buttons-top" id="myCartDiv" >
        <div class="col-lg-2 col-md-7 col-sm-4">
        <img src="{{asset('uploads/productImg/'.$cart['image'])}}" alt="" width="40%">
        </div>

        <div class="col-lg-3 col-md-2 col-sm-4">
        <h6 style="font-weight: 500;color:#2E3841;margin-top:25px">{{$cart['name']}}</h6>
        </div>

        <div class="col-lg-2 col-md-2 col-sm-4 text-center" style="margin-top: 23px;">
        <input value="{{$cart['count']}}" type="number" onkeyup="updateCart(<?php echo $cart['id'];?>)" id="getCounterValue<?php echo $cart['id'];?>" style="width: 55%; padding-left:10px;background-color:#F7F5F5;border-radius:4px;border:none;height:24px">
        </div>
        <div class="col-lg-2 col-md-2 col-sm-4 text-center">
         <h6 style="font-weight: 500;color:#e88f16;margin-top:25px">Rs. {{$cart['price']}}</h6>
        </div>
        <div class="col-lg-2 col-md-2 col-sm-4 text-center">
         <h6 style="font-weight: 500;color:#e88f16;margin-top:25px">Rs. {{$cart['price'] * $cart['count']}}</h6>
        </div>
        <div class="col-lg-1 col-md-1 text-center" style="margin-top: 23px;">
       <a href="javascript:void(0)" onclick="removeItem(<?php echo $cart['id'];?>)" style="text-decoration:none;color:black"><i style="color:red" class="fa fa-times" aria-hidden="true"></i></a>
        </div>
        </div>



        <div class="row buttons-bot" id="myCartDiv" style="display: none;">
        <div class="col-md-2 col-md-7 col-sm-4">
          <div class="row">
            <div class="col-6 text-center">
              
              <h6 style="font-weight: 600;padding-top:10px">Product</h6>
            </div>
            <div class="col-6 text-center">

              <img src="{{asset('uploads/productImg/'.$cart['image'])}}" alt="" width="40%">
            </div>
          </div>
        </div>

        <div class="col-md-3 col-md-2 col-sm-4">
            <div class="row">
            <div class="col-6 text-center">
              
              <h6 style="font-weight: 600;padding-top:25px">Product Name</h6>
            </div>
            <div class="col-6 text-center">

              <h6 style="font-weight: 500;color:#2E3841;margin-top:25px">{{$cart['name']}}</h6>
            </div>
          </div>
        </div>

        <div class="col-md-2 col-md-2 col-sm-4 text-center" style="margin-top: 23px;">
      
        <div class="row">
            <div class="col-6">
              
              <h6 style="font-weight: 600;padding-top:25px">Quantity</h6>
            </div>
            <div class="col-6">

              <input value="{{$cart['count']}}" type="number" onkeyup="updateCart(<?php echo $cart['id'];?>)" id="getCounterValue<?php echo $cart['id'];?>" style="width: 55%; padding-left:0px;background-color:#F7F5F5;border-radius:4px;border:none;height:24px;text-align: center;">
            </div>
          </div>
        </div>
        <div class="col-md-2 col-md-2 col-sm-4 text-center">
        
        
        <div class="row">
            <div class="col-6 text-center">
              
              <h6 style="font-weight: 600;padding-top:25px">Price</h6>
            </div>
            <div class="col-6">

              <h6 style="font-weight: 500;color:#e88f16;margin-top:25px">Rs. {{$cart['price']}}</h6>
            </div>
          </div>


        </div>
        <div class="col-md-2 col-md-2 col-sm-4 text-center">
        
        <div class="row">
            <div class="col-6 text-center">
              
              <h6 style="font-weight: 600;padding-top:25px">Total</h6>
            </div>
            <div class="col-6">

              <h6 style="font-weight: 500;color:#e88f16;margin-top:25px">Rs. {{$cart['price'] * $cart['count']}}</h6>
            </div>
          </div>
        
        </div>
        <div class="col-md-1 col-md-1 text-center" style="margin-top: 23px;">
       <a href="javascript:void(0)" onclick="removeItem(<?php echo $cart['id'];?>)" style="text-decoration:none;color:black"><i style="color:red" class="fa fa-times" aria-hidden="true"></i></a>
        </div>
        </div><hr>
        <?php $total+=$cart['price'] * $cart['count']; ?>
         @endforeach

        <br>    
        <div class="row buttons-top">
              <div class="col-md-6">
               <button style="margin-left:20px; background: linear-gradient(to right, #f7c328, #e88f16); border:none; color:white;padding:3px 8px 3px 8px;border-radius:4px">
               <a style="color:white" href="{{url('shop')}}">
               <svg color="white" style="padding-bottom: 3px;" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-left" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"/>
</svg>
               Continue Shoppping</a>
            </button>
            </div>
           
           @if(session()->get('logedIn'))
            <div class="col-md-6">
            <button onclick="bokInfo()" style="margin-right:50px; background: linear-gradient(to right, #f7c328, #e88f16); border:none; color:white;padding:3px 8px 3px 8px;border-radius:4px;float:right">
            <a style="color:white" href="#">Continue to Checkout
            <svg color="white" style="padding-bottom: 3px;" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
  </svg>
            </a>
            </button>
            </div> 
            @else 
            <div class="col-md-6">
            <button data-bs-toggle="modal" data-bs-target="#exampleModal" style="margin-right:50px; background: linear-gradient(to right, #f7c328, #e88f16); border:none; color:white;padding:3px 8px 3px 8px;border-radius:4px;float:right">
            <a style="color:white" href="#">Continue to Checkout
            <svg color="white" style="padding-bottom: 3px;" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
</svg>
            </a>
            </button>
            </div> 
            @endif
        </div>






              <div class="row buttons-bot" style="display: none;">
              <div class="col-md-6 text-center">
               <button style="margin-left:0px; background: linear-gradient(to right, #f7c328, #e88f16); border:none; color:white;padding:3px 8px 3px 8px;border-radius:4px;width:230px !important">
               <a style="color:white" href="{{url('shop')}}">
               <svg color="white" style="padding-bottom: 3px;" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-left" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"/>
</svg>
               Continue Shoppping</a>
            </button>
            </div>
           
           @if(session()->get('logedIn'))
            <div class="col-md-6 text-center">
            <button onclick="bokInfo()" style="margin-right:0px; background: linear-gradient(to right, #f7c328, #e88f16); border:none; color:white;padding:3px 8px 3px 8px;border-radius:4px; margin-top:5px;width:230px !important">
            <a style="color:white" href="#">Continue to Checkout
            <svg color="white" style="padding-bottom: 3px;" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
  </svg>
            </a>
            </button>
            </div> 
            @else 
            <div class="col-md-6 text-center">
            <button data-bs-toggle="modal" data-bs-target="#exampleModal" style=" background: linear-gradient(to right, #f7c328, #e88f16); border:none; color:white;padding:3px 8px 3px 8px;border-radius:4px;margin-top:5px;width:230px !important">
            <a style="color:white" href="#">Continue to Checkout
            <svg color="white" style="padding-bottom: 3px;" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
</svg>
            </a>
            </button>
            </div> 
            @endif
        </div>




        <br>
</div>

<div class="col-md-3 text-right" style="background-color: white;margin-top:20px; padding-top:20px;
padding-left:5px;heighT:95%;padding-bottom:20px;" >

  <div class="row">
        <div class="col-md-6" style="font-weight: 600;">Product Total</div>
        <div class="col-md-6">Rs. <?php echo $total;?></div>
    <br>
    
        <div class="col-md-6" style="font-weight: 600;">Shipping</div>
        <div class="col-md-6">Rs. 0</div>
  <br>
    
        <div class="col-md-6" style="font-weight: 600;">Total GST</div>
        <div class="col-md-6">Rs. <?php echo $total;?></div>

    </div>
    <hr>

  <div class="row">
         <div class="col-md-6" style="font-weight: 600;">Subtotal</div>
        <div class="col-md-6" style="color:#e88f16;font-weight:600">Rs. <?php echo $total;?></div>

        <br> 
        <br>

          <div class="col-md-6" style="font-weight: 600;">Total Payable</div>
        <div class="col-md-6" style="font-weight:500">Rs. <?php echo $total;?></div>
    </div>

</div>
</div>
</div>