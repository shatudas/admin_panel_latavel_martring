<?php

use Illuminate\Support\Facades\Route;

//------backend controller link--------//
use App\Http\Controllers\Backend\Admin\AdminController;
use App\Http\Controllers\Backend\Admin\LoginController;
use App\Http\Controllers\Backend\Admin\ProfileController;
use App\Http\Controllers\Backend\Admin\SliderController;
use App\Http\Controllers\Backend\Admin\FeatureController;
use App\Http\Controllers\Backend\Admin\TestimonialController;
use App\Http\Controllers\Backend\Admin\PostController;
use App\Http\Controllers\Backend\Admin\PhotoController;
use App\Http\Controllers\Backend\Admin\VideoController;
use App\Http\Controllers\Backend\Admin\FAQController;
use App\Http\Controllers\Backend\Admin\AboutController;
use App\Http\Controllers\Backend\Admin\TermsController;
use App\Http\Controllers\Backend\Admin\PrivacyController;
use App\Http\Controllers\Backend\Admin\ContactController;
use App\Http\Controllers\Backend\Admin\PageHeadingController;
use App\Http\Controllers\Backend\Admin\AdminSubscriberController;
use App\Http\Controllers\Backend\Admin\AmenityController;
use App\Http\Controllers\Backend\Admin\RoomController;
use App\Http\Controllers\Backend\Admin\CustomerViewController;
use App\Http\Controllers\Backend\Admin\SettingController;


//----------Customer--------//
use App\Http\Controllers\Customer\CustomerAdminController;
use App\Http\Controllers\Customer\CustomerAuthController;
use App\Http\Controllers\Customer\CustomerProfileController;
use App\Http\Controllers\Customer\CustomerOrderController;


//----------frontend controller--------//
use App\Http\Controllers\Frontend\Layout\HomeController;
use App\Http\Controllers\Frontend\Layout\PostsController;
use App\Http\Controllers\Frontend\Layout\PhotosController;
use App\Http\Controllers\Frontend\Layout\VideosController;
use App\Http\Controllers\Frontend\Layout\FAQsController;
use App\Http\Controllers\Frontend\Layout\PagesController;
use App\Http\Controllers\Frontend\Layout\contectsController;
use App\Http\Controllers\Frontend\Layout\SubscriberController;
use App\Http\Controllers\Frontend\Layout\HotalRoomController;
use App\Http\Controllers\Frontend\Layout\BookingController;



//_______frontend end__________//
Route::get('/',[HomeController::class,'index'])->name('home');
Route::get('post',[PostsController::class,'post'])->name('post');
Route::get('post-view/{id}',[PostsController::class,'postView'])->name('post_view');
Route::get('photo',[PhotosController::class,'photo'])->name('photo');
Route::get('video',[VideosController::class,'video'])->name('video');
Route::get('faq',[FAQsController::class,'faq'])->name('faq');
Route::get('about',[PagesController::class,'about'])->name('about');
Route::get('term',[PagesController::class,'term'])->name('term');
Route::get('privacy',[PagesController::class,'privacy'])->name('privacy');
Route::get('contect',[PagesController::class,'contect'])->name('contect');
Route::get('contact_send_email',[contectsController::class,'contact_send_email'])->name('contact_send_email');
Route::post('subscriber/send_email',[SubscriberController::class,'send_email'])->name('subscriber_send_email');
Route::get('subscriber/varify/{email}/{token}',[SubscriberController::class,'varify'])->name('subscriber_varify');
Route::get('single_room/{id}',[HotalRoomController::class,'single_room'])->name('single_room');
Route::get('room_all',[HotalRoomController::class,'room_all'])->name('room_all');
Route::post('/booking/submit',[BookingController::class,'cart_submit'])->name('booking.submit');
Route::get('/cart',[BookingController::class,'cart_page'])->name('cart');
Route::get('/cart/delete/{id}',[BookingController::class,'cart_delete'])->name('cart.delete');
Route::get('/checkout',[BookingController::class,'checkout_page'])->name('checkout');
Route::post('/payment',[BookingController::class,'payment_page'])->name('payment');
Route::get('/payment/paypal/{price}',[BookingController::class,'paypal'])->name('paypal');
Route::post('/payment/stripe/{price}',[BookingController::class,'payment_stripe'])->name('payment_stripe');


