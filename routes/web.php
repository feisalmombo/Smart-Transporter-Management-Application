<?php

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

//Route for Login view
Route::get('/', function () {
    if (\Auth::user()) {
        return redirect()->back();
    }
    return view('auth.login');
});

//Login Route Controller
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');

// Route::get('/customerregister', 'CustomersController@index');
// Route::post('/customerregister', 'CustomersController@store');

Route::get('/register/transporter', 'TransportersController@index');
Route::post('/register/transporter', 'TransportersController@store');

//Logout Route Controller
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

//Route for New view/blade user change password
Route::get('/change_password', function () {
    return view('auth.passwords.new_user_change_pwd');
});

//ChangePassword Route Controller
Route::post('/change_password', 'ChangePasswordController@updateNewuser');


Route::resource('/change-password', 'ChangePasswordController');
Route::post('/change-password', 'ChangePasswordController@update');

//Route for CheckUserStatus Middleware
Route::group(['middleware' => 'CheckUserStatus'], function () {

    //Route for ValidateButtonHistory Middleware
    Route::group(['middleware' => 'ValidateButtonHistory'], function () {

        //Route for Auth Middleware
        Route::group(['middleware' => 'auth'], function () {

            //Home Route Controller
            Route::get('/home', 'HomeController@index')->name('home');

            //ViewUser Route Controller
            Route::resource('/view-users', 'ViewUsersController');
            Route::post('/view-users', 'ViewUsersController@store');
            Route::get('/reset/{id}', 'ViewUsersController@resetpwd');

            Route::post('/view-users/report/pdf/{view_type}', 'ViewUsersController@report');
			Route::post('/view-users/report/excel/{view_type}', 'ViewUsersController@downloadExcel');

            Route::get('/view-users/report/downloadData/{type}', 'ViewUsersController@downloadExcel');

            //  Manage Company Controller
            Route::resource('/view/companies', 'CompaniesController');
            Route::post('/view/companies', 'CompaniesController@store');

            // Manage Truck Controller
            Route::resource('/view/trucks', 'TrucksController');
            Route::post('/view/trucks', 'TrucksController@store');

            // Manage Finance Controller
            Route::resource('/view/invoices', 'FinancesController');
            Route::post('/view/invoices', 'FinancesController@store');

            // VIEW ALL INVOICES ROUTE
            Route::get('/view/all/invoices', 'FinancesController@allinvoice');

            // VIEW ALL COMPANIES REGISTERED IN THE SYSTEM
            Route::get('/view/all/companies', 'CompaniesController@allcompanies');

            // VIEW ALL TRUCKS IN THE SYSTEM
            Route::get('/view/all/trucks', 'TrucksController@alltrucks');


            //ROUTES FOR PERMISSIONS
            //Call entrust users view
            Route::get('/settings/manage_users/permissions/entrust_user', 'PermissionsController@entrust_user');
            //Get all permissions for specific user
            Route::get('/settings/manage_users/permissions/entrust', 'PermissionsController@entrust');
            //Entrust user route
            Route::post('/settings/manage_users/permissions/entrust_usr', 'PermissionsController@entrust_user_permissions');
            //Get permission for role
            Route::get('/settings/manage_users/permissions/entrustRole', 'PermissionsController@entrust_roles');
            //Route to entrust permissions to the role
            Route::post('/settings/manage_users/permissions/entrust_role_permissions', 'PermissionsController@entrust_role_permissions');
            //Call roles view
            Route::get('/settings/manage_users/permissions/entrust_role', 'PermissionsController@entrust_role');
            Route::resource('/settings/manage_users/permissions/', 'PermissionsController');

            //ROUTES FOR ROLES
            Route::get('/settings/manage_users/roles/entrust', 'RolesController@get_roles');
            Route::post('/settings/manage_users/roles/entrust', 'RolesController@post_roles');
            Route::get('/settings/manage_users/roles/add', 'RolesController@add');
            Route::resource('/settings/manage_users/roles', 'RolesController');
        });
    });
});
