<?php
    /*
        Arquivos necessários para execução 
    */
    require_once  $_SERVER['DOCUMENT_ROOT'].'/wnep/Config/Config.php';
    require_once  $_SERVER['DOCUMENT_ROOT'].'/wnep/Config/Connection.php';
    require_once  $_SERVER['DOCUMENT_ROOT'].'/wnep/Model/PessoaModel.php';
    require_once  $_SERVER['DOCUMENT_ROOT'].'/wnep/DAO/PessoaDao.php';
    
    /*
        Verifica se veio o id via GET
    */
    if(isset($_GET['id'])){
        // ID VEIO, tratar formulário
        $txtId = $_GET['id'];
        $txtNome = $_POST['txtNome'];
        $txtEmail = $_POST['txtEmail'];

        $dao = new PessoaDao(); //Carregar DAO
        $validar = $dao->carrega($txtId); 
        
        //Validar se ID Verdadeiro
        if(empty($validar)){ //ID Não existe
            header("location:/wnep/pessoa.php?erro=NaoExiste");
        }else{ //ID Verdadeiro
            /* Instanciando uma Pessoa com os dados do formulário */            
            $pessoa = new Pessoa();
            $pessoa->setId($txtId);
            $pessoa->setNome($txtNome);
            $pessoa->setEmail($txtEmail);
            $editar = $dao->editar($pessoa); //Editar
            //Valida Edição
            if($editar > 0){
                header("location:/wnep/pessoa.php?Sucesso");
            }else{
                header("location:/wnep/pessoa.php?Erro");
            }
            
        }     

    }else{ //ID não veio
        header("location:/wnep/pessoa.php?erro=FaltaParametro");
    }
?>