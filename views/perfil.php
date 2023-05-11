<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/perfilStyle.css">
    <title>Classificados</title>
</head>
<body>

    <div class="header">
        <div class="esquerda">
            <h1 class="titulo">Perfil</h1>
        </div>

        <div class="direita">
            <h1><a href="criarAnuncio" class="criarAnuncio">Criar anuncio</a></h1>
        </div>
    </div>








    <div class="container_foto">
        <img src="<?php echo $_SESSION['foto_usuario'];?>" alt="imagem de perfil" class="foto_perfil">
        <h1><?php echo $_SESSION['nome_usuario'];?></h1>
    </div>


    

    <?php
        $var = new Anuncio;
    ?>


    <div class="parent-element">
        <a href="home"><div class="arrow left"><div></div></div></a>
    </div>


    <div class="anuncios">
        <h1>Seus anuncios:</h1>

        <div class="abas">
            <span>add</span>
        </div>
    </div>

</body>
</html>