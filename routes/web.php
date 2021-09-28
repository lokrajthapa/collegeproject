<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\SliderController;
use App\Http\Controllers\admin\GalleryController;
use App\Http\Controllers\admin\NoticeController;
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
Route::get('/', function () {
    return view('welcome');
});

Route::get('/lokraj', function () {
    return view('lokraj');
});


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('admin.dashboard');
})->name('dashboard');


//sliders image 
Route::get('/sliders',[SliderController::class,'index']);
Route::get('/add-sliderimage',[SliderController::class,'create']);
Route::post('/add-sliderimage',[SliderController::class,'store']);
Route::get('/edit-sliderimage/{id}',[SliderController::class,'edit']);
Route::put('/update-sliderimage/{id}',[SliderController::class,'update']); 


//gallery  
Route::resource('/gallery', GalleryController::class);
//notice
Route::get('/add-notices',[NoticeController::class,'addNotice']);
Route::post('/add-notices',[NoticeController::class,'NoticeStore'])->name('notice.store');
Route::get('/all-notices',[NoticeController::class,'notices']);
Route::get('/edit-notices/{id}',[NoticeController::class,'editNotice']);
Route::post('/update-notice',[NoticeController::class,'updateNotice'])->name('notice.update');
Route::get('/delete-notice/{id}',[NoticeController::class,'deleteNotice']);







