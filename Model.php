<?php

abstract class Model{
   
 private $db_host;
 private $db_user;
 private $db_pass;
 private $db_name;
 private $db_charset = 'utf8mb4';
 private $conn;
 protected $query;
 protected $rows = array();
 
 
 abstract protected function set();
 abstract protected function get();
 abstract protected function del();


    public function __construct() {
        require_once '../../Credentials.php';
        $credentials = new Credentials();

        $this->db_host = $credentials->getHost();
        $this->db_user = $credentials->getUser();
        $this->db_pass = $credentials->getPassword();
        $this->db_name = $credentials->getDatabase();
    }
	
    private function db_connect(){
       
        $this->conn = new mysqli(
            $this->db_host,
            $this->db_user,
            $this->db_pass,
            $this->db_name
        );

       if ($this->conn->connect_error) {
            die("Error al conectar a la base de datos: " . $this->conn->connect_error);
        }
        $this->conn->set_charset($this->db_charset);
    }


    private function db_close(){
        
        $this->conn->close();
    }
    

 
    protected function set_query(){
        $this->db_connect();
		
        if(!$stmt = $this->conn->prepare($this->query))
		{
			die("Error en la consulta: " . $this->conn->error);
		}
        $stmt->execute();
        $stmt->close();
        $this->db_close();
    }

    protected function get_query(){
        $this->db_connect();
        $stmt = $this->conn->prepare($this->query);
        $stmt->execute();
        $result = $stmt->get_result();
		if (!$result) {
            die("Error en la consulta: " . $this->conn->error);
        }
        while ($this->rows[] = $result->fetch_assoc());
        $result->close();
        $stmt->close();
        $this->db_close();
        return array_pop($this->rows);
    }
        

}
?>
