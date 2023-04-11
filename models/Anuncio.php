<?php
class Anuncio extends Model{
    public function criarAnuncio($titulo, $descricao, $valor, $fotos){

        if($titulo){

            if($descricao){

                if($valor){
                    
                    if(!empty($fotos['name']['0'])){

                        $data = date("F d, Y h:i:s A");

                        $sql = "INSERT INTO anuncios (autor, titulo, descricao, valor, `data`) VALUES (?,?,?,?,?)";
                        $sql = Model::getConn()->prepare($sql);

                        $sql->bindValue(1, $_SESSION['id_usuario']);
                        $sql->bindValue(2, $titulo);
                        $sql->bindValue(3, $descricao);
                        $sql->bindValue(4, $valor);
                        $sql->bindValue(5, $data);
                        $sql->execute();

                        $sql = "SELECT id FROM anuncios WHERE `data` = ? AND autor = ?";
                        $sql = Model::getConn()->prepare($sql);
                        $sql->bindValue(1, $data);
                        $sql->bindValue(2, $_SESSION['id_usuario']);
                        $sql->execute();

                        $result = $sql->fetch();
                        $id = $result['id'];

                        $addImage = new Imagens;
                        $addImage->addImageAnuncio($id, $fotos);
                        header("Location:".BASE_URL."perfil");
                        exit;

                    }else{
                        header("Location:".BASE_URL."criarAnuncio");
                        exit;
                    }

                }else{
                    header("Location:".BASE_URL."criarAnuncio");
                    exit;
                }

            }else{
                header("Location:".BASE_URL."criarAnuncio");
                exit;
            }

        }else{
            header("Location:".BASE_URL."criarAnuncio");
            exit;
        }

    }

}
