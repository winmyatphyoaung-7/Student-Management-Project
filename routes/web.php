<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

use App\Http\Controllers\LikeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\User\AjaxController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\User\UserCourseController;




//login , register
Route::middleware(['admin_auth'])->group(function(){
    Route::redirect('/', 'loginPage');

    Route::get('loginPage',[AuthController::class,'login'])->name('admin#loginPage');
    Route::post('/login/validate',[AuthController::class,'validateLogin'])->name('user#validate');

    Route::get('registerPage',[AuthController::class,'register'])->name("admin#registerPage");
    Route::post('/user/store',[AuthController::class,'store'])->name('user#store');

    Route::get('/user/verify/{token}',[AuthController::class,'verifyEmail'])->name('user#verifyEmail');

    Route::get('/password/forget',[AuthController::class,'showForgetForm'])->name('forget#passwordForm');
    Route::post('/password/forget',[AuthController::class,'sendResetLink'])->name('forget#passwordLink');
    Route::get('/password/reset/{token}',[AuthController::class,'showResetForm'])->name('reset#passwordForm');
    Route::post('/password/reset',[AuthController::class,'resetPassword'])->name('reset#password');
});

Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard',[AuthController::class,'dashboard'])->name('dashboard');

    Route::group(['prefix' => 'admin','middleware' => 'admin_auth'],function() {

        Route::get('/homePage',[AdminController::class,'homePage'])->name('admin#homePage');

        //admin account

        //profile

        Route::get('account/profile',[AdminController::class,'profilePage'])->name('admin#profilePage');

        Route::get('account/edit/confirm',[AdminController::class,'confirmPasswordPage'])->name('admin#confirmPasswordPage');

        Route::post('account/editPage',[AdminController::class,'confirmPassword'])->name('admin#editPage');

        Route::get('account/updateProfile',[AdminController::class,'updateProfilePage'])->name('admin#updateProfilePage');

        Route::post('account/updateProfile',[AdminController::class,'updateProfile'])->name('admin#updateProfile');

        //password

        Route::get('account/change/password',[AdminController::class,'changePasswordPage'])->name('admin#changePasswordPage');

        Route::post('account/change/password',[AdminController::class,'changePassword'])->name('admin#changePassword');


        //category

        Route::get('category/listPage',[CategoryController::class,'listPage'])->name('category#listPage');

        Route::get('category/create',[CategoryController::class,'createPage'])->name('category#createPage');
        Route::post('category/create',[CategoryController::class,'create'])->name('category#create');

        Route::get('category/delete/{id}',[CategoryController::class,'delete'])->name('category#delete');

        Route::get('category/edit/{id}',[CategoryController::class,'editPage'])->name('category#editPage');
        Route::post('category/edit/{id}',[CategoryController::class,'edit'])->name('category#edit');

        
        // Course
        Route::get('course/listPage',[CourseController::class,'listPage'])->name('course#listPage');

        Route::get('course/create',[CourseController::class,'createPage'])->name('course#createPage');

        Route::post('course/create',[CourseController::class,'create'])->name("course#create");

        Route::get('course/delete/{id}',[CourseController::class,'delete'])->name('admin#course#delete');

        Route::get('course/edit/{id}',[CourseController::class,'editPage'])->name('course#editPage');

        Route::post('course/edit/{id}',[CourseController::class,'edit'])->name('course#edit');

        //requests
        Route::get('request/listPage',[RequestController::class,'listPage'])->name('request#listPage');
        Route::get('request/accept/{id}/{userId}',[RequestController::class,'accept'])->name('request#accept');
        Route::get('request/reject/{id}/{userId}',[RequestController::class,'reject'])->name('request#reject');

        //admin list
        Route::get('listPage',[AdminController::class,'adminListPage'])->name('admin#listPage');

        //user list
        Route::get('userListPage',[AdminController::class,'userListPage'])->name('user#listPage');
        Route::get('userChangeRole',[AdminController::class,'userChangeRole'])->name('user#changeRole');

        //student list
        Route::get('studentListPage',[AdminController::class,'studentListPage'])->name('student#listPage');

        //contact list
        Route::get('contact/listPage',[ContactController::class,'listPage'])->name('contact#listPage');
        Route::get('contact/delete/{id}',[ContactController::class,'delete'])->name('contact#delete');
    });

    Route::group(['prefix' => 'user','middleware' => 'user_auth'],function() {
        Route::get('/homePage',[UserController::class,'homePage'])->name('user#homePage');

        //home menu 

        route::get('/home/section',[UserController::class,'homeSection'])->name('user#homeSection');

        //profile
        Route::get('account/profilePage',[UserController::class,'profilePage'])->name('user#profilePage');
        Route::get('account/edit/confirm',[UserController::class,'confirmPasswordPage'])->name('user#confirmPasswordPage');
        Route::post('account/editPage',[UserController::class,'confirmPassword'])->name('user#editPage');
        Route::get('account/updateProfile',[UserController::class,'updateProfilePage'])->name('user#updateProfilePage');
        Route::post('account/updateProfile',[UserController::class,'updateProfile'])->name('user#updateProfile');

        //password
        Route::get('account/change/password',[UserController::class,'changePasswordPage'])->name('user#changePasswordPage');
        Route::post('account/change/password',[UserController::class,'changePassword'])->name('user#changePassword');

        //course
        Route::get('/course/detail/{id}',[UserCourseController::class,'detailPage'])->name('course#detailPage');
        Route::get('/course/saved/{id}',[UserCourseController::class,'saved'])->name('course#saved');
        Route::get('/course/unsaved/{id}',[UserCourseController::class,'unsaved'])->name('course#unsaved');
        Route::get('/course/savedPage',[UserCourseController::class,'savedPage'])->name('course#savedPage');
        Route::get('/course/filter/{id}',[UserCourseController::class,'filter'])->name('course#filter');
        Route::post('/course/comment/add',[CommentController::class,'create'])->name('course#comment');
        Route::get('/course/comment/delete/{id}',[CommentController::class,'delete'])->name('course#delete');
        Route::get('/course/like',[LikeController::class,'like'])->name('course#like');
        Route::get('/course/register',[RegisterController::class,'register'])->name('course#register');
        
        //cart 

        Route::get('/cart/listPage',[RegisterController::class,'cartListPage'])->name('cart#listPage');
        Route::get('/cart/delete/{id}',[RegisterController::class,'cartDelete'])->name('cart#delete');

        //register history

        Route::get('/register/history',[RegisterController::class,'historyPage'])->name('register#historyPage');

        //contact 
        Route::get('/contact/homePage',[ContactController::class,'homePage'])->name('contact#homePage');
        Route::post('/contact/send',[ContactController::class,'contact'])->name('user#contact');

        //redirect back route 
        Route::get('/redirect/back',[UserController::class,'redirectBack'])->name('redirect#back');

    });

});


