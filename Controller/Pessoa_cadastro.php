<?php
    require_once  '../Model/PessoaModel.php';
    require_once  '../DAO/PessoaDao.php';
    
    $txtNome = $_POST['txtNome'];
    $txtEmail = $_POST['txtEmail'];

    /* Cadastro Pessoa */
    $pessoa = new Pessoa();
    $pessoa->setNome($txtNome);
    $pessoa->setEmail($txtEmail);

    $dao = new PessoaDao();
    $cadastrar = $dao->cadastrar($pessoa);

    header("location:/crud/controller/pessoa.php");
?>