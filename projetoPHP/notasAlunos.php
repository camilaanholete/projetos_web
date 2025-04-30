<?php

//Notas de alunos são armazenados dentro do vetor chamado $notas_dos_alunos[]
$notas_dos_alunos = ['7.4', '1.7', '8.5', '3.5', '4.4', '8.7', '6.4', 
'8.4', '1.2', '4.3', '9.8', '0.5', '8.2',
'4.7', '1.1', '3.3', '3.4', '4.8', '8.7', 
'5.4', '2.2', '3.7', '5.9', '7.4', '4.8', 
'4.7', '1.5', '8.4', '2.1', '2.7 '];

$tamanho = sizeof($notas_dos_alunos);
//echo "Tamanho do vetor notas_dos_alunos[] = " . $tamanho . "<br>";

//Mostrar quantos alunos que tem notas >= 6.0;
// e quantos alunos < 6.0 ? 
//iniciar com as variáveis com zero
$num_aprovados = 0;
$num_reprovados = 0;
// Uma estrutura de repetição para percorrer o vetor (array)
for($i = 0; $i < $tamanho; $i++)    
    if ($notas_dos_alunos[$i] >= 6.0){
        echo "Aluno ". $i+1 . " com " . $notas_dos_alunos[$i]. " : Aprovado ! <br> ";
        $num_aprovados++; 
    }
    else {
        echo "Aluno ". $i+1 . " com " . $notas_dos_alunos[$i] . " : Reprovado ! <br> ";
        $num_reprovados++;
    }

echo "Os números de alunos aprovados = " . $num_aprovados . "<br>";
echo "Os números de alunos reprovados = " . $num_reprovados . "<br>";

?>
