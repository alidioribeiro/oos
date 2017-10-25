<?php
	include("paginacao.php");
	include("autentic/verifica.php");
	include("classes.php");
?>
<html>
<head>
   <link rel='stylesheet' href='css/stilo.css' type='text/css'>
   <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/funcoes.js"></script>
<script language="javascript">
i=0
function abre_pesquisa()
{
	document.getElementById('barra2').style.display='block'
}
function selecionado(id)
{
	document.getElementById(id).style.background = '#C0C0C0'
	document.getElementById(id).style.cursor = 'pointer'
}
function deselecionado(id)
{
	document.getElementById(id).style.background = '#FFFFFF'
}
function excluir(id)
{
 var confirma = confirm("Deseja realmente excluir o registro?")
 if(confirma)
  location.href = "excluir_tecnico.php?id="+id
}
</script>
<title>OS de Servi&ccedil;os</title>
</head>
<body>
<div id="popup"></div>
<div id='barra'>
<table class="menu" cellpadding="2" cellspacing="2">
	<tr>
    	<td onClick="location.href='oss.php'">&nbsp;HOME&nbsp;</td>
    	<td onClick="location.href='novo_tecnico.php'">&nbsp;NOVO&nbsp;</td>
    	<td onClick="location.href='autentic/close.php'">&nbsp;SAIR&nbsp;</td>
    </tr>
</table>
</div>
<div id='pesquisa'>
<form action="tecnicos.php" method="post">
<table cellpadding="2" cellspacing="2">
	<tr>
    	<td>PESQUISA</td>
    	<td><input type='text' name='pesq' class='campo' title="pesquisa por data" /></td>
        <td><input type='submit' value='IR' class='botao' style='width:50px' /></td>
    </tr>
</table>
</form>
</div>
<table class="b_tab">
<tr class='titulo'>
    <td>NOME</td>
	<td>FUNCAO</td>
    <td>ADMISSAO</td>
    <td>ACAO</td>
</tr>
<?php
if(!isset($pagina))
	$pagina = 1;

//conexao com o banco de dados
$conexaoMYSQL = new conexaoMYSQL;
$conexaoMYSQL->conexaoMYSQL();

if(!empty($pesq))
{
	$sql   = "SELECT * FROM tecnicos WHERE nome='$pesq' AND EXCLUIR='' ORDER BY nome";
}
else
{
	$sql   = "SELECT * FROM tecnicos WHERE EXCLUIR='' ORDER BY nome";
}
$query = $conexaoMYSQL->query($sql);
$num=mysql_num_rows($query);
$total_reg = 10;
$total_paginas = paginacao01($num,$total_reg);
$linha_inicial = ($pagina - 1) * $total_reg;
$linha_final = $linha_inicial + $total_reg - 1;

if($query)
{
	$marcador = 0;
	$cont = 0;
	while ($linha = mysql_fetch_row($query))
	{
		if ($marcador >= $linha_inicial and $marcador <= $linha_final)
		{
			$id		  = $linha[0];
			$nome     = $linha[1];
			$funcao   = $linha[3];
			$admissao = $linha[4];
		echo "<tr id=".$marcador." onmouseover='selecionado(".$marcador.")' onmouseout='deselecionado(".$marcador.")'><td>".$nome."</td><td>".$funcao."</td><td>".$admissao."</td><td><img src='drop.png' onclick=excluir('".$linha[0]."') title='clique para excluir o registro'></td></tr>";
		 }
			$marcador++;
	}
}

$link="tecnicos.php";
echo "<tr><td class='paginacao' colspan='7' align='center'>";
paginacao02($total_paginas,$pagina,$link,$var);
echo "</td></tr>";
?>
</table>
<div id='barra3'>Copyright - Orbital Soluções 2011</div>
</body>
</html>
