<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Classificados</title>
</head>
<body>
    <div class="container">
        <h1>Crie seu anuncio.</h1>
        <form action="" method="post" enctype="multipart/form-data">

            <label for="image">
                Imagens do anuncios:
                <input type="file" name="image" >
            </label>
            <br>
            <label for="titulo">
                Titulo do anuncio:
                <input type="text" name="titulo">
            </label>
            <br>
            <label for="descriçao">
                Descrição do anuncio:
                <input type="text" name="descriçao">
            </label>
            <br>
            <label for="valor">
                Insira o valor:
                <input type="number" name="valor">
            </label>
        </form>
    </div>
</body>
</html>