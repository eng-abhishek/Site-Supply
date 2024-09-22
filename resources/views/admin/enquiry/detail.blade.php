@extends('admin.layout.layout')
@section('title','Enquiry Details')
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
                  <h3 class="box-title">Enquiry Detail</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
           <div class="row">

          
           <div class="col-sm-1"></div>
           <div class="col-sm-4 detailsBlod">Name</div>
           <div class="col-sm-2">:</div>  
           <div class="col-sm-5">{{$dealOfDayDetails[0]->name}}</div>    
           </div>

           <div class="row">
           <div class="col-sm-1"></div>
           <div class="col-sm-4 detailsBlod">Contact No</div>
           <div class="col-sm-2">:</div>  
           <div class="col-sm-5">{{$dealOfDayDetails[0]->contactNo}}</div>    
           </div>

           <div class="row">
           <div class="col-sm-1"></div>
           <div class="col-sm-4 detailsBlod">Email</div>
           <div class="col-sm-2">:</div>  
           <div class="col-sm-5">{{$dealOfDayDetails[0]->email}}</div>    
           </div>

           <div class="row">
           <div class="col-sm-1"></div>
           <div class="col-sm-4 detailsBlod">Date</div>
           <div class="col-sm-2">:</div>  
           <div class="col-sm-5">{{ date('d-M-Y h:i A',strtotime($dealOfDayDetails[0]->created_at))}}</div>    
           </div>



           <div class="row">
           <div class="col-sm-1"></div>
           <div class="col-sm-4 detailsBlod">Product Name</div>
           <div class="col-sm-2">:</div>  
           <div class="col-sm-5">{{$dealOfDayDetails[0]->productName}}</div>    
           </div>

           <div class="row">
           <div class="col-sm-1"></div>
           <div class="col-sm-4 detailsBlod">Comment</div>
           <div class="col-sm-2">:</div>  
           <div class="col-sm-5">{{$dealOfDayDetails[0]->description}}</div>    
           </div>

           </div><!-- /.box -->
            </div><!--/.col (left) -->
            <!-- right column -->
          <!--   <div class="col-md-1"></div> -->
          </div>   <!-- /.row -->
        </section><!-- /.content -->

      </div><!-- /.content-wrapper -->
@endsection



      