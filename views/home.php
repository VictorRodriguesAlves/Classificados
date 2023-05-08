<?php
$anuncios = new Anuncio;

$paginas = isset($_GET['paginas']) ? intval($_GET['paginas']) : 1;
$results = $anuncios->exibirTodos(abs(3), abs($paginas));
$ultimaPagina =  $anuncios->contagemPaginas();


?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Classificados</title>
    <link rel="stylesheet" href="assets/css/homeStyle.css">
</head>
<body>

        <?php
            $dados = array(
                'view' => $view
            );

            $this->loadTemplateInView($header,$dados);
        ?>

    <div class="container">
            <div class="esquerda">

                <h2 class="qtAnuncios">Temos 7 anuncios</h2>

                <div class="filtro">
                    <h2>Preços:</h2>
                    <br>
                    <p>até R$100</p>
                    <p>R$100 até a R$1000</p>
                    <p>acima de R$1000</p>
                    <input type="number" name="valor1" placeholder="minimo"> _ <input type="number" name="valor2" placeholder="maximo">
                </div>

            </div>

            <div class="direita">
                <h1 class="qtAnuncios">Anuncios:</h1>

            <?php foreach($results as $anuncios): ?>

                <a href="">
                    <div class="anuncio descriçao">
                        <span><?= $anuncios['titulo'] ?></span>
                        <span>R$ <?= $anuncios['valor'] ?></span>
                        <br>
                        <span><?= $anuncios['descricao'] ?></span>
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
</body>
</html>