<?php

Route::get('/', 'HomeController@ingresar');
//Route::get('/', 'ComprobanteController@ingresar');
Auth::routes();

Route::resource('/comprobante', 'ComprobanteController');
Route::resource('/reportecomprobante', 'ReportecomprobanteController');
Route::resource('/prestamo', 'PrestamoController');
Route::resource('/reporteprestamo', 'ReporteprestamoController');
Route::get('pdf', 'PDFController@pdf');
Route::get('pdfgeneral', 'PDFController@general');
Route::get('pdfgral', 'PDFController@pdfgralcomprobante');
Route::get('pdfcompro', 'PDFController@pdfcomprobante');


Route::get('/home', 'HomeController@index');