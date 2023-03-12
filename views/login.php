<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Classificados</title>
    <link rel="stylesheet" href="assets/css/loginStyle.css">

</head>
<body>
    <div class="container">

        <h1>Login</h1>

        <form action="Login/Logando" method="post">
            <label for="email">
                Email:
                <br><input type="email" name="email" placeholder="seuemail@email.com" class="campos">
                <?php
                    if(isset($_SESSION['undefinedEmail'])){
                        echo '<span class="spanRequired">'.$_SESSION['undefinedEmail'].'</span>';
                        unset($_SESSION['undefinedEmail']);
                    }elseif(isset($_SESSION['invalidEmail'])){
                        echo '<span class="spanRequired">'.$_SESSION['invalidEmail'].'</span>';
                        unset($_SESSION['undefinedEmail']);
                    }else{
                        echo '<span class="spanRequired">Informe um email valido</span>';
                    }
                ?>
            </label>
            <br>
            <label for="senha">
                Senha:
                <br><input type="password" name="senha" placeholder="********" class="campos">
                <?php
                    if(isset($_SESSION['undefinedPass'])){
                        echo '<span class="spanRequired">'.$_SESSION['undefinedPass'].'</span>';
                        unset($_SESSION['undefinedPass']);
                    }elseif(isset($_SESSION['wrongPass'])){
                        echo '<span class="spanRequired">'.$_SESSION['wrongPass'].'</span>';
                        unset($_SESSION['wrongPass']);
                    }else{
                        echo '<span class="spanRequired">A senha deve ter ao menos 8 digitos</span>';
                    }
                ?>
            </label>
            <br>
            <input type="submit" value="Logar">
        </form>
    </div>
</body>
</html>