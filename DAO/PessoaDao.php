<?php

require_once  $_SERVER['DOCUMENT_ROOT'].'/wnep/Config/Connection.php';
require_once  $_SERVER['DOCUMENT_ROOT'].'/wnep/Model/PessoaModel.php';

class PessoaDao{
    public function __construct(){ }

    public function cadastrar($pessoa){
        $con = new Connection();
        $conection = $con->getConection();
        try {
            $conection->beginTransaction();
            $stmt = $conection->prepare('INSERT INTO pessoa (nome,email) values (:nome,:email)');
            $stmt->bindValue(':nome', $pessoa->getNome());
            $stmt->bindValue(':email', $pessoa->getEmail());
            $stmt->execute();
            $valor = $stmt->rowCount(); 
            $conection->commit();
            return $valor;
        } catch (Exception $e) {
           echo 'Erro: '.$e->getMessage();
        }
    }
    /*
        @paran: Pessoa
    */
    public function editar($pessoa){
        $con = new Connection();
        $conection = $con->getConection();
        try {
            $conection->beginTransaction();
            $stmt = $conection->prepare('UPDATE pessoa SET nome = :nome , email = :email WHERE id = :id');
            $stmt->bindValue(':nome', $pessoa->getNome());
            $stmt->bindValue(':email', $pessoa->getEmail());
            $stmt->bindValue(':id', $pessoa->getId());
            $stmt->execute();
            $valor = $stmt->rowCount(); 
            $conection->commit();
            return $valor;
        } catch (Exception $e) {
           echo 'Erro: '.$e->getMessage();
        }
    }
    /*
        @paran: Pessoa
    */
    public function deletar($pessoa){
        $con = new Connection();
        $conection = $con->getConection();
        try {
            $conection->beginTransaction();
            $stmt = $conection->prepare('DELETE FROM pessoa WHERE id = :id');
            $stmt->bindValue(':id', $pessoa->getId());
            $stmt->execute();
            $valor = $stmt->rowCount(); 
            $conection->commit();
            return $valor;
        } catch (Exception $e) {
           echo 'Erro: '.$e->getMessage();
        }
    }
    /*

    */
    public function lista(){
        $con = new Connection();
        $conection = $con->getConection();
        try {
            $conection->beginTransaction();
            $stmt = $conection->prepare('SELECT * FROM pessoa');
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_CLASS, "Pessoa");
            return $result;
        } catch (Exception $e) {
           echo 'Erro: '.$e->getMessage();
        }
    }

    public function carrega($pessoa_id){
        $con = new Connection();
        $conection = $con->getConection();
        try {
            $conection->beginTransaction();
            $stmt = $conection->prepare('SELECT * FROM pessoa WHERE id = :id');
            $stmt->bindValue(':id', $pessoa_id);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_CLASS, "Pessoa");
            return $result;
        } catch (Exception $e) {
           echo 'Erro: '.$e->getMessage();
        }
    }
}

?>