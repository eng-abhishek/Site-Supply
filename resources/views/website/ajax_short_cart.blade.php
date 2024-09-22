<?php 
use App\ProductCategory;
use App\User;
use session;
if(session()->get('logedIn')){
$userInfo=User::find(session()->get('logedIn'));
$name=$userInfo->name;
$email=$userInfo->email;
$mobile_no=$userInfo->mobile_no;
}else{
$name='';
$email=''; 
$mobile_no='';  
}
?>

<?php $total=0; $totalWithoutShippingCharge=0; $totalOnShippingCharge=0; $gstAmt=0;?>        
@foreach(session()->get('cart') as $cart)

<?php
$getGst=ProductCategory::where('id',$cart['subCategoryId'])->get();
//$gstAmt+=($getGst[0]->GST/100)*($cart['price'] * $cart['count']);
$gstAmt+=(($cart['price'] * $cart['count'])*($getGst[0]->GST))/(100+$getGst[0]->GST);

if($getGst[0]->shippingStatus=='1'){
  $totalOnShippingCharge+=$cart['price'] * $cart['count'];
}else{
  $totalWithoutShippingCharge+=$cart['price'] * $cart['count'];
}
?>
<?php
$total+=$cart['price'] * $cart['count']; ?>
@endforeach
    <div class="row">
        <div class="col-lg-6" style="font-weight: 600;">Product Total</div>
        <div class="col-lg-6">Rs. <?php echo (int)($total-$gstAmt);?></div>
    <br>
    
        <div class="col-lg-6" style="font-weight: 600;">Shipping</div>
<?php 
$shipingCharge=0;

if(((int)$totalOnShippingCharge<=$first_row->max_amount) && ((int)$totalOnShippingCharge>=$first_row->min_amount)){
$shipingCharge=$first_row->charge;

}elseif(((int)$totalOnShippingCharge<=$second_row->max_amount) && ((int)$totalOnShippingCharge>=$second_row->min_amount)){
$shipingCharge=$second_row->charge;

}elseif(((int)$totalOnShippingCharge<=$third_row->max_amount) && ((int)$totalOnShippingCharge>=$third_row->min_amount)){
$shipingCharge=$third_row->charge;

}elseif(((int)$totalOnShippingCharge>0)){
$shipingCharge=$fourth_row->charge;
}else{
$shipingCharge=0;
}   
?>

        <div class="col-lg-6">Rs. {{$shipingCharge}}</div>
          <br>
    
        <div class="col-lg-6" style="font-weight: 600;">Total GST</div>
        <div class="col-lg-6">Rs. <?php echo (int)$gstAmt;?></div>

    </div>
    <hr>

    <div class="row">
        <div class="col-lg-6" style="font-weight: 600;">Subtotal</div>
        <div class="col-lg-6" style="color:#e88f16;font-weight:600">Rs. <?php echo ((int)$total+(int)$shipingCharge);?></div>

        <br> 
        <br>

        <div class="col-lg-6" style="font-weight: 600;">Total Payable</div>
        <div class="col-lg-6" style="font-weight:500">Rs. <?php echo ((int)$total+(int)$shipingCharge);?></div>         
    </div>
   <input type="text" name="totalPayAmt" hidden class="totalPayAmt" value="<?php echo ((int)$total+(int)$shipingCharge);?>">
  <input type="text" hidden name="name" class="name" value="<?php echo $name;?>">
  <input type="text" hidden name="email" class="email" value="<?php echo $email;?>">
  <input type="text" hidden name="contact" class="contact" value="<?php echo $mobile_no;?>">
  