<?php
class perfilController extends Controller {
    public function index(){

        if(!isset($_SESSION['nome_usuario'])){
            header('Location:'.BASE_URL.'login');
            exit;
        }else{
            $this->loadView('perfil');
        }
    }
}