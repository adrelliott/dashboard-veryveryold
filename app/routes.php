<?php

/**
 * NOTE: We use MODULES in this app. Look in the app/modules folder for all routes
 */

Route::get('/', function() {
    dd(App::environment());
});
