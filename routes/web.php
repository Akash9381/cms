<?php

use App\Http\Controllers\BuyerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LandLoardController;
use App\Http\Controllers\SellerController;
use App\Http\Controllers\TenentController;
use App\Http\Controllers\UserController;
use App\Models\Tenent;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

Route::get('/',[DashboardController::class,'Login'])->name('login')->middleware('guest');
Route::get('/home',[DashboardController::class,'Home']);
Route::get('/login',[DashboardController::class,'Login'])->name('admin.login')->middleware('guest');



Route::group(['middleware'=>'auth'],function(){
    Route::get('admin/dashboard',[DashboardController::class,'Show'])->name('admin.dashboard');

    Route::get('admin/buyer',[BuyerController::class,'List'])->name('admin.buyer');
    Route::get('admin/buyer/form/{id?}',[BuyerController::class,'BuyerForm']);
    Route::post('admin/submitbuyer/{id?}',[BuyerController::class,'InsertBuyer']);
    Route::get('admin/buyer/profile/{id}',[BuyerController::class,'BuyerProfile']);
    Route::get('admin/buyer/delete/{id}',[BuyerController::class,'DeleteBuyer']);

    Route::get('admin/employee',[UserController::class,'List'])->name('admin.employee');
    Route::post('admin/submitEmployee/{id?}',[UserController::class,'InsertEmployee']);
    Route::get('admin/employee/form/{id?}',[UserController::class,'Show']);
    Route::get('admin/employee/delete/{id?}',[UserController::class,'EmployeeDelete']);

    Route::get('admin/landloard',[LandLoardController::class,'List'])->name('admin.landloard');
    Route::get('admin/landloard/form/{id?}',[LandLoardController::class,'LandLoardForm']);
    Route::post('admin/submitLandloard/{id?}',[LandLoardController::class,'InsertLandLoard']);
    Route::get('admin/landloard/profile/{id}',[LandLoardController::class,'LandLoardProfile']);
    Route::get('admin/landloard/delete/{id}',[LandLoardController::class,'LandLoardDelete']);

    Route::get('admin/tenant',[TenentController::class,'List'])->name('admin.tenent');
    Route::get('admin/tenant/form/{id?}',[TenentController::class,'TenentForm']);
    Route::post('admin/submitTenent/{id?}',[TenentController::class,'InsertTenent']);
    Route::get('admin/tenant/profile/{id}',[TenentController::class,'TenentProfile']);
    Route::get('admin/tenant/delete/{id}',[TenentController::class,'TenentDelete']);

    Route::get('admin/seller',[SellerController::class,'List'])->name('admin.seller');
    Route::get('admin/seller/form/{id?}',[SellerController::class,'SellerForm']);
    Route::post('admin/submitseller/{id?}',[SellerController::class,'InsertSeller']);
    Route::get('admin/seller/profile/{id}',[SellerController::class,'SellerProfile']);
    Route::get('admin/seller/delete/{id}',[SellerController::class,'SellerDelete']);

    Route::get('admin/notification',[DashboardController::class,'Notification']);
    Route::get('admin/tenant/notification/delete/{id}',[TenentController::class,'TenentDeleteNotification']);
    Route::get('admin/buyer/notification/delete/{id}',[BuyerController::class,'BuyerDeleteNotification']);
    Route::get('admin/logout',[DashboardController::class,'Logout']);

    Route::get('admin/booked',[BuyerController::class,'Booked']);
    Route::get('admin/seller/booked',[SellerController::class,'Booked']);
    Route::get('admin/landlord/booked',[LandLoardController::class,'Booked']);
    Route::get('admin/tenant/booked',[TenentController::class,'Booked']);
});
Route::post('admin/authenticate',[DashboardController::class,'Authenticate'])->name('authenticate');
