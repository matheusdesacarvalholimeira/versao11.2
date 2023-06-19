<?php 

include_once("confignotas.php");

$recebendo_questoes = $_GET['resposta'];



$quantidade2 = count($recebendo_questoes);

$cont1 = 0;





$sql = 'CREATE TABLE resposta_prova (
    id_gabarito INT PRIMARY KEY AUTO_INCREMENT,
    email VARCHAR(255),
    ';

$quantidade = $quantidade2; // Número total de colunas de respostas

for ($i = 0; $i < $quantidade; $i++) {
    $sql .= 'respostas' . $i . ' TEXT';
    
    if ($i < $quantidade - 1) {
        $sql .= ', ';
    }
}

$sql .= ')';

$conexao->query($sql);

////////////////////////////////////////////////////
$sql2 = 'INSERT INTO resposta_prova (email, ';

for ($i = 0; $i < $quantidade; $i++) {
    $sql2 .= 'respostas' . $i;
    
    if ($i < $quantidade - 1) {
        $sql2 .= ', ';
    }
}

$sql2 .= ') VALUES (';
$sql2 .= "'matheusacl11@gmail.com', ";

for ($i = 0; $i < $quantidade; $i++) {
    $sql2 .= "'" . $recebendo_questoes[$i] . "'";
    
    if ($i < $quantidade - 1) {
        $sql2 .= ', ';
    }
}

$sql2 .= ')';

$conexao->query($sql2);

?>