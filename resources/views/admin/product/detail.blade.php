@extends('admin.layout.layout')
@section('title','Product Details')
@section('content')

  <!-- Right side column. Contains the navbar and content of the page -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Admin 
            <small>Site Supply</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
            <li><a href="#">Dashboard</a></li>
            <li class="active">Detail</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
    <!--       <div class="col-md-1"></div> -->
            <!-- left column -->
            <div class="col-md-12">
              <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title">Product Detail</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
           <div class="row">
           <div class="col-sm-1"></div>
           <div class="col-sm-4 detailsBlod">Name</div>
           <div class="col-sm-2">:</div>  
           <div class="col-sm-5">{{$dealOfDayDetails[0]->productName}}</div>    
           </div>

           <div class="row">
           <div class="col-sm-1"></div>
           <div class="col-sm-4 detailsBlod">Brand</div>
           <div class="col-sm-2">:</div>  
           <div class="col-sm-5">{{$dealOfDayDetails[0]->brand_name}}</div>    
           </div>

           <div class="row">
           <div class="col-sm-1"></div>
           <div class="col-sm-4 detailsBlod">Product Category</div>
           <div class="col-sm-2">:</div>  
           <div class="col-sm-5">{{$dealOfDayDetails[0]->productCateName}}</div>    
           </div>

           <div class="row">
           <div class="col-sm-1"></div>
           <div class="col-sm-4 detailsBlod">Product Sub Category</div>
           <div class="col-sm-2">:</div>  
           <div class="col-sm-5">{{$productSubCategory[0]->name}}</div>    
           </div>

           <div class="row">
           <div class="col-sm-1"></div>
           <div class="col-sm-4 detailsBlod">HSN/SAC Code</div>
           <div class="col-sm-2">:</div>  
           <div class="col-sm-5">{{$dealOfDayDetails[0]->hsn_code}}</div>    
           </div>

           <div class="row">
           <div class="col-sm-1"></div>
           <div class="col-sm-4 detailsBlod">Product Image</div>
           <div class="col-sm-2">:</div>  
           <div class="col-sm-5">
           <img style="width:180px;height:180px;" class="img img-responsive thumbnail details-img-size" src="{{asset('uploads/productImg/'.$dealOfDayDetails[0]->productImg)}}"/>
           </div>    
           </div> 

           <div class="row">
           <div class="col-sm-1"></div>
           <div class="col-sm-4 detailsBlod">Product Description</div>
           <div class="col-sm-2">:</div>  
           <div class="col-sm-5">{!! $dealOfDayDetails[0]->description !!}</div>    
           </div>

           <div class="row">
           <div class="col-sm-1"></div>
           <div class="col-sm-4 detailsBlod">Product Price Details</div>
           <div class="col-sm-2">:</div>  
           <div class="col-sm-5">
<table class="table table-bordered">
 <tr>
  <th>City</th> 
  <th>Price</th>
 </tr>
@foreach($productPriceDetails as $productPriceDetailsVal)
 <tr>
  <td>{{$productPriceDetailsVal->name}}</td> 
  <td><i class="fa fa-inr">{{$productPriceDetailsVal->price}}</i></td>
 </tr>
 @endforeach
</table>
           
           </div>    
           </div> 

            

           </div><!-- /.box -->
            </div><!--/.col (left) -->
            <!-- right column -->
          <!--   <div class="col-md-1"></div> -->
          </div>   <!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
@endsection



      