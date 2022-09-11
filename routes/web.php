<?php

use App\Http\Controllers\GetPatientByIdController;
use App\Http\Controllers\given\AddGivensController;
use App\Http\Controllers\income\EditIncomeController;
use App\Http\Controllers\income\IndexIncomeController;
use App\Http\Controllers\MainPanelController;
use App\Http\Controllers\reservation\IndexReservationController;
use App\Models\Patient;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [MainPanelController::class, 'main_panel'])->name('main');



Route::namespace('App\Http\Controllers\patient')->group(function () {
    Route::get('/patient_profile/{id}', 'GetPatientByIdController@get_patient_by_id')->name('patient');
    Route::post('/patient_profile/{id}', 'EditPatientProfileController@edit')->name('edit.patient');
    Route::get('/patients', 'IndexPatientController@index')->name('index.patients');
    Route::post('/add_patient', 'AddPatientController@add')->name('add.patient');
    Route::get('/add_patient_page', function () {
        return view('patients.AddPatient');
    })->name('add.patient.page');
    Route::post('delete_patient/{id}/{page?}', 'DeletePatientController@delete')->name('delete.patient');
    Route::get('/get_patient_visits/{id}', 'GetPatientVisitsController@get')->name('patient.visits');
    Route::get('/get_patient_reservations/{id}', 'GetPatientReservationsController@get')->name('patient.reservations');
    Route::post('/patient/search', 'SearchPatientController@search')->name('search.patient');
});





Route::namespace('App\Http\Controllers\reservation')->group(function () {
    Route::post('/add_res/{id?}', 'AddReservationController@add')->name('add.reservation');
    Route::get('/res_status', 'ChangeReservationStatusController@change_status')->name('reservation.status');
    Route::get('/former_patient/{id?}', 'AddFormerPatientReservationController@add')->name('add.former.patient.reservation');
    Route::view('/add_res_view', 'reservations.AddReservation')->name('add.reservation.page');
    Route::get('/show_res/{id}', 'ShowReservationController@show')->name('show.reservation');
    Route::get('/reservations', 'IndexReservationController@index')->name('index.reservation');
    Route::post('/edit_res/{id}', 'EditReservationController@edit')->name('edit.reservation');
    Route::post('delete_res/{id}/{page?}', 'DeleteReservationController@delete')->name('delete.reservation');
    Route::post('/reservartion/search', 'SearchReservationController@search')->name('search.reservation');
});



Route::namespace('App\Http\Controllers\visit')->group(function () {
    Route::get('/visits', 'IndexVisitController@index')->name('index.visit');
    Route::get('/show_visit/{id}', 'ShowVisitController@show')->name('show.visit');
    Route::post('/edit_visit/{id}', 'EditVisitController@edit')->name('edit.visit');
    Route::post('/add_visit/{id}', 'AddVisitController@add')->name('add.visit');
    Route::get('/add_visit_view/{id}', function ($id) {
        $data['patient_id'] = $id;
        return view('visits.AddVisit')->with($data);
    })->name('visit.page');
    Route::post('/visit/delete/{id}', 'DeleteVisitController@delete')->name('delete.visit');
    Route::post('/visits/search', 'SearchVisitController@search')->name('search.visit');
});


Route::namespace('App\Http\Controllers\expense')->group(function () {
    Route::post('/exp_del/{id}', 'DeleteExpenseController@delete')->name('delete.expense');
    Route::post('/add_exp', 'AddExpenseController@add')->name('add.expense');
    Route::get('/expenses', 'IndexExpensesController@index')->name('index.expenses');
    Route::view('/add_exp_page', 'expenses.AddExpense')->name('add.expense.page');
    Route::post('/edit_exp/{id}', 'EditExpenseController@edit')->name('edit.expense');
    Route::get('/edit_exp_page/{id}', 'EditExpensePageController@get_page')->name('edit.expense.page');
    Route::post('/expenses/search', 'SearchExpensesController@search')->name('search.expense');
});


Route::namespace('App\Http\Controllers\income')->group(function () {
    Route::get('/incomes', 'IndexIncomeController@index')->name('index.incomes');
    Route::view('/edit_income/{id}/{description}/{cost}/{date}/{time}', 'incomes.EditIncome')->name('edit.income.page');
    Route::post('/edit_income/{id}', 'EditIncomeController@edit')->name('edit.income');
    Route::post('/delete_income/{id}', 'DeleteIncomeController@delete')->name('delete.income');
    Route::post('add_income', 'AddIncomeController@add')->name('add.income');
    Route::view('/add_income_page', 'incomes.AddIncome')->name('add.income.page');
    Route::post('/incomes/search', 'SearchIncomesController@search')->name('search.income');
});





Route::namespace('App\Http\Controllers\wallet')->group(function () {
    Route::get('/wallet', 'WalletController@index')->name('index.balance');
    Route::post('wallet/search', 'SearchWalletController@search')->name('search.wallet');
});


Route::namespace('App\Http\Controllers\given')->group(function () {
    Route::get('/givens', 'IndexGivensController@index')->name('index.givens');
    Route::post('/givens/add', 'AddGivensController@add')->name('add.given');
    Route::view('/givens/add_page', 'givens.AddGiven')->name('add.given.page');
    Route::post('/givens/edit/{id}', 'EditGivensController@edit')->name('edit.given');
    Route::get('/givens/edit/page/{id}', 'EditGivensPageController@get_page')->name('edit.given.page');
    Route::post('/given/delete/{id}', 'DeleteGivensController@delete')->name('delete.given');
    Route::post('/givens/search', 'SearchGivensController@search')->name('search.given');
});



Route::namespace('App\Http\Controllers\taken')->group(function () {
    Route::get('/takens', 'IndexTakenController@index')->name('index.takens');
    Route::post('/takens/add', 'AddTakenController@add')->name('add.taken');
    Route::post('/taken/edit/{id}', 'EditTakenController@edit')->name('edit.taken');
    route::view('/taken/add_taken_page' , 'takens.AddTaken')->name('add.taken.page') ;
    Route::view('/edit_taken/{id}/{description}/{value}/{date}/{time}', 'takens.EditTaken')->name('edit.taken.page');
    Route::post('/taken/delete/{id}', 'DeleteTakenController@delete')->name('delete.taken');
    Route::post('/takens/search', 'SearchTakenController@search')->name('search.taken');
});

Route::view('/earnings' , 'earnings.earnings')->name('earnings') ;
Route::post('earnings/calculate', 'App\Http\Controllers\earning\CalculateEarningsController@calculate')->name('calculate.earnings');


Route::get('/test', function () {
    return view('test');
});
