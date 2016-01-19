<?php

// About Route

Route::get('about', 'PagesController@about');


// Get Route

Route::get('contact', 'PagesController@contact');


//Articles Routes

Route::resource('articles','ArticlesController');