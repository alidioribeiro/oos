<?php
	include("autentic/verifica.php");
	include("classes.php");
?>
<html>
<head>
   <link rel="stylesheet" href="css/stilo.css" type="text/css">
   <title>Inclus&acedil;o de T&eacute;cnico</title>
</head>
<body>
<?php
//conexao com o banco de dados
$conexaoMYSQL = new conexaoMYSQL;
$conexaoMYSQL->conexaoMYSQL();

//transformando data
$admissao = explode("/",$admissao);
$admissao = $admissao[2]."-".$admissao[1]."-".$admissao[0];

$sql   = "INSERT tecnicos VALUES(default,'$nome','$nome_completo','$funcao','$admissao','$contato1','$contato2','$email',default)";
$query = $conexaoMYSQL->query($sql);
if($query)
{
 echo "<table class='b_tab'><tr class='titulo'><td>Mensagem!</td></tr><tr><td>Inclusão efetuada com sucesso.</td></tr><tr><td align='center'><input type='button' value=' OK ' onclick=location.href='tecnicos.php' class='botao' /></td></tr></table>";
}
?>
</body>
</html>
