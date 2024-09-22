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
<input type="text" name="tempType" id="tempType" hidden="">
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

                     <div class="form-group" id="brandStatus" style="display:none;">
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
                    <div class="form-group">
                     <label for="type">Select RFQ</label>
                     <select class="form-control" disabled="disabled" onchange="getRFQ(this.value)" required="">
                     <option value="no" <?php if($productCate->rfq_status=='0'){ echo"selected";}?>>No</option>
                     <option <?php if($productCate->rfq_status=='1'){ echo"selected";}?> value="yes">Yes</option>
                     </select>
                     </div>

                     <input type="text" name="rfq" id="rfq" value="{{$productCate->rfq_status}}" hidden=""/>

<?php if($productCate->rfq_status=='1'){

}else{
?>
                    <div class="form-group quantityType">
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

                        <div class="form-group" id="diameter" style="display:none;">
                     <label for="diameter">Enter Diameter</label>
                     <input type="number" name="diameter" value="{{$productCate->diameter}}" class="form-control"/>
                     </div>  



<?php
} ?>


                 

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

                      <div class="form-group">
                      <label for="hts">HSN/SAC Code</label>
                      <select name="hsn_code" class="form-control">
                      <option value="">--Select HSN/SAN --</option>
                      <option @if($productCate->hsn_code=='25232100') selected @else @endif value="25232100">25232100</option>  
                      <option @if($productCate->hsn_code=='25232930') selected @else @endif value="25232930">25232930</option>  
                      <option @if($productCate->hsn_code=='25232910') selected @else @endif value="25232910">25232910</option>  
                      <option @if($productCate->hsn_code=='721420') selected @else @endif value="721420">721420</option>  
                      <option @if($productCate->hsn_code=='32141000') selected @else @endif value="32141000">32141000</option>  
                      <option @if($productCate->hsn_code=='25201010') selected @else @endif value="25201010">25201010</option>  
                      </select>
                      @error('hsn_code')
                      <div class="hts">{{ $message }}</div>
                      @enderror
                      </div>

                    
<div class="form-group">&nbsp;&nbsp;&nbsp;
<input type="checkbox" name="stock_status" id="stock_status" onchange="stockStatusID()" <?php if($productCate->stock_status=='1'){echo"checked";}else{ } ?>>&nbsp;
                      <label for="type">Check If Stock Is Availability</label>
                      @error('type')
                      <div class="validate_err">{{ $message }}</div>
                      @enderror
                     </div>
                  

                     @endif



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
   minlength:3, 
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
},1000)

setTimeout(function(){
var rfq=$('#rfq').val();
getRFQ(rfq);
},2500)
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
$('#tempType').val(data);
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

  var id=$('#productSubCate').val();
 $.ajax({
 url:"{{url('checkTemplateType')}}",
 method:'post',
 dataType:'JSON',
 data:{id:id,"_token":'{{csrf_token()}}'},  
 success:function(data){
  console.log(data);
$('#tempType').val(data);
if(data=="1"){
$('.longDes').show();
$('.shortDes').show();
$('#piece_per_bundal').hide();
$('#diameter').hide();
$('#brandStatus').show();

}else if(data=="2"){
$('.longDes').hide();
$('.shortDes').hide();
$('#piece_per_bundal').hide();
$('#diameter').show();
$('#brandStatus').hide();


}else if(data=="3"){
$('.longDes').hide();
$('.shortDes').hide();
$('#piece_per_bundal').show();
$('#diameter').show();
$('#brandStatus').hide();
}
}
 }); 
}

function getRFQ(rfq){
var tempType=$('#tempType').val();


if(rfq=='1'){
if((Number(tempType)=='2') || (Number(tempType)=='3')){
$('#diameter').show();
$('.quantityType').show();
$('#quantity_id').prop('required',true);
}else{
$('#diameter').hide();
$('.quantityType').hide();
$('#quantity_id').prop('required',false);
}

$('#notReqInRFQ').hide();
$('#min_order_count').prop('required',false);
}else{

if((Number(tempType)==2) || (Number(tempType)==3)){
  $('#diameter').show();
}

$('#notReqInRFQ').show();
$('#min_order_count').prop('required',true);
$('.quantityType').show();
$('#quantity_id').prop('required',true);
}
}
</script>
@stop
