<?php
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

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

// route to show the login form
Route::get('login', array('uses' => 'HomeController@showLogin'))->name('login');
Route::post('login', array('uses' => 'HomeController@doLogin'));
Route::get('/', array('uses' => 'HomeController@showLogin'))->middleware('checkUser');
Route::get('/logout', array('uses' => 'HomeController@doLogout'))->name('logout')->middleware('checkUser');


// Admin group
Route::group(['middleware' => ['web','checkUser', 'isSuperAdmin']], function () {

   	Route::get('/dashboard', array('uses' => 'Admin\AdminController@index'))->name('dashboard');
// Register Employee
   	Route::get('/employees', array('uses' => 'EmployeeController@index'))->name('employees');
	Route::get('/employee', array('uses' => 'EmployeeController@ajaxShow'));
	Route::get('/employee/{EmployeeID}/profile', array('uses' => 'EmployeeController@ShowEmployee'));
	Route::get('/employees/edit/{EmployeeID}', array('uses' => 'EmployeeController@edit'));
	Route::post('/employees/edit/{EmployeeID}', array('uses' => 'EmployeeController@update'));
	Route::get('/employees/delete/{EmployeeID}', array('uses' => 'EmployeeController@destroy'));
  	Route::get('/employees/register', array('uses' => 'EmployeeController@getRegisterForm'))->name('getRegister');
	Route::post('/employees/register', array('uses' => 'EmployeeController@store'));
	Route::get('/employees/generate/{EmailID}', array('uses' => 'EmployeeController@generateLoginEmail'))->name('generate.email');

	Route::get('/mail', array('uses' => 'Mail\sendNotifyEmail@build'));
	Route::get('/sendmail/{Email}','EmployeeController@generateLoginConfirmation');

	Route::get('/incidents','Admin\IncidentController@index')->name('incidents');
	Route::get('/create-incident','Admin\IncidentController@showCreateIncident')->name('create.incident');
	Route::post('/create-incident','Admin\IncidentController@store')->name('store.incident');
	Route::get('/{case_id}/edit-incident','Admin\IncidentController@edit')->name('edit.incident');
	Route::post('/{case_id}/update-incident','Admin\IncidentController@update')->name('update.incident');
	Route::post('/{case_id}/reject-incident','Admin\IncidentController@reject')->name('reject.incident');
	Route::get('/{case_id}/delete','Admin\IncidentController@delete');
	Route::get('/attachment/download/{file_name}','Admin\IncidentController@downloadAttachment');
	Route::get('/ajax/incidents','Admin\IncidentController@ajax_call');
	Route::get('/ajax/incidents/show/{case_id}','Admin\IncidentController@ajaxShow');
	Route::get('/ajax/incidents/assign/{case_id}','Admin\IncidentController@ajaxEdit');
	Route::get('/markAsRead','Admin\IncidentController@readNotifications');
	Route::get('/ajax/All-Incidents','Admin\IncidentController@ajaxAll');

	Route::post('/{case_id}/assign','Admin\IncidentController@assign');

	Route::get('/incidents/investigate','Admin\IncidentController@showInvestigate')->name('investigate');

	Route::get('/complaint','Admin\UserComplaintController@index')->name('complaint');
	Route::get('/AllComplaint','Admin\UserComplaintController@ajaxAllComplaints')->name('ajax.allComplaint');
	Route::get('/complaint/delete/{complaint_id}','Admin\UserComplaintController@ajaxComplaintDelete')->name('ajax.deleteComplaint');
	Route::get('/complaint/edit/{complaint_id}','Admin\UserComplaintController@ajaxComplaintEdit')->name('ajax.editComplaint');
	Route::post('/complaint/edit/{complaint_id}','Admin\UserComplaintController@ajaxComplaintUpdate')->name('ajax.updateComplaint');

	// Investigation
	Route::get('/investigate','Admin\InvestigationController@index')->name('investigate');

	Route::get('/investigate/new','Admin\InvestigationController@create')->name('investigate.create');
	Route::post('/investigate','Admin\InvestigationController@store')->name('investigate.store');
//	Route::get('/{case_id}/investigate','Admin\InvestigationController@show')->name('investigate.show');

	// Ajax Investigate
	Route::get('/ajax/investigate','Admin\InvestigationController@ajaxShowInvestigateHeader');
	Route::get('/ajax/investigate/details/{inv_id}','Admin\InvestigationController@ajaxShowInvestigateHeaderByID');

	Route::post('/ajax/investigate/save','Admin\InvestigationController@ajaxSaveInvestigate');
	// Ajax InvestigateLine /ajax/remove/
	Route::get('/ajax/inv-line','Admin\InvestigationController@ajaxShowInvestigateLine');
	Route::get('/ajax/inv-line/data','Admin\InvestigationController@ajaxGetInvestigateLineData');
	Route::get('/ajax/inv-line/new','Admin\InvestigationController@ajaxCreateInvestigateLine');
	Route::post('/ajax/inv-line/save','Admin\InvestigationController@ajaxSaveInvestigateLine');
	Route::get('/ajax/inv-line/delete/{step_id}','Admin\InvestigationController@ajaxDeleteInvestigateLine');

//	Route::get('/read_inv_ln','Admin\InvestigationController@readInvestigateLine')->name('investigate.read');
//	Route::get('/create_inv_ln','Admin\InvestigationController@createInvestigateLine')->name('investigate.create');
	// Operator
	Route::get('/operators','Admin\OperatorController@index')->name('operators');

	// Ticket

	Route::get('/ticket','Admin\TicketController@create')->name('ticket.create');
	Route::post('/ticket','Admin\TicketController@store')->name('ticket.store');
});


