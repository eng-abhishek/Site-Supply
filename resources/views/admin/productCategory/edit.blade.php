@extends('admin.layout.layout')
@section('title','Edit Product Category')
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
                  <h3 class="box-title">Edit Product Category</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form role="form" method="post" id="editDoctorCatForm" action="{{url('category-update')}}" enctype="multipart/form-data">
                  <div class="box-body">
                      
                      <div class="form-group">
                      <label for="service_name">Category Name</label>
                      <input type="text" class="form-control" name="category_name" id="service_name" value="{{$editData->name}}" required="">
                      @error('category_name')
                      <div class="validate_err">{{ $message }}</div>
                      @enderror
                      </div>
                      @csrf

<div class="form-group">
<label for="type">Category Type</label>
<select class="form-control" id="type" disabled="" required="">
<option value="">-- Select Category Type --</option>
<option value="p" <?php if($editData->type=='p'){echo"selected";} ?>> Parent </option>
<option value="c" <?php if($editData->type=='c'){echo"selected";}?>> Child </option>
</select>
 <input type="text" name="type" hidden="" value="{{$editData->type}}">
                      @error('type')
                      <div class="validate_err">{{ $message }}</div>
                      @enderror
 </div>
<?php
if($editData->type=='c'){
  ?>
                     <div class="form-group" id="parentData">
                      <label for="parent_id">Select Parent Category</label>
<select class="form-control" name="parent_id" id="parent_id" required="">
<option value="">-- Select Parent Category --</option>
@foreach($parent as $parentData)
<option value="{{$parentData->id}}" <?php if($editData->parent_id==$parentData->id){echo"selected";}?>>{{$parentData->name}}</option>
@endforeach
</select>
                      @error('type')
                      <div class="validate_err">{{ $message }}</div>
                      @enderror
                      </div>
<?php                    
}else{ }
?>

<?php
if($editData->type=='c'){
 ?>
                      <div class="form-group" id="GST">
                      <label for="type">GST</label>
                      <input type="number" name="gst" value="{{$editData->GST}}" class="form-control" id="gst" required="">
                      </div>

                      <div class="form-group" id="shippingStatus">
                      <label for="type">Apply Shipping Charge</label>
                      <select class="form-control" name="shipingCharge">
                      <option value="">-- Setect Shipping --</option>
                      <option value="1" <?php if($editData->shippingStatus=='1'){echo"selected";}else{ }?>> Yes </option>
                      <option value="0" <?php if($editData->shippingStatus=='0'){echo"selected";}else{ }?>> No </option>
                      </select>
                      </div>

<?php                    
}else{ }
?>
<?php if($editData->type=='p' && $editData->cateDesStatus=='1'){
 ?>                  
 <?php
 }else{
 }
?>
                      <div class="form-group">
                      <label for="type">Category Description</label>
                      <select class="form-control" onchange="checkCateDescription(this.value)" name="cateStatus" id="cateStatus" required="">
                      <option value="">-- Category Description --</option>
                      <option value="1" <?php if($editData->cateDesStatus=='1'){echo"selected";} ?>> Yes </option>
                      <option value="0" <?php if($editData->cateDesStatus=='0'){echo"selected";} ?>> No </option>
                      </select>
                      </div>

                      <div class="form-group" id="tempDescription" style="display:none;">
                      <label for="type">Description</label>
                      <textarea name="cateDes" class="form-control ckeditor" id="cateDes">
                       {{$editData->cateDes}} 
                      </textarea>
                      @error('type')
                      <div class="validate_err">{{ $message }}</div>
                      @enderror
                      </div>

                      <div class="form-group" id="templateDiv" style="display:none;">
                      <label for="category_img">Select Template</label>
                      <div style="padding-left:20px" class="templateNameDiv">
                      <input type="radio" name="templateName" <?php if($editData->templateName=='1'){ echo"checked";}else{ }?>  value="1" required="">&nbsp; Template One&nbsp;(Box Format)
                      <br>
                      <input type="radio" name="templateName" <?php if($editData->templateName=='2'){ echo"checked";}else{ }?> value="2" required="">&nbsp; Template Two&nbsp;(Table Format)
                      <br>
                      <input type="radio" <?php if($editData->templateName=='3'){ echo"checked";}else{ }?> name="templateName" value="3" required="">&nbsp; Template Three &nbsp;(Table Format)
                      </div>
                      </div>

                      <div class="form-group">
                      <label for="category_img">Category Image</label>
                      <input type="file" class="form-control" name="category_img" id="category_img">
                      @error('category_img')
                      <div class="validate_err">{{ $message }}</div>
                      @enderror
                      </div>

<?php 
if($editData->category_img=='NULL'){
  ?>
  <input type="text" hidden name="OldImg" value="NULL"> 
<?php
}else{
  ?>
<img src="{{ asset("uploads/productCategory/$editData->img")}}" width="50px">
<input type="text" hidden name="OldImg" value="{{$editData->img}}"> 
<?php
}
?>
<br><br>
<?php
if($editData->type=='p'){
 ?>
                     <div class="form-group">           
                     <input type="checkbox" name="homePageStatus" <?php if($editData->homePageStatus=="1"){echo"checked";}else{ }?> id="homePageStatus" onchange="homePageChkbox()">
                      <label for="category_img">Home Page Status</label>
                      @error('homePageStatus')
                      <div class="validate_err">{{ $message }}</div>
                      @enderror
                     </div>
<?php                    
}else{ }
?>
                     <div class="form-group" >
                     <label for="type">Meta Title</label>
                     <textarea name="meta_title" class="form-control" rows="6">{{$editData->meta_title}}</textarea>
                      @error('meta_title')
                      <div class="validate_err">{{ $message }}</div>
                      @enderror
                     </div>

                      <div class="form-group" >
                     <label for="type">Meta Description</label>
                     <textarea name="meta_des" class="form-control" rows="6">{{$editData->meta_des}}</textarea>
                      @error('meta_des')
                      <div class="validate_err">{{ $message }}</div>
                      @enderror
                     </div>

                      <div class="form-group" >
                     <label for="type">Meta Keyword</label>
                     <textarea name="meta_keyword" class="form-control" rows="6">{{$editData->meta_keyword}}</textarea>
                      @error('meta_keyword')
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
setTimeout(function(){
var type=$('#cateStatus').val();
checkCateDescription(type);
},2000)    
 
$('.topbar-errmsg').hide();  
$('.catSec-errmsg').hide(); 

setTimeout(function(){
if($('#type').val()=='c'){
$('#templateDiv').show(); 
}else{
$('#templateDiv').hide(); 
}
},1000)

$('#editDoctorCatForm').validate({
rules:{
  category_name:{
   required:true, 
   maxlength:30,
   minlength:3,
  },
},
messages:{
   category_name:{
   required:'*Please Enter Category Name', 
   },   
}
});
});

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
if(type=='1'){
$('#tempDescription').show();
$('#cateDes').prop('required',true);
}else{
$('#tempDescription').hide();
$('#cateDes').prop('required',false);

}
}
</script>
@stop



      