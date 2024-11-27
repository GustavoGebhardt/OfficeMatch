<?php

class Avaliacao implements ActiveRecord{

    private int $idAvaliacao;
    
    public function __construct(private string $id_user,private string $id_funcionario, private string $nota){
    }

    public function setIdAvaliacao(int $idAvaliacao):void{
        $this->idAvaliacao = $idAvaliacao;
    }

    public function getIdAvaliacao():int{
        return $this->idAvaliacao;
    }

    public function setIdUser(string $id_user):void{
        $this->id_user = $id_user;
    }

    public function getIdUser():string{
        return $this->id_user;
    }

    public function setIdFuncionario(string $id_funcionario):void{
        $this->id_funcionario = $id_funcionario;
    }

    public function getIdFuncionario():string{
        return $this->id_funcionario;
    }

    public function setNota(string $nota):void{
        $this->nota = $nota;
    }

    public function getNota():string{
        return $this->nota;
    }

    public function save():bool{
        $conexao = new MySQL();
        if(isset($this->idFesta)){
            $sql = "UPDATE Avaliacao SET id_user = '{$this->id_user}' ,id_funcionario = '{$this->id_funcionario}',nota = '{$this->nota}' WHERE id = {$this->idAvaliacao}";
        }else{
            $sql = "INSERT INTO Avaliacao (id_user,id_funcionario,nota,) VALUES ('{$this->id_user}','{$this->id_funcionario}','{$this->nota}')";
        }
        return $conexao->executa($sql);
        
    }
    public function delete():bool{
        $conexao = new MySQL();
        $sql = "DELETE FROM Avalicao WHERE id = {$this->idAvaliacao}";
        return $conexao->executa($sql);
    }

    public static function find($idAvaliacao):Avaliacao{
        $conexao = new MySQL();
        $sql = "SELECT * FROM Avaliacao WHERE id = {$idAvaliacao}";
        $resultado = $conexao->consulta($sql);
        $f = new Avaliacao($resultado[0]['id_user'],$resultado[0]['id_funcionario'],$resultado[0]['nota']);
        $f->setIdAvaliacao($resultado[0]['id']);
        return $f;
    }
    public static function findall():array{
        $conexao = new MySQL();
        $sql = "SELECT * FROM Avaliacao";
        $resultados = $conexao->consulta($sql);
        $avaliacoes = array();
        foreach($resultados as $resultado){
            $f = new Avaliacao($resultado['id_user'],$resultado['id_funcionario'],$resultado['nota']);
            $f->setIdAvaliacao($resultado['id']);
            $avaliacoes[] = $f;
        }
        return $avaliacoes;
    }

    
}
