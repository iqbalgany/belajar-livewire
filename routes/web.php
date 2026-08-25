<?php

use App\Livewire\About;
use App\Livewire\Contact;
use App\Livewire\Counter;
use App\Livewire\Home;
use App\Livewire\Users;
use Illuminate\Support\Facades\Route;

Route::get('/counter', function () {
    return view('counter',  [Counter::class]);
});

Route::get('/', Home::class);

Route::get('/users', Users::class);

Route::get('/about', About::class);

Route::get('/contact', Contact::class);
