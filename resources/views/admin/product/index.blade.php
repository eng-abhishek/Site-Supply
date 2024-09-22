@extends('admin.layout.layout')
@section('title','View Product')
@section('content')

      <!-- Right side column. Contains the navbar and content of the page -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
           Product Management
            <small>Site Supply</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
            <li><a href="#">Dashboard</a></li>
            <li class="active">Product</li>
          </ol>
        </section>
        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Product List</h3>
                  <a href="{{url('product-add')}}" style="float: right"><button class="btn btn-info"><i class="fa fa-plus"></i>Add Product</button></a> 
                </div><!-- /.box-header -->
                <div class="box-body">

                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>S.No</th>
                        <th>Name</th>
                        <th>Category Name</th>
                        <th>Image</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($category as $key=>$categoryval)
                      <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$categoryval->productName}}</td>
                        <td>{{$categoryval->productCateName}}</td>
                        <td>
<?php if($categoryval->productImg=='NULL'){
?>
<img src="{{asset('assets/front-end/img/default-img.png')}}" height="50px">
<?php
}else{
?>
<img src="{{asset('uploads/productImg/'.$categoryval->productImg)}}" height="50px">
<?php
}?>
                        </td>
                        <td>
                        @if($categoryval->status=='0')
                        <?php $statusval=''; ?>
                        @else
                         <?php $statusval='checked'; ?>
                        @endif
                         <input type="checkbox" id="doctor_status{{$categoryval->id}}" onchange="updateCategoryStatus({{$categoryval->id}})"  data-toggle="toggle" data-onstyle="success" value="{{$categoryval->ststus}}" data-offstyle="danger" <?php echo $statusval;?> data-on="Active" data-off="InActive">
                        </td>                
<td>                  
                        <a href="{{url("product-show/$categoryval->id")}}" class="btn btn-success"><i class="fa fa-eye"></i></a>
                        <a href="{{url("product-edit/$categoryval->id")}}" class="btn btn-info"><i class="fa fa-edit"></i></a>
                        <a href="{{url("product-destroy/$categoryval->id")}}" class="btn btn-danger delete-confirm"><i class="fa fa-trash"></i></a>                
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
function updateCategoryStatus(id){
// alert(id);
// return false;
 var CatStatus;  
 if($('#doctor_status'+id).is(":checked")){
 CatStatus='1';
 }else{
 CatStatus='0';  
 }
 $.ajax({
 url:"{{url('update-product-status')}}",
 method:'post',
 data:{CatStatus:CatStatus,id:id,"_token":'{{csrf_token()}}'},  
 success:function(data){
      swal("Done!", "Status Changed succesfully", "success");
 }
 });
}
</script>
@stop