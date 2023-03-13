<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/registrarStyle.css">
    <script src="assets/js/registroScript.js" defer></script>
    <title>Classificados</title>
</head>
<body>
    <div class="container">
        <h1>Registro</h1>
        <form action="registrar/registrando" method="post" enctype="multipart/form-data" id="form">
            <label for="nome">
                Nome:
                <br><input type="text" name="nome" id="nome" placeholder="Seu nome" class="campos" oninput="nameValidate()">
                <?php
                if(isset($_SESSION['undefinedName'])){
                    echo '<span class="spanRequired2">'.$_SESSION['undefinedName'].'</span>';
                    unset($_SESSION['undefinedName']);
                    session_destroy();
                }else{
                    echo '<span class="spanRequired">O nome deve ter ao menos 4 letras</span>';
                }
                ?>
            </label>
            <br>
            <label for="email">
                Email:
                <br><input type="email" name="email" id="email" placeholder="seuemail@email.com" class="campos" oninput="emailValidate()">
                <?php
                if(isset($_SESSION['undefinedEmail'])){
                    echo '<span class="spanRequired2">'.$_SESSION['undefinedEmail'].'</span>';
                    unset($_SESSION['undefinedEmail']);
                    session_destroy();
                }elseif(isset($_SESSION['emailExist'])){
                    echo '<span class="spanRequired2">'.$_SESSION['emailExist'].'</span>';
                    unset($_SESSION['emailExist']);
                    session_destroy();
                }else{
                    echo '<span class="spanRequired">O email esta fora de padrão</span>';
                }
                ?>
                
            </label>
            <br>
            <label for="senha">
                Senha:
                <br><input type="password" name="senha" id="senha" placeholder="********" minlength="8" maxlength="20" class="campos" oninput="passValidate()">
                <?php
                if(isset($_SESSION['undefinedPass'])){
                    echo '<span class="spanRequired2">'.$_SESSION['undefinedPass'].'</span>';
                    unset($_SESSION['undefinedPass']);
                    session_destroy();
                }else{
                    echo '<span class="spanRequired">A senha deve ter ao menos 8 digitos</span>';
                }
                ?>
                
            </label>
            <br>
                <label for="foto" class="fotoLabel">
                    Sua Foto:
                    <br><input type="file" name="image" id="foto" accept=".jpg, .jpeg, .png" class="campos" oninput="imageValidate()">
                    <span class="spanRequired">Arquivo não suportado</span>
                </label>
            <br>
            <input type="submit" value="Registrar-se">
        </form>
    </div>
</body>
</html>