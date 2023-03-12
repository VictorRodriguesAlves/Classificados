<?php
class registrarController extends Controller{

    public function index(){

        $this->loadView('registrar');

    }

    public function registrando(){

        $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $senha = filter_input(INPUT_POST, 'senha');
        $foto = $_FILES['image'];

        $registro = new Registrar;
        $registro->addUser($nome, $email, $senha, $foto);
    }

}