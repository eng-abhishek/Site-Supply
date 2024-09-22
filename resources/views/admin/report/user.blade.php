@extends('admin.layout.layout')
@section('title','User Report')
@section('content')
      <div class="content-wrapper">
       <section class="content-header">
          <h1>
            User Report
            <small>Site Supply</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
            <li><a href="#">Dashboard</a></li>
            <li class="active">Report</li>
          </ol>
        </section>
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">User Report</h3>
                  <a href="{{url('user-report-export-excel')}}" style="float: right"><button class="btn btn-sm btn-info"><i class="fa fa-file-excel-o"></i>&nbsp;Export Excel</button></a>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>S.No</th>
                        <th>Name</th>  
                        <th>Email</th>                
                        <th>Mobile No</th>
                        <th>City</th>
                        <th>Zip Code</th>
                        <th>Country</th>
                        <th>Landmark Address</th>
                        <th>Total Order</th>
                      </tr>
                    </thead>
                    <tbody>
                   @foreach($order as $key => $orderDetails)
                   <tr>
                   <td>{{$key + 1}}</td>
                   <td>{{$orderDetails['name']}}</td>
                   <td>{{$orderDetails['email']}}</td>
                   <td>{{$orderDetails['mobile_no']}}</td>
                   <td>{{$orderDetails['city']}}</td>
                   <td>{{$orderDetails['zip_code']}}</td>
                   <td>{{$orderDetails['country']}}</td>
                   <td>{{$orderDetails['landmarkAddress']}}</td>
                   <td>{{$orderDetails['count'][0]}}</td>
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