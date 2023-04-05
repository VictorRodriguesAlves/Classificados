<?php

class Registrar extends Model{

    public function addUser($nome, $email, $senha, $foto){

        if($foto["name"] == null){
            $foto = "defaultImage.png";        
        }

        if($nome){

            if($email){

                if($senha){

                    $verificar = new Verificar;

                    if(!$verificar->emailExists($email)){

                        $criptografar =  new Criptografia;
                        $senha = $criptografar->passEncripty($senha);
                    
                        $sql = "INSERT INTO usuarios (nome, email, senha) VALUES (?, ?, ?)";
                    
                        $sql = Model::getConn()->prepare($sql);
                    
                        $sql->bindValue(1, $nome);
                        $sql->bindValue(2, $email);
                        $sql->bindValue(3, $senha);
                        $sql->execute();
                    
                        $image = new Imagens;
                        $image->AddImage($foto, $email);
                    
                    
                        if($verificar->emailExists($email)){
                            header('Location:../home');
                            exit;
                        }else{  
                            header('Location:../registrar');
                            exit;
                        }

                    }else{
                        header('Location:../registrar');
                        $_SESSION['emailExist'] = 'Informe um email não cadastrado';
                        exit;
                        }

                    
                }else{
                    $_SESSION['undefinedPass'] = 'Informe um Senha';
                    header('Location:../registrar');
                    exit;
                }

            }else{
                $_SESSION['undefinedEmail'] = 'Informe um Email';
                header('Location:../registrar');
                exit;
            }

        }else{
            $_SESSION['undefinedName'] = 'Informe um nome';
            echo '1';
    	    exit;
        }
    }
}
?>
<!--         if($nome){

            if($email){

                if($senha){

                    $verificar = new Verificar;

                    if(!$verificar->emailExists($email)){

                        $criptografar =  new Criptografia;
                        $senha = $criptografar->passEncripty($senha);
                    
                        $sql = "INSERT INTO usuarios (nome, email, senha) VALUES (?, ?, ?)";
                    
                        $sql = Model::getConn()->prepare($sql);
                    
                        $sql->bindValue(1, $nome);
                        $sql->bindValue(2, $email);
                        $sql->bindValue(3, $senha);
                        $sql->execute();
                    
                        $image = new Imagens;
                        $image->AddImage($foto, $email);
                    
                    
                        if($verificar->emailExists($email)){
                            header('Location:../home');
                            exit;
                        }else{  
                            header('Location:../registrar');
                            exit;
                        }

                    }else{
                        header('Location:../registrar');
                        $_SESSION['emailExist'] = 'Informe um email não cadastrado';
                        exit;
                        }

                    
                }else{
                    $_SESSION['undefinedPass'] = 'Informe um Senha';
                    header('Location:../registrar');
                    exit;
                }

            }else{
                $_SESSION['undefinedEmail'] = 'Informe um Email';
                header('Location:../registrar');
                exit;
            }

        }else{
            $_SESSION['undefinedName'] = 'Informe um nome';
            echo '1';
    	    exit;
        }


 -->
