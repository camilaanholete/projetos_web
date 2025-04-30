<?php

$conexao = mysqli_connect("localhost","root","","projwebservices");

$dados = array(); 

$dados['erro'] = false;
$dados['mensagem'] = "Boa noite!";

$sql = "SELECT * FROM alunos";

$resultado = mysqli_query($conexao,$sql);

if (mysqli_num_rows($resultado) > 0){

    while ($registro = mysqli_fetch_array($resultado)){
        $dados['Dados Cadastrados:'][] = array(
            'id_aluno' => intval($registro['codigo']),
            'nome_aluno' => $registro['nome'],
            'email' => $registro['email'],
            'tele_aluno' => $registro['telefone']
        );
    }
    
}else{
        $dados['erro'] = true;
        $dados['mensagem'] = "Nenhum registro encontrado !";
}
    echo json_encode($dados);
        

?>












?>