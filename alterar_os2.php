<?php
	include("classes.php");
	
	//conexao com o banco de dados
    $conexaoMYSQL = new conexaoMYSQL;
    $conexaoMYSQL->conexaoMYSQL();
?>
<html>
<head>
   <link rel="stylesheet" href="css/stilo.css" type="text/css">
   <title>Altera&ccedil;&acedil;o de OS</title>
</head>
<body>
<?php
//formatacao de data
$data = explode("/",$dataUp);
$dataUp = $data[2]."-".$data[1]."-".$data[0];

$sql   = "UPDATE os SET analista='$analistaUp',responsavel='$responsavelUp',empresa='$empresaUp',modulo='$moduloUp',data='$dataUp',entrada='$entradaUp',saida='$saidaUp',desconto='$descontoUp',descricao='$descricaoUp' WHERE id='$idUp2'";

$query = $conexaoMYSQL->query($sql);
if($query)
{
 echo "<table class='b_tab'><tr class='titulo'><td>Mensagem!</td></tr><tr><td>Alteração efetuada com sucesso.</td></tr><tr><td align='center'><input type='button' value=' OK ' onclick=location.href='oss.php' class='botao' /></td></tr></table>";
}
?>
</body>
</html>
