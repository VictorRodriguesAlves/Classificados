<?php

class Senha extends Model {

    public function getPassByEmail($email){
        $sql = 'SELECT senha FROM usuarios WHERE email = ?';

        $sql = Model::getConn()->prepare($sql);
        $sql->bindValue(1, $email);
        $sql->execute();

        if($sql->rowCount() > 0){

            return $sql->fetch(\PDO::FETCH_ASSOC);
        }else{
            //retorna erro
        }
    }

}