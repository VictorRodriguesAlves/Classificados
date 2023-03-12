<?php
class Criptografia extends Model {

    public function passEncripty($senha){
        $novaSenha = password_hash($senha, PASSWORD_DEFAULT);
        return $novaSenha;

    }


}