//_______backend part__________//

//------Customer login-----------//
Route::get('/login',[CustomerAuthController::class,'customer_login'])->name('customer.login');
Route::post('/login-submit',[CustomerAuthController::class,'customer_login_submit'])->name('customer.login-submit');
Route::get('/logout',[CustomerAuthController::class,'customer_logout'])->name('customer.logout');

//------Customer login password forget & reset-----------//
Route::get('/forget-password',[CustomerAuthController::class,'customer_forgat_password'])->name('customer.forget.password');
Route::post('/forget/password/submit',[CustomerAuthController::class,'customer_forgat_password_submit'])->name('customer.forget.password-submit');
Route::get('/forget-password/{token}/{email}',[CustomerAuthController::class,'customer_reset_password'])->name('customer.reset.password');
Route::post('/reset/password',[CustomerAuthController::class,'customer_reset_password_submit'])->name('customer.reset.password');



//------Customer sing Up-----------//
Route::get('/singup',[CustomerAuthController::class,'customer_singup'])->name('customer.singup');
Route::post('/singup-submit',[CustomerAuthController::class,'customer_singup_submit'])->name('customer.singup-submit');
Route::get('/customer-verification/{email}/{token}',[CustomerAuthController::class,'customer_verification'])->name('customer_verification');


//------Customer middleware-----------//
Route::group(['middleware'=>'customer:customer'],function(){

 //------Customer Deshboard-----------//
 Route::get('customer/home',[CustomerAdminController::class,'customer_home'])->name('customer.home');

 //------Customer profile-----------//
 Route::get('customer/profile',[CustomerProfileController::class,'customer_profile'])->name('customer.profile');
 Route::post('customer/profile/update',[CustomerProfileController::class,'customer_profile_update'])->name('customer.profile.update');

 //------Customer order-----------//
 Route::get('customer/order/view',[CustomerOrderController::class,'customer_order'])->name('customer.order');
 Route::get('customer/invoice/{id}',[CustomerOrderController::class,'customer_invoice'])->name('customer.invoice');

});




//--------admin login-------//
Route::get('admin/login',[LoginController::class,'admin_login'])->name('admin.login');
Route::get('admin/logout',[LoginController::class,'admin_logout'])->name('admin.logout');
Route::post('admin/login-submit',[LoginController::class,'admin_login_submit'])->name('admin.login-submit');
Route::get('admin/forget-password',[LoginController::class,'forgat_password'])->name('forget.password');
Route::post('admin/forget/password/submit',[LoginController::class,'forgat_password_submit'])->name('admin.forget.password.submit');
Route::get('admin/forget-password/{token}/{email}',[LoginController::class,'reset_password'])->name('admin.reset.password');
Route::post('admin/reset/password',[LoginController::class,'admin_reset_password'])->name('admin.reset.password');


