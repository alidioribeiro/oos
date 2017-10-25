<?php
require_once ('jpgraph/jpgraph.php');
require_once ('jpgraph/jpgraph_line.php');

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

$totalg = 0;
$empresas = array();
$valores  = array();
$conec = mysql_connect("localhost","root","");
$sql   = "SELECT DISTINCT(empresa) FROM os WHERE analista='$analista' AND data BETWEEN '$dataini' AND '$datafim' AND EXCLUIR='' ORDER BY data";
$query = mysql_db_query("oos",$sql,$conec);
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
$query = mysql_db_query("oos",$sql,$conec);
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
	}
}
	array_push($valores,$total/3600);
}

// Setup the graph
$graph = new Graph(800,600);
$graph->SetScale('textlin');

$theme_class=new UniversalTheme;

$graph->SetTheme($theme_class);
$graph->img->SetAntiAliasing(false);
$graph->title->Set('Gráfico de Horas');
$graph->title->SetFont(FF_ARIAL,FS_BOLD,14);
$graph->SetBox(false);

$graph->img->SetAntiAliasing();

$graph->yaxis->HideZeroLabel();
$graph->yaxis->HideLine(false);
$graph->yaxis->HideTicks(false,false);

$graph->xgrid->Show();
$graph->xgrid->SetLineStyle("solid");
$graph->xaxis->SetTickLabels($empresas);
$graph->xgrid->SetColor('#E3E3E3');

// Create the first line
$p1 = new LinePlot($valores);
$graph->Add($p1);
$p1->value->SetFormat('%d');
$p1->value->Show();
$p1->SetColor("#6495ED");
$p1->SetLegend(trim($analista));

$graph->legend->SetFrameWeight(1);

// Output line
$graph->Stroke();
?>