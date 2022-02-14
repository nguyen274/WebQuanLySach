<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\BillController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\AuthenticateController;
use App\Http\Middleware\CheckLogin;
use App\Mail\TestMail;
use Illuminate\Support\Facades\Mail;
use App\Http\Middleware\CheckLogged;

Route::get('/login', [AuthenticateController::class, 'login'])->name('login');
Route::post('/login-process', [AuthenticateController::class, 'loginProcess'])->name('login-process');


Route::middleware([CheckLogin::class])->group(function () {
    Route::get('/', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/logout', [AuthenticateController::class, 'logout'])->name('logout');

    // lớp
    Route::resource("grade", GradeController::class);
    //admin
    
    Route::prefix("admin")->name('admin.')->group(function(){
        Route::get('/import-excel', [AdminController::class, 'importExcel'])->name('import-excel');
        Route::post('/import-excel-process', [AdminController::class, 'importExcelProcess'])->name('import-excel-process');
        Route::get('/export-excel', [AdminController::class, 'exportExcel'])->name('export-excel');
    });
    Route::resource("admin", AdminController::class);
    Route::get('/admin/show', [AdminController::class,'show'])->name('show');
    // sinh viên
    Route::get('/student/unregister', [StudentController::class,'unregister'])->name('unregister');
    Route::get('/student/register', [StudentController::class,'register'])->name('register');

    Route::prefix("student")->name('student.')->group(function () {
        Route::get('hide/{id}', [StudentController::class, 'hide'])->name('hide');
        Route::get('/import-excel', [StudentController::class, 'importExcel'])->name('import-excel');
        Route::post('/import-excel-process', [StudentController::class, 'importExcelProcess'])->name('import-excel-process');
        Route::get('/export-excel', [StudentController::class, 'exportExcel'])->name('export-excel');
    
    });
    Route::resource("student", StudentController::class);
    Route::get("/mail", function () {
        Mail::to("yahoo@gmail.com")->send(new TestMail());
    });
    Route::resource('course', CourseController::class);
    Route::resource("subject", SubjectController::class);

    Route::prefix("book")->name('book.')->group(function(){
        Route::get('/import-excel', [BookController::class, 'importExcel'])->name('import-excel');
        Route::post('/import-excel-process', [BookController::class, 'importExcelProcess'])->name('import-excel-process');
        Route::get('/export-excel', [BookController::class, 'exportExcel'])->name('export-excel');
    });
    Route::resource("book", BookController::class );
    Route::prefix("bill")->name('bill.')->group(function(){
        Route::get('/export-excel', [BillController::class, 'exportExcel'])->name('export-excel');
    });
    Route::resource("bill", BillController::class);

    Route::prefix("register")->name('register.')->group(function () {
        Route::get('/export-excel', [RegisterController::class, 'exportExcel'])->name('export-excel');    
    });
    Route::resource("register", RegisterController::class);
    
});

Route::middleware([CheckLogged::class])->group(function(){
    Route::get('/login', [AuthenticateController::class, 'login'])->name('login');
    Route::post('/login-process',[AuthenticateController::class, 'loginProcess'])->name('login-process');
});