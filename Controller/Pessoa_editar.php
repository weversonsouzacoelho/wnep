<?php
    require_once  '../Model/PessoaModel.php';
    require_once  '../DAO/PessoaDao.php';
    
    if(isset($_GET['id'])){
        $txtId = $_GET['id'];
        $txtNome = $_POST['txtNome'];
        $txtEmail = $_POST['txtEmail'];

        $dao = new PessoaDao();
        $validar = $dao->carrega($txtId);

        if(empty($validar)){
            header("location:/wnep/view/pessoa.php?erro=NaoExiste");
        }else{

            $pessoa = new Pessoa();
            $pessoa->setId($txtId);
            $pessoa->setNome($txtNome);
            $pessoa->setEmail($txtEmail);
            $cadastrar = $dao->editar($pessoa);
            header("location:/wnep/view/pessoa.php?Sucesso");
        }     

    }else{
        header("location:/wnep/view/pessoa.php?erro=FaltaParametro");
    }
?>