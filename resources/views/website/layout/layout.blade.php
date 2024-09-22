<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title')</title>
    <meta name="keywords" content="@yield('meta_keywords')">
    <meta name="description" content="@yield('meta_description')">
    
    <!-- css -->
<link rel="stylesheet" href="{{asset('assets/front-end/css/bootstrap.min.css')}}">

<link rel="stylesheet" href="{{asset('assets/front-end/css/style.css')}}">

<link rel="stylesheet" href="{{asset('assets/front-end/css/responsive.css')}}">
<link rel="stylesheet" href="{{asset('assets/front-end/css/mobileresponsive.css')}}">

<!--- js validation --->
<!--<link href="{{asset('assets/jquery-validation/css/screen.css')}}" rel="stylesheet" type="text/css" />-->
<!--- End js validation --->

  <link rel='stylesheet' href='https://unpkg.com/swiper/swiper-bundle.min.css'>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<link rel="stylesheet" href="{{asset('assets/front-end/css/animate.min.css')}}">
<!-- custom css -->
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css'>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">


<style type="text/css">
.searchBoxStyle{
margin-top:10px;height:auto;background-color: #fbe6ad;
  position: absolute;
  z-index: 9999999;
  top: 78%;
  left: 19%;
  width: 21.5%;
  padding: 10px 0px 0 15px;
  list-style:none;
}	
.searchBoxStyle li{

}

        .openbutton {
            background-color: transparent;

            position: fixed;
            bottom: 23px;
            right: -560px;
            outline: none !important;
            border: 0px;
            cursor: none;
            z-index: 111111111;
        }

        .openbutton button,
        img {
            cursor: pointer;
            outline: none !important;
        }

        @media screen and (max-width: 450px) {
            .openbutton {
                background-color: transparent;

                position: fixed;
                bottom: 24px;
                right: -90px;
                outline: none !important;
                border: 0px;
                cursor: none;
                z-index: 111111111;
            }

            .openbutton,
            img {
                width: 13%;
            }

        }

        @media screen and (max-width: 400px) and (min-width: 360px) {
            .openbutton {
                background-color: transparent;

                position: fixed;
                bottom: 24px;
                right: -70px;
                outline: none !important;
                border: 0px;
                cursor: none;
                z-index: 111111111;
            }

            .openbutton,
            img {
                width: 13%;
            }

        }

        @media screen and (max-width: 359px) and (min-width: 320px) {
            .openbutton {
                background-color: transparent;

                position: fixed;
                bottom: 24px;
                right: -50px;
                outline: none !important;
                border: 0px;
                cursor: none;
                z-index: 111111111;
            }

            .openbutton,
            img {
                width: 15%;
            }

        }
</style>


</head>

<body>
<div>
@include('website.partials.header')
</div>
<div>
@yield('content')
</div>
<div>
    <!-- Start Footer Area -->
    @include('website.partials.footer')
</div>
@yield('script')
</body>
</html>