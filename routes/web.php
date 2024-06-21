<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ServiceRequestController;

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

Route::get('/', function () {
    return view('homeclear');
})->name('homeclear');

// Para empleados:
Route::get('/employees', [EmployeeController::class, 'index'])->name('employees.index');
Route::get('/employees/create', [EmployeeController::class, 'create'])->name('employees.create');
Route::post('/employees', [EmployeeController::class, 'store'])->name('employees.store');
Route::get('/employees/{employee}/edit', [EmployeeController::class, 'edit'])->name('employees.edit');
Route::put('/employees/{employee}', [EmployeeController::class, 'update'])->name('employees.update');
Route::delete('/employees/{employee}', [EmployeeController::class, 'destroy'])->name('employees.destroy'); 

Route::resource('customers', CustomerController::class);
Route::resource('services', ServiceController::class); 



Route::resource('servicerequests', ServiceRequestController::class); 

//Route::post('/servicerequests/create', 'ServiceRequestController@create')->name('service_requests.create');

//Route::get('/service_requests', 'ServiceRequestController@index')->name('service_requests.index');
//Route::get('/service_requests/create', 'ServiceRequestController@create')->name('service_requests.create');
//Route::get('/service_requests/{service_request}/edit', 'ServiceRequestController@edit')->name('service_requests.edit');
//Route::get('/service_requests/{service_request}', 'ServiceRequestController@show')->name('service_requests.show');



