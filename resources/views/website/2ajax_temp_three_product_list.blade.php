<style>
     @media (max-width: 440px){
     
         .lego-row{
             text-align: center;
    margin-left: -20px !important;
    margin-top: 0px !important;
         }
         
         
      .buttons-top{
        display: none;
      }
      .buttons-bot{
        display: block !important;
      }

.buttons-bot {
    text-align: center;
    margin-left: 0px !important;
    margin-top: 0px !important;
}
.buttons-bot .col-6{
    margin-bottom:8px;
}
     }
     
     input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}
</style>







 <div class="row lego-row buttons-top" style=" text-align:center;margin-left:-20px !important;margin-top:0px">

            <div class="col-lg-2" style="background-color:#E5E5E5;padding:10px 0px 10px 0px; font-size:0.8em;font-weight:600;
            text-align:left;border-top-left-radius:8px;border-right:1px solid #D9D9D9">
                
            </div>
            <div class="col-lg-1half" style="background-color:#E5E5E5;padding:15px 0px 10px 0px;font-size:0.9em;font-weight:600;
             text-align:center;border-right:1px solid #D9D9D9">
                PRODUCT NAME
            </div>
            <div class="col-lg-1half" style="background-color:#E5E5E5;padding:10px 15px 10px 5px; font-size:0.9em;font-weight:600;
            text-align:center;border-right:1px solid #D9D9D9">
                DIAMETER <br> (in mm)
            </div>
           
            <div class="col-lg-2" style="background-color:#E5E5E5;padding:10px 0px 10px 0px;font-size:0.9em;font-weight:600;
             text-align:center;border-right:1px solid #D9D9D9">
                PRICE <br> (PER BUNDLE)
            </div>

            <div class="col-lg-2" style="background-color:#E5E5E5;padding:10px 0px 10px 0px;font-size:0.9em;font-weight:600;
             text-align:center;border-right:1px solid #D9D9D9">
                PIECE <br> (PER BUNDLE)
            </div>

            <div class="col-lg-1half" style="background-color:#E5E5E5;padding:10px 0px 10px 0px; font-size:0.9em;font-weight:600;
            text-align:center;border-right:1px solid #D9D9D9">
                ADD QUANTITY 
            </div>

            <div class="col-lg-1half" style="background-color:#E5E5E5;padding:10px 0px 10px 0px;font-size:0.9em;font-weight:600;
             text-align:center;border-top-right-radius:8px;">
            TOTAL <br> AMOUNT
            </div>

           <!---------- First Row --------->
           @foreach($product as $productData)
           <div class="col-lg-2" class="table-img" style="background-color:#ffff;
            padding:5px 8px; text-align:left;border-top-left-radius:0px;height:80%;
            border-right:1px solid #D9D9D9;border-left:1px solid #D9D9D9;font-size:.9em !important;border-bottom:1px solid #D9D9D9;">
                <img src="{{asset('uploads/productImg/'.$productData->image)}}" alt="" 
                width="80%" height="80%" style="margin:auto;margin-left: 23px;width:50%">
            </div>
            <div class="col-lg-1half" style="background-color:#ffff; 
            padding:18px 0px 0px 0px; text-align:center;border-right:1px solid #D9D9D9;font-size:.8em !important;border-bottom:1px solid #D9D9D9;">
              {{$productData->name}}
            </div>
            <div class="col-lg-1half" style="background-color:#ffff;
            padding:18px 0px 0px 0px; text-align:center;border-right:1px solid #D9D9D9;font-size:.9em !important;border-bottom:1px solid #D9D9D9;">
               {{$productData->diameter}} 
               {{$productData->qty}}
            </div>
           
            <div class="col-lg-2" style="background-color:#ffff; color:EA9418;
            padding:18px 0px 0px 0px; text-align:center;border-right:1px solid #D9D9D9;font-size:.9em !important;border-bottom:1px solid #D9D9D9;color:#EA9418; font-weight:600">
                   INR {{$productData->price}}
            <input type="text" name="unitPrice" hidden value="{{$productData->price}}" id="unitPrice{{$productData->id}}">       
            </div>


            <div class="col-lg-2" style="background-color:#ffff;
             padding:18px 0px 0px 0px; text-align:center;border-top-right-radius:0px;
            border-right:1px solid #D9D9D9;font-size:.9em !important;border-bottom:1px solid #D9D9D9;">
            {{$productData->piece_per_bundal}}
            </div>

            <div class="col-lg-1half" style="background-color:#ffff;
             padding:18px 0px 0px 0px; text-align:center;border-right:1px solid #D9D9D9;font-size:.9em !important;border-bottom:1px solid #D9D9D9">
                <input placeholder="0" type="number" value="" name="pro_qty" id="pro_qty{{$productData->id}}" onkeyup="add_to_cart(<?php echo $productData->id;?>,<?php echo $productData->qty_id;?>,<?php echo $productData->price_id;?>)" style="width: 55%; padding-left:10px;background-color:#F7F5F5;border-radius:4px;border:none;height:24px">       
            </div>

    
            <div class="col-lg-1half" style="background-color:#ffff;
             padding:18px 0px 0px 0px; text-align:center;border-top-right-radius:0px;
            border-right:1px solid #D9D9D9;font-size:.9em !important;border-bottom:1px solid #D9D9D9;">
           INR <font class="priceValInputBox" id="priceVal{{$productData->id}}"></font>
        
            </div>

            <div style="width: 100%; height:1px;border:1px solid #D9D9D9 "></div>
            @endforeach
            <!---------- end  First Row --------->
            
            
              

            
            
            
            


            <div class="col-lg-12 col-md-12 col-sm-12 text-right" style="margin-top: 10px; left:15px;margin-bottom:40px">
            <span style="position:relative;font-size:0.8em;top:-10px; margin-right:40px">
                Total Order Value:
            <span style="position: absolute;right:8px;top:10px;color:black;font-size:1.5em;font-weight:600;
               ">
         INR <font id="totalAmt"></font>
                 <input type="text" name="totalAmtInputBox" id="totalAmtInputBox" hidden=""> 
            </span >
            </span>  
           <button style="padding:5px 20px 5px 20px;border:none;outline:none;
                background: linear-gradient(to right, #f7c328, #e88f16);color:white
                     ;border-radius:4px" onclick="checkCartForListTmp()">
              <a href="javascript:void(0)" style="color:white"> Proceed To cart </a>     
            </button>
              </div>
              </div><!--end of col-lg-8-row--->
            
            
            
            
            
            
             <div class="row lego-row buttons-bot" style="display:none;">
                
               @foreach($product as $productData)
                
                   <div class="row text-center" style="width:90%;margin:auto;background-color:#F3F2F2;margin-bottom:15px;padding-bottom:15px;border-radius:8px;margin-left:60px !important" >
            <div class="col-6 text-center">
              <h6 style="font-weight: 600;padding-top:33px">Product</h6>
            </div>
            <div class="col-6 text-center">

             <img src="{{asset('uploads/productImg/'.$productData->image)}}" alt="" 
                width="80%" height="80%" style="margin:auto;margin-left: 0px;width:50%;padding-top:10px">
            </div>
            
            <div class="col-6 text-center">
              <h6 style="font-weight: 600;padding-top:3px">PRODUCT NAME</h6>
            </div>
            <div class="col-6 text-center">

             {{$productData->name}}
            </div>
            
              <div class="col-6 text-left">
              <h6 style="font-weight: 600;padding-top:3px"> DIAMETER (in mm)</h6>
            </div>
            <div class="col-6 text-center">

             {{$productData->diameter}} 
               {{$productData->qty}}
            </div>
            
            
            
             <div class="col-6 text-left">
              <h6 style="font-weight: 600;padding-top:3px"> PRICE (in bundle)</h6>
            </div>
            <div class="col-6 text-center">

               INR {{$productData->price}}
            </div>
            
            
             <div class="col-6 text-left">
              <h6 style="font-weight: 600;padding-top:3px"> PIECE (in bundle)</h6>
            </div>
            <div class="col-6 text-center">

                {{$productData->piece_per_bundal}}
            </div>
            
            
            
              <div class="col-6 text-left">
              <h6 style="font-weight: 600;padding-top:3px">  ADD QUANTITY</h6>
            </div>
            <div class="col-6 text-center">

               <input placeholder="0" type="number" value="" name="pro_qty" id="pro_qty{{$productData->id}}" onkeyup="add_to_cart(<?php echo $productData->id;?>,<?php echo $productData->qty_id;?>,<?php echo $productData->price_id;?>)" style="width: 55%; padding-left:10px;background-color:#F7F5F5;border-radius:4px;border:none;height:24px;text-align: center;"> 
            </div>
            
            
            
             <div class="col-6 text-left">
              <h6 style="font-weight: 600;padding-top:3px"> TOTAL AMOUNT</h6>
            </div>
            <div class="col-6 text-center">

                INR <font class="priceValInputBox" id="priceVal{{$productData->id}}"></font>
            </div>
            
            
            
            
            
          </div>
          
          
          
          
          
          
          
          
          
          
          
          
             @endforeach
             
             
             
               <div class="col-lg-12 col-md-12 col-sm-12 text-right" style="margin-top: 10px; left:15px;margin-bottom:40px">
            <span style="position:relative;font-size:0.8em;top:-10px; margin-right:40px">
                Total Order Value:
            <span style="position: absolute;right:8px;top:10px;color:black;font-size:1.5em;font-weight:600;
               ">
         INR <font id="totalAmt"></font>
                 <input type="text" name="totalAmtInputBox" id="totalAmtInputBox" hidden=""> 
            </span >
            </span>  
           <button style="padding:5px 20px 5px 20px;border:none;outline:none;
                background: linear-gradient(to right, #f7c328, #e88f16);color:white
                     ;border-radius:4px" onclick="checkCartForListTmp()">
              <a href="javascript:void(0)" style="color:white"> Proceed To cart </a>     
            </button>
              </div>
             </div>