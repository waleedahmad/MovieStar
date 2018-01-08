<?php


Auth::routes();

Route::get('/logout', 'Auth\LoginController@logout');

Route::get('/', 'AppController@home');
Route::get('/whats-on', 'AppController@whatsOn');

Route::get('/movie/{id}', 'MovieController@getMovie');
Route::get('/reserve/screening/{id}', 'ReservationController@getReservationForm');
Route::post('/reserve/screening/{id}', 'ReservationController@reserveTickets');
Route::get('/reservations/', 'ReservationController@getReservations');


Route::get('/contact', function () {
    return view('contact');
});

Route::get('/admin', 'AdminController@getIndex');


/**
 * Admin (Movies) Routes
 */
Route::get('/admin/movies', 'MovieController@getMovies');

Route::post('/admin/movies/coming_soon', 'MovieController@toggleComingSoon');


Route::get('/admin/movies/add', 'MovieController@addMovie');

Route::post('/admin/movies', 'MovieController@saveMovie');

Route::delete('/admin/movies', 'MovieController@deleteMovie');

Route::get('/admin/movies/{id}/edit', 'MovieController@editMovie');

Route::post('/admin/movies/update', 'MovieController@updateMovie');


Route::get('/admin/screenings/tickets', 'ScreeningController@getScreeningTickets');

Route::get('/admin/screenings/{id}/reservations', 'ScreeningController@getScreeningReservations');



/**
 * Admin (Screenings) Routes
 */
Route::get('/admin/screenings', 'ScreeningController@getScreenings');

Route::get('/admin/screenings/add', 'ScreeningController@addScreening');

Route::post('/admin/screenings', 'ScreeningController@saveScreening');

Route::delete('/admin/screenings', 'ScreeningController@deleteScreening');

Route::get('/admin/screenings/{id}/edit', 'ScreeningController@editScreening');

Route::post('/admin/screenings/update', 'ScreeningController@updateScreening');


/**
 * Admin (Admins) Routes
 */
Route::get('/admin/admins', 'AdminController@getAdmins');

Route::get('/admin/admins/add', 'AdminController@addAdmin');

Route::post('/admin/admins', 'AdminController@saveAdmin');

Route::delete('/admin/admins', 'AdminController@deleteAdmin');

Route::get('/admin/admins/{id}/edit', 'AdminController@editAdmin');

Route::post('/admin/admins/update', 'AdminController@updateAdmin');


/**
 * Admin (Staff) Routes
 */
Route::get('/admin/staff', 'StaffController@getStaff');

Route::get('/admin/staff/add', 'StaffController@addStaff');

Route::post('/admin/staff', 'StaffController@saveStaff');

Route::delete('/admin/staff', 'StaffController@deleteStaff');

Route::get('/admin/staff/{id}/edit', 'StaffController@editStaff');

Route::post('/admin/staff/update', 'StaffController@updateStaff');


/**
 * Admin (Customer) Routes
 */
Route::get('/admin/users', 'AdminController@getUsers');

Route::delete('/admin/users', 'AdminController@deleteUser');


/**
 * Admin (Food Menu ) Routes
 */
Route::get('/admin/menu', 'FoodController@getFoodItems');

Route::get('/admin/menu/add', 'FoodController@addFood');

Route::post('/admin/menu', 'FoodController@saveFood');

Route::delete('/admin/menu', 'FoodController@deleteFood');

Route::get('/admin/menu/{id}/edit', 'FoodController@editFood');

Route::post('/admin/menu/update', 'FoodController@updateFood');




