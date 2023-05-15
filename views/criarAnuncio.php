<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets\css\anuncioStyle.css">
    <script src="assets/js/criarAnuncio.js" defer></script>
    <title>Classificados</title>
</head>
<body>
    <div class="container">
        <h1>Crie seu anuncio.</h1>
        <form action="criarAnuncio/Criando" method="post" enctype="multipart/form-data" id="form">


            <label for="titulo">
                Titulo do anuncio:
                <input type="text" name="titulo" id="titulo" class="campos" onkeydown="tituloValido()">
                <span class="spanRequired">O titulo deve ter ao menos 4 letras.</span>
            </label>
            <br>
            <label for="descriçao">
                Descrição do anuncio:
                <input type="text" name="descricao" id="descricao" class="campos" onkeydown="descricaoValida()">
                <span class="spanRequired">A descrição deve ter ao menos 10 letras.</span>
            </label>
            <br>
            <label for="valor">
                Insira o valor:
                <input type="number" name="valor" id="valor" class="campos" onkeydown="valorValido()">
                <span class="spanRequired">Informe um valor valido</span>
            </label>
            <br>
            <label for="image">
                Imagens do anuncios:
                <input type="file" name="image[]" id="image" multiple="multiple" class="campos" onkeydown="imageValidate()">
                <span class="spanRequired">Informe uma imagem valida</span>
            </label>
            <br>
            <input type="submit" value="Criar">
        </form>
    </div>
    <div class="parent-element">
        <a href="perfil"><div class="arrow left"><div></div></div></a>
    </div>
</body>
</html>