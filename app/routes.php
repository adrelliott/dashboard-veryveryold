<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

// Dashboard (index)
Route::get('/', array('as' => 'dashboard', 'uses' => 'DashboardController@index'));


// CRM Routes
Route::resource('contacts', 'ContactsController');
Route::get('/ajax/contacts', function(){
    return Contact::getAllContacts();
});


