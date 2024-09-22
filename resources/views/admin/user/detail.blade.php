@extends('admin.layout.layout')
@section('title','User Details')
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
                  <h3 class="box-title">User Detail</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
           <div class="row">
           <div class="col-sm-1"></div>
           <div class="col-sm-4 detailsBlod">Name</div>
           <div class="col-sm-2">:</div>  
           <div class="col-sm-5">{{$dealOfDayDetails[0]['name']}}</div>    
           </div>

           <div class="row">
           <div class="col-sm-1"></div>
           <div class="col-sm-4 detailsBlod">Mobile No</div>
           <div class="col-sm-2">:</div>  
           <div class="col-sm-5">{{$dealOfDayDetails[0]['mobile_no']}}</div>    
           </div>

           <div class="row">
           <div class="col-sm-1"></div>
           <div class="col-sm-4 detailsBlod">Email</div>
           <div class="col-sm-2">:</div>  
           <div class="col-sm-5">{{$dealOfDayDetails[0]['email']}}</div>    
           </div>

           <div class="row">
           <div class="col-sm-1"></div>
           <div class="col-sm-4 detailsBlod">User Image</div>
           <div class="col-sm-2">:</div>  
           <div class="col-sm-5">
           @if($dealOfDayDetails[0]['img']) 
           <img style="width:180px;height:180px;" class="img img-responsive thumbnail details-img-size" src="{{asset('uploads/user/'.$dealOfDayDetails[0]['img'])}}"/>
           @else
           <img style="width:180px;height:180px;" class="img img-responsive thumbnail details-img-size" src="{{asset('uploads/user/default.png')}}"/>
           @endif
           </div>    
           </div>  

           <div class="row">
           <div class="col-sm-1"></div>
           <div class="col-sm-4 detailsBlod">Total No Of Order</div>
           <div class="col-sm-2">:</div>  
           <div class="col-sm-5">{{$totalBok}}</div>    
           </div>

           <div class="row">
           <div class="col-sm-1"></div>
           <div class="col-sm-4 detailsBlod">Country</div>
           <div class="col-sm-2">:</div>  
           <div class="col-sm-5">{{$dealOfDayDetails[0]['country']}}</div>    
           </div>

           <div class="row">
           <div class="col-sm-1"></div>
           <div class="col-sm-4 detailsBlod">City</div>
           <div class="col-sm-2">:</div>  
           <div class="col-sm-5">{{$dealOfDayDetails[0]['city']}}</div>    
           </div>

           <div class="row">
           <div class="col-sm-1"></div>
           <div class="col-sm-4 detailsBlod">Zip Code</div>
           <div class="col-sm-2">:</div>  
           <div class="col-sm-5">{{$dealOfDayDetails[0]['zip_code']}}</div>    
           </div>

           <div class="row">
           <div class="col-sm-1"></div>
           <div class="col-sm-4 detailsBlod">Address</div>
           <div class="col-sm-2">:</div>  
           <div class="col-sm-5">{{$dealOfDayDetails[0]['landmarkAddress']}}</div>    
           </div>

           <div class="row">
           <div class="col-sm-1"></div>
           <div class="col-sm-4 detailsBlod">About User</div>
           <div class="col-sm-2">:</div>  
           <div class="col-sm-5">{{$dealOfDayDetails[0]['about_user']}}</div>    
           </div>

           </div><!-- /.box -->
            </div><!--/.col (left) -->
            <!-- right column -->
          <!--   <div class="col-md-1"></div> -->
          </div>   <!-- /.row -->
        </section><!-- /.content -->

      </div><!-- /.content-wrapper -->
@endsection

      