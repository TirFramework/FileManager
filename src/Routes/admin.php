<?php


use Illuminate\Support\Facades\Route;
use Tir\FileManager\Controllers\AdminFileManagerController;


Route::group(['middleware' => 'auth:api', 'prefix' => 'api/v1/admin'], function () {
    Route::post('/file-manager/upload',[AdminFileManagerController::class ,'upload'])->name('admin.file-manager.upload');
    Route::resource('/file-manager', AdminFileManagerController::class, ['names' => 'admin.file-manager']);
});