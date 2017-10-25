<?php
	include("autentic/verifica.php");
	include("classes.php");
?>
<html>
<head>
   <link rel="stylesheet" href="css/stilo.css" type="text/css">
   <title>Inclus&acedil;o de OS</title>
</head>
<body>
<?php
//conexao com o banco de dados
$conexaoMYSQL = new conexaoMYSQL;
$conexaoMYSQL->conexaoMYSQL();

$data = explode("/",$data);
$data = $data[2]."-".$data[1]."-".$data[0];

$sql   = "INSERT os VALUES(default,'$analista','$responsavel','$empresa','$modulo','$data','$entrada','$saida','$desconto','$descricao',default)";
$query = $conexaoMYSQL->query($sql);
if($query)
{
 echo "<table class='b_tab'><tr class='titulo'><td>Mensagem!</td></tr><tr><td>Inclusão efetuada com sucesso.</td></tr><tr><td align='center'><input type='button' value=' OK ' onclick=location.href='oss.php' class='botao' /></td></tr></table>";
}
?>
</body>
</html>
