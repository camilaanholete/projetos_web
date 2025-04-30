<?php

use \App\Http\Response;
use \App\Controller\Pages;

$obRouter->get('/',[
    function (){
       return new Response(200,Pages\Home::getHome()); 

    }
]);

$obRouter->get('/cadastrar',[
    function (){
       return new Response(200,Pages\Cadastrar::getCadastrar()); 

    }
]);

$obRouter->get('/playlist',[
    function (){
       return new Response(200,Pages\Playlist::getPlaylist()); 

    }
]);

$obRouter->post('/cadastrar',[
    function ($request){
       return new Response(200,Pages\Cadastrar::insertPlaylist($request)); 

    }
]);
