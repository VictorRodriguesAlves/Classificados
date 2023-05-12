<?php
$anuncios = new Anuncio;

$paginas = isset($_GET['paginas']) ? intval($_GET['paginas']) : 1;
$results = $anuncios->exibirAnunciosPerfil(abs(3), abs($paginas));
$ultimaPagina =  $anuncios->contagemPaginas();
$anunciosQuantia = $anuncios->contagemAnuncios();

?>

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
        <div class="esquerdaHeader">
            <h1 class="titulo">Perfil</h1>
        </div>

        <div class="direitaHeader">
            <h1><a href="criarAnuncio" class="criarAnuncio">Criar anuncio</a></h1>
        </div>
    </div>

    <div class="container">
        <div class="esquerda">
            <div class="container_foto">
                <img src="<?php echo $_SESSION['foto_usuario'];?>" alt="imagem de perfil" class="foto_perfil">
                <h1><?php echo $_SESSION['nome_usuario'];?></h1>
            </div>
            <div class="parent-element">
                <a href="home"><div class="arrow left"><div></div></div></a>
            </div>
        </div>
        
        <div class="direita">
            <div class="anuncios">
                <h1>Seus anuncios:</h1>
                <br>
                <?php foreach($results as $anuncios): ?>

                    <a href="">
                        <div class="anuncio descriçao">
                            <span><?= $anuncios['titulo'] ?></span>
                            <span>R$ <?= $anuncios['valor'] ?></span>
                            <br>
                            <span><?= $anuncios['descricao'] ?></span>
                            <img src="assets/images/anuncios<?= $anuncios['arquivo']?>" alt="Imagem do anuncio" class="imageAnuncio">
                        </div>
                    </a>

                    <br>
                <?php endforeach; ?>
                <br>
                <?php
                    if ($paginas <= 1) {
                        echo '
                            <a class="aba" href="?paginas=1">primeira</a>
                            <a class="aba" href="?paginas=' . $paginas . '">' . $paginas . '</a>
                            <a class="aba" href="?paginas=' . ($paginas+1) . '">' . ($paginas+1) . '</a>
                            ';
                            if($paginas+2 <= $ultimaPagina){
                                echo '
                                    <a class="aba" href="?paginas=' . ($paginas+2) . '">' . ($paginas+2) . '</a>
                                ';
                            }
                            echo '
                            <a class="aba" href="?paginas=' . ($ultimaPagina) . '">ultimo</a>
                        ';
                    }elseif($paginas >=2){
                        echo '
                            <a class="aba" href="?paginas=1">primeira</a>
                            <a class="aba" href="?paginas=' . $paginas-1 . '">' . $paginas-1 . '</a>
                            <a class="aba" href="?paginas=' . ($paginas) . '">' . ($paginas) . '</a>
                            ';
                            if($paginas+1 <= $ultimaPagina){
                                echo '
                                    <a class="aba" href="?paginas=' . ($paginas+1) . '">' . ($paginas+1) . '</a>
                                ';
                            }
                            echo '
                            <a class="aba" href="?paginas=' . ($ultimaPagina) . '">ultimo</a>
                        ';
                    }

                ?>
            </div>
        </div>
    </div>
</body>
</html>