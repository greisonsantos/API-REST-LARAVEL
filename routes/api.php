<?php

 //baixar cors 
 // composer require barryvdh/laravel-cors
 // add no kernel o middleware
 // gerar arquivo de configuração
 // configura  em config /cors


Route::post('login', 'Auth\AuthenticateController@authenticate');
Route::get('me', 'Auth\AuthenticateController@getAuthenticatedUser');
Route::post('login-refresh', 'Auth\AuthenticateController@refreshToken');


//restringindo aceso a api somente a usuarios logados
//'midleware'=>'auth:api ultilzia token para verificar acesso
//so pode acessar a rota quem tiver um token  que deve ser enviado juntamente a requisição

$this->group(['namespace'=>'Api', 'middleware'=>'auth:api'], function(){
  $this->apiResource('clientes','ClienteApiController');
});
