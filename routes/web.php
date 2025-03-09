<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\HelloController;
use App\Http\Controllers\MailController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HelloController::class,'Homepage'])->name('Homepage');

Route::get('/show_employee', [EmployeeController::class,'showemployee'])->name('showemployee');

Route::get('/add_employee', [EmployeeController::class,'addemployee'])->name('addemployee');

Route::post('/create_employee', [EmployeeController::class,'createemployee'])->name('createemployee');

Route::get('delete_employee/{id}',[EmployeeController::class,'deleteemployee'])->name('deleteemployee');

Route::get('edit_employee/{id}',[EmployeeController::class,'editemployee'])->name('editemployee');

Route::post('update_employee/{id}',[EmployeeController::class,'updateemployee'])->name('updateemployee');

 Route::post('/search_employee',[EmployeeController::class,'searchemployee'])->name('searchemployee');

 Route::get('pdfdownload_employee/{id}',[EmployeeController::class,'pdfdownloademployee'])->name('pdfdownloademployee');

  Route::get('write_to_one/{id}',[MailController::class,'write_to_one'])->name('write_to_one');

  Route::post('send_mail_to_one',[MailController::class,'send_mail_to_one'])->name('send_mail_to_one');




