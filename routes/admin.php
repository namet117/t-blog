<?php

/**
 * Admin Routes
 */
Route::middleware(['admin'])->group(function() {
    Route::view('/', 'admin.index');
});
