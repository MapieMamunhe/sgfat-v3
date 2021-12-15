<?php
namespace App\Controllers;

use App\Models\Funcionario;
use MF\Controller\Action;
use MF\Model\Container;

class RegistarController extends Action{
    public function pesquisarFuncionario(){
        session_start();
        $this->isLogged();
        $this->render('pesquisarFuncionario', 'layout');
    }
    public function pegarFuncionarioPorDocumento(){
        session_start();
        $this->isLogged();
        $funcionario = Container::getModel('Funcionario');
        $documento = $_POST['documento'];
        $numeroDocumento = $_POST['numero'];
        $funcionario ->__set('documento',$documento);
        $funcionario ->__set('numeroDocumento',$numeroDocumento);
        $dados = $funcionario->getFuncionarioPorDocumento();

        var_dump($dados);
        if(!empty($dados)){
            header('location: /pesquisarFuncionario?existeFuncionario=true');
        }else{
            header('location: /formRegistoFuncionario');
        }
    }
    public function formRegistoFuncionario(){
        session_start();
        $this->isLogged();
        $this->render('formRegistoFuncionario', 'registoLayout');
    }
}