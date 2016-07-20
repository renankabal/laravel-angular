<?php

// =============================================
// PÁGINA INICIAL ==============================
// =============================================
Route::get('/', function()
{
	return View::make('index');
});

// =============================================
// API ROUTES ==================================
// =============================================
Route::group(array('prefix' => 'api'), function() {

	Route::resource('comentarios', 'ComentarioController');
});

// =============================================
// CATCH ALL ROUTE =============================
// =============================================
// todas as rotas que não estão em casa ou api será redirecionado para a interface
App::missing(function($exception)
{
	return View::make('index');
});