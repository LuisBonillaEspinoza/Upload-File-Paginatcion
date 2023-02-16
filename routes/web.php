<?php
use App\Http\Controllers\UploadController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

//Upload File
Route::get('/', [UploadController::class,'index'])->name('upload.index');
Route::post('/guardar',[UploadController::class,'store'])->name('upload.store');

Route::get('/download/{file}',[UploadController::class,'download'])->name('upload.download');