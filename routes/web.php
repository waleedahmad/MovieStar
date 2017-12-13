<?php


Auth::routes();


Route::get('/', function () {
    return view('index');
});

Route::get('/whats-on', function () {
    return view('whats_on');
});

Route::get('/codes', function () {
    return view('codes');
});

Route::get('/news', function () {
    return view('news');
});

Route::get('/news/single', function () {
    return view('news_single');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/admin', function () {
    return view('admin.index');
});

Route::get('/admin/now_playing', function () {
    return view('admin.now_playing');
});

Route::get('/admin/coming_soon', function () {
    return view('admin.coming_soon');
});

Route::get('/admin/staff', function () {
    return view('admin.staff');
});

Route::get('/admin/users', function () {
    return view('admin.users');
});

