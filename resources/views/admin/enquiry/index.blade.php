@extends('admin.layout.layout')
@section('title','View Enquiry')
@section('content')

      <!-- Right side column. Contains the navbar and content of the page -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Enquiry Management
            <small>Site Supply</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
            <li><a href="#">Dashboard</a></li>
            <li class="active">Enquiry</li>
          </ol>
        </section>
        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Enquiry List</h3>
    <!--               <a href="{{url('testimonial-add')}}" style="float: right"><button class="btn btn-info"><i class="fa fa-plus"></i>Add E</button></a> --> 
                </div><!-- /.box-header -->
                <div class="box-body">

                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>S.No</th>
                        <th>Name</th>
                        <th>Contact No</th>
                        <th>Email</th>
                        <th>Product Name</th>
                <!--         <th>Description</th> -->
                        <th>Date</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($category as $key=>$categoryval)
                      <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$categoryval->name}}</td>
                        <td>{{$categoryval->contactNo}}</td>
                        <td>{{$categoryval->email}}</td>
                        <td>{{$categoryval->productName}}</td> 
                   <!--      <td>{{$categoryval->description}}</td> -->
                        <td>{{ date('d-M-Y h:i A',strtotime($categoryval->created_at))}}</td>                                     
<td>                  
                        <a href="{{url("enquiry-detail/$categoryval->id")}}" class="btn btn-success"><i class="fa fa-eye"></i></a>               
</td>

                      </tr>
                      @endforeach
                    </tbody>
                  
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
@endsection

@section('script')
<script>
function updatetestimonialStatus(id){

 var CatStatus;  
 if($('#doctor_status'+id).is(":checked")){
 CatStatus='1';
 }else{
 CatStatus='0';  
 }
 $.ajax({
 url:"{{url('update-testimonial-status')}}",
 method:'post',
 data:{CatStatus:CatStatus,id:id,"_token":'{{csrf_token()}}'},  
 success:function(data){
      swal("Done!", "Status Changed succesfully", "success");
 }
 });
}
</script>
@stop