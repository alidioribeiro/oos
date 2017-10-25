<?php
	include("autentic/verifica.php");
	include("classes.php");
?>
<html>
<head>
   <link rel="stylesheet" href="css/stilo.css" type="text/css">
   <title>Inclus&acedil;o de Usu&aacute;rio</title>
</head>
<body>
<?php
//conexao com o banco de dados
$conexaoMYSQL = new conexaoMYSQL;
$conexaoMYSQL->conexaoMYSQL();

$sql   = "INSERT usuarios VALUES(default,'$_POST[nome]','$_POST[login2]','$_POST[email]','$_POST[setor]',md5('$_POST[senha2]'),'$_POST[admin]','$_POST[cliente]','$_POST[tecnico]','')";
$query = $conexaoMYSQL->query($sql);
if($query)
{
echo "<table class='b_tab'><tr class='titulo'><td>Mensagem!</td></tr><tr><td>Inclusão efetuada com sucesso.</td></tr><tr><td align='center'><input type='button' value=' OK ' onclick=location.href='usuarios.php' class='botao' /></td></tr></table>";
}
?>
</body>
</html>
