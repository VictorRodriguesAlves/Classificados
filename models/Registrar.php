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
                            header("Location:".BASE_URL."home");
                            exit;
                        }else{  
                            header("Location:".BASE_URL."Registrar");
                            exit;
                        }

                    }else{
                        $_SESSION['emailExist'] = 'Informe um email não cadastrado';
                        header("Location:".BASE_URL."Registrar");
                        exit;
                        }

                    
                }else{
                    $_SESSION['undefinedPass'] = 'Informe um Senha';
                    header("Location:".BASE_URL."Registrar");
                    exit;
                }

            }else{
                $_SESSION['undefinedEmail'] = 'Informe um Email';
                header("Location:".BASE_URL."Registrar");
                exit;
            }

        }else{
            $_SESSION['undefinedName'] = 'Informe um nome';
            header("Location:".BASE_URL."Registrar");
    	    exit;
        }
    }
}
?>
