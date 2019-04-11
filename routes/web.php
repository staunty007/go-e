<?php


Route::view('/','welcome');

Route::get('registration/activate/{token}', 'AccountController@activateAccount')->name('activate.account');


?>