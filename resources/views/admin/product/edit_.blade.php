@extends('admin.layout.layout')
@section('title','Edit Product')
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
                  <h3 class="box-title">Edit Product</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form role="form" method="post" id="product-store" action="{{url('product-update')}}" enctype="multipart/form-data">
                 
                 <div class="box-body">
                    <div class="form-group">
                      <label for="product_name">Product Name</label>
                      <input type="text" class="form-control" name="product_name" id="product_name" required="" value="{{$productCate->productName}}">
                      @error('product_name')
                      <div class="validate_err">{{ $message }}</div>
                      @enderror
                    </div>
                    @csrf

                     <div class="form-group">
                     <label for="type">Select Product Category</label>
<select class="form-control" name="category_id" onchange="getCategory(this.value)" required="">
<option value="">-- Select Category Type --</option>
@foreach($parentData as $parentDataVal)
<option value="{{$parentDataVal->id}}" <?php if($productCate->cat_id==$parentDataVal->id){echo"selected";}else{ }?>>{{$parentDataVal->name}}</option>
@endforeach
</select>
                      @error('category_id')
                      <div class="validate_err">{{ $message }}</div>
                      @enderror
                    </div>

<div class="form-group">
<label for="type">Select Product Sub-Category</label>
<select class="form-control" name="productSubCate_id" onchange="checkTemplateBefourFun()" id="productSubCate" required="">  
<option value="">-- Select Product Sub-Category --</option>
@foreach($allSubCate as $allSubCateData)
<option value="{{$allSubCateData->id}}" <?php if($allSubCateData->id==$productSubCateId){echo"selected";}else{ } ?>>{{$allSubCateData->name}}</option>

@endforeach
</select>
                      @error('productSubCate_id')
                      <div class="validate_err">{{ $message }}</div>
                      @enderror
</div>

                     <div class="form-group">
                     <label for="type">Select Brand</label>
<select class="form-control" name="brand_id" id="brandData" required="">
<option value="">-- Select Brand --</option>
@foreach($brand as $brandData)
<option value="{{$brandData->id}}" <?php if($brandData->id==$productCate->brand_id){echo"selected";}else{ } ?> >{{$brandData->name}}</option>
@endforeach
</select>
                      @error('type')
                      <div class="validate_err">{{ $message }}</div>
                      @enderror
                     </div> 


                      <div class="form-group">
                      <label for="product_img">Product Image</label>
                      <input type="file" class="form-control" name="product_img" id="product_img">
                      @error('product_img')
                      <div class="validate_err">{{ $message }}</div>
                      @enderror
                     </div>
<?php 
if($productCate->image=='NULL'){
  ?>
<input type="text" hidden name="OldImg" value="NULL"> 
<?php
}else{
  ?>
<img src='{{asset("uploads/productImg/".$productCate->productImg)}}' width="50px">
<input type="text" name="OldImg" hidden value="{{$productCate->productImg}}"> 
<?php
}
?>
 <br><br>
<input type="text" name="tempId" id="tempId" value="{{$templateId[0]->templateName}}" hidden>

                     <div class="form-group shortDes" style="display:none;">
                     <label for="type">Product Short Description</label>
                     <textarea name="short_description" class="form-control ckeditor" rows="6">
                       {!!$productCate->product_short_des!!}
                     </textarea>
                      @error('type')
                      <div class="validate_err">{{ $message }}</div>
                      @enderror
                     </div>

                     <div class="form-group longDes" style="display:none;">
                     <label for="type">Product Description</label>
                     <textarea name="description" class="form-control ckeditor" rows="6">
                       {!!$productCate->description!!}
                     </textarea>
                      @error('type')
                      <div class="validate_err">{{ $message }}</div>
                      @enderror
                     </div>

                     <div class="form-group">
                     <label for="type">Select RFQ</label>
                     <select class="form-control" disabled="disabled" onchange="getRFQ(this.value)" required="">
                     <option value="no" <?php if($productCate->rfq_status=='1'){ echo"selected";}?>>No</option>
                     <option <?php if($productCate->rfq_status=='1'){ echo"selected";}?> value="yes">Yes</option>
                     </select>
                     </div>

                     <input type="text" name="rfq" value="{{$productCate->rfq_status}}" hidden=""/>

                      @if($productCate->rfq_status=='1')
                      @else
                     <div class="form-group piece_per_bundal" style="display:none;">
                     <label for="brand">Piece Per Bundle</label>
                     <input type="number" name="piece_per_bundal" value="{{$productCate->piece_per_bundal}}"  class="form-control"/>
                     </div>

                     <div class="form-group">
                     <label for="type">Min Order</label>
                     <input type="number" class="form-control" value="{{$productCate->min_order_count}}" name="min_order_count" id="min_order_count" required=""> 
                      @error('min_order_count')
                      <div class="validate_err">{{ $message }}</div>
                      @enderror
                     </div>

                     <div class="form-group" id="diameter" style="display:none;">
                     <label for="diameter">Enter Diameter</label>
                     <input type="number" name="diameter" value="{{$productCate->diameter}}" class="form-control"/>
                     </div>  

                    <div class="form-group">
                    <label for="type">Select Quantity</label>
                    <select class="form-control" name="quantity_id" required="">
                    <option value="">-- Select Quantity --</option>
                    @foreach($quantity as $quantityData)
                    <option value="{{$quantityData->id}}" <?php if($productCate->quantity_id==$quantityData->id){ echo"selected"; }?>>{{$quantityData->name}}</option>
                    @endforeach
                    </select> 
                    @error('type')
                    <div class="validate_err">{{ $message }}</div>
                    @enderror
                    </div>

