<?php

//Incluir a conexão
include("conexao.php");

//Obter dados
$obterDados = file_get_contents("php://input");

//Extrair dados do JSON
$extrair = json_decode($obterDados);

//Separar os dados do JSON
$idCurso = $extrair->idCurso;
$nomeCurso = $extrair->nomeCurso;
$valorCurso = $extrair->valorCurso;

//SQL
$sql = "UPDATE cursos SET nomeCurso='$nomeCurso', valorCurso=$valorCurso WHERE idCurso=$idCurso";
mysqli_query($conexao, $sql);

//Exportar os dados cadastrados
$curso = [
    'idCurso' => $idCurso,
    'nomeCurso' => $nomeCurso,
    'valorCurso' => $valorCurso,
];

json_encode($curso);

?>