<?php
    /*
        Arquivos necessários para execução 
    */
    require_once  $_SERVER['DOCUMENT_ROOT'].'/wnep/Config/Config.php';
    require_once  $_SERVER['DOCUMENT_ROOT'].'/wnep/Config/Connection.php';
    require_once  $_SERVER['DOCUMENT_ROOT'].'/wnep/Model/PessoaModel.php';
    require_once  $_SERVER['DOCUMENT_ROOT'].'/wnep/DAO/PessoaDao.php';
    
    //Dados do Formulário
    $txtNome = $_POST['txtNome'];
    $txtEmail = $_POST['txtEmail'];

    /* Instanciando uma Pessoa com os dados do formulário */
    $pessoa = new Pessoa();
    $pessoa->setNome($txtNome);
    $pessoa->setEmail($txtEmail);

    
    $dao = new PessoaDao(); /* Instanciando a classe DAO  */
    $cadastrar = $dao->cadastrar($pessoa); /* Usando a função cadastrar */

    /** Verifica se foi salvo */
    if($cadastrar > 0){
        header("location:".base_url()."/wnep/pessoa.php?sucess");
    }else{
        header("location:".base_url()."/wnep/pessoa.php?erro");
    }
    
?>