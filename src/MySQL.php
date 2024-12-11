<?php

require_once __DIR__ . "\Configuracao.php";

class MySQL {
    
    private $connection;
    
    public function __construct() {
        $this->connection = new \mysqli(HOST, USUARIO, SENHA, BANCO);
        $this->connection->set_charset("utf8");
    }
   
    public function executa($sql) {
        return $this->connection->query($sql); 
    }

    public function consulta($sql) {
        $result = $this->connection->query($sql);
        $data = array();
        
        if ($result) {
            while ($item = $result->fetch_array(MYSQLI_ASSOC)) {
                $data[] = $item;
            }
        }
        return $data;
    }
}
?>
