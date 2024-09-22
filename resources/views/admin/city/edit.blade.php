@extends('admin.layout.layout')
@section('title','Edit Citt')
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
                  <h3 class="box-title">Edit City</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form role="form" method="post" id="editDoctorCatForm" action="{{url('city-update')}}">
                  <div class="box-body">
                    <div class="form-group">
                      <label for="name">City</label>
                      <input type="text" class="form-control" name="name" id="city" value="{{$editData->name}}" required="">
                      @error('name')
                      <div class="validate_err">{{ $message }}</div>
                      @enderror
                    </div>
                    @csrf

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
    
$('#editDoctorCatForm').validate({
rules:{
  name:{
   required:true, 
   maxlength:20,
   minlength:3,
  },
},
messages:{
   category_name:{
   required:'*Please Enter Size', 
   },   
}
});

});
</script>
@stop



      