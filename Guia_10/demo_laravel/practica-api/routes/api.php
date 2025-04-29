<?php

use App\Http\Controllers\EditorialController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;




Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/editoriales',[EditorialController::class,'index']);
Route::get('/editoriales/{id}',[EditorialController::class,'show']);