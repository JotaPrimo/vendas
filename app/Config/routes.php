<?php

require_once  '../vendor/autoload.php';

use Pecee\SimpleRouter\SimpleRouter;

SimpleRouter::group(['namespace' => 'Vendas\Controllers'], function () {
    SimpleRouter::get('/', 'UsuarioController@index');
});


SimpleRouter::group(['prefix' => '/tipos-usuarios'], function () {

    SimpleRouter::get('/', 'TipoUsuarioController@index');
    SimpleRouter::get('/create', 'TipoUsuarioController@create');
    SimpleRouter::get('/success', 'TipoUsuarioController@success');
    SimpleRouter::get('/error', 'TipoUsuarioController@error');
    SimpleRouter::get('/edit/{id}', 'TipoUsuarioController@edit');
    SimpleRouter::post('/store', 'TipoUsuarioController@store');
    SimpleRouter::post('/update/{id}', 'TipoUsuarioController@update');
    SimpleRouter::post('/delete/{id}', 'TipoUsuarioController@delete');
    SimpleRouter::get('/emprestimos/{id}', 'TipoUsuarioController@emprestimos');

});


SimpleRouter::group(['prefix' => '/usuarios'], function () {

    SimpleRouter::get('/', 'UsuarioController@index')->name('usuarios');
    SimpleRouter::get('/create', 'UsuarioController@create')->name('usuarios.create');
    SimpleRouter::get('/success', 'UsuarioController@success');
    SimpleRouter::get('/error', 'UsuarioController@error');
    SimpleRouter::get('/edit/{id}', 'UsuarioController@edit');
    SimpleRouter::post('/store', 'UsuarioController@store');
    SimpleRouter::post('/update/{id}', 'UsuarioController@update');
    SimpleRouter::post('/delete/{id}', 'UsuarioController@delete');
    SimpleRouter::get('/emprestimos/{id}', 'UsuarioController@emprestimos');

});
