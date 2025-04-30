<?php

namespace App\Controller\Pages;

use \App\Utils\View;
use \App\Model\Entity\Playlist as EntityPlaylist;

class Playlist extends Page{
    
    private static function getPlaylistItems(){
        $itens = '';

        $results = EntityPlaylist::getPlaylits(null, 'id DESC');

        while($obPlaylist = $results->fetchObject(EntityPlaylist::class)){
            $itens .= View::render('pages/playlist/item', [
                'title' => $obPlaylist->title,
                'id' => $obPlaylist->id,
                'created_at' => date('d/m/Y H:i:s',strtotime($obPlaylist->created_at))
            ]);
        }


        return $itens;

    }

     public static function getPlaylist(){

        $content = View::render('pages/playlist', [
            'itens' => self::getPlaylistItems()
        ]);

        return parent::getPage('PLAYLIST> SECTO', $content);

    }
     
} 