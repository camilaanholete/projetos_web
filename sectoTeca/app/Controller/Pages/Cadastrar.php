<?php

namespace App\Controller\Pages;

use \App\Utils\View;
use \App\Model\Entity\Playlist;

class Cadastrar extends Page{ 

    

     public static function getCadastrar(){
        
        $content = View::render('pages/cadastrarplaylist', [
            
        ]);

    

        return parent::getPage('CADASTRAR > HOME', $content);
    }

    public static function insertPlaylist($request){
        $postVars = $request->getPostVars();

        $obPlaylist = new Playlist;
        
        $obPlaylist->title = $postVars['title'];
        $obPlaylist->description = $postVars['description'];
        $obPlaylist->author = $postVars['author'];

        $obPlaylist->cadastrar();

        return self::getCadastrar();
    }
     
} 