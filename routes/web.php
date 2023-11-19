<?php

use Illuminate\Support\Facades\Route;
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


use App\Http\Controllers\Frontend\Layout\HomeController;
use App\Http\Controllers\Frontend\Layout\PostsController;
use App\Http\Controllers\Frontend\Layout\PhotosController;
use App\Http\Controllers\Frontend\Layout\VideosController;
use App\Http\Controllers\Frontend\Layout\FAQsController;


//_______frontend end__________//
Route::get('/',[HomeController::class,'index'])->name('home');

Route::get('post',[PostsController::class,'post'])->name('post');
Route::get('post-view/{id}',[PostsController::class,'postView'])->name('post_view');
Route::get('photo',[PhotosController::class,'photo'])->name('photo');
Route::get('video',[VideosController::class,'video'])->name('video');
Route::get('faq',[FAQsController::class,'faq'])->name('faq');



//_______backend part__________//

//--------admin login-------//
Route::get('admin/home',[AdminController::class,'admin_home'])->name('admin.home')->middleware('admin:admin');
Route::get('admin/login',[LoginController::class,'admin_login'])->name('admin.login');
Route::post('admin/login-submit',[LoginController::class,'admin_login_submit'])->name('admin.login-submit');
Route::get('admin/logout',[LoginController::class,'admin_logout'])->name('admin.logout');
Route::get('admin/forget-password',[LoginController::class,'forgat_password'])->name('forget.password');
Route::post('admin/forget/password/submit',[LoginController::class,'forgat_password_submit'])->name('admin.forget.password.submit');
Route::get('admin/forget-password/{token}/{email}',[LoginController::class,'reset_password'])->name('admin.reset.password');
Route::post('admin/reset/password',[LoginController::class,'admin_reset_password'])->name('admin.reset.password');


Route::group(['middleware'=>'admin:admin'],function(){

//------profile-----------//
Route::get('admin/profile',[ProfileController::class,'admin_profile'])->name('admin.profile');
Route::post('admin/profile/update',[ProfileController::class,'admin_profile_update'])->name('admin.profile.update');


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



//---------Testimonial---------//
Route::get('post/view',[PostController::class,'post_view'])->name('post.view');
Route::get('post/add',[PostController::class,'post_add'])->name('post.add');
Route::post('post/store',[PostController::class,'post_store'])->name('post.store');
Route::get('post/edit/{id}',[PostController::class,'post_edit'])->name('post.edit');
Route::post('post/update/{id}',[PostController::class,'post_update'])->name('post.update');
Route::get('post/active/{id}',[PostController::class,'post_active'])->name('post.active');
Route::get('post/inactive/{id}',[PostController::class,'post_inactive'])->name('post.inactive');
Route::get('post/delete/{id}',[PostController::class,'post_delete'])->name('post.delete');


//---------Photo---------//
Route::get('photo/view',[PhotoController::class,'photo_view'])->name('photo.view');
Route::get('photo/add',[PhotoController::class,'photo_add'])->name('photo.add');
Route::post('photo/store',[PhotoController::class,'photo_store'])->name('photo.store');
Route::get('photo/edit/{id}',[PhotoController::class,'photo_edit'])->name('photo.edit');
Route::post('photo/update/{id}',[PhotoController::class,'photo_update'])->name('photo.update');
Route::get('photo/active/{id}',[PhotoController::class,'photo_active'])->name('photo.active');
Route::get('photo/inactive/{id}',[PhotoController::class,'photo_inactive'])->name('photo.inactive');
Route::get('photo/delete/{id}',[PhotoController::class,'photo_delete'])->name('photo.delete');


//---------Video---------//
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


});
