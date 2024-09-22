@extends('admin.layout.layout')
@section('title','Add Product Category')
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
                  <h3 class="box-title">Add New Product Category</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form role="form" method="post" id="category-store" action="{{url('category-store')}}" enctype="multipart/form-data">                 
                  <div class="box-body">
                    
                    <div class="form-group">
                      <label for="category_name">Category Name</label>
                      <input type="text" class="form-control" name="category_name" id="category_name" required="">
                      @error('category_name')
                      <div class="validate_err">{{ $message }}</div>
                      @enderror
                    </div>
                    @csrf

                     <div class="form-group">
                      <label for="type">Category Type</label>
<select class="form-control" name="type" id="type" onchange="getCategoryType(this.value)" required="">
<option value="">-- Select Category Type --</option>
<option value="p"> Parent </option>
<option value="c"> Child </option>
</select>
                      @error('type')
                      <div class="validate_err">{{ $message }}</div>
                      @enderror
                    </div>

                      <div class="form-group" id="parentData">
                      <label for="parent_id">Select Parent Category</label>
<select class="form-control" name="parent_id" id="parent_id">
<option value="">-- Select Parent Category --</option>
@foreach($parent as $parentData)
<option value="{{$parentData->id}}">{{$parentData->name}}</option>
@endforeach
</select>
                      @error('type')
                      <div class="validate_err">{{ $message }}</div>
                      @enderror
                      </div>

                      <div class="form-group" id="GST" style="display:none;">
                      <label for="type">GST</label>
                      <input type="number" name="gst" class="form-control" id="gst" required="">
                      </div>

<div class="form-group" id="shippingStatus" style="display:none">
                      <label for="type">Apply Shipping Charge</label>
<select class="form-control" name="shipingCharge">
<option value="">-- Setect Shipping --</option>
<option value="1"> Yes </option>
<option value="0"> No </option>
</select>
                    </div>

                     <div class="form-group">
                      <label for="type">Category Description</label>
<select class="form-control" onchange="checkCateDescription(this.value)" name="cateStatus" required="">
<option value="">-- Category Description --</option>
<option value="yes"> Yes </option>
<option value="no"> No </option>
</select>
                    </div>

                      <div class="form-group" id="tempDescription" style="display:none;">
                      <label for="type">Description</label>
                      <textarea name="cateDes" class="form-control ckeditor" id="cateDes"></textarea>
                      @error('type')
                      <div class="validate_err">{{ $message }}</div>
                      @enderror
                      </div>

                      <div class="form-group" id="templateDiv">
                      <label for="category_img">Select Template</label>
                      <div style="padding-left:20px" class="templateNameDiv">
                      <input type="radio" name="templateName" value="1" required="">&nbsp; Template One&nbsp;(Box Format)
                      <br>
                      <input type="radio" name="templateName" value="2" required="">&nbsp; Template Two&nbsp;(Table Format)
                      <br>
                      <input type="radio" name="templateName" value="3" required="">&nbsp; Template Three &nbsp;(Table Format)
                      </div>
                      </div>

                      <div class="form-group">
                      <label for="category_img">Category Image</label>
                      <input type="file" class="form-control" name="category_img" id="category_img" required="">
                      @error('category_img')
                      <div class="validate_err">{{ $message }}</div>
                      @enderror
                      </div>
                      <br><br>  

<div class="form-group">
<label for="product">Select Product Price & City</label>
<div class="row">
<div class="col-sm-1"></div>  
<div class="col-sm-10">
                    <table class="table table-bordered">
                     <tr>
                     <td>Select City</td>
                     <td>City Name</td>
                     </tr> 
@foreach($city as $key=> $cityData)
                     <tr>
                     <td>
                     <input type="checkbox" name="cityChkBox[]" id="chkstatus{{$key}}" value="{{$cityData->id}}" onchange="applyCity(<?php echo $key;?>)">  
                     </td>
                     <td>{{$cityData->name}}</td>
                     </tr>
@endforeach
                     </table>  
</div>  
<div class="col-sm-1"></div>  
</div>
</div>



                      <div class="form-group homePageStatusDiv">           
                     <input type="checkbox" name="homePageStatus" id="homePageStatus" onchange="homePageChkbox()">
                      <label for="category_img">Home Page Status</label>
                      @error('homePageStatus')
                      <div class="validate_err">{{ $message }}</div>
                      @enderror
                      </div>

                     <div class="form-group" >
                     <label for="type">Meta Title</label>
                     <textarea name="meta_title" class="form-control" rows="6">{{$productCate->meta_title}}</textarea>
                      @error('meta_title')
                      <div class="validate_err">{{ $message }}</div>
                      @enderror
                     </div>

                      <div class="form-group" >
                     <label for="type">Meta Description</label>
                     <textarea name="meta_des" class="form-control" rows="6">{{$productCate->meta_des}}</textarea>
                      @error('meta_des')
                      <div class="validate_err">{{ $message }}</div>
                      @enderror
                     </div>

                      <div class="form-group" >
                     <label for="type">Meta Keyword</label>
                     <textarea name="meta_keyword" class="form-control" rows="6">{{$productCate->meta_keyword}}</textarea>
                      @error('meta_keyword')
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
$('#parentData').hide();
$('#templateDiv').hide();
$('#category-store').validate({
 rules:{
  category_name:{
   required:true,
   minlength:3,
   maxlength:30,   
  }
 },
 messages:{
   category_name:{
   required:'*Please Enter Category Name', 
   }    
 } 
});

});

function getCategoryType(type){
if(type=='c'){
$('.homePageStatusDiv').hide();  
$('#parentData').show();
$('#parent_id').attr('required',true);
$('.btn-proCat').removeAttr('disabled');
$('#templateDiv').show();
$('#GST').show();
$('#shippingStatus').show();
$('#shipingCharge').prop('required',true);
}else{
$('.homePageStatusDiv').show();
$('#parentData').hide();
$('#parent_id').attr('required',false);
$('.btn-proCat').removeAttr('disabled');
$('#templateDiv').hide();
$('#GST').hide();
$('#shippingStatus').hide();
$('#shipingCharge').prop('required',false);
}
}

function homePageChkbox(){
var parentId='';
if($('#homePageStatus').is(':checked')){
if($('#type').val()=='c'){
parentId=$('#parent_id').val();
$.ajax({
url:"{{url('set_subCategory_homePage_status')}}",
method:'POST',
data:{id:parentId,"_token":'{{csrf_token()}}'},
success:function(data){
console.log(data);
if(data=='0'){
alert('Oop`s One Category Is Already Used');

$('.btn-proCat').attr('disabled','disabled');

$('#homePageStatus').removeAttr('checked');

}else{
$('.btn-proCat').removeAttr('disabled');
}
}
});
}
}else{

}
}

function checkCateDescription(type){
if(type=='yes'){
$('#tempDescription').show();
$('#cateDes').prop('required',true);
}else{
$('#tempDescription').hide();
$('#cateDes').prop('required',false);

}  
}
</script>
@stop


      