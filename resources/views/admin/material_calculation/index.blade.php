@extends('admin.layout.layout')
@section('title','View Material Calculation')
@section('content')

      <!-- Right side column. Contains the navbar and content of the page -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
           Material Calculation Management
            <small>Site Supply</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
            <li><a href="#">Dashboard</a></li>
            <li class="active">Material Calculation</li>
          </ol>
        </section>
        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                <h3 class="box-title">Material Calculation</h3>
                <div class="box-body">

                <form role="form" method="post" id="material-calculation-store" action="{{url('store-material-calculation')}}">                 
                  <div class="box-body">
                    
                    <div class="form-group">
                    <label for="area_squire_fit">Enter Area Squire Fit</label>
                    <input type="number" value="{{$material_calculation->area_squire_fit}}" class="form-control" name="area_squire_fit" required="">
                    </div>
                    @csrf
                    <div class="form-group">
                    <label for="consuption_of_cement">Enter Consuption Of Cement (BAGS)</label>
                    <input type="number" class="form-control" value="{{$material_calculation->consuption_of_cement}}" name="consuption_of_cement" required="">
                    </div>
                  <div class="form-group">
                  <label for="consuption_of_sand">Enter Consuption Of Sand (CFT)</label>
                  <input type="number" class="form-control" value="{{$material_calculation->consuption_of_sand}}" name="consuption_of_sand" required="">
                  </div>
                    <div class="form-group">
                    <label for="consuption_of_stone_ten_mm">Enter Consuption Of Stone Aggrigates (10MM) (CFT)</label>
                    <input type="number" value="{{$material_calculation->consuption_of_stone_ten_mm}}" class="form-control" name="consuption_of_stone_ten_mm" required="">
                    </div>

                    <div class="form-group">
                    <label for="consuption_of_stone_twenty_mm">Enter Consuption Of Stone Aggrigates (20MM) (CFT)</label>
                    <input type="number" value="{{$material_calculation->consuption_of_stone_twenty_mm}}" class="form-control" name="consuption_of_stone_twenty_mm" required="">
                    </div>

                    <div class="form-group">
                    <label for="no_of_bricks">Enter No. Of Bricks Requirement</label>
                    <input type="number" value="{{$material_calculation->no_of_bricks}}" class="form-control" name="no_of_bricks" required="">
                    </div>

                    <div class="form-group">
                    <label for="tmt_bar_consuption">Enter TMT Bar Consuption (KGS)</label>
                    <input type="number" value="{{$material_calculation->tmt_bar_consuption}}" class="form-control" name="tmt_bar_consuption" required="">
                    </div>

                    </div>                  
                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary btn-proCat">Submit</button>
                  </div>
                </form>  
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
@endsection

@section('script')
<script>
$(function(){ 
$('#material-calculation-store').validate({
 rules:{
   area_squire_fit:{
   required:true,
   maxlength:5,
   minlength:1, 
  },
  consuption_of_cement:{
   required:true,
   maxlength:5,
   minlength:1, 
  },
  consuption_of_sand:{
   required:true,
   maxlength:5,
   minlength:1, 
  },
  consuption_of_stone_ten_mm:{
   required:true,
   maxlength:5,
   minlength:1, 
  },
  consuption_of_stone_twenty_mm:{
   required:true,
   maxlength:5,
   minlength:1, 
  },
  no_of_bricks:{
   required:true,
   maxlength:5,
   minlength:1, 
  },
 tmt_bar_consuption:{
   required:true,
   maxlength:5,
   minlength:1, 
  },
 },
 });
});
</script>
@stop