// User Group
Route:: group(['middleware' => ['checkUser', 'web', 'isManager']], function(){

	Route::get('/home', array('uses' => 'User\UserController@index'))->name('home');
//	Route::get('/user-home', array('uses' => 'User\UserController@getUserIndex'))->name('user.home')->middleware('isUser');
	Route::get('/user/register', array('uses' => 'User\UserController@showRegisterUser'))->name('user.register');
	Route::get('/user/AuthorizeApp', array('uses' => 'User\UserController@checkBusinessAppAuthorize'));
	//test hashbytes encrypt
	Route::get('/encrypt', function(){
		return hash('SHA1', 'ERP@2018');
	});
	Route::get('/user/servicedesk', array('uses' => 'User\IncidentController@getServiceDesk'))->name('servicedesk');
	Route::get('/user/incident/create', array('uses' => 'User\IncidentController@create'))->name('incident.create');
	Route::post('/user/incident/create', array('uses' => 'User\IncidentController@store'))->name('incident.store');
	Route::get('/user/Ajax-incident/{case_id}', array('uses' => 'User\IncidentController@AjaxAllIncident'))->name('incident.all');
	Route::get('/user/incident/show/{case_id}', array('uses' => 'User\IncidentController@show'))->name('incident.show');
	Route::get('/user/incident/{case_id}/edit', array('uses' => 'User\IncidentController@edit'))->name('incident.edit');
	Route::post('/user/incident/{case_id}/update', array('uses' => 'User\IncidentController@update'))->name('incident.update');
	Route::get('/getNotifications/{employee_id}', array('uses' => 'User\IncidentController@getLast7daysNotifications'))->name('getNotification');
	Route::get('/readNotifications', array('uses' => 'User\IncidentController@readNotifications'))->name('getNotification');



});
Route::group(['middleware' => ['web','checkUser']], function(){
	Route::get('404',['as'=>'404','uses'=>'ErrorHandlerController@errorCode404']);
	Route::get('405',['as'=>'405','uses'=>'ErrorHandlerController@errorCode405']);
	Route::get('logout', array('uses' => 'HomeController@doLogout'));
	Route::post('logout', array('uses' => 'HomeController@doLogout'))->name('logout');
	Route::get('/user/app-setup', array('uses' => 'AppSetupController@userSetup'))->name('usersetup')->middleware('isManager');
	Route::get('/app-setup', array('uses' => 'AppSetupController@index'))->name('setup')->middleware('isSuperAdmin');
	Route::post('/app-setup', array('uses' => 'AppSetupController@update'))->name('update');
});
Route::get('/getAppSetup', 'Admin\AppSetupController@getAppSetup');
Route::get('/testCase', array('uses' => 'Admin\IncidentController@sendNotifyManager'));

//use Illuminate\Support\Facades\Cache;
Route::get('/test/{inv_id}','Admin\InvestigationController@ajaxShowInvestigateHeaderByID' );


Route::get('/testMail', 'Admin\IncidentController@sendMailCreate');