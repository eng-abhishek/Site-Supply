<style>
    @media (max-width: 320px)
{
.top-header ul {
    margin-top: 25px;
    border-bottom: transparent;
    margin-left: -28px;
    margin-right: -23px;
}
.top-header ul li a {
    font-size: 8px!important;
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
    font-weight: 400 !important;
    font-size: 19px;
    padding: 4px 26px !important;
    background-image: linear-gradient(to right, #f8c729 , #e99016);
    border-radius: 5px;
    border: none;
    margin-top: 0px !important;
}
  

</style>

@extends('website.layout.layout')
@section('content')

<style>
     @media screen and (max-width: 480px) {
         .openbutton, img {
    width: 25%;
}
       .contact-us-page .bg-gradient {
    height: auto!important;
    margin: 0% 0 0 0!important;
    margin-top:0px !important;
}
  }
  @media (max-width: 414px){
textarea {
    margin-top: 0px!important;
    height: 69px!important;
}
.form-side
{
    height:auto!important;
}
.contact-us-page
{
        margin-top: 167px!important;
}
} 
</style>
       <!-- contact us -->
      <div class="contact-us-page" style="margin-top:150px">
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d56935.304058744194!2d80.95970217980688!3d26.88900358579541!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x399be2aa9fd75395%3A0x3c1cd0b6b63db0a5!2sIndira%20Nagar%2C%20Lucknow%2C%20Uttar%20Pradesh%20226016!5e0!3m2!1sen!2sin!4v1617603283324!5m2!1sen!2sin" width="100%" height="500" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
      <section class="bg-gradient p50" style="height:600px;margin:40px;margin-top:10px;"> 
               
              <div class="container">
                   <div class="row">
                    <div class="col-md-6 text-col">
                  <h1>Contact Us</h1>
                  <h3><b>For</b> Corporate or Bulk Enquiry</h3>
 <p>{!! $cmpAddress->description !!}</p>
 <h4>Delhi</h4>
 <ul>
  <li><i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;&nbsp;
  {{$cmpAddress->location}}
  </li>
  <li><i class="fa fa-envelope" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;&nbsp;{{$cmpAddress->email}}</li>
  <li><i class="fa fa-phone" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;&nbsp;+91-{{$cmpAddress->contact_no}}</li>
 </ul>
                   </div>

                       <div class="col-md-6 form-side" style="height:492px">
                
                       <div class="c-form">
                        <form id="enquiryForm" method="post" action="{{url('store-enquiry-page')}}">
                          <div class="form-group">
                             <label>Name</label>
                             <input type="text" name="name" class="form-control name" placeholder="Name">
                          </div>  
                          <div class="form-group">
                             <label>Contact Number</label>
                             <input type="text" name="contactNo" class="form-control contactNo" placeholder="Contact No">
                          </div>
                          @csrf
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
           </div>
       <!-- contaxt us -->
@endsection      

