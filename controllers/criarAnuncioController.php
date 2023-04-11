<?php
class criarAnuncioController extends Controller{

    public function index(){
        if(!isset($_SESSION['nome_usuario'])){
            header('Location:'.BASE_URL.'login');
            exit;
        }else{
            $this->loadView('criarAnuncio');
        }
    }

    public function Criando(){
        $titulo = filter_input(INPUT_POST, 'titulo', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $descricao = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $valor = filter_input(INPUT_POST, 'valor');
        $fotos = $_FILES['image'];


        $criarAnuncio = new Anuncio;
        $criarAnuncio->criarAnuncio($titulo, $descricao, $valor, $fotos);

    }

}
?>