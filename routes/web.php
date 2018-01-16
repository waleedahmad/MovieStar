<?php


Auth::routes();

Route::group(['middleware' => ['auth']], function(){
    Route::get('/logout', 'Auth\LoginController@logout');
});

Route::get('/', 'AppController@home');
Route::get('/whats-on', 'AppController@whatsOn');

Route::get('/movie/{id}', 'MovieController@getMovie');


Route::group(['middleware' => ['auth', 'is_user']], function(){

    Route::get('/reservations/', 'ReservationController@getReservations');
    Route::delete('/reservations', 'ReservationController@deleteReservation');

    Route::get('/reserve/screening/{id}', 'ReservationController@getReservationForm');

    Route::post('/reserve/screening/{id}', 'ReservationController@reserveTickets');

    Route::get('/food/menu', 'FoodController@getUserMenu');

    Route::get('/food/orders', 'FoodController@getUserOrders');
    Route::get('/food/orders/{id}', 'FoodController@getUserOrder');

    Route::get('/food/checkout', 'FoodController@getCheckoutItems');

    Route::delete('/food/checkout', 'FoodController@deleteCheckoutItem');

    Route::post('/food/checkout', 'FoodController@processCheckout');

    Route::post('/food/order', 'FoodController@addToCart');

    Route::post('/food/order/cancel', 'FoodController@cancelOrder');

});


Route::get('/contact', function () {
    return view('contact');
});


Route::group(['middleware' => ['auth', 'is_admin_or_staff']], function(){
    Route::get('/admin', 'AdminController@getIndex');
});


Route::group(['middleware' => ['auth', 'is_admin']], function(){



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
});

Route::group(['middleware' => ['auth', 'is_staff']], function(){
    /**
     * Staff (Tickets Management ) Routes
     */

    Route::get('/admin/screenings/tickets', 'ReservationController@getScreeningTickets');

    Route::get('/admin/screenings/{id}/reservations', 'ReservationController@getScreeningReservations');

    Route::get('/admin/screenings/{id}/reservations/add', 'ReservationController@getAddReservationsForm');

    Route::post('/admin/screenings/{id}/reservations', 'ReservationController@addReservation');

    Route::delete('/admin/reservations', 'ReservationController@deleteReservation');

    Route::get('/admin/screenings/{id}/reservation/{res_id}/edit', 'ReservationController@editReservation');

    Route::post('/admin/screenings/{id}/reservation/{res_id}', 'ReservationController@updateReservation');




    /**
     * Staff (Customer) Routes
     */
    Route::get('/admin/users', 'AdminController@getUsers');

    Route::delete('/admin/users', 'AdminController@deleteUser');

    /**
     * Staff (Food Menu ) Routes
     */
    Route::get('/admin/menu', 'FoodController@getFoodItems');

    Route::get('/admin/menu/add', 'FoodController@addFood');

    Route::post('/admin/menu', 'FoodController@saveFood');

    Route::delete('/admin/menu', 'FoodController@deleteFood');

    Route::get('/admin/menu/{id}/edit', 'FoodController@editFood');

    Route::post('/admin/menu/update', 'FoodController@updateFood');


    /**
     * Working
     */

    Route::get('/admin/orders', 'FoodController@getOrders');

    Route::get('/admin/orders/{id}', 'FoodController@getSingleOrder');

    Route::delete('/admin/order', 'FoodController@deleteOrder');

    Route::post('/order/complete', 'FoodController@markOrderCompleted');

    Route::post('/order/paid', 'FoodController@markOrderPaid');


});









