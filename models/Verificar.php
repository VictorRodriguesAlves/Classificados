<?php

use app\model\Conexao;

class Verificar extends Model{

    public function emailExists($email){

        $sql = 'SELECT * FROM usuarios WHERE email = ?';
        
        $sql = Model::getConn()->prepare($sql);
        $sql->bindValue(1, $email);
        $sql->execute();
        
        if($sql->rowCount() > 0){
            return true;
        }else{
            return false;
        }

    }



}