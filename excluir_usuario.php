<?php
	include("autentic/verifica.php");
	include("classes.php");
?>
<html>
<head>
   <link rel="stylesheet" href="css/stilo.css" type="text/css">
   <title>Exclus&atilde;o de Usu&aacute;rio</title>
</head>
<body>
<?php
//conexao com o banco de dados
$conexaoMYSQL = new conexaoMYSQL;
$conexaoMYSQL->conexaoMYSQL();

$sql   = "UPDATE usuarios SET EXCLUIR='*' WHERE id='$id'";
$query = $conexaoMYSQL->query($sql);
if($query)
{
	echo "<table class='b_tab'><tr class='titulo'><td>Mensagem!</td></tr><tr><td>Exclus�o efetuada com sucesso.</td></tr><tr><td align='center'><input type='button' value='OK' onclick=location.href='usuarios.php' class='botao' /></td></tr></table>";
}
?>
</body>
</html>
