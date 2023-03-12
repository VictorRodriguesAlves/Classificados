<?php
class loginController extends Controller {

    public function index(){
        $this->loadView('login');
    }

    public function logando(){
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        $login = new Login;
        $login->Logar($email, $senha);
    }
}