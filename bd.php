<?php
  class BD
  {

    public $DB_HOST;
    public $DB_USER;
    public $DB_PASS;
    public $DB_NAME;
    public $conn;

    public function BD()
    {
      //DB local (XAMPP)
      $this->DB_HOST = "localhost";
      $this->DB_USER = "root";
      $this->DB_PASS = "";
      $this->DB_NAME = "ruby";

      //DB infinityfree
      /*$this->DB_HOST = "sql101.epizy.com";
      $this->DB_USER = "epiz_21096277";
      $this->DB_PASS = "umdoisoito128";
      $this->DB_NAME = "epiz_21096277_ruby";*/

    }

    public function comando($sql)
    {

      $this->conn = new mysqli($this->DB_HOST, $this->DB_USER, $this->DB_PASS, $this->DB_NAME);

      if($this->conn->connect_errno != 0)
      {
        die("Impossível conectar-se ao banco. Erro: [".$this->conn->connect_error."]");
      }

      if(!$retorno = $this->conn->query($sql))
      {
        die("Impossível executar comando SQL. Erro: [".$this->conn->error."]");
      }

      $primeiro = explode(" ", $sql);
      if(strtoupper($primeiro[0]) == "SELECT")
      {
        return $retorno;
      }

    }

  }

 ?>
