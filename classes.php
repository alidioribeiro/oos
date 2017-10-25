<?php
class conexaoODBC
{
 //variaveis da conexao
  var $dns    = "ODBC_SPRINGER";
  var $user   = "sa";
  var $pass   = "@m40#P@ssw0rd";
  var $odbc   = "";
  var $sql    = "";
 //construindo a conexao
 function conexaoODBC()
 {
  $this->conexao();
 }
 //criando a conexao
 function conexao()
 {
  $this->odbc = odbc_connect($this->dns,$this->user,$this->pass);
  if(!$this->odbc){odbc_error("Erro na conexao!");}
 }
 //criando query
 function query($sql)
 {
  $this->sql = $sql;
  if($result = odbc_exec($this->odbc,$this->sql)){return $result;} else{return 0;}
 }
 //fechando conexao
 function fechar()
 {
  return odbc_close($this->odbc);
 }
}
class conexaoMYSQL
{
 //variaveis da conexao
 var $host  = "orbitalservice.mysql.dbaas.com.br";
 var $login = "orbitalservice";
 var $senha = "a30aabbxx";
 var $db    = "orbitalservice";
 var $conn  = "";
 var $sql   = "";
 
 //contruindo a conexao
 function conexaoMYSQL()
 {
  $this->conexao();
 }
 //criando a conexao
 function conexao()
 {
  $this->conn = mysql_connect($this->host,$this->login,$this->senha);
  if(!$this->conn){die("Erro na conexao interna!");}
 }
 //criando query
 function query($sql)
 {
  $this->sql = $sql;
  if($result = mysql_db_query($this->db,$this->sql,$this->conn)){return $result;} else{return 0;}
 }
 //fechando conexao
 function fechar()
 {
  return mysql_close($this->conn);
 }
}
?>
