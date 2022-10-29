<?php

use App\Models\Testimonial;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminPagecontroller;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ClientsController;
use App\Http\Controllers\Admin\CounterController;
use App\Http\Controllers\Admin\SlidersController;
use App\Http\Controllers\Admin\TagPostController;
use App\Http\Controllers\Admin\BlogPostController;
use App\Http\Controllers\Admin\PortfolioController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\ProductTagController;
use App\Http\Controllers\Admin\CategoryPostController;
use App\Http\Controllers\Admin\TestimonialsController;
use App\Http\Controllers\Admin\ProductCategoryController;
use App\Http\Controllers\Frontend\FrontendPageController;
use App\Http\Controllers\Admin\CategoryPortfolioController;

//Admin Auth Routes
Route::group(['middleware' => 'admin.redirect'], function(){

Route::get('/admin-login', [AdminAuthController::class, 'showloginpage'])->name('admin.login.page');
Route::post('/admin-login', [AdminAuthController::class, 'login'])->name('admin.login');

});



//Admin page Routes
Route::group(['middleware' => 'admin'], function(){
    
    Route::get('/dashboard', [AdminPagecontroller::class, 'showDasPage'])->name('admin.Dasboard.page');
    Route::get('/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

    //permissions routes

    Route::resource('/permission', PermissionController::class);

    //Role Routes
    Route::resource('/role', RoleController::class);

     //Admin Routes
     Route::resource('/admin-user', AdminController::class);

     Route::get('/admin-user-status-update/{id}', [AdminController::class, 'adminStatus'])->name('admin.status.update');
     Route::get('/admin-user-trash-update/{id}', [AdminController::class, 'adminTrash'])->name('admin.trash.update');
     Route::get('/admin-trash-user', [AdminController::class, 'adminTrashUser'])->name('admin.trash.user');


     //Sliders Routes
     Route::resource('/sliders', SlidersController::class);
     Route::get('/slider-status-update/{id}', [SlidersController::class, 'sliderStatus'])->name('slider.status.update');
     Route::get('/slider-trash-update/{id}', [SlidersController::class, 'slideTrash'])->name('slide.trash');
     Route::get('/trash-slider', [SlidersController::class, 'showTrashSlider'])->name('show.trash.slider');


     //Testimonial Routes
     Route::resource('/testimonials', TestimonialsController::class);
     Route::get('/testimonials-status-update/{id}', [TestimonialsController::class, 'testimonialStatus'])->name('testimonials.status.update');
     Route::get('/testimonials-trash-update/{id}', [TestimonialsController::class, 'testimonialsTrash'])->name('testimonials.trash');
     Route::get('/trash-testimonials', [TestimonialsController::class, 'showTrashtestimonial'])->name('show.trash.testimonials');

     //Counter Routes
     Route::resource('/counter', CounterController::class);

     //Clients Routes
     Route::resource('/client', ClientsController::class);

     //portfolio
     Route::resource('/category-portfolio', CategoryPortfolioController::class);
     Route::resource('/portfolio', PortfolioController::class);

     //post Route
     Route::resource('/tag', TagPostController::class);
     Route::resource('/category-post', CategoryPostController::class);
     Route::resource('/post', BlogPostController::class);
     Route::get('/allpost', [BlogPostController::class, 'showAllPost'])->name('show.all.post');

     //Product Route
     Route::resource('/product-tag', ProductTagController::class);
     Route::resource('/product-category', ProductCategoryController::class);
    //  Route::resource('/post', BlogPostController::class);



});


// Rontend Routes
Route::get('/', [FrontendPageController::class, 'showhomepage'])->name('show.home.page');
Route::get('/contact', [FrontendPageController::class, 'showContactpage'])->name('show.contact.page');
Route::get('/portfolio-single/{slug}', [FrontendPageController::class, 'showPortfoliosinglepage'])->name('show.portfoloio.single.page');
Route::get('/blog', [FrontendPageController::class, 'showblogpage'])->name('show.blog.page');
Route::get('/post-category/{slug}', [FrontendPageController::class, 'showblogpostbycategory'])->name('show.blog.post.category');
Route::get('/post-tag/{slug}', [FrontendPageController::class, 'showblogpostbytag'])->name('show.blog.post.tag');
Route::get('/blog-post-single/{slug}', [FrontendPageController::class, 'showblogsinglepage'])->name('show.blog.single.page');
Route::post('/blog-post-search/{key}', [FrontendPageController::class, 'showblogpostbysearch'])->name('show.blog.search');
