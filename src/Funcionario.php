<?php

class Funcionario implements ActiveRecord{

    private int $idFuncionario;
    
    public function __construct(private string $nome,private string $descricao, private string $imagem){
    }

    public function setIdFuncionario(int $idFuncionario):void{
        $this->idFuncionario = $idFuncionario;
    }

    public function getIdFuncionario():int{
        return $this->idFuncionario;
    }

    public function setNome(string $nome):void{
        $this->nome = $nome;
    }

    public function getNome():string{
        return $this->nome;
    }

    public function setDescricao(string $descricao):void{
        $this->descricao = $descricao;
    }

    public function getDescricao():string{
        return $this->descricao;
    }

    public function setImagem(string $imagem):void{
        $this->imagem = $imagem;
    }

    public function getImagem():string{
        return $this->imagem;
    }

    public function save():bool{
        $conexao = new MySQL();
        if(isset($this->idFesta)){
            $sql = "UPDATE Funcionario SET nome = '{$this->nome}' ,descricao = '{$this->descricao}',imagem = '{$this->imagem}' WHERE id = {$this->idFuncionario}";
        }else{
            $sql = "INSERT INTO Funcionario (nome,descricao,imagem) VALUES ('{$this->nome}','{$this->descricao}','{$this->imagem}')";
        }
        return $conexao->executa($sql);
        
    }
    public function delete():bool{
        $conexao = new MySQL();
        $sql = "DELETE FROM Funcionario WHERE id = {$this->idFuncionario}";
        return $conexao->executa($sql);
    }

    public static function find($idFuncionario):Funcionario{
        $conexao = new MySQL();
        $sql = "SELECT * FROM Funcionario WHERE id = {$idFuncionario}";
        $resultado = $conexao->consulta($sql);
        $f = new Funcionario($resultado[0]['nome'],$resultado[0]['descricao'],$resultado[0]['imagem']);
        $f->setIdFuncionario($resultado[0]['id']);
        return $f;
    }
    public static function findall():array{
        $conexao = new MySQL();
        $sql = "SELECT * FROM Funcionario";
        $resultados = $conexao->consulta($sql);
        $funcionarios = array();
        foreach($resultados as $resultado){
            $f = new Funcionario($resultado['nome'],$resultado['descricao'],$resultado['imagem']);
            $f->setIdFuncionario($resultado['id']);
            $funcionarios[] = $f;
        }
        return $funcionarios;
    }

    
}
