@extends('admin.layout.layout')
@section('title','Add Product')
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
                  <h3 class="box-title">Add New Product</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form role="form" method="post" id="product-store" action="{{url('product-store')}}" enctype="multipart/form-data">
<!-- @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif  -->  
                    <div class="box-body">   
                    <div class="form-group">
                      <label for="product_name">Product Name</label>
                      <input type="text" class="form-control" name="product_name" id="product_name" required="">
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
<option value="{{$parentDataVal->id}}">{{$parentDataVal->name}}</option>
@endforeach
</select>
                      @error('type')
                      <div class="validate_err">{{ $message }}</div>
                      @enderror
                     </div>

<div class="form-group">
<label for="type">Select Product Sub-Category</label>
<select class="form-control" name="productSubCate_id" onchange="checkTemplateBefourFun()" id="productSubCate" required="">
<option value="">-- Select Product Sub-Category --</option>
</select>
                      @error('type')
                      <div class="validate_err">{{ $message }}</div>
                      @enderror
</div>

                     <div class="form-group" id="brandStatus" style="display:none;">
                     <label for="type">Select Brand</label>
<select class="form-control" name="brand_id" id="brandData" required="">
<option value="">-- Select Brand --</option>
</select>
                      @error('type')
                      <div class="validate_err">{{ $message }}</div>
                      @enderror
                     </div>

                      <div class="form-group">
                      <label for="product_img">Product Image</label>
                      <input type="file" class="form-control" name="product_img" id="product_img" required="">
                      @error('category_img')
                      <div class="validate_err">{{ $message }}</div>
                      @enderror
                     </div> 
                      
                     <div class="form-group">
                     <label for="type">Select RFQ</label>
                     <select class="form-control" name="rfq" id="rfq" disabled="disabled" onchange="getRFQ(this.value)" required="">
                     <option value="no">No</option>
                     <option value="yes">Yes</option>
                     </select>
                     </div>

                    <div class="form-group quantityType">
                    <label for="type">Select Quantity</label>
                    <select class="form-control" name="quantity_id" required="">
                    <option value="">-- Select Quantity --</option>
                    @foreach($quantity as $quantityData)
                    <option value="{{$quantityData->id}}">{{$quantityData->name}}</option>
                    @endforeach
                    </select> 
                    @error('type')
                    <div class="validate_err">{{ $message }}</div>
                    @enderror
                    </div>

                     <div class="form-group" id="diameter" style="display:none;">
                     <label for="diameter">Enter Diameter</label>
                     <input type="number" name="diameter" class="form-control"/>
                     </div> 

                     <div class="form-group shortDes" style="display:none;">
                     <label for="type">Product Short Description</label>
                     <textarea name="short_description" class="form-control ckeditor" rows="6"></textarea>
                      @error('type')
                      <div class="validate_err">{{ $message }}</div>
                      @enderror
                     </div>
 
                     <div class="form-group longDes" style="display:none;">
                     <label for="type">Product Description</label>
                     <textarea name="description" class="form-control ckeditor" rows="6"></textarea>
                      @error('type')
                      <div class="validate_err">{{ $message }}</div>
                      @enderror
                     </div>

                     <div id="notReqInRFQ">
                     <div class="form-group" id="piece_per_bundal" style="display:none;">
                     <label for="brand">Piece Per Bundle</label>
                     <input type="number" name="piece_per_bundal" class="form-control"/>
                     </div>

                     <div class="form-group">
                     <label for="type">Min Order</label>
                     <input type="number" class="form-control" name="min_order_count" id="min_order_count" required=""> 
                      @error('min_order_count')
                      <div class="validate_err">{{ $message }}</div>
                      @enderror
                     </div>
    
<input type="text" name="tempType" id="tempType" hidden="">

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
@foreach($city as $key=> $cityData)
                     <tr>
                     <td>
                     <input type="checkbox" name="cityChkBox[]" id="chkstatus{{$key}}" value="{{$cityData->id}}" onchange="applyCity(<?php echo $key;?>)">  
                     </td>
                     <td>{{$cityData->name}}</td>
                     <td>
                     <input id="priceInputBox{{$key}}" min="1" max="100000" style="width:100px" class="form-control" name="cityPrice[]">  
                     </td>
                     </tr>
@endforeach
                     </table>  
</div>  
<div class="col-sm-1"></div>  
</div>
</div>

                      <div class="form-group">&nbsp;&nbsp;&nbsp;
                      <input type="checkbox" name="stock_status" value="1">&nbsp;
                      <label for="type">Check If Stock Is Availability</label>
                      @error('type')
                      <div class="validate_err">{{ $message }}</div>
                      @enderror
                      </div>

                      <div class="form-group">
                      <label for="hts">HSN/SAC Code</label>
                      <select name="hsn_code" class="form-control">
                      <option value="">--Select HSN/SAN --</option>
                      <option value="25232100">25232100</option>  
                      <option value="25232930">25232930</option>  
                      <option value="25232910">25232910</option>  
                      <option value="721420">721420</option>  
                      <option value="32141000">32141000</option>  
                      <option value="25201010">25201010</option>  
                      </select>
                      @error('hsn_code')
                      <div class="hts">{{ $message }}</div>
                      @enderror
                      </div>


                     <div class="form-group" >
                     <label for="type">Meta Title</label>
                     <textarea name="meta_title" class="form-control" rows="6"></textarea>
                      @error('meta_title')
                      <div class="validate_err">{{ $message }}</div>
                      @enderror
                     </div>

                      <div class="form-group" >
                     <label for="type">Meta Description</label>
                     <textarea name="meta_des" class="form-control" rows="6"></textarea>
                      @error('meta_des')
                      <div class="validate_err">{{ $message }}</div>
                      @enderror
                     </div>

                      <div class="form-group" >
                     <label for="type">Meta Keyword</label>
                     <textarea name="meta_keyword" class="form-control" rows="6"></textarea>
                      @error('meta_keyword')
                      <div class="validate_err">{{ $message }}</div>
                      @enderror
                     </div>


                      </div><!------------ hide div -------->
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
 $('#brandStatus').hide();

 }
 });
}

function checkTemplateBefourFun(){
setTimeout(function(){
$('#rfq').removeAttr('disabled');
checkTemplateType();
},1000)

setTimeout(function(){
var rfq=$('#rfq').val();
getRFQ(rfq);
},2500)

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
if(rfq=='yes'){
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


      