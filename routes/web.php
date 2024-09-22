
<?php
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*--------Admin Panel URL ---------*/

Route::group(['middleware' => ['prevent-back-history','adminLoginAuth']],function(){
Route::get('admin-dashboard','AdminController@adminDashboard')->name('admin-dashboard');


Route::post('/get-total-notification','UserController@getAllNotification')->name('get-total-notification');

Route::get('/view-booking-notification','UserController@viewBokNotification')->name('view-booking-notification');

Route::get('/view-enquiry-notification','UserController@viewEnquiryNotification')->name('view-enquiry-notification');



/*-------- user management ------*/
Route::get('/user','UserController@index')->name('user');
Route::get('/user-detail/{id}','UserController@userDetails')->name('user-detail');
/*-------- user management ------*/

/*------- category------*/
Route::get('/categories','ProductCategoryController@index')->name('category-view');
Route::get('/category-add','ProductCategoryController@create')->name('category-add');
Route::post('/category-store','ProductCategoryController@store')->name('category-store');
Route::get('/category-show/{id}','ProductCategoryController@show')->name('category-show');
Route::get('/category-edit/{id}','ProductCategoryController@edit')->name('category-edit');
Route::post('/category-update','ProductCategoryController@update')->name('category-update');
Route::get('/category-destroy/{id}','ProductCategoryController@destroy')->name('category-destroy');
Route::post('/update-category-status','ProductCategoryController@updateCategoryStatus')->name('update-category-status');
Route::post('/set_subCategory_homePage_status','ProductCategoryController@set_subCategory_homePage_status')->name('set_subCategory_homePage_status');

/*---- end category ------*/

/*---- Brand -----*/
Route::get('/brand','BrandController@index')->name('brand-view');
Route::get('/brand-add','BrandController@create')->name('brand-add');
Route::post('/brand-store','BrandController@store')->name('brand-store');
Route::get('/brand-show/{id}','BrandController@show')->name('brand-show');
Route::get('/brand-edit/{id}','BrandController@edit')->name('brand-edit');
Route::post('/brand-update','BrandController@update')->name('brand-update');
Route::get('/brand-destroy/{id}','BrandController@destroy')->name('brand-destroy');
Route::post('/update-brand-status','BrandController@updateBrandStatus')->name('update-brand-status');
/*----end brand ----*/

/*-------- city Management ---------*/

Route::get('/city','CityController@index')->name('city-view');
Route::get('/city-add','CityController@create')->name('city-add');
Route::post('/city-store','CityController@store')->name('city-store');
Route::get('/city-show/{id}','CityController@show')->name('city-show');
Route::get('/city-edit/{id}','CityController@edit')->name('city-edit');
Route::post('/city-update','CityController@update')->name('city-update');
Route::get('/city-destroy/{id}','CityController@destroy')->name('city-destroy');
Route::post('/update-city-status','CityController@updateCityStatus')->name('update-city-status');

/*-------- Location Management ---------*/

Route::get('/location','LocationController@index')->name('location-view');
Route::get('/location-add','LocationController@create')->name('location-add');
Route::post('/location-store','LocationController@store')->name('location-store');
Route::get('/location-show/{id}','LocationController@show')->name('location-show');
Route::get('/location-edit/{id}','LocationController@edit')->name('location-edit');
Route::post('/location-update','LocationController@update')->name('location-update');
Route::get('/location-destroy/{id}','LocationController@destroy')->name('location-destroy');
Route::post('/update-location-status','LocationController@updateLocationStatus')->name('update-location-status');

/*-------- end Location Management ---------*/

/*--------  Product Management -------*/

Route::get('/product','ProductController@index')->name('product-view');
Route::get('/product-add','ProductController@create')->name('product-add');
Route::post('/product-store','ProductController@store')->name('product-store');
Route::get('/product-show/{id}','ProductController@details')->name('product-show');
Route::get('/product-edit/{id}','ProductController@edit')->name('product-edit');
Route::post('/product-update','ProductController@update')->name('product-update');
Route::get('/product-destroy/{id}','ProductController@destroy')->name('product-destroy');
Route::post('/update-product-status','ProductController@updateProductStatus')->name('update-product-status');
/*-------- end Product Management -------*/

/*--------  Testimonial Management ------*/
Route::get('/testimonial','TestimonialController@index')->name('testimonial-view');
Route::get('/testimonial-add','TestimonialController@create')->name('testimonial-add');
Route::post('/testimonial-store','TestimonialController@store')->name('testimonial-store');
Route::get('/testimonial-show/{id}','TestimonialController@show')->name('testimonial-show');
Route::get('/testimonial-edit/{id}','TestimonialController@edit')->name('testimonial-edit');
Route::post('/testimonial-update','TestimonialController@update')->name('testimonial-update');
Route::get('/testimonial-destroy/{id}','TestimonialController@destroy')->name('testimonial-destroy');
Route::post('/update-testimonial-status','TestimonialController@updateTestimonialStatus')->name('update-testimonial-status');
Route::get('/testimonial-details/{id}','TestimonialController@details')->name('testimonial-details');

/*-------- End Testimonial Management ------*/


/*---------- Banner Management -------*/

Route::get('/banner','BannerController@index')->name('banner-view');
Route::get('/banner-add','BannerController@create')->name('banner-add');
Route::post('/banner-store','BannerController@store')->name('banner-store');
Route::get('/banner-show/{id}','BannerController@show')->name('banner-show');
Route::get('/banner-edit/{id}','BannerController@edit')->name('banner-edit');
Route::post('/banner-update','BannerController@update')->name('banner-update');
Route::get('/banner-destroy/{id}','BannerController@destroy')->name('banner-destroy');
Route::post('/update-banner-status','BannerController@updateBannerStatus')->name('update-banner-status');
Route::get('/banner-details/{id}','BannerController@details')->name('banner-details');
/*-------- End Banner Management ------*/

/*-------- Quantity Management ---------*/

Route::get('/quantity','QtyController@index')->name('quantity');
Route::get('/quantity-add','QtyController@create')->name('quantity-add');
Route::post('/quantity-store','QtyController@store')->name('quantity-store');
Route::get('/quantity-edit/{id}','QtyController@edit')->name('quantity-edit');
Route::post('/quantity-update','QtyController@update')->name('quantity-update');
Route::get('/quantity-destroy/{id}','QtyController@destroy')->name('quantity-destroy');
Route::post('/update-quantity-status','QtyController@updateQuantityStatus')->name('update-quantity-status');
/*-------- End Quantity Management ------*/

/*--------- Material Calculation -----*/
Route::get('/material-calculation','MaterialCalculationController@materialCalcutation')->name('material-calculation');
Route::get('/view-material-calculation','MaterialCalculationController@index')->name('view-material-calculation');
Route::post('/store-material-calculation','MaterialCalculationController@store')->name('store-material-calculation');
/*--------- End  Material Calculation -----*/

/*--------- Enquirey Management --------*/
Route::get('/view-enquiry','EnquaryFormController@index')->name('view-enquiry');
Route::get('/enquiry-detail/{id}','EnquaryFormController@detail')->name('enquiry-detail');
/*--------- end  Enquirey Management --------*/

/*--------  Shipping Charge -------*/
Route::get('/shipping-management','ShippingRangeController@index')->name('shipping-management');
Route::post('/update-shipping-charge','ShippingRangeController@update')->name('update-shipping-charge');
/*-------- End Shipping Charge -------*/

/*--------- Report Management--------*/
Route::get('/payment-report','BookingController@payment')->name('payment');
Route::get('/order-report','BookingController@bookingReport')->name('order-report');
Route::get('/user-report','BookingController@userReport')->name('user-report');
Route::get('/order-report-excel','ReportController@bookingReportExcel')->name('order-report-excel');
Route::get('/payment-report-export-excel','ReportController@paymentReportExcel')->name('payment-report-export-excel');
Route::get('/user-report-export-excel','ReportController@userReportExcel')->name('user-report-export-excel');
/*--------- end Report Management--------*/

/*-----  Booking Management ---------*/
Route::get('/order','BookingController@index')->name('booking');
Route::get('/order-detail/{id}','BookingController@booking_detail')->name('booking-detail');
/*------- end Booking Management------*/

/*-----  Company Management ---------*/
Route::post('/company-address-store','CmpAddressController@update_cmp_address')->name('company-address-store');
/*----- end Company Management ---------*/

/*-----  Best Selling Management ---------*/
Route::get('/best-selling','ProductController@bestSelling')->name('best-selling');
Route::post('/store-best-seller','ProductController@addBestSellingProduct')->name('store-best-seller');
Route::post('/get-update-best-seller-home-page-status','ProductController@getBestSellingProduct')->name('get-update-best-seller-home-page-status');
/*----- end Best Selling Management ---------*/



});

