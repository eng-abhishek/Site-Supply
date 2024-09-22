@extends('admin.layout.layout')
@section('title','Edit Testimonial')
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
            <li class="active">Edit</li>
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
                  <h3 class="box-title">Edit Testimonial</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form role="form" method="post" id="editDoctorCatForm" action="{{url('testimonial-update')}}" enctype="multipart/form-data">
                  <div class="box-body">

                     <div class="form-group">
                      <label for="service_name">Name</label>
                      <input type="text" class="form-control" name="name" id="name" value="{{$editData->name}}" required="">
                      @error('name')
                      <div class="validate_err">{{ $message }}</div>
                      @enderror
                     </div>
                    @csrf

                      <div class="form-group">
                      <label for="designation">Designation</label>
                      <input type="test" class="form-control" value="{{$editData->designation}}" name="designation" id="designation" required="">
                      @error('designation')
                      <div class="validate_err">{{ $message }}</div>
                      @enderror
                      </div>

                     <div class="form-group">
                      <label for="category_img">Image</label>
                      <input type="file" class="form-control" name="img" id="img">
                      @error('img')
                      <div class="validate_err">{{ $message }}</div>
                      @enderror
                    </div>

<?php 
if($editData->img=='NULL'){
  ?>
  <input type="text" hidden name="OldImg" value="NULL"> 
<?php
}else{
  ?>
<img src="{{ asset("uploads/testimonial/$editData->img")}}" width="50px">
<input type="text" hidden name="OldImg" value="{{$editData->img}}"> 
<?php
}
?>
                      <div class="form-group">
                      <label for="des">Description</label>
                      <textarea type="test" class="form-control ckeditor" name="des" id="des" required="">{{$editData->des}}</textarea>
                      @error('des')
                      <div class="validate_err">{{ $message }}</div>
                      @enderror
                      </div>

                   </div><!-- /.box-body -->
                  <input type="text" hidden name="editId" value="{{$editData->id}}"> 
          
                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary edit-btn-foodCat">Submit</button>
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
@section('script')
<script>
      $(function(){
 
$('.topbar-errmsg').hide();  
$('.catSec-errmsg').hide();   
$('#editDoctorCatForm').validate({
rules:{
  category_name:{
   required:true, 
   maxlength:30,
   minlength:5,
  },
},
messages:{
   category_name:{
   required:'*Please Enter Category Name', 
   },   
}
});

});
</script>
@stop



      