@extends('admin.layout.layout')
@section('title','View Type Feature')
@section('content')

      <!-- Right side column. Contains the navbar and content of the page -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
           Type Management
            <small>Site Supply</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
            <li><a href="#">Dashboard</a></li>
            <li class="active">Product Type</li>
          </ol>
        </section>
        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Product Type List</h3>
                  <a href="{{url('brand-add')}}" style="float: right"><button class="btn btn-info"><i class="fa fa-plus"></i>Add Type</button></a> 
                </div><!-- /.box-header -->
                <div class="box-body">

                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>S.No</th>
                        <th>Type</th>
                        
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($category as $key=>$categoryval)
                      <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$categoryval->name}}</td>
                        <td>
                        @if($categoryval->status=='0')
                        <?php $statusval=''; ?>
                        @else
                         <?php $statusval='checked'; ?>
                        @endif
                         <input type="checkbox" id="doctor_status{{$categoryval->id}}" onchange="updateCategoryStatus({{$categoryval->id}})"  data-toggle="toggle" data-onstyle="success" value="{{$categoryval->ststus}}" data-offstyle="danger" <?php echo $statusval;?> data-on="Active" data-off="InActive">
                        </td>                
<td>                  
                        <a href="{{url("type-edit/$categoryval->id")}}" class="btn btn-info"><i class="fa fa-edit"></i></a>
                        <a href="{{url("type-destroy/$categoryval->id")}}" class="btn btn-danger"><i class="fa fa-trash"></i></a>                
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
function updateCategoryStatus(id){

// alert(id);
// return false;

 var CatStatus;  
 if($('#doctor_status'+id).is(":checked")){
 CatStatus='1';
 }else{
 CatStatus='0';  
 }
 $.ajax({
 url:"{{url('update-type-status')}}",
 method:'post',
 data:{CatStatus:CatStatus,id:id,"_token":'{{csrf_token()}}'},  
 success:function(data){
      swal("Done!", "Status Changed succesfully", "success");
 }
 });
}

</script>
@stop