Route::group(['middleware' => ['prevent-back-history','AdminbasicAuth']],function(){

Route::get('/admin-login','AdminLoginController@index')->name('admin-login');
Route::post('check-adminLogin','AdminLoginController@checklogin')->name('check-adminLogin');

});

/*-------- end Admin Panel URL ---------*/


/*-------- User Panel After Login URL ---------*/
Route::group(['middleware' => ['prevent-back-history','UserLoginAuth']],function(){


Route::post('add-user-picture','UserController@addProfilePicrure')->name('add-user-picture');
Route::get('show-user-profile','UserController@showUserProfile')->name('show-user-profile');
Route::post('/change-profile','UserController@changeProfile')->name('change-profile');
Route::get('/user-profile','UserController@userProfile')->name('user-profile');
Route::post('/update-user-profile','UserController@updateUserProfile')->name('update-user-profile');


Route::post('/saveBooking','CartController@saveBooking')->name('saveBooking');
Route::get('/order-history/{id}','BookingController@booking_history')->name('booking-history');
Route::post('/checkOrderStatusForCancel','BookingController@checkOrderStatusForCancel')->name('checkOrderStatusForCancel');
Route::post('/change-booking-status','BookingController@changeBookingStatus')->name('change-booking-status');
Route::get('/rate','CartController@rate')->name('rate');
Route::post('/submit-rating','CartController@submitRating')->name('submit-rating');

Route::post('/submit-order-rating','CartController@submitRatingFromUserProfile')->name('submit-order-rating');

});

