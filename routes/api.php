<?php

Route::resource('buyers', 'Buyer\BuyerController', ['only' => ['index', 'show']]);
Route::resource('buyers.categories', 'Buyer\BuyerCategoryController', ['only' => ['index']]);
Route::resource('buyers.products', 'Buyer\BuyerProductController', ['only' => ['index']]);
Route::resource('buyers.sellers', 'Buyer\BuyerSellerController', ['only' => ['index']]);
Route::resource('buyers.transactions', 'Buyer\BuyerTransactionController', ['only' => ['index']]);

Route::resource('categories', 'Category\CategoryController', ['except' => ['create', 'edit']]);

Route::resource('products', 'Product\ProductController', ['only' => ['index', 'show']]);

Route::resource('sellers', 'Seller\SellerController', ['only' => ['index', 'show']]);

Route::resource('users', 'User\UserController', ['except' => ['create', 'edit']]);
Route::get('users/verify/{token}', 'User\UserController@verify')->name('verify');
Route::get('users/{user}/resend', 'User\UserController@resend')->name('resend');

Route::resource('transactions', 'Transaction\TransactionController', ['only' => ['index', 'show']]);
