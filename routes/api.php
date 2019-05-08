<?php

//assim
// Route::get('clientes','Api\ClienteApiController@index');
//ou 

//restringindo rotas de acesdo da api
$this->group(['namespace'=>'Api'], function(){
    $this->apiResource('clientes','ClienteApiController');
});




//gerar o controller onde irá realizar a autenticação
Route::post('/register', 'AuthController@register');
Route::post('/login', 'AuthController@login');
Route::post('/logout', 'AuthController@logout');

Route::post('/login-refresh', 'AuthController@refreshToken');