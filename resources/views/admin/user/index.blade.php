@extends('admin.layout.layout')
@section('title','User')
@section('content')
      <!-- Right side column. Contains the navbar and content of the page -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
           User Management
            <small>Meat Empire</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
            <li><a href="#">Dashboard</a></li>
            <li class="active">User</li>
          </ol>
        </section>
        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">User Management</h3>
          <!--         <a href="{{url('order-report-excel')}}" style="float: right"><button class="btn btn-sm btn-info"><i class="fa fa-file-excel-o"></i>&nbsp;Export Excel</button></a>  -->
                </div><!-- /.box-header -->
                <div class="box-body">

                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>S.No</th>
                        <th>Name</th>                  
                        <th>Contact No</th>
                        <th>Email Id</th>
                        <th>Image</th>
                        <th>City</th>
                        <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                   @foreach($allUser as $key => $orderDetails)
                   <tr>
                   <td>{{$key + 1}}</td>
                   <td>{{$orderDetails->name}}</td>
                   <td>{{$orderDetails->mobile_no}}</td> 
                   <td>
                   {{$orderDetails->email}}
                    </td>
                    <td>
                    @if($orderDetails->img)
<img src="{{asset('uploads/user/'.$orderDetails->img)}}" width="50px">                   
                    @else
<img src="{{asset('uploads/user/default.png')}}" width="50px">
                    @endif 
                    </td>
                     <td>{{ $orderDetails->city.' '.$orderDetails->address}}</td> 
                     <td>                  
                     <a href="{{url("user-detail/$orderDetails->id")}}" class="btn btn-primary"><i class="fa fa-eye"></i></a>
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