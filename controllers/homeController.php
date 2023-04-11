<?php
class homeController extends Controller{
    public function index(){

        if(isset($_SESSION['id_usuario'])){
            $header = 'headerLogado';
        }else{
            $header = 'headerDeslogado';
        }

        $dados = array(
            'view' => 'Home',
            'header' => $header,
            'email' => 'longovictor23@gmail.com'
        );
        $this->loadVIew('home', $dados);
    }

    public function logout(){
            unset($_SESSION['logado']);
            session_destroy();
            header("Location:".BASE_URL."home");
            exit;

    }
}