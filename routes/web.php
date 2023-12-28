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


            //Route for driver Controller
            Route::resource('/view-drivers', 'NewdriversController');
            Route::post('/view-drivers', 'NewdriversController@store');


            //Route for vehicle Controller
            Route::resource('/view-vehicles', 'NewvehiclesController');
            Route::post('/view-vehicles', 'NewvehiclesController@store');


            //Route for Notification Controller
            Route::resource('/notifications', 'NotificationController');
            //Route::post('/notifications','NotificationController@store');

            //Route For Fedback Notification Controller
            //Route::resource('/view-feedback', 'FeedbackController');

            // Route for AttendedRequest Controller
            Route::resource('/attend-requests', 'AttendRequestsController');
            Route::get('/attend-requests', 'AttendRequestsController@attendedRequest');


            // Route for Request Customer Controller
            Route::resource('/request-item', 'RequestItemsController');

            // Route for Request Item Controller
            Route::resource('/request-customer', 'RequestCustomersController');
            Route::post('/request-customer', 'RequestCustomersController@store');

            //Route Bodytypes Controller
            Route::resource('/view-bodytypes', 'BodytypesController');
            Route::post('/view-bodytypes', 'BodytypesController@store');

            //Route ContainerTypes Controller
            Route::resource('/view-containertypes', 'ContainersController');
            Route::post('/view-containertypes', 'ContainersController@store');

            //Route TruckTypes Controller
            Route::resource('/view-trucktypes', 'TruckTypesController');
            Route::post('/view-trucktypes', 'TruckTypesController@store');

            //Route Trailer Controller
            Route::resource('/view-trailers', 'TrailersControllers');
            Route::post('/view-trailers', 'TrailersControllers@store');

            // Route FeedbackAttendRequestsController Controller
            // Route::resource('/view-attendedfeedback', 'FeedbackAttendRequestsController');

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
