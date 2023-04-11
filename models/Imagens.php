<?php
class Imagens extends Model {

    public $msg = false;

    public function AddImage($foto, $email){

        if($foto && $email){

            $verificar = new Verificar;

            if($verificar->emailExists($email)){

                if($foto == "defaultImage.png"){

                    $sql = "UPDATE usuarios SET arquivo = :nome, data = NOW() WHERE email = :email";
                
                    //adiciona o nome da imagem no db
                    $sql = Model::getConn()->prepare($sql);
                    $sql->bindValue(':email', $email);
                    $sql->bindValue(':nome', $foto);
                    $sql->execute();
    
                    //verifica se a imagem foi adicionada
                    $sql = "SELECT * FROM usuarios WHERE arquivo = ?";
    
                    $sql = Model::getConn()->prepare($sql);
                    $sql->bindValue(1, $foto);
                    $sql->execute();
    
                    if($sql->rowCount() > 0 ){
                        $msg = 'deu certo';
                    }else{
                        $msg = 'deu errado';
                    }

                    
                }

                $sql = "SELECT * FROM usuarios WHERE arquivo = ?";

                $sql = Model::getConn()->prepare($sql);
                $sql->bindValue(1, $foto);
                $sql->execute();

                if(!$sql->rowCount() > 0 ){
                    $extensao = strtolower(substr($foto['name'], -4)); //pega a extenção do arquivo
                    $novo_nome = md5(time()) . $extensao; //cria um novo nome de forma que ele nao va se repetir
                    $diretorio = 'assets/images/usuarios/';
    
                    move_uploaded_file($foto['tmp_name'], $diretorio.$novo_nome); //faz o upload para o diretorio
                    
                    $sql = "UPDATE usuarios SET arquivo = :novoNome, data = NOW() WHERE email = :email";
                    
                    //adiciona o nome da imagem no db
                    $sql = Model::getConn()->prepare($sql);
                    $sql->bindValue(':email', $email);
                    $sql->bindValue(':novoNome', $novo_nome);
                    $sql->execute();
    
                    //verifica se a imagem foi adicionada
                    $sql = "SELECT * FROM usuarios WHERE arquivo = ?";
    
                    $sql = Model::getConn()->prepare($sql);
                    $sql->bindValue(1, $novo_nome);
                    $sql->execute();
    
                    if($sql->rowCount() > 0 ){
                        $msg = 'deu certo';
                    }else{
                        $msg = 'deu errado';
                    }
                }



            }

        }
    }
 
    public function addImageAnuncio($id, $fotos){
        for($i = 0; $i < sizeof($fotos['name']); $i++){

            $extensao = strtolower(substr($fotos['name'][$i], -4));
            $novo_nome = md5(time()+rand()) . $extensao;
            $diretorio = 'assets/images/anuncios/';
    
            move_uploaded_file($fotos['tmp_name'][$i], $diretorio.$novo_nome);
            $sql = "UPDATE anuncios SET arquivo = CONCAT(arquivo, '/', ?) WHERE id = ?";
            $sql = Model::getConn()->prepare($sql);

            $sql->bindValue(1, $novo_nome);
            $sql->bindValue(2, $id);
            $sql->execute();
            
       }
    }

}