/*-------- end User Panel After Login URL ---------*/






Route::get('admin-logout','AdminLoginController@adminLogout')->name('admin-logout');
Route::post('check-user-email','UserController@checkUserEmail')->name('check-user-email');

/*------  user login -----*/

Route::post('getOTP','CartController@getOTP')->name('getOTP');
Route::post('matchOtp','CartController@matchOtp')->name('matchOtp');
Route::get('user-logout','CartController@userLogout')->name('user-logout');
Route::post('resend-otp','CartController@resendOTP')->name('resend-otp');
Route::post('empity-cart','CartController@empityCart')->name('empity-cart');

/*------  end user login -----*/

/*---- Brand ---*/
Route::get('/brand/{id}','ProductController@brand_filter')->name('brand');
Route::get('/ajax_pagination_brand_filter','ProductController@ajax_pagination_brand_filter')->name('ajax_pagination_brand_filter');

/*-------- Product Management ---------*/

Route::get('product-tmp2',function(){
return view('website.product_tmp2');
});
Route::get('product-tmp3',function(){
return view('website.product_tmp3');
});

Route::get('/category/{id}','ProductCategoryController@paroductCategory')->name('product-category');

Route::post('/get-product-subCategory','ProductController@getProductSubCategory')->name('get-product-subCategory');

Route::get('/product-list','ProductController@productList')->name('product-list');
Route::get('/product/{id}','ProductController@productDetails')->name('product');

Route::get('/shop','ProductController@shopByProduct')->name('shop');

Route::get('/shop/{id}/{name}','ProductController@shopByProductCate')->name('shop');

Route::get('/category/{id}/{name}','ProductController@shopByProductCate')->name('category');

Route::post('/getCategoryFilterData','ProductController@getCategoryFilterData')->name('getCategoryFilterData');
Route::post('/getBrandFilterData','ProductController@getBrandFilterData')->name('getBrandFilterData');

Route::post('/getDataUsingProiceFilter','ProductController@getDataUsingProiceFilter')->name('getDataUsingProiceFilter');

Route::post('/findSearchData','ProductController@findSearchData')->name('findSearchData');

Route::post('/getOnlyBrandFilter','ProductController@getOnlyBrandFilter')->name('getOnlyBrandFilter');

Route::get('/get_ajaxPaginationData','ProductController@get_ajaxPaginationData')->name('ProductController');

Route::post('/checkTemplateType','ProductController@checkTemplateType')->name('checkTemplateType');

Route::post('/product-review','ReviewCommentController@store')->name('product-review');

Route::get('/get_ajax_comment_rating','ReviewCommentController@get_ajax_comment_rating')->name('get_ajax_comment_rating');
Route::post('/get_refresh_product_list','ProductController@get_refresh_product_list')->name('get_refresh_product_list');


