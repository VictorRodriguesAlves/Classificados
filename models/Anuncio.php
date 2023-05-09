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

    public function exibirAnunciosPerfil(){

        $sql = "SELECT * FROM anuncios WHERE autor = ?";
        $sql = Model::getConn()->prepare($sql);
        
        $sql->bindValue(1, $_SESSION['id_usuario']);
        
        $sql->execute();
        
        $result = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $result;

    }


    public function exibirTodos($limite, $pagina){
        if ($pagina === '' OR $pagina <= 0) {
            $pagina = 1;
        }
    
        $inicio = ($limite * $pagina) - $limite;
        $sql = "SELECT * FROM anuncios LIMIT $inicio, $limite";
        $sql = Model::getConn()->prepare($sql);
        $sql->execute();
        
        $result = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function contagemPaginas(){
        $sql = "SELECT count(*) FROM anuncios";
        $sql = Model::getConn()->prepare($sql);
        $sql->execute();
    
        $result = $sql->fetch(PDO::FETCH_NUM);
        $total_anuncios = $result[0];
        $total_paginas = ceil($total_anuncios / 3); 
        return $total_paginas;
    }

    public function contagemAnuncios(){
        $sql = "SELECT count(*) FROM anuncios";
        $sql = Model::getConn()->prepare($sql);
        $sql->execute();
    
        $result = $sql->fetch(PDO::FETCH_NUM);
        return $result;
    }

}
