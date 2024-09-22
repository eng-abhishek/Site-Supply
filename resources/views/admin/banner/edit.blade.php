@extends('admin.layout.layout')
@section('title','Edit Banner')
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
                  <h3 class="box-title">Edit Banner</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form role="form" method="post" id="editDoctorCatForm" action="{{url('banner-update')}}" enctype="multipart/form-data">
                  <div class="box-body">

                    <div class="form-group">
                      <label for="name">Title</label>
                      <input type="text" class="form-control" name="title" id="title" value="{{$editData->title}}">
                      @error('title')
                      <div class="validate_err">{{ $message }}</div>
                      @enderror
                    </div>

                    <div class="form-group">
                      <label for="name">Sub Title</label>
                      <input type="text" class="form-control" name="sub_title" id="sub_title" value="{{$editData->sub_title}}">
                      @error('sub_banner')
                      <div class="validate_err">{{ $message }}</div>
                      @enderror
                    </div>

                    @csrf

                     <div class="form-group">
                      <label for="logo">Banner Image</label>
                      <input type="file" class="form-control" name="img" id="img">
                      @error('img')
                      <div class="validate_err">{{ $message }}</div>
                      @enderror
                    </div>
                     *Image Size Should Be 1920*1018
<?php 
if($editData->img){
  ?>
<img src="{{asset("uploads/banner/$editData->img")}}" width="50px">
<input type="text" hidden name="OldImg" value="{{$editData->img}}"> 
<?php
}else{
  ?>
<?php
}
?>
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




      