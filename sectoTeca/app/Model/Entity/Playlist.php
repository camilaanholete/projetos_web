<?php

namespace App\Model\Entity;

use \App\Utils\Database;

class Playlist{

    public $id;
    public $title;
    public $description;
    public $author;
    public $created_at;
    public $updated_at;


    public function cadastrar(){
        $this->created_at = date('Y-m-d H:i:s');
        $this->id = (new Database('playlist'))->insert([
            'title' =>  $this->title,
            'description' => $this->description,
            'author' => $this->author,
            'created_at' => $this->created_at
        ]);

        return true; 
    }

    public static function getPlaylits($where = null, $order = null, $limit = null, $fields = '*'){
        return (new Database('playlist')) ->select($where,$order,$limit,$fields);

    }

    public function atualizar(){
        $this->updated_at = date('Y-m-d H:i:s');
    }
}

