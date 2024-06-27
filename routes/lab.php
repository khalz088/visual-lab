<?php

use App\Http\Controllers\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Volt::route('view-labs', 'pages.labs.labs')
    ->name('labs');


Volt::route('lab/{lab}', 'pages.labs.viewlabs')
    ->name('lab');

Route::middleware('auth')->group(function () {

    Volt::route('add_user', 'pages.add_user.useradd')->name('add.user');
    Volt::route('add_lab', 'pages.add_lab.addlabs')->name('add.lab1');
    Volt::route('add_input/{lab}', 'pages.add_lab.addinputs')->name('add.lab2');
    Volt::route('add_script/{lab}', 'pages.add_lab.addscripts')->name('add.lab3');
    Volt::route('confirm/{lab}' , 'pages.add_lab.comfirmation')->name('add.lab4');
    Volt::route('tables', 'pages.tables.labtables')->name('table');
});
