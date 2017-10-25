<!DOCTYPE html>
<html lang="en">
  
  <head>
    <title>Orbital Services</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </head>
  
   <?php
	  include("classes.php");
		if(isset($enviar))		
	{
	 if(!empty($login) && !empty($senha))
	 {
	   // Recupera o login
	   $login2 = trim($login);
	   // Recupera a senha, a criptografando em MD5
	   $senha2 = md5(trim($senha));
	  
	  //instanciando classe
	  $conexaoMYSQL = new conexaoMYSQL();
	  //executando conexao com o banco
	  $conexaoMYSQL->conexao();
	  //efetuando consulta
	  $sql     = "SELECT id,cliente,adm,setor,tecnico FROM usuarios WHERE login='$login2' AND senha='$senha2'";
	  $query   = $conexaoMYSQL->query($sql);
	  $result  = mysql_fetch_row($query);
	  $id      = $result[0];
	  $cliente = $result[1];
	  $admin   = $result[2];
	  $setor   = $result[3];
	  $tecnico = $result[4];
	  $num     = mysql_num_rows($query);
	  //verificando resultado da consulta
	  if($num)
	  {
		 header("Location:autentic/login.php?login=$login2&senha=$senha2&id=$id&cliente=$cliente&admin=$admin&setor=$setor&tecnico=$tecnico");
	  }
	  else
	  {
		$msg = "Login ou senha incorretos!";
	   }
	  }
	}
	?>
  
  <body>

    <div class="container">
      <h2>Orbital Services</h2>
      <form name="frm" method="POST" action="index.php">   <!-- <form action="/action_page.php"> --> 
        <div class="form-group">
          <label for="Login">Login:</label>
          <input type="text" class="form-control" id="login" placeholder="Entre com Login" name="login">
        </div>
        <div class="form-group">
          <label for="pwd">Senha:</label>
          <input type="password" class="form-control" id="i_senha" placeholder="Entrar com senha" name="senha">
        </div>
        <div class="checkbox">
          <label><input type="checkbox" name="remember"> Lembrar me</label>
        </div>
        <button type="submit" class="btn btn-default">Entrar</button>
      </form>
    </div>

  </body>
</html>