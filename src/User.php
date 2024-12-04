<?php

class User implements ActiveRecord{

    private int $idUser;
    
    public function __construct(private string $nome,private string $senha, private string $email){
    }

    public function setIdUser(int $idUser):void{
        $this->idUser = $idUser;
    }

    public function getIdUser():int{
        return $this->idUser;
    }

    public function setNome(string $nome):void{
        $this->nome = $nome;
    }

    public function getNome():string{
        return $this->nome;
    }

    public function setSenha(string $senha):void{
        $this->senha = $senha;
    }

    public function getSenha():string{
        return $this->senha;
    }

    public function setEmail(string $email):void{
        $this->email = $email;
    }

    public function getEmail():string{
        return $this->email;
    }

    public function save():bool{
        $conexao = new MySQL();
        if(isset($this->idUser)){
            $sql = "UPDATE User SET nome = '{$this->nome}' ,senha = '{$this->senha}',email = '{$this->email}' WHERE id = {$this->idUser}";
        }else{
            $sql = "INSERT INTO User (nome,senha,email) VALUES ('{$this->nome}','{$this->senha}','{$this->email}')";
        }
        return $conexao->executa($sql);
        
    }
    public function delete():bool{
        $conexao = new MySQL();
        $sql = "DELETE FROM User WHERE id = {$this->idUser}";
        return $conexao->executa($sql);
    }

    public static function find($idUser):User{
        $conexao = new MySQL();
        $sql = "SELECT * FROM User WHERE id = {$idUser}";
        $resultado = $conexao->consulta($sql);
        $f = new User($resultado[0]['nome'],$resultado[0]['senha'],$resultado[0]['email']);
        $f->setIdUser($resultado[0]['id']);
        return $f;
    }

    public static function findWithEmail($email): ?User{
        $conexao = new MySQL();
        $sql = "SELECT * FROM User WHERE email = '{$email}'";
        $resultado = $conexao->consulta($sql);
        if($resultado){
            $f = new User($resultado[0]['nome'],$resultado[0]['senha'],$resultado[0]['email']);
            $f->setIdUser($resultado[0]['id']);
            return $f;
        } else {
            return null;
        }
    }
    public static function findall():array{
        $conexao = new MySQL();
        $sql = "SELECT * FROM User";
        $resultados = $conexao->consulta($sql);
        $users = array();
        foreach($resultados as $resultado){
            $f = new User($resultado['nome'],$resultado['senha'],$resultado['email']);
            $f->setIdUser($resultado['id']);
            $users[] = $f;
        }
        return $users;
    }

    
}
