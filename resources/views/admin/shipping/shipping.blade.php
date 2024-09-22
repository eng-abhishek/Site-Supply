@extends('admin.layout.layout')
@section('title','Shipping Management')
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
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Dashboard</a></li>
            <li class="active">Shipping Management</li>
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
                  <h3 class="box-title">Shipping Management</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form role="form" method="post" id="" action="{{url('update-shipping-charge')}}" enctype="multipart/form-data">
                <div class="box-body">

                <div class="row">
                <div class="col-md-12">
                <label for="clint_name">Select Product</label>
                </div>  
                </div>

<div class="row">
<div class="col-md-12">
<table class="table table-bordered">
<tr>
<th>Min Amount</th>
<th>Max Amount</th>
<th>Shipping Amount</th>  
</tr>

<tr>
<td><input type="text" name="minAmt1" value="{{$first_row->min_amount}}" class="form-control"></td>
<td><input type="text" name="maxAmt1" value="{{$first_row->max_amount}}" class="form-control"></td>
<td><input type="text" name="shipingAmt1" value="{{$first_row->charge}}" class="form-control"></td>  
</tr>

<tr>
<td><input type="text" name="minAmt2" value="{{$second_row->min_amount}}" class="form-control"></td>
<td><input type="text" name="maxAmt2" value="{{$second_row->max_amount}}" class="form-control"></td>
<td><input type="text" name="shipingAmt2" value="{{$second_row->charge}}" class="form-control"></td>  
</tr>

<tr>
<td><input type="text" name="minAmt3" value="{{$third_row->min_amount}}" class="form-control"></td>
<td><input type="text" name="maxAmt3" value="{{$third_row->max_amount}}" class="form-control"></td>
<td><input type="text" name="shipingAmt3" value="{{$third_row->charge}}" class="form-control"></td>  
</tr>

<tr>
<td><input type="text" name="minAmt4" value="{{$fourth_row->min_amount}}" class="form-control"></td>
<td><input type="text" readonly name="maxAmt4" value="{{$fourth_row->max_amount}}" class="form-control"></td>
<td><input type="text" name="shipingAmt4" value="{{$fourth_row->charge}}" class="form-control"></td>  
</tr>

</table>                    

</div>
</div>
                    @csrf
                  </div><!-- /.box-body -->                
                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                </form>
              </div><!-- /.box -->

            </div><!--/.col (left) -->
            <!-- right column -->
          <!--   <div class="col-md-1"></div> -->
          </div>   <!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
@endsection