Route::get('/rfq','RFQController@rfq')->name('rfq');
Route::get('/rfq-list','RFQController@index')->name('rfq-list');
Route::get('/rfq/{id}','RFQController@rfq')->name('rfq');
Route::post('/store-rfq','RFQController@store')->name('store-rfq');
Route::get('/view-more/{id}','RFQController@detail')->name('view-more');

Route::post('/getProductCateBrand','RFQController@getProductCateBrand')->name('getProductCateBrand');

/*---------- testimonial Management -------*/
Route::post('/get-more-testimonial-data','TestimonialController@getMoreTestimonialData')->name('get-more-testimonial-data');
/*-------- Location Management ---------*/

Route::get('/','HomeController@index')->name('home');
Route::post('getMoreBrand','HomeController@getMoreBrand')->name('getMoreBrand');
Route::post('/get_onkeyup_search_data','HomeController@get_onkeyup_search_data')->name('get_onkeyup_search_data');

Route::post('/change-location','HomeController@setLocationId')->name('change-location');

/*----------- Home Page Controller ---------*/

/*------------ cart controller -------------*/
Route::get('/cart','CartController@index')->name('cart');

Route::post('/add_to_cart','CartController@addToCart')->name('add_to_cart');

Route::post('/add_to_tmp_cart','CartController@addToTmpCart')->name('add_to_tmp_cart');

Route::post('/countDown','CartController@countDown')->name('countDown');

Route::post('/countUp','CartController@countUp')->name('countUp');

Route::get('/removeCart','CartController@removeCart')->name('removeCart');

Route::post('/getCartCount','CartController@getCartCount')->name('getCartCount');

Route::post('/removeItem','CartController@removeItem')->name('removeItem');

Route::post('/checkProductCount','CartController@checkProductCount')->name('checkProductCount');

Route::post('/update-cart-product-list-page','CartController@updateCartProductListPage')->name('update-cart-product-list-page');
Route::post('/refreshCart','CartController@refreshCart')->name('refreshCart');

Route::post('/refreshShortCart','CartController@refreshShortCart')->name('refreshShortCart');

Route::post('/check_min_order_forTmp','CartController@check_min_order_forTmp')->name('check_min_order_forTmp');
/*------------ cart controller -------------*/

/*------------ service -------------*/
Route::get('/services','HomeController@services')->name('services');
/*------------ end service -------------*/

/*------------  ---------------*/
Route::get('/view-company-address','CmpAddressController@index')->name('view-company-address');

/*-----------   ---------------*/

/*-----------    --------------*/

Route::post('/store-enquiry','EnquaryFormController@store')->name('store-enquiry');
Route::post('/store-enquiry-page','EnquaryFormController@storePage')->name('store-enquiry-page');

/*-----------  summery  --------------*/
Route::get('/checkout','SummaryController@index')->name('summary');
/*-----------  end summery  --------------*/

/*-----------  booking --------------*/
Route::get('/cancel-order','BookingController@cancelOrder')->name('cancel-order');
Route::get('/cancel-order/{id}','BookingController@user_cancel_order')->name('cancel-order');
Route::post('/place-order','CartController@placeOrder')->name('place-order');
/*----------- booking --------------*/

/*--------- material calculation -----------*/
Route::post('/get-use-material-in-squire','MaterialCalculationController@calculate_material')->name('get-use-material-in-squire');
/*--------- end material calculation -----------*/

Route::get('/contact','HomeController@contactUs')->name('contact');
Route::get('/about-us','HomeController@aboutUs')->name('about-us');

/*------ payment gateway -----*/
Route::get('/payment','CartController@paymentPage')->name('payment');
Route::post('razorpaypayment','CartController@payment')->name('razorpaypayment');
Route::post('change-payment-status','CartController@changePaymentStatus')->name('change-payment-status');
/*------ end payment gateway -----*/

Route::get('/generateInvoice/{id}','CartController@generateInvoice')->name('about-us');

/*--------- cms pages ----------*/

Route::get('return-policy/',function(){
 return view('website.return_policy');	
});

Route::get('privacy-policy/',function(){
 return view('website.privacy');	
});

Route::get('tern-and-condition/',function(){
 return view('website.tnc');
});
Route::get('why-buy-from-site-supply/',function(){
 return view('website.why');
});