//----admin middleware-------//
Route::group(['middleware'=>'admin:admin'],function(){

	//------Admin Deshboard-----------//
	Route::get('admin/home',[AdminController::class,'admin_home'])->name('admin.home');

	//------profile-----------//
	Route::get('admin/profile',[ProfileController::class,'admin_profile'])->name('admin.profile');
	Route::post('admin/profile/update',[ProfileController::class,'admin_profile_update'])->name('admin.profile.update');


    //---------Customer Information--------//
    Route::get('customer/view',[CustomerViewController::class,'customer_view'])->name('customer.view');
    Route::get('customer/status/{id}',[CustomerViewController::class,'customer_status'])->name('customer.status');

    Route::get('admin/order/view',[CustomerViewController::class,'admin_order'])->name('admin.order');
    Route::get('admin/invoice/{id}',[CustomerViewController::class,'admin_invoice'])->name('admin.invoice');


    //---------setting---------//
    Route::get('setting',[SettingController::class,'setting'])->name('setting');
    Route::post('setting/update/{id}',[SettingController::class,'setting_update'])->name('setting.update');



	//---------Slider---------//
	Route::get('slider/view',[SliderController::class,'slide_view'])->name('slider.view');
	Route::get('slider/add',[SliderController::class,'slide_add'])->name('slider.add');
	Route::post('slider/store',[SliderController::class,'slide_store'])->name('slider.store');
	Route::get('slider/edit/{id}',[SliderController::class,'slide_edit'])->name('slider.edit');
	Route::post('slider/update/{id}',[SliderController::class,'slide_update'])->name('slider.update');
	Route::get('slider/active/{id}',[SliderController::class,'slide_active'])->name('slider.active');
	Route::get('slider/inactive/{id}',[SliderController::class,'slide_inactive'])->name('slider.inactive');
	Route::get('slider/delete/{id}',[SliderController::class,'slide_delete'])->name('slider.delete');

	//---------Feature---------//
	Route::get('feature/view',[FeatureController::class,'feature_view'])->name('feature.view');
	Route::get('feature/add',[FeatureController::class,'feature_add'])->name('feature.add');
	Route::post('feature/store',[FeatureController::class,'feature_store'])->name('feature.store');
	Route::get('feature/edit/{id}',[FeatureController::class,'feature_edit'])->name('feature.edit');
	Route::post('feature/update/{id}',[FeatureController::class,'feature_update'])->name('feature.update');
	Route::get('feature/active/{id}',[FeatureController::class,'feature_active'])->name('feature.active');
	Route::get('feature/inactive/{id}',[FeatureController::class,'feature_inactive'])->name('feature.inactive');
	Route::get('feature/delete/{id}',[FeatureController::class,'feature_delete'])->name('feature.delete');

	//---------Testimonial---------//
	Route::get('testimonial/view',[TestimonialController::class,'testimonial_view'])->name('testimonial.view');
	Route::get('testimonial/add',[TestimonialController::class,'testimonial_add'])->name('testimonial.add');
	Route::post('testimonial/store',[TestimonialController::class,'testimonial_store'])->name('testimonial.store');
	Route::get('testimonial/edit/{id}',[TestimonialController::class,'testimonial_edit'])->name('testimonial.edit');
	Route::post('testimonial/update/{id}',[TestimonialController::class,'testimonial_update'])->name('testimonial.update');
	Route::get('testimonial/active/{id}',[TestimonialController::class,'testimonial_active'])->name('testimonial.active');
	Route::get('testimonial/inactive/{id}',[TestimonialController::class,'testimonial_inactive'])->name('testimonial.inactive');
	Route::get('testimonial/delete/{id}',[TestimonialController::class,'testimonial_delete'])->name('testimonial.delete');

	//---------BlogPost---------//
	Route::get('post/view',[PostController::class,'post_view'])->name('post.view');
	Route::get('post/add',[PostController::class,'post_add'])->name('post.add');
	Route::post('post/store',[PostController::class,'post_store'])->name('post.store');
	Route::get('post/edit/{id}',[PostController::class,'post_edit'])->name('post.edit');
	Route::post('post/update/{id}',[PostController::class,'post_update'])->name('post.update');
	Route::get('post/active/{id}',[PostController::class,'post_active'])->name('post.active');
	Route::get('post/inactive/{id}',[PostController::class,'post_inactive'])->name('post.inactive');
	Route::get('post/delete/{id}',[PostController::class,'post_delete'])->name('post.delete');


	//---------Photo Gallery---------//
	Route::get('photo/view',[PhotoController::class,'photo_view'])->name('photo.view');
	Route::get('photo/add',[PhotoController::class,'photo_add'])->name('photo.add');
	Route::post('photo/store',[PhotoController::class,'photo_store'])->name('photo.store');
	Route::get('photo/edit/{id}',[PhotoController::class,'photo_edit'])->name('photo.edit');
	Route::post('photo/update/{id}',[PhotoController::class,'photo_update'])->name('photo.update');
	Route::get('photo/active/{id}',[PhotoController::class,'photo_active'])->name('photo.active');
	Route::get('photo/inactive/{id}',[PhotoController::class,'photo_inactive'])->name('photo.inactive');
	Route::get('photo/delete/{id}',[PhotoController::class,'photo_delete'])->name('photo.delete');


	//---------Video Gallery---------//
	Route::get('video/view',[VideoController::class,'video_view'])->name('video.view');
	Route::get('video/add',[VideoController::class,'video_add'])->name('video.add');
	Route::post('video/store',[VideoController::class,'video_store'])->name('video.store');
	Route::get('video/edit/{id}',[VideoController::class,'video_edit'])->name('video.edit');
	Route::post('video/update/{id}',[VideoController::class,'video_update'])->name('video.update');
	Route::get('video/active/{id}',[VideoController::class,'video_active'])->name('video.active');
	Route::get('video/inactive/{id}',[VideoController::class,'video_inactive'])->name('video.inactive');
	Route::get('video/delete/{id}',[VideoController::class,'video_delete'])->name('video.delete');

	//---------FAQ---------//
	Route::get('faq/view',[FAQController::class,'faq_view'])->name('faq.view');
	Route::get('faq/add',[FAQController::class,'faq_add'])->name('faq.add');
	Route::post('faq/store',[FAQController::class,'faq_store'])->name('faq.store');
	Route::get('faq/edit/{id}',[FAQController::class,'faq_edit'])->name('faq.edit');
	Route::post('faq/update/{id}',[FAQController::class,'faq_update'])->name('faq.update');
	Route::get('faq/active/{id}',[FAQController::class,'faq_active'])->name('faq.active');
	Route::get('faq/inactive/{id}',[FAQController::class,'faq_inactive'])->name('faq.inactive');
	Route::get('faq/delete/{id}',[FAQController::class,'faq_delete'])->name('faq.delete');

	//---------Hotel amenity---------//
	Route::get('amenity/view',[AmenityController::class,'amenity_view'])->name('amenity.view');
	Route::get('amenity/add',[AmenityController::class,'amenity_add'])->name('amenity.add');
	Route::post('amenity/store',[AmenityController::class,'amenity_store'])->name('amenity.store');
	Route::get('amenity/edit/{id}',[AmenityController::class,'amenity_edit'])->name('amenity.edit');
	Route::post('amenity/update/{id}',[AmenityController::class,'amenity_update'])->name('amenity.update');
	Route::get('amenity/active/{id}',[AmenityController::class,'amenity_active'])->name('amenity.active');
	Route::get('amenity/inactive/{id}',[AmenityController::class,'amenity_inactive'])->name('amenity.inactive');
	Route::get('amenity/delete/{id}',[AmenityController::class,'amenity_delete'])->name('amenity.delete');


	//---------Hotel room---------//
	Route::get('room/view',[RoomController::class,'room_view'])->name('room.view');
	Route::get('room/add',[RoomController::class,'room_add'])->name('room.add');
	Route::post('room/store',[RoomController::class,'room_store'])->name('room.store');
	Route::get('room/edit/{id}',[RoomController::class,'room_edit'])->name('room.edit');
	Route::post('room/update/{id}',[RoomController::class,'room_update'])->name('room.update');
	Route::get('room/active/{id}',[RoomController::class,'room_active'])->name('room.active');
	Route::get('room/inactive/{id}',[RoomController::class,'room_inactive'])->name('room.inactive');
	Route::get('room/delete/{id}',[RoomController::class,'room_delete'])->name('room.delete');

	//---------Hotel Room Gallery---------//
	Route::get('room/gallery/add/{id}',[RoomController::class,'room_Gallery_add'])->name('room.gallery.add');
	Route::post('room/gallery/store/{id}',[RoomController::class,'room_Gallery_store'])->name('room.gallery.store');
	Route::get('room/gallery/inactive/{id}',[RoomController::class,'room_Gallery_inactive'])->name('room.gallery.inactive');
	Route::get('room/gallery/active/{id}',[RoomController::class,'room_Gallery_active'])->name('room.gallery.active');
	Route::get('room/gallery/delete/{id}',[RoomController::class,'room_Gallery_delete'])->name('room.gallery.delete');

	//---------About---------//
	Route::get('about/add',[AboutController::class,'about_add'])->name('about.add');
	Route::post('about/update/{id}',[AboutController::class,'about_update'])->name('about.update');

	//---------Terms & Comdition---------//
	Route::get('terms/add',[TermsController::class,'terms_add'])->name('terms.add');
	Route::post('terms/update/{id}',[TermsController::class,'terms_update'])->name('terms.update');

	//---------Privacy---------//
	Route::get('privacy/add',[PrivacyController::class,'privacy_add'])->name('privacy.add');
	Route::post('privacy/update/{id}',[PrivacyController::class,'privacy_update'])->name('privacy.update');

	//---------Contact---------//
	Route::get('contact/add',[ContactController::class,'contact_add'])->name('contact.add');
	Route::post('contact/update/{id}',[ContactController::class,'contact_update'])->name('contact.update');

	//---------Page Headings---------//
    Route::get('roomheading/add',[PageHeadingController::class,'roomheading_add'])->name('roomheading.add');
	Route::post('roomheading/update/{id}',[PageHeadingController::class,'roomheading_update'])->name('roomheading.update');

	Route::get('photoheading/add',[PageHeadingController::class,'photoheading_add'])->name('photoheading.add');
	Route::post('photoheading/update/{id}',[PageHeadingController::class,'photoheading_update'])->name('photoheading.update');

	Route::get('videoheading/add',[PageHeadingController::class,'videoheading_add'])->name('videoheading.add');
	Route::post('videoheading/update/{id}',[PageHeadingController::class,'videoheading_update'])->name('videoheading.update');

	Route::get('faqheading/add',[PageHeadingController::class,'faqheading_add'])->name('faqheading.add');
	Route::post('faqheading/update/{id}',[PageHeadingController::class,'faqheading_update'])->name('faqheading.update');

	Route::get('blogheading/add',[PageHeadingController::class,'blogheading_add'])->name('blogheading.add');
	Route::post('blogheading/update/{id}',[PageHeadingController::class,'blogheading_update'])->name('blogheading.update');

	Route::get('cartheading/add',[PageHeadingController::class,'cartheading_add'])->name('cartheading.add');
	Route::post('cartheading/update/{id}',[PageHeadingController::class,'cartheading_update'])->name('cartheading.update');

	Route::get('cheakheading/add',[PageHeadingController::class,'cheakheading_add'])->name('cheakheading.add');
	Route::post('cheakheading/update/{id}',[PageHeadingController::class,'cheakheading_update'])->name('cheakheading.update');

	Route::get('singup_heading/add',[PageHeadingController::class,'singup_heading_add'])->name('singup_heading.add');
	Route::post('singup_heading/update/{id}',[PageHeadingController::class,'singup_heading_update'])->name('singup_heading.update');

	Route::get('singin_heading/add',[PageHeadingController::class,'singin_heading_add'])->name('singin_heading.add');
	Route::post('singin_heading/update/{id}',[PageHeadingController::class,'singin_heading_update'])->name('singin_heading.update');

    Route::get('forgetpass_heading/add',[PageHeadingController::class,'forgetpass_heading_add'])->name('forgetpass_heading.add');
	Route::post('forgetpass_heading/update/{id}',[PageHeadingController::class,'forgetpass_heading_update'])->name('forgetpass_heading.update');

    Route::get('reset_heading/add',[PageHeadingController::class,'reset_heading_add'])->name('reset_heading.add');
	Route::post('reset_heading/update/{id}',[PageHeadingController::class,'reset_heading_update'])->name('reset_heading.update');


	//---------Page Headings---------//
	Route::get('subscriber/show',[AdminSubscriberController::class,'subscriber_show'])->name('subscriber.show');
	Route::get('subscriber/send-email',[AdminSubscriberController::class,'send_email'])->name('subscriber.send_email');
	Route::post('subscriber/send-email-submit',[AdminSubscriberController::class,'send_email_submit'])->name('subscriber.send_email_submit');


});
