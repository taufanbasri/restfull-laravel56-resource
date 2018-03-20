<?php

Route::resource('categories', 'Category\CategoryController', ['except' => ['create', 'edit']]);

Route::resource('users', 'User\UserController', ['except' => ['create', 'edit']]);
Route::get('users/verify/{token}', 'User\UserController@verify')->name('verify');
Route::get('users/{user}/resend', 'User\UserController@resend')->name('resend');
