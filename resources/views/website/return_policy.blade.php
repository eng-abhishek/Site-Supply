@extends('website.layout.layout')
@section('content')    
    <style>
    
    @media (max-width: 414px)
{
.privacy {
    padding-top: 53%;
}
.privacy h2{font-size:20px!important;}
.legoz {
    margin: -35px 15px 0px 0px!important;
}
.main-navigtaion .navbar-brand img {
    min-width: 25% !important;
    margin: 0px 0 0 50px !important;
}
}
@media(max-width:375px)
{
    .privacy h2 {
    font-size: 19px!important;
}
.privacy {
    padding-top: 60%;
}
}
@media(max-width:320px)
{
    .privacy {
    padding-top: 70%;
}
}
        h1{
            font-size: 1.7em !important;
            font-weight: 700 !important;
            padding: 5px 0px 5px 15px;
            border-left: 1px solid #575656;
        }
        
        h2{
            font-size: 1.3em !important;
        }
        
        h3{
            font-size: 1.1em !important;
            border-left: 1px solid #BDB9B9;
            padding: 5px 0px 5px 15px;
        }

          @media only screen and (max-width: 800px) {

            ul{
                padding-left: 10px !important;
                padding-right: 10px !important;
            }

            .legoz{
                padding: 10px !important;
            }

              }
    </style>

    <section class="privacy">
        <div class="container-fluid">
            <div class="row legoz" style="margin-top: 120px; padding: 10px 70px 0px 40px">
                <div class="col-lg-12">
                    <h2>
                     Policy On Merchandise Return, Substitution and Refund.
                    </h2> <br>  
                    <h1>
                     Replacement & Return of Goods
                    </h1>
                    <p>
                      At the time of sale, all products must be carefully reviewed by the customer for quality and quantity satisfaction.
                    </p>    
                    <p>
                     Returns and replacements for any product(s) will only be considered for faulty or defective goods.
                    </p> 
                    <p>
                    Please do not accept any goods that have been damaged or tampered with in any way (excludes normal wear & tear and markings on the outer surface of the packaging, acceptable in the transit process).
                    </p> 
                    <p>
                      If the consumer returns the product without prior permission of the company, then the product will not be accepted back by the company.
                    </p>
                    <p>
                    To be eligible for a replacement, the customer must send photo/s of the broken/damaged product/s and incomplete/incorrect delivery to the customer service team.  
                    </p>
                    <p>Items must be returned in their original packaging, with all price tags, stickers, invoices, and documents in good working order, and must be unopened.</p>

                    <p>Please do not return items without first contacting a Site Supply Infratech representative using the methods mentioned above.</p><br>
                     <h2>
                    REFUND REQUIREMENTS
                    </h2>
                     <p>
                    Only the following circumstances will result in a refund:
                    </p>

                    <p>Suitsupply Infratech is unable to provide the requested commodity.</p>
                    <p>If a substitute for the same product is unavailable, or if the vendor fails to produce the product within the timeframe stated on the website, the customer can request a refund.</p>
                    <p>Please do not consider any goods that have been damaged or tampered with in any way (this does not include usual wear and tear or markings).</p>
                    <p>The package must be returned in its original packaging, with all original price tags, stickers, invoices, and documents in good working order, and must be unopened.
                    </p>
                    <p>The returned object must be in the same undamaged condition as when it was received.</p>
                    <br>
                    <h2>CANCELLATION & REFUND ORDER</h2>
                    <p>Just before the product is delivered, can you cancel your order? Your entire order balance will be refunded as a credit note, which will appear in your account as well.</p>
                    <p>If you want to cancel an order, you can do so before the seller ships it to you. Your previous order will be cancelled in this situation, and a new one will be produced. Contact our customer service department at the phone mentioned above number for more information.</p>
                   <p>Once your order has been cancelled, we will process a refund in the form of a credit note that you can use for future orders with us within 30 days.</p>

                   <br> <br>
                </div>
            </div>
        </div>
    </section>
@endsection