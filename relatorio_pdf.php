<?php
	require("pdml.php");
	include("classes.php");
	$arquivo = "os_".$data.".pdf";
	$PDML_FileName = $arquivo;

    $dataini2 = explode("/",$dataini);
    $dataini  = $dataini2[2]."-".$dataini2[1]."-".$dataini2[0];
    $datafim2 = explode("/",$datafim);
    $datafim  = $datafim2[2]."-".$datafim2[1]."-".$datafim2[0];

 function converterHora($total_segundos)
 {

			$hora = sprintf("%02s",floor($total_segundos / (60*60)));
			$total_segundos = ($total_segundos % (60*60));

			$minuto = sprintf("%02s",floor ($total_segundos / 60 ));
			$total_segundos = ($total_segundos % 60);

			$hora_minuto = $hora.":".$minuto;
			return $hora_minuto;
  }
  function converterTempo($tempo)
  {
   $aux   = explode(":",$tempo);
   $tempo = $aux[0]*3600+$aux[1]*60;
   return $tempo;
  }
?>
<html>
<head>
	<title>Ordem de Servi&ccedil;o</title>
</head>
<pdml>
<body>
<font size='20'>
	<cell width='50' align='left'><img src="logo.jpg" height="40" width="40" /></cell><cell height='40'>Orbital Soluções</cell><br height='2cm' />
</font>
<b>
<font size='14'>
	<cell height='20' width='500'>Analista: <?echo $analista?></cell><br height='1.5cm' />
</font>
<b>
<font size='10'>
    <cell width='70' border='1' height='20' align='center' fillcolor='#cccccc'>DATA</cell>
    <cell width='120' border='1' height='20' align='center' fillcolor='#cccccc'>EMPRESA</cell>
    <cell width='90' border='1' height='20' align='center' fillcolor='#cccccc'>ENTRADA</cell>
    <cell width='90' border='1' height='20' align='center' fillcolor='#cccccc'>SAIDA</cell>
    <cell width='90' border='1' height='20' align='center' fillcolor='#cccccc'>DESCONTO</cell>
    <cell width='90' border='1' height='20' align='center' fillcolor='#cccccc'>HORAS</cell>
</b>
    <br height='20'>
<?php
$totalg = 0;
$empresas = array();

//conexao com o banco de dados
$conexaoMYSQL = new conexaoMYSQL;
$conexaoMYSQL->conexaoMYSQL();

$sql   = "SELECT DISTINCT(empresa) FROM os WHERE analista='$analista' AND data BETWEEN '$dataini' AND '$datafim' AND EXCLUIR='' ORDER BY data";
$query = $conexaoMYSQL->query($sql);
if($query)
{
	while($row = mysql_fetch_array($query))
	{
		array_push($empresas,$row['empresa']);
	}
}
for($i=0;$i<=count($empresas)-1;$i++)
{
	$total = 0;
$sql   = "SELECT * FROM os WHERE analista='$analista' AND empresa='$empresas[$i]' AND data BETWEEN '$dataini' AND '$datafim' AND EXCLUIR='' ORDER BY data";
$query = $conexaoMYSQL->query($sql);
if($query)
{
	while($row = mysql_fetch_assoc($query))
	{
		$analista 		= $row['analista'];
		$responsavel	= $row['responsavel'];
		$empresa 		= $row['empresa'];
		$data	   		= substr($row['data'],8,2)."/".substr($row['data'],5,2)."/".substr($row['data'],0,4);
		$entrada		= $row['entrada'];
		$saida			= $row['saida'];
		$desconto		= $row['desconto'];
		$descricao		= $row['descricao'];

		$horasent = strtotime($entrada);
		$horassai = strtotime($saida);
		if($horassai<=$horasent)
			$horassai += (24*3600);
		$horasa = $horassai-$horasent;
		if(isset($desconto))
		{
    	  $descontar = converterTempo($desconto);
    	  $horasa = $horasa-$descontar;
        }
		$horas = converterHora($horasa);
		$totalg += $horasa;
		$total  += $horasa;
?>
    <cell width='70' border='1' height='20'><?php echo $data?></cell>
    <cell width='120' border='1' height='20'><?php echo $empresa?></cell>
    <cell width='90' border='1' height='20'><?php echo $entrada?></cell>
    <cell width='90' border='1' height='20'><?php echo $saida?></cell>
    <cell width='90' border='1' height='20'><?php echo $desconto?></cell>
    <cell width='90' border='1' height='20'><?php echo $horas?></cell><br height='20'>
<?
	}
}
?>
	<cell width='460' border='1' height='20'>TOTAL DE HORAS</cell>
    <cell width='90' border='1' height='20'><?php echo converterHora($total)?></cell>
    <br height='20'>
<?php
}
?>
	<cell width='460' border='1' height='20'>TOTAL GERAL DE HORAS</cell>
    <cell width='90' border='1' height='20'><?php echo converterHora($totalg)?></cell>
</body>
</pdml>
</html>
