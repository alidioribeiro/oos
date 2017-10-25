<?php
	header('Content-type: application/msexcel');
	header('Content-Disposition: attachment; filename=relatorio_os.xls');
	include("classes.php");
   
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
<table>
	<tr>
    	<td>Analista: <?php echo $analista?></td>
	</tr>
    <tr>
    	<td>DATA</td>
    	<td>EMPRESA</td>
    	<td>ENTRADA</td>
    	<td>SAIDA</td>
    	<td>DESCONTO</td>
    	<td>HORAS</td>
	</tr>
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
	while($row = mysql_fetch_array($query))
	{
		$analista 		= $row[1];
		$responsavel	= $row[2];
		$empresa 		= $row[3];
		$data	   		= substr($row[4],8,2)."/".substr($row[4],5,2)."/".substr($row[4],0,4);
		$entrada		= $row[5];
		$saida			= $row[6];
		$desconto		= $row[7];
		$descricao		= $row[8];

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
    <cell width='70' border='1' height='20'><?php echo $data?></td>
    <cell width='120' border='1' height='20'><?php echo $empresa?></td>
    <cell width='90' border='1' height='20'><?php echo $entrada?></td>
    <cell width='90' border='1' height='20'><?php echo $saida?></td>
    <cell width='90' border='1' height='20'><?php echo $desconto?></td>
    <cell width='90' border='1' height='20'><?php echo $horas?></td><br height='20'>
<?
	}
}
?>
	<cell width='460' border='1' height='20'>TOTAL DE HORAS</td>
    <cell width='90' border='1' height='20'><?php echo converterHora($total)?></td>
    <br height='20'>
<?php
}
?>
	<cell width='460' border='1' height='20'>TOTAL GERAL DE HORAS</td>
    <cell width='90' border='1' height='20'><?php echo converterHora($totalg)?></td>
</body>
</pdml>
</html>
