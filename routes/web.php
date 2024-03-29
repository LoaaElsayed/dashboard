<?php

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
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';


Route::get('/', function () {
    return view('index');
})->name('home')->middleware('auth');

// auth
Route::get('login','AdminController@login')->name('login');
Route::get('logout','AdminController@logout')->name('logout');

// routes staff
Route::get('staff/liststaff','StaffController@liststaff')->name('liststaff');
Route::get('staff/show/{id}','StaffController@show')->name('staffshow');
Route::get('staff/creatstaff','StaffController@create')->name('creatstaff');
Route::post('staff/addstaff','StaffController@store')->name('addstaff');
Route::get('staff/destorestaff/{id}','StaffController@destore')->name('destorestaff');
Route::get('staff/editstaff/{id}','StaffController@edit')->name('editstaff');
Route::post('staff/updatestaff/{id}','StaffController@update')->name('updatestaff');
Route::get('staff/absesnce','StaffController@staffabsence')->name('staffabsence');
Route::get('staff/absesncedelete/{id}','StaffController@staffabsencedelete')->name('staffabsencedelete');

// routes student
Route::get('student/liststudent','StudentController@liststudent')->name('liststudent');
Route::get('student/destorestudent/{id}','StudentController@destorestudent')->name('destorestudent');
Route::get('student/editstudent/{id}','StudentController@editstudent')->name('editstudent');
Route::post('student/updatestudent/{id}','StudentController@updatestudent')->name('updatestudent');


// routes subject
Route::get('subject/listsubject','SubjectController@listsubject')->name('listsubject');
Route::get('subject/destoresubject/{id}','SubjectController@destore')->name('destoresubject');
Route::get('subject/creatsubject','SubjectController@create')->name('creatsubject');
Route::post('subject/addsubject','SubjectController@store')->name('addsubject');
Route::get('subject/editsubject/{id}','SubjectController@edit')->name('editsubject');
Route::post('subject/updatesubject/{id}','SubjectController@update')->name('updatesubject');


// routes excuse
Route::get('excuse/listexcuse','ExcuseController@listexcuse')->name('listexcuse');
Route::get('excuse/destoreexcuse/{id}','ExcuseController@destore')->name('destoreexcuse');
Route::get('excuse/createexcuse','ExcuseController@create')->name('createexcuse');
Route::post('excuse/addexcuse','ExcuseController@store')->name('addexcuse');
Route::get('excuse/editexcuse/{id}','ExcuseController@edit')->name('editexcuse');
Route::post('excuse/updateexcuse/{id}','ExcuseController@update')->name('updateexcuse');
Route::get('list/notification','ExcuseController@listnotifcation')->name('listnotification');
Route::get('delet/notification/{id}','ExcuseController@notidestory')->name('deletenotification');



// routes departmeant
Route::get('depart/listdepartment','DepartmeantController@listexcuse')->name('listdepartment');
Route::get('depart/destoredepartment/{id}','DepartmeantController@destore')->name('destoredepartment');
Route::get('depart/createdepartment','DepartmeantController@create')->name('createdepartment');
Route::post('depart/adddepartment','DepartmeantController@store')->name('adddepartment');
Route::get('depart/editdepartment/{id}','DepartmeantController@edit')->name('editdepartment');
Route::post('depart/updatedepartment/{id}','DepartmeantController@update')->name('updatedepartment');


// routes admin
Route::get('admin/listadmin','AdminController@listadmin')->name('listadmin');
Route::get('admin/destoreadmin/{id}','AdminController@destore')->name('destoreadmin');
Route::get('admin/createadmin','AdminController@create')->name('createadmin');
Route::post('admin/addadmin','AdminController@store')->name('addadmin');
Route::get('admin/editadmin/{id}','AdminController@edit')->name('editadmin');
Route::post('admin/updateadmin/{id}','AdminController@update')->name('updateadmin');


// routes role
Route::get('role/listrole','RoleController@listrole')->name('listrole');
Route::get('role/destorerole/{id}','RoleController@destore')->name('destorerole');
Route::get('role/createrole','RoleController@create')->name('createrole');
Route::post('role/addrole','RoleController@store')->name('addrole');
Route::get('role/editrole/{id}','RoleController@edit')->name('editrole');
Route::post('role/updaterole/{id}','RoleController@update')->name('updaterole');


// absence sheet name
Route::get('absencelec/list', 'StudentController@absencelec')->name('absencelec');
Route::get('absencelec/delete/{id}','StudentController@deletelec')->name('attendlecdelete');


// schadle
Route::get('schadle/list', 'SubjectController@listschadule')->name('schadlelist');



