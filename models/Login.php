<?php
class Login {

    public function Logar($email, $senha){

        if($email){

            if($senha){

                $verificar = new Verificar;

                if($verificar->emailExists($email)){

                    $senhaDb = new Senha;
                    $senhaDb = $senhaDb->getPassByEmail($email);

                    if(password_verify($senha, $senhaDb['senha'])){
                        $usuario = new Usuario;
                        $usuarioInfo = $usuario->getAllInfoByEmail($email);
                        $_SESSION['id_usuario'] = $usuarioInfo['id'];
                        $_SESSION['senha_usuario'] = $usuarioInfo['senha'];
                        $_SESSION['email_usuario'] = $usuarioInfo['email'];
                        $_SESSION['nome_usuario'] = $usuarioInfo['nome'];
                        $_SESSION['foto_usuario'] = 'assets/images/usuarios/' . $usuarioInfo['arquivo'];
                        header('Location:../home');
                        exit;
                    }else{
                        $_SESSION['wrongPass'] = 'Informe a senha correta';
                        header('Location:../login');
                        exit;
                    }

                }else{
                    $_SESSION['invalidEmail'] = 'Informe um email cadastrado';
                    header('Location:../login');
                    exit;
                }

            }else{
                $_SESSION['undefinedPass'] = 'Informe uma Senha';
                header('Location:../login');
                exit;
            }

        }else{
            $_SESSION['undefinedEmail'] = 'Informe um email';
            header('Location:../login');
            exit;
        }
    }

}

?>

