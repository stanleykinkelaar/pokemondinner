<?php

use App\Livewire\Admin;
use App\Livewire\Home;

Route::get('/', Home::class);
Route::get('admin', Admin::class)->name('admin.index');
Route::get('admin/edit/{card}', Admin\Edit::class)->name('edit');
