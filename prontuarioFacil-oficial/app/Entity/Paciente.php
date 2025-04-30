<?php

namespace App\Entity;

use \App\Db\Database;
use \PDO;

class Paciente{

  public $id;
  public $nome;
  public $sobrenome;
  public $endereco;
  public $created_at;
  public $updated_at;

  /**
   * Método responsável por cadastrar uma nova paciente no banco
   * @return boolean
   */
  public function cadastrar(){
    //DEFINIR A DATA
    $this->created_at = date('Y-m-d H:i:s');

    //INSERIR PACIENTE NO BANCO
    $obDatabase = new Database('pacientes');
    $this->id = $obDatabase->insert([
                                    'nome' => $this->nome,
                                    'sobrenome' => $this->sobrenome,
                                    'endereco' => $this->endereco,
                                    'created_at' => $this->created_at
                                    ]);
    //RETORNAR SUCESSO
    return true;
  }

  /**
   * Método responsável por atualizar a paciente no banco
   * @return boolean
   */
  public function atualizar(){
    //DEFINIR A DATA
    $this->updated_at = date('Y-m-d H:i:s');
    
    //ATUALIZA A PACIENTE NO BANCO
    return (new Database('pacientes'))->update('id = '.$this->id,[
                                                                  'nome' => $this->nome,
                                                                  'sobrenome' => $this->sobrenome,
                                                                  'endereco' => $this->endereco,
                                                                  'updated_at' => $this->updated_at
                                                                  ]);
  }

  /**
   * Método responsável por excluir a paciente do banco
   * @return boolean
   */
  public function excluir(){
    return (new Database('pacientes'))->delete('id = '.$this->id);
  }

  /**
   * Método responsável por obter as pacientes do banco de dados
   * @param  string $where
   * @param  string $order
   * @param  string $limit
   * @return array
   */
  public static function getPacientes($where = null, $order = null, $limit = null){
    return (new Database('pacientes'))->select($where,$order,$limit)
                                  ->fetchAll(PDO::FETCH_CLASS,self::class);
  }

  /**
   * Método responsável por buscar uma paciente com base em seu ID
   * @param  integer $id
   * @return Exame
   */
  public static function getPaciente($id){
    return (new Database('pacientes'))->select('id = '.$id)
                                  ->fetchObject(self::class);
  }

}