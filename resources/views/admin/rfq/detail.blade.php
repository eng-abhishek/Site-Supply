@extends('admin.layout.layout')
@section('title','RFQ Details')
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
                  <h3 class="box-title">RFQ Detail</h3>
                </div><!-- /.box-header -->
                <!-- form start -->

           <div class="row">
           <div class="col-sm-1"></div>
           <div class="col-sm-4 detailsBlod">RFQ No</div>
           <div class="col-sm-2">:</div>  
           <div class="col-sm-5">{{$dealOfDayDetails[0]->rfq_no}}</div>    
           </div>

           <div class="row">
           <div class="col-sm-1"></div>
           <div class="col-sm-4 detailsBlod">User Contact No</div>
           <div class="col-sm-2">:</div>  
           <div class="col-sm-5">{{$dealOfDayDetails[0]->user_contact_no}}</div>    
           </div>

           <div class="row">
           <div class="col-sm-1"></div>
           <div class="col-sm-4 detailsBlod">Person Name</div>
           <div class="col-sm-2">:</div>  
           <div class="col-sm-5">{{$dealOfDayDetails[0]->personName}}</div>    
           </div>

           <div class="row">
           <div class="col-sm-1"></div>
           <div class="col-sm-4 detailsBlod">User Email Id</div>
           <div class="col-sm-2">:</div>  
           <div class="col-sm-5">{{$dealOfDayDetails[0]->user_email}}</div>    
           </div>

           <div class="row">
           <div class="col-sm-1"></div>
           <div class="col-sm-4 detailsBlod">City Name</div>
           <div class="col-sm-2">:</div>  
           <div class="col-sm-5">{{$dealOfDayDetails[0]->city}}</div>    
           </div>

           <div class="row">
           <div class="col-sm-1"></div>
           <div class="col-sm-4 detailsBlod">Address</div>
           <div class="col-sm-2">:</div>  
           <div class="col-sm-5">{{$dealOfDayDetails[0]->address}}</div>    
           </div>

           <div class="row">
           <div class="col-sm-1"></div>
           <div class="col-sm-4 detailsBlod">Product Name</div>
           <div class="col-sm-2">:</div>  
           <div class="col-sm-5">{{$dealOfDayDetails[0]->productName}}</div>    
           </div>

           <div class="row">
           <div class="col-sm-1"></div>
           <div class="col-sm-4 detailsBlod">Product Category</div>
           <div class="col-sm-2">:</div>  
           <div class="col-sm-5">{{$dealOfDayDetails[0]->proCatName}}</div>    
           </div>

           <div class="row">
           <div class="col-sm-1"></div>
           <div class="col-sm-4 detailsBlod">Brand</div>
           <div class="col-sm-2">:</div>  
           <div class="col-sm-5">{{$dealOfDayDetails[0]->brandName}}</div>    
           </div>

           <div class="row">
           <div class="col-sm-1"></div>
           <div class="col-sm-4 detailsBlod">Product Image</div>
           <div class="col-sm-2">:</div>  
           <div class="col-sm-5">
           <img style="width:180px;height:180px;" class="img img-responsive thumbnail details-img-size" src="{{asset('uploads/productImg/'.$dealOfDayDetails[0]->image)}}"/>
           </div>    
           </div> 
           
           <div class="row">
           <div class="col-sm-1"></div>
           <div class="col-sm-4 detailsBlod">Date</div>
           <div class="col-sm-2">:</div>  
           <div class="col-sm-5">
           {{$dealOfDayDetails[0]->created_at}}
           </div>    
           </div> 
           
           <div class="row">
           <div class="col-sm-1"></div>
           <div class="col-sm-4 detailsBlod">Product Description</div>
           <div class="col-sm-2">:</div>  
           <div class="col-sm-5">{!! $dealOfDayDetails[0]->product_des !!}</div>    
           </div>

           </div><!-- /.box -->
            </div><!--/.col (left) -->
            <!-- right column -->
          <!--   <div class="col-md-1"></div> -->
          </div>   <!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
@endsection



      