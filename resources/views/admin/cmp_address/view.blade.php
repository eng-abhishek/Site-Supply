@extends('admin.layout.layout')
@section('title','Add Company Information')
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
            <li class="active">Add</li>
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
                  <h3 class="box-title">Add Company Address</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form role="form" method="post" id="company-store" action="{{url('company-address-store')}}" enctype="multipart/form-data">                 
                  <div class="box-body">
                    <div class="form-group">
                      <label for="cmp_address">Company Address</label>
                      <input type="text" class="form-control" value="{{$company_detail[0]->location}}" name="cmp_address" id="cmp_address" required="">
                      @error('cmp_address')
                      <div class="validate_err">{{ $message }}</div>
                      @enderror
                    </div>
                    @csrf
                    <div class="form-group">
                      <label for="cmp_email">Company Email</label>
                      <input type="text" value="{{$company_detail[0]->email}}" class="form-control" name="cmp_email" id="cmp_email" required="">
                      @error('cmp_address')
                      <div class="validate_err">{{ $message }}</div>
                      @enderror
                    </div>

                    <div class="form-group">
                      <label for="cmp_contact_no">Company Contact No</label>
                      <input type="text" class="form-control" value="{{$company_detail[0]->contact_no}}" name="cmp_contact_no" id="cmp_contact_no" required="">
                      @error('cmp_contact_no')
                      <div class="validate_err">{{ $message }}</div>
                      @enderror
                    </div>

                     <div class="form-group">
                      <label for="des">Enter About Company</label>
                      <textarea class="form-control ckeditor" name="des" id="des" required="">{{$company_detail[0]->description}}</textarea>
                      @error('cmp_address')
                      <div class="validate_err">{{ $message }}</div>
                      @enderror
                     </div>

                    </div>                  
                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary btn-proCat">Submit</button>
                  </div>
                </form>
               </div><!-- /.box-body -->
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
$('#category-store').validate({
 rules:{
   cmp_address:{
   required:true,
   minlength:10,
   maxlength:50,   
  },
  cmp_email:{
  email:true,
  },
  cmp_contact_no:{
  number:true,
  maxlength:10,
  minlength:10,
  },
  des:{
  required:true,
  }, 
 },
 messages:{
   cmp_address:{
   required:'*Please Enter Category Name', 
   },
  cmp_email:{
    required:'*Please Enter Email Id', 
  },
  cmp_contact_no:{
  required:'*Please Enter Contact No', 
  },
  des:{
  required:'*Please Enter About Company',
  },    
 } 
});
});
</script>
@stop


      