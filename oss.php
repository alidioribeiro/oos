<?php
	include("paginacao.php");
	include("autentic/verifica.php");
	include("classes.php");
?>
<html>
<head>
   <link rel="stylesheet" href="css/stilo.css" type="text/css">
   <meta http-equiv="content-type" content="text/html; charset=ISO-8859-1" >
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
  location.href = "excluir_os.php?id="+id
}
</script>
<title>OS de Servi&ccedil;os</title>
</head>
<body>
<div id='barra'>
<table class="menu" cellpadding="2" cellspacing="2">
	<tr>
       	<?php
        if($_SESSION['login'] == "administrador")
       	{
        ?>
    	<td onClick="location.href='oss.php'">&nbsp;HOME&nbsp;</td>
    	<td onClick="location.href='nova_os.php'">&nbsp;NOVA&nbsp;</td>
    	<td onClick="location.href='usuarios.php'">&nbsp;USUARIOS&nbsp;</td>
    	<td onClick="location.href='tecnicos.php'">&nbsp;TECNICOS&nbsp;</td>
    	<td onClick="location.href='relatorio.php'">&nbsp;REL_TEC&nbsp;</td>
    	<td onClick="location.href='relatorio3.php'">&nbsp;REL_TEC2&nbsp;</td>
    	<td onClick="location.href='relatorio2.php'">&nbsp;REL_EMP&nbsp;</td>
    	<td onClick="location.href='relatorio4.php'">&nbsp;REL_EMP2&nbsp;</td>
    	<td onClick="location.href='relatorio5.php'">&nbsp;REL_EMP3&nbsp;</td>
    	<td onClick="location.href='autentic/close.php'">&nbsp;SAIR&nbsp;</td>
    	<?php
    	}
    	else
    	{
    	?>
    	<td onClick="location.href='oss.php'">&nbsp;HOME&nbsp;</td>
    	<td onClick="location.href='nova_os.php'">&nbsp;NOVA&nbsp;</td>
    	<td onClick="location.href='relatorio.php'">&nbsp;REL_TEC&nbsp;</td>
    	<td onClick="location.href='relatorio3.php'">&nbsp;REL_TEC2&nbsp;</td>
    	<td onClick="location.href='relatorio5.php'">&nbsp;REL_EMP3&nbsp;</td>
    	<td onClick="location.href='autentic/close.php'">&nbsp;SAIR&nbsp;</td>
    	<?php
    	}
    	?>
    </tr>
</table>
</div>
<div id='pesquisa'>
<form action="oss.php?pagina=1" method="post">
<table cellpadding="2" cellspacing="2">
	<tr>
    	<td>PESQUISA</td>
    	<td><input type='text' name='pesq' class='campo' title="pesquisa por data" /></td>
    	<td>
        	<select name="pesq2" class='campo'>
            	<option value=""></option>
            	<?php
                if($_SESSION['login'] == "administrador")
            	{
                ?>
            	<option value="analista">Analista</option>
            	<?php
                }
                ?>
                <option value="data">Data</option>
                <option value="empresa">Empresa</option>
            </select>
		</td>
        <td><input type='submit' value='IR' class='botao' style='width:50px' /></td>
    </tr>
</table>
</form>
</div>
<table class="b_tab">
<tr class='titulo'>
	<td>DATA</td>
	<td>ANALISTA</td>
	<td>EMPRESA</td>
	<td>MÓDULO</td>
	<td>ENTRADA</td>
	<td>SAIDA</td>
	<td>DESCRICAO</td>
	<td>ACAO</td>
</tr>
<?php
if(!isset($pagina))
{
	$pagina = 1;
}
//conexao com o banco de dados
$conexaoMYSQL = new conexaoMYSQL;
$conexaoMYSQL->conexaoMYSQL();

$var     = "pesq=".$pesq."&pesq2=".$pesq2;
$tecnico = $_SESSION['tecnico'];
$filtro  = "";
if($tecnico != "administrador")
{
 $filtro = "AND analista='$tecnico'";
}
if(!empty($pesq2))
{
	if($pesq2 == "data")
	{
		$pesq = explode("/",$pesq);
		$pesq = $pesq[2]."-".$pesq[1]."-".$pesq[0];
		$sql  = "SELECT * FROM os WHERE data='$pesq' $filtro AND EXCLUIR='' ORDER BY id DESC";
	}
	elseif($pesq2 == "analista")
	{
		$sql   = "SELECT * FROM os WHERE analista like '%$pesq%' $filtro AND EXCLUIR='' ORDER BY id DESC";
	}
	elseif($pesq2 == "empresa")
	{
		$sql   = "SELECT * FROM os WHERE empresa like '%$pesq%' $filtro AND EXCLUIR='' ORDER BY id DESC";
	}
}
else
{
	$sql   = "SELECT * FROM os WHERE EXCLUIR='' $filtro ORDER BY id DESC";
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
	while ($linha = mysql_fetch_assoc($query))
	{
		if ($marcador >= $linha_inicial and $marcador <= $linha_final)
		{
			$id							 = $linha['id'];
			$data					 = explode("-",$linha['data']);
			$data					 = $data['2']."/".$data['1']."/".$data['0'];
			$analista  = $linha['analista'];
			$empresa   = $linha['empresa'];
			$modulo			 = $linha['modulo'];
			$entrada		 = $linha['entrada'];
			$saida	   	 = $linha['saida'];
			$descricao = $linha['descricao'];
		echo "<tr id=".$marcador." onmouseover='selecionado(".$marcador.")' onmouseout='deselecionado(".$marcador.")'><td>".$data."</td><td>".$analista."</td><td>".$empresa."</td><td>".$modulo."</td><td>".$entrada."</td><td>".$saida."</td><td>".substr($descricao,0,20).'...'."</td><td><img src='drop.png' onclick=excluir('".$id."') title='clique para excluir o registro'>&nbsp;<img src='edit.png' onclick=location.href='alterar_os.php?idUp='+'".$id."' title='clique para alterar sua OS'>&nbsp;<img src='pdf.gif' onclick=location.href='os_pdf.php?id='+'".$id."' title='clique para ver o PDF'></td></tr>";
		 }
			$marcador++;
	}
}
$link= "oss.php?".$var;
echo "<tr><td class='paginacao' colspan='8' align='center'>";
paginacao02($total_paginas,$pagina,$link,$var);
echo "</td></tr>";
?>
</table>
<div id='barra3'>Copyright - Orbital Soluções 2011</div>
</body>
</html>