<div class="form-group">
<label for="product">Select Product Price & City</label>
<div class="row">
<div class="col-sm-1"></div>  
<div class="col-sm-10">

                    <table class="table table-bordered">
                     <tr>
                     <td>Select City</td>
                     <td>City Name</td>
                     <td>Enter Price</td>
                     </tr> 
@foreach($productPrice as $Pkey=> $productPrice)

                     <tr>
                     <td>
                     <input type="checkbox" name="cityChkBox[]" id="chkstatus{{$Pkey}}" value="{{$productPrice->city_id}}" checked onchange="applyCity(<?php echo $key;?>)">  
                     </td>
                     <td>{{$productPrice->name}}</td>
                     <td>
                     <input id="priceInputBox{{$key}}" type="number" min="1" max="100000" style="width:100px" value="{{$productPrice->price}}" class="form-control" name="cityPrice[]">  
                     </td>
                     </tr>

@endforeach

@foreach($city as $key=> $cityData)

                     <tr>
                     <td>
                     <input type="checkbox" name="cityChkBox[]" id="chkstatus{{$key}}" value="{{$cityData[0]->id}}" onchange="applyCity(<?php echo $key;?>)">  
                     </td>
                     <td>{{$cityData[0]->name}}</td>
                     <td>
                     <input id="priceInputBox{{$key}}" type="number" min="1" max="100000" style="width:100px" class="form-control" name="cityPrice[]">  
                     </td>
                     </tr>

@endforeach
                     </table>  
</div>  
<div class="col-sm-1"></div>  
</div>
</div>

 <div class="form-group">&nbsp;&nbsp;&nbsp;
<input type="checkbox" name="stock_status" id="stock_status" onchange="stockStatusID()" <?php if($productCate->stock_status=='1'){echo"checked";}else{ } ?>>&nbsp;
                      <label for="type">Check If Stock Is Availability</label>
                      @error('type')
                      <div class="validate_err">{{ $message }}</div>
                      @enderror
                     </div>
                     @endif        
                     </div> 

                  <input type="text" hidden name="editId" value="{{$productCate->id}}">           
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
checkTemplateType();
},1000)
$('#parentData').hide();

$('#product-store').validate({
 rules:{
  product_name:{
   required:true,
   minlength:5, 
   maxlength:30,   
  },
  description:{
   required:true,
   minlength:50,
   maxlength:1000,
  },
  min_order_count:{
   required:true,
   maxlength:4,
  },
 },
 messages:{
   product_name:{
   required:'*Please Enter Category Name', 
   },
   description:{
   required:"*Please Enter Description",
   }    
 } 
});

});

function stockStatusID(){
if($('#stock_status').is(':checked')){
$('#stock_status').attr('checked',true);
}else{
$('#stock_status').attr('checked',false);
}
}

function applyCity(id){
if($('#chkstatus'+id).is(":checked")){
$('#priceInputBox'+id).attr('required',true);
}else{
$('#priceInputBox'+id).attr('required',false);
}
}

function getCategory(id){
 $.ajax({
 url:"{{url('get-product-subCategory')}}",
 method:'post',
 data:{id:id,"_token":'{{csrf_token()}}'},  
 success:function(data){
 console.log(data);
 $('#productSubCate').html(data[0]);
 $('#brandData').html(data[1]);
 }
 });
 
}

function checkTemplateBefourFun(){
setTimeout(function(){
checkTemplateTypeForNewCate();
},3000)
}


function checkTemplateTypeForNewCate(){
  var id=$('#productSubCate').val();
 $.ajax({
 url:"{{url('checkTemplateType')}}",
 method:'post',
 dataType:'JSON',
 data:{id:id,"_token":'{{csrf_token()}}'},  
 success:function(data){
  console.log(data);
if(data=="1"){
$('.longDes').show();
$('.shortDes').show();
$('.piece_per_bundal').hide();
$('#diameter').hide();
}else if(data=="2"){
$('.longDes').hide();
$('.shortDes').hide();
$('.piece_per_bundal').hide();
$('#diameter').show();
}else if(data=="3"){
$('.longDes').hide();
$('.shortDes').hide();
$('.piece_per_bundal').show();
$('#diameter').show();
}

 }
 }); 
}

function checkTemplateType(){
var temp=$('#tempId').val();
// alert(temp);

if(temp=='1'){
$('.longDes').show();
$('.shortDes').show();
$('.piece_per_bundal').hide();
$('#diameter').hide();

}else if(temp=='2'){

$('.longDes').hide();
$('.shortDes').hide();
$('.piece_per_bundal').hide();
$('#diameter').show();

}else if(temp=='3'){
$('.longDes').hide();
$('.shortDes').hide();
$('.piece_per_bundal').show();
$('#diameter').show();
}
}

function getRFQ(rfq){
if(rfq=='yes'){
$('#notReqInRFQ').hide();
$('#min_order_count').prop('required',false);
$('#quantity_id').prop('required',false);

$('#min_order_count').val('');
$('#quantity_id').val('');

}else{
$('#notReqInRFQ').show();
$('#min_order_count').prop('required',true);
$('#quantity_id').prop('required',true);

}
}
</script>
@stop
