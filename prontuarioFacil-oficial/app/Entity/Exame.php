<?php

namespace App\Entity;

use \App\Db\Database;
use \PDO;

class Exame{

  public $id;
  public $nome_exame;
  public $resultado;
  public $id_paciente;
  public $data;

  /**
   * Método responsável por cadastrar uma nova exames no banco
   * @return boolean
   */
  public function cadastrar(){
    //DEFINIR A DATA
    $this->data = date('Y-m-d H:i:s');

    //INSERIR A EXAMES NO BANCO
    $obDatabase = new Database('exames');
    $this->id = $obDatabase->insert([
                                      'nome_exame'    => $this->nome_exame,
                                      'resultado' => $this->resultado,
                                      'id_paciente'     => $this->id_paciente,
                                      'data'      => $this->data
                                    ]);

    //RETORNAR SUCESSO
    return true;
  }

  /**
   * Método responsável por atualizar a exames no banco
   * @return boolean
   */
  public function atualizar(){
    //ATUALIZA A EXAMES NO BANCO
    return (new Database('exames'))->update('id = '.$this->id,[
                                                                'nome_exame'    => $this->nome_exame,
                                                                'resultado' => $this->resultado,
                                                                'id_paciente'     => $this->id_paciente
                                                              ]);
  }

  /**
   * Método responsável por excluir a exames do banco
   * @return boolean
   */
  public function excluir(){
    return (new Database('exames'))->delete('id = '.$this->id);
  }

  /**
   * Método responsável por obter as exames do banco de dados
   * @param  string $where
   * @param  string $order
   * @param  string $limit
   * @return array
   */
  public static function getExames($where = null, $order = null, $limit = null){
    return (new Database('exames'))->select($where,$order,$limit)
                                  ->fetchAll(PDO::FETCH_CLASS,self::class);
  }

  /**
   * Método responsável por buscar uma exames com base em seu ID
   * @param  integer $id
   * @return Exame
   */
  public static function getExameUnico($id){
    return (new Database('exames'))->select('id = '.$id)
                                  ->fetchObject(self::class);
  }

    /**
   * Método responsável por buscar uma exames com base em seu ID
   * @param  integer $id
   * @return Exame
   */
  public static function getExame($id){
    return (new Database('exames'))->select('id_paciente = '.$id)
                                  ->fetchAll(PDO::FETCH_CLASS,self::class);
  }


}