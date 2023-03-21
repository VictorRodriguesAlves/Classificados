<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Classificados</title>
</head>
<body>
    <h1>Perfil</h1>
    <img src="<?php echo $_SESSION['foto_usuario'];?>" alt="deu erro">
    <p>Ola <?php echo $_SESSION['nome_usuario'];?>, seja bem vindo ao seu perfil!! </p>
    <a href="home"><input type="submit" value="Voltar"></a>

    <a href="criarAnuncio"><input type="submit" value="Criar anuncio"></a>
    
</body>
</html>