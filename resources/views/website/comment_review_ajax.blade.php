@foreach($reviewComment as $reviewCommentData)
<span><img style="width:50px;height:50px;border-radius:50%" src="{{asset('uploads/user/'.$reviewCommentData->img)}}">
<?php 
for($i=1;$i<=5;$i++){
if($reviewCommentData->rate>=$i){
?>
<i class="fa fa-star" aria-hidden="true" style="color:#e89424"></i>
<?php
}else{
?>
<i class="fa fa-star" aria-hidden="true" style="color:#9e9e9e"></i>
<?php
}  
?>
<?php
}
?>
</span>
<p style="font-style:italic;">{{$reviewCommentData->name}}</p>
<p class="text-justify">{{$reviewCommentData->description}}</p>
@endforeach
      <ul class="pagination justify-content-center paginationValue">
               {!! $reviewComment->links() !!}
                 </ul>
