	<html>
	<head>
	   <link rel='stylesheet' href='css/stilo.css' type='text/css'>
	   <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
	   <meta http-equiv="X-UA-Compatible" content="IE=7" />
	<title>Orbital Service</title>

	  <script type="text/javascript"> 
		
	   alert("Ola Analista Orbital, caso seu login esteja travando favor comunicar, pois estamos em mudança de windows para linux.");
	  
	  </script>
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
	<form name="frm" method="POST" action="index.php">
		  <table class="login">
				 <tr>
					 <td colspan="4" align="center" class='titulo'>Orbital Service</td>
				 </tr>
				 <tr>
					 <td>usuario</td>
					 <td>senha</td>
					 <td>tema</td> 
				 </tr>
				 <tr>
					 <td><input type="text" name="login" class="campo"></td>
					 <td><input type="password" name="senha" class="campo" id="i_senha"></td>
						<td><select class="selecao" name="tema">
						  <option value="tema_padrao">Padr&atilde;o</option>
						  <option value="tema_vermelho">Vermelho</option>
						  <option value="tema_azul">Azul</option>
						</select></td> 
					 <td><input type="submit" name="enviar" value=" enviar " class="botao"></td>
				 </tr>
				 <tr>
					 <td colspan="3"><?echo $msg?>&nbsp;</td>
				 </tr>
		   <tr>
		 <td style="color:white" align="center">portugues</td>
		 <td style="color:white" align="center">english</td>
		 <td style="color:white" align="center">espa&ntilde;ol</td>
		   </tr>
		  </table>
	</form>
	</body>
	</html>



	

