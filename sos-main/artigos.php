<?php
require_once 'config.php';

$senhaSecreta = "123";
if($_SERVER["REQUEST_METHOD"]== "POST"){
    $senhadigitada = $_POST['senha'];

    if($senhadigitada === $senhaSecreta){
        $sql = "SELECT * FROM artigos";
        $result = $conn->query($sql);
    }else{
        echo "<h1>Senha incorreta!</h1>";
    }
}

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Montar Artigo</title>
    <link rel="stylesheet" href="style2.css">
</head>
<body>
    <header class="cabecalho">
        <img class="logo__sos" src="./imagens/Logo(3).png"/>
        <div class="cabecalho__busca">
            <div class="busca__fundo">
                <input class="busca__input" type="text" placeholder="O que você procura?">
                <img class="busca__icone" src="./imagens/search.png" alt="ícone de search">
            </div>
        </div>
        <button class="Btn">
            <div class="sign">
                <svg viewBox="0 0 512 512">
                    <path d="M377.9 105.9L500.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L377.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1-128 0c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM160 96L96 96c-17.7 0-32 14.3-32 32l0 256c0 17.7 14.3 32 32 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-64 0c-53 0-96-43-96-96L0 128C0 75 43 32 96 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32z"></path>
                </svg>
            </div>
            <a href="index.html"><div class="text">Voltar</div></a>
        </button>
    </header>
    <div class="container">
        <form method="post">
            <label for="senha">Senha:</label>
            <input type="password" class="placeholder" name="senha" placeholder="Título sua senha" required>
            <button class="publish-button" type="submit">Publicar</button>
        </form>

        <div class="artigos">
        <?php if(isset($result) && $result->num_rows >0) : ?>
            <h2>Artigos</h2>
            <ul>
                <?php while($row = $result->fetch_assoc()) :?>
                    <li>
                        <strong>Nome: </strong> <?php echo $row["titulo"]; ?><br>
                        <strong>Descricao: </strong> <?php echo $row["descricao"]; ?><br>
                        <strong>Texto: </strong> <?php echo $row["texto"]; ?><br>
                        <strong>Data: </strong> <?php echo $row["data"]; ?><br>
                    </li>
                    <?php endwhile; ?>
            </ul>
            <?php else : ?> 
                <p>Nenhuma mensagem encontrada.</p>
            <?php endif; ?>
            </div>

    </div>
</body>
</html>