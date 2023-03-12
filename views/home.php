<!DOCTYPE html>
<html lang="en">
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

                <h2 class="qtAnuncios">Temos hoje x anuncios</h2>

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

                <a href="">
                    <div class="anuncio descriçao">
                        <span>anuncio 1</span>
                        <span>R$ xxx,xx</span>
                        <br>
                        <span>descriçao do anuncio 1</span>
                    </div>
                </a>

                <br>

                <a href="">
                    
                    <div class="anuncio descriçao">
                        <span>anuncio 2</span>
                        <span>R$ xxx,xx</span>
                        <br>
                        <span class="descriçao">descriçao do anuncio 2</span>
                    </div>

                </a>

                <br>
                <span class="aba">1</span>
                <span class="aba">2</span>
                <span class="aba">...</span>

            </div>
    </div>
</body>
</html>