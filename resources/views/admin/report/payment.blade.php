@extends('admin.layout.layout')
@section('title','Payment Report')
@section('content')

      <!-- Right side column. Contains the navbar and content of the page -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Payment Report
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
                  <h3 class="box-title">Payment Report</h3>
                  <a href="{{url('payment-report-export-excel')}}" style="float: right"><button class="btn btn-sm btn-info"><i class="fa fa-file-excel-o"></i>&nbsp;Export Excel</button></a>
                </div><!-- /.box-header -->
                <div class="box-body">

                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>S.No</th>
                        <th>Order Id</th>  
                        <th>Product Total</th>  
                        <th>Pay Amount</th>                
                        <th>Payment Mode</th>
                        <th>Transation Id</th>
                        <th>Order Status</th>
                        <th>Payment Status</th>
                        <th>Delivery Date & Time</th>
                        <th>Order Date</th>
                      </tr>
                    </thead>
                    <tbody>
                   @foreach($order as $key => $orderDetails)
                   <tr>
                   <td>{{$key + 1}}</td>
                   <td>{{$orderDetails->order_id}}</td>
                   <td>{{$orderDetails->non_act_totalAmt}}</td>
                   <td>{{$orderDetails->product_total_price}}</td> 
                   <td>{{$orderDetails->payment_mode}}</td>
                   <td>{{$orderDetails->transation_id}}</td>
                   <td>{{$orderDetails->status}}</td>
                   <td>
                   <select class="form-control" name="paymentStatus" id="paymentStatus" onchange="changePayment({{$orderDetails->id}},this.value)">
                   <option <?php if($orderDetails->payment_status=='Unpaid'){ echo"selected";} ?> value="Unpaid">Unpaid</option>
                   <option <?php if($orderDetails->payment_status=='Paid'){ echo"selected";} ?> value="Paid">Paid</option>
                   </select>
                   </td>
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
@section('script')
<script>
function changePayment(id,val){
 $.ajax({
 url:"{{url('change-payment-status')}}",
 method:'post',
 data:{val:val,id:id,"_token":'{{csrf_token()}}'},  
 success:function(data){
  swal("Done!", "Payment Status Changed succesfully", "success"); 
 }
 });
}    
    
</script>
@endsection