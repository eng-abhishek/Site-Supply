@extends('admin.layout.layout')
@section('title','RFQ')
@section('content')

      <!-- Right side column. Contains the navbar and content of the page -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
           RFQ Management
            <small>Site Supply</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
            <li><a href="#">Dashboard</a></li>
            <li class="active">RFQ</li>
          </ol>
        </section>
        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">RFQ List</h3>
                 </div><!-- /.box-header -->
                <div class="box-body">

                 <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>S.No</th>
                        <th>RFQ No</th>
                        <th>Product Name</th>
                        <th>User Contact No</th>
                        <th>Person Name</th>
                        <th>User Email</th>
                        <th>City</th>
                        <th>Date</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($rfq as $key=>$rfqData)
                      <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$rfqData->rfq_no}}</td>
                        <td>{{$rfqData->productName}}</td>  
                        <td>{{$rfqData->user_contact_no}}</td>
                        <td>{{$rfqData->personName}}</td>
                        <td>{{$rfqData->user_email}}</td>  
                        <td>{{$rfqData->city}}</td>
                        <td>{{$rfqData->created_at}}</td>
                        <td>                  
                        <a href="{{url("view-more/$rfqData->id")}}" class="btn btn-info"><i class="fa fa-eye"></i></a>
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