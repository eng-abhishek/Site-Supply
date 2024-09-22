@extends('admin.layout.layout')
@section('title','Add Product Brand')
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
                  <h3 class="box-title">Add New Brand</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form role="form" method="post" id="category-store" action="{{url('brand-store')}}" enctype="multipart/form-data">                 
                  <div class="box-body">
                    
                    <div class="form-group">
                      <label for="name">Name</label>
                      <input type="text" class="form-control" name="name" id="name" required="">
                      @error('name')
                      <div class="validate_err">{{ $message }}</div>
                      @enderror
                    </div>
                    @csrf

                    <div class="form-group">
                      <label for="logo">Brand Logo</label>
                      <input type="file" class="form-control" name="logo" id="logo" required="">
                  
                      @error('logo')
                      <div class="validate_err">{{ $message }}</div>
                      @enderror
                    </div>

                    <br><br>
                    <div class="form-group">
                    <label for="logo">Select Category</label>  
                    <select class="form-control" name="categoryId" onchange="getCategory(this.value)" required="">
                    <option value="">-- Select Category --</option> 
                    @foreach($category as $categoryData)
                    <option value="{{$categoryData->id}}">{{$categoryData->name}}</option> 
                    @endforeach
                    </select>
                    </div>

<div class="form-group">
<label for="type">Select Sub-Category</label>
<select class="form-control" name="productSubCate_id" id="productSubCate" required="">
<option value="">-- Select Sub-Category --</option>
</select>
                      @error('type')
                      <div class="validate_err">{{ $message }}</div>
                      @enderror
</div>
                     <div class="form-group">
                      <label for="category_img">Home Page Status</label>
                      <input type="checkbox" name="homePageStatus" id="chkbox">
                      @error('homePageStatus')
                      <div class="validate_err">{{ $message }}</div>
                      @enderror
                     </div>

                    </div>                  
                     <div class="box-footer">
                    <button type="submit" class="btn btn-primary btn-foodCat">Submit</button>
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
   name:{
   required:true,
   maxlength:30,
   minlength:3, 
  }
 },
 messages:{
   name:{
   required:'*Please Enter Brand', 
   }    
 } 
});

});

function getCategory(id){
 $.ajax({
 url:"{{url('get-product-subCategory')}}",
 method:'post',
 data:{id:id,"_token":'{{csrf_token()}}'},  
 success:function(data){
 console.log(data);
 $('#productSubCate').html(data[0]);


 }
 });
}      
</script>
@stop


      