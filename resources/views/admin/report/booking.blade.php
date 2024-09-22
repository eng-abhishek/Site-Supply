@extends('admin.layout.layout')
@section('title','Booking Report')
@section('content')
      <!-- Right side column. Contains the navbar and content of the page -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
           Booking Report
            <small>Site Supply</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
            <li><a href="#">Dashboard</a></li>
            <li class="active">Report</li>
          </ol>
        </section>
        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Booking Report</h3>
                  <a href="{{url('order-report-excel')}}" style="float: right"><button class="btn btn-sm btn-info"><i class="fa fa-file-excel-o"></i>&nbsp;Export Excel
                   </button></a> 
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                        <th>S.No</th>
                        <th>Order Id</th>  
                        <th>Transation Id</th>   
                        <th>Payment Mode</th>             
                        <th>User Name</th>
                        <th>Mobile No</th>
                        <th>Order Status</th>
                        <th>Delivery Date & Time</th>
                        <th>Order Date</th>
                       </tr>
                    </thead>
                    <tbody>
                   @foreach($booking as $key => $orderDetails)
                   <tr>
                   <td>{{$key + 1}}</td>
                   <td>{{$orderDetails->order_id}}</td>
                   <td>{{$orderDetails->transation_id}}</td>
                   <td>{{$orderDetails->payment_mode}}</td>
                   <td>{{$orderDetails->name}}</td> 
                   <td>{{$orderDetails->mobile_no}}</td>
                   <td>{{$orderDetails->status}}</td>
                   <td>{{date('d/m/yy',strtotime($orderDetails->delivery_date))}}
                    {{date('h:i A',strtotime($orderDetails->delivery_time))}}
                    </td>
                    <td>{{date('d/m/yy h:i A',strtotime($orderDetails->created_at))}}</td>
                   </tr>
                      @endforeach
                    </tbody>                   
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
@endsection