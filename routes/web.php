<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\SliderController;
use App\Http\Controllers\admin\GalleryController;
use App\Http\Controllers\admin\NoticeController;
use App\Http\Controllers\admin\NoteController;

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
Route::get('/sliderimages',[SliderController::class,'index']);
Route::get('/add-sliderimage',[SliderController::class,'create']);
Route::post('/add-sliderimage',[SliderController::class,'store']);
Route::get('/edit-sliderimage/{id}',[SliderController::class,'edit']);
Route::put('/update-sliderimage/{id}',[SliderController::class,'update']); 
Route::get('/delete-sliderimage/{id}',[SliderController::class,'destroy']);



//gallery  
Route::resource('/gallery', GalleryController::class);
//notice
Route::get('/add-notices',[NoticeController::class,'addNotice']);
Route::post('/add-notices',[NoticeController::class,'NoticeStore'])->name('notice.store');
Route::get('/all-notices',[NoticeController::class,'notices']);
Route::get('/edit-notices/{id}',[NoticeController::class,'editNotice']);
Route::post('/update-notice',[NoticeController::class,'updateNotice'])->name('notice.update');
Route::get('/delete-notice/{id}',[NoticeController::class,'deleteNotice']);
//pdf
Route::get('add-notes',[NoteController::class,'addNote']);
Route::post('/add-notes',[NoteController::class,'noteStore'])->name('note.store');
Route::get('/all-notes',[NoteController::class,'notes']);
Route::get('/edit-notes/{id}',[NoteController::class,'editNote']);
Route::post('/update-note',[NoteController::class,'updateNote'])->name('note.update');
Route::get('/delete-note/{id}',[NoteController::class,'deleteNote']);
//















