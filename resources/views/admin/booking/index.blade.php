@extends('admin.layout.layout')
@section('title','Booking')
@section('content')

      <!-- Right side column. Contains the navbar and content of the page -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Order Management
            <small>Site Supply</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
            <li><a href="#">Dashboard</a></li>
            <li class="active">Order Management</li>
          </ol>
        </section>
        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Order Management</h3>
                </div><!-- /.box-header -->
                <div class="box-body">

                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>S.No</th>
                        <th>Order Id</th>                  
                        <th>User Name</th>
                        <th>Mobile No</th>
                        <th>Order Status</th>
                        <th>Delivery Date</th>
                        <th>Delivery Time</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                   @foreach($booking as $key => $orderDetails)
                   <tr>
                   <td>{{$key + 1}}</td>
                   <td>{{$orderDetails->order_id}}</td>
                   <td>{{$orderDetails->name}}</td> 
                   <td>
                   {{$orderDetails->mobile_no}}
                    </td>
                    <td>
<select name="bokStatus" onchange="changeOrdStatus('<?php echo $orderDetails->id;?>',this.value)" class="form-control changebokStatus">
<option value="">--Select Status--</option>  
<option <?php if($orderDetails->status=='requested'){echo"selected";}?> value="requested">Requested</option> 
<option <?php if($orderDetails->status=='accepted'){echo"selected";}?> value="accepted">Accepted</option> 
<option <?php if($orderDetails->status=='processing'){echo"selected";}?> value="processing">Processing</option> 
<option <?php if($orderDetails->status=='dispatch'){echo"selected";}?> value="dispatch">Dispatch</option> 
<option <?php if($orderDetails->status=='delivered'){echo"selected";}?> value="delivered">Delivered</option> 
<option <?php if($orderDetails->status=='cancel'){echo"selected";}?> value="cancel">Cancel</option>  
<option <?php if($orderDetails->status=='pending'){echo"selected";}?> value="pending">Pending</option>  
</select>

                    </td>
                    <td>{{date('d/m/yy',strtoTime($orderDetails->delivery_date))}}</td>
                    <td>{{date('h:i A',strtoTime($orderDetails->delivery_time))}}</td>
                    <td>
                      <a href="{{url('order-detail/'.$orderDetails->id)}}" class="btn btn-primary"><i class="fa fa-eye"></i></a>
                    </td>
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
@section('script')
<script>

function changeOrdStatus(id,type){
// alert(id);  
// alert(type);
$.ajax({
 url:"{{url('change-booking-status')}}",
 method:'post',
 data:{curStatus:type,id:id,"_token":'{{csrf_token()}}'},  
 success:function(data){
  swal("Done!", "Order Status Changed succesfully", "success"); 
 }
 });
}

</script>
@stop