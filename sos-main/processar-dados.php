<?php
require_once 'config.php';

$titulo = $_POST['titulo'];
$descricao = $_POST['descricao'];
$texto = $_POST['texto'];
$data_atual = date('d/m/Y');

$smtp = $conn->prepare("INSERT INTO artigos (titulo, descricao, texto, data) VALUES (?,?,?,?)");
$smtp->bind_param("ssss", $titulo, $descricao, $texto, $data_atual);

if($smtp->execute()){
    echo "Artigo enviado com sucesso!";
    }else{
        echo "Erro ao enviar o artigo: ".$smtp->error;
}

$smtp->close();
$conn->close();

?>
