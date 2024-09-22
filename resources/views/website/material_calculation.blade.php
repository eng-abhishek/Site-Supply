@extends('website.layout.layout')
@section('content')
    <style>
    @media(max-width:414px)
    {
        #ajaxProductList .col-lg-2half, .col-lg-1half, .col-lg-2
        {
            width:100%;
        }
        .calculator
        {
            padding-top:15%;
        }
        .main-navigtaion a.navbar-brand img
        {
            width:20%;
                margin: 0px 0 0 50px !important;
        }
        .calculator h5{font-size:13px!important;}
        .lego1 {
    width: 93%!important;
    padding-left: 10px!important;
    padding: 10px!important;
    margin-bottom: 10px;
}
    }
    
@media(max-width:375px)
{
    .main-navigtaion a.navbar-brand img {
    width: 22%;
}
}

@media (max-width: 360px)
{
.main-navigtaion a.navbar-brand img {
    width: 25%;
}
}
        .max1 {
            background-image: url("<?php echo asset('assets/front-end/img/Group 154.png'); ?>");
            padding-top: 50px;
            padding-bottom: 50px;
        }

        .max1 h1 {
            color: white;
            font-size: 38px;
        }

        .max1 h5 {
            color: white;
        }

        .max2 {
            font-size: 0.7em;
            color: white;
            background-image: url("<?php echo asset('assets/front-end/img/Rectangle 48.png'); ?>");
            border-right: 1px solid white;
            padding: 8px 4px 8px 4px;
            width: 100%;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
            padding-top: 15px;
        }

        .max3 {
            font-size: 0.8em;
            font-weight: 600;
            padding: 20px 0px 20px 0px;
            background-color: #FAFBFE;
            margin-top: 0px;
            padding-left: -15px !important;
            width: 100%;
            text-align: center;
        }

        .max4 {
            text-align: center;
            background-color: white;
            font-size: 0.8em;
            font-weight: 600;
            padding: 20px 0px 20px 0px;
            padding-left: -15px !important;
            width: 100%;
            padding:6px;
        }

        .max4 input {

           
            border: none !important;
            text-align: center;
            width: 100% !important;
            outline: 1px solid #E4EAFD;
            padding-left: -5px !important;
        
        }
        .max4 input::placeholder{
            font-weight: 600;
            color:black;
            padding-left: -10px;

        }


        @media only screen and (max-width: 600px) {
           .lego{
               width: 95%;
               padding-left: 25px ;
              
           }

           .max3 {
          background-image: none;
          background-color: #FAFBFE;
        }

        .max2{
            text-align: center;
            padding-top: 8px !important;
        }

        .max2:first-child{
            padding-top: 10px !important;
        }

        .col-lg-1, .col-lg-1{
            margin-bottom: 15px;
        }

        .abc{
            width: 95%;
            margin: auto;
        }

        .max1 h5{
            font-size: 10px;
        }
        .lego1{
            margin-right: 14px !important;
        }

        }
    </style>


    <section class="calculator">


        <div class="container-fluid max1">

            <div class="container">

                <h1>
                    Home Build Estimator
                </h1>

                <h5 style="font-size: 17px;">

                    HOME BUILDING ESTIMATOR - CALCULATE YOUR BUILDING MATERIAL REQUIREMENTS IN MINUTES!
                </h5>

            </div>
        </div>


        <div class="container">
            <p style="font-size:0.9em !important; font-weight:500 !important; padding: 35px 5px 15px 5px;">
                Save Your Time and Money by estimating in advance the quantity requirement of your building materials. For example if you are
                building a home with a built area of 2000 square feet, our system will state you the quantity required for building material such as
                cement, stones,bricks, sand and TMT Bar (Rod/ Sariya). Use this information to plan construction and make sure that appropriate
                quantities are bought. SRMB steel makes it easy for you.Your dream home is going to be a reality soon!
            </p>
        </div>



        <div class="container">

            <div class="row">
                <div class="col-lg-12">


  <a href="{{url('contact')}}" class="lego1" style="color: white;background:#145ad2; padding:2px 8px 2px 8px;float:right;border-radius:3px;box-shadow: 2px 0px 5px 0px #145ad2;margin-right:-12px; font-size:0.8em;background-color:#145ad2v;color:#fff"> Ask for Quote</a>
                </div>
            </div>
            <div class="row abc" style="box-shadow:0px 0px 10px silver">
                
                <div class="col-lg-1" style="padding-left: 0px;padding-right:0px; border-radius:3px">
                    <div class="max2" style="padding-left: 8px; padding-right:px; padding-bottom:24px;border-radius:3px">
                        AREA (SQ.FT.)
                    </div>
                    <div class="max4">
                        <input type="number" class="" onkeyup="calculate_used_material()" id="squireFit" name="squireFit" style="padding:10px;border:1px solid silver !important;font-size:10px">
                    </div>
                </div>

                <div class="col-lg-2" style="padding-left: 0px;padding-right:0px;">
                    <div class="max2" style="padding-left: 15px; padding-right:px">
                        CONSUMPTION <br> OF CEMENT (BAGS)
                    </div>
                    <div class="max3" id="cement">
                         0             
                    </div>
                </div>

                <div class="col-lg-2" style="padding-left: 0px;padding-right:0px;">
                    <div class="max2" style="padding-left: 15px; padding-right:px">
                        CONSUMPTION <br> OF SAND (CFT)
                    </div>
                    <div class="max3" id="sand">
                       0
                    </div>
                </div>

                <div class="col-lg-2" style="padding-left: 0px;padding-right:0px;">
                    <div class="max2" style="padding-left: 12px; padding-right:px">
                    CONSUMTION OF STONE <br> AGGRIGATES (10MM) (CFT)
                    </div>
                    <div class="max3" id="stone10MM">
                     0                   
                    </div>
                </div>

                <div class="col-lg-2" style="padding-left: 0px;padding-right:0px;">
                    <div class="max2" style="padding-left: 15px; padding-right:px">
                        CONSUMTION OF STONE <br> AGGRIGATES (20MM) (CFT)
                    </div>
                    <div class="max3" id="stone20MM">
                        0
                    </div>
                </div>

                <div class="col-lg-1" style="padding-left: 0px;padding-right:0px;">
                    <div class="max2" style="padding-left: px; padding-right:px">
                        NO. OF BRICKS <br> REQUIRED
                    </div>
                    <div class="max3" id="usedBricks">
                    0
                    </div>
                </div>

                <div class="col-lg-2" style="padding-left: 0px;padding-right:0px;">
                <div class="max2" style="padding-left: 15px; padding-right:px;border-radius:3px">
                        TMT BAR <br> CONSUMPTION (KGS)
                    </div>
                    <div class="max3" id="usedTMTBarCON">
                       0
                    </div>
                </div>
               </div>

            <div class="row lego">
                <div class="col-lg-12 disc" style="font-size: 0.7em; margin-top:20px; padding-left:0px !important; margin-bottom:15px">
                    <strong> Disclaimer</strong> : This is an estimation and guidance only. Please take the exact quantity requirement from your appointed civil engineer.
                </div>
            </div>
        </div>
    </section>
@endsection
@section('script')
<script type="text/javascript">
function calculate_used_material(){
 var squireFit;
if($('#squireFit').val()){
 var squireFit=$('#squireFit').val();
    }else{
 var squireFit=0;
    }
 $.ajax({
 url:"{{url('get-use-material-in-squire')}}",
 method:'post',
 data:{squire_area:squireFit,"_token":'{{csrf_token()}}'},  
 success:function(data){
 $('#cement').html(data.cement.toFixed(2));
 $('#sand').html(data.sand.toFixed(2));
 $('#stone10MM').html(data.stone10MM.toFixed(2));
 $('#stone20MM').html(data.stone20MM.toFixed(2));
 $('#usedBricks').html(data.usedBricks.toFixed(2));
 $('#usedTMTBarCON').html(data.usedTMTBarCON.toFixed(2));
 

 }
 });
}
</script>
@endsection