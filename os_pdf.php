<?php
	require("pdml.php");
	include("classes.php");
	$arquivo = "os_".$data.".pdf";
	$PDML_FileName = $arquivo;

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
 //conexao com o banco de dados
 $conexaoMYSQL = new conexaoMYSQL;
 $conexaoMYSQL->conexaoMYSQL();
 
 $sql   = "SELECT * FROM os WHERE id='$_GET[id]'";
 $query = $conexaoMYSQL->query($sql);
 if($query)
 {
	 while($row = mysql_fetch_assoc($query))
	 {
		 $analista 			= $row['analista'];
		 $responsavel	= $row['responsavel'];
		 $empresa				= $row['empresa'];
		 $modulo					= $row['modulo'];
		 $data	   				= substr($row['data'],8,2)."/".substr($row['data'],5,2)."/".substr($row['data'],0,4);
		 $entrada				= $row['entrada'];
		 $saida						= $row['saida'];
		 $desconto				= $row['desconto'];
		 $descricao			= $row['descricao'];
		 $id			= $row['id'];
  	}
 }

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
?>
<html>
<head>
	<title>Ordem de Servi&ccedil;o</title>
</head>
<pdml>
<body>
<font size='10'>
	<cell width='60' align='right'><img src="logo1.jpg" height="50" width="150" /></cell>www.orbitalsolucoes.com.br  - comercial@orbitalsolucoes.com.br<cell height='40'></cell><br height='4cm' />

</font>
<b>
<font size='14'>
	 <cell height='20' width='300' align='center'>ORDEM DE SERVIÇO:</cell><cell><?php echo $id?></cell><br height='3cm' />
</font>
<font size='12'>
	<cell width='120'>NOME ANALISTA:</cell><cell><?php echo $analista?></cell><br height='0.5cm' />
    <cell width='120'>DATA:</cell><cell><?php echo $data?></cell><br height='0.5cm' />
    <cell width='120'>MÓDULO:</cell><cell><?php echo $modulo?></cell><br height='0.5cm' />
    <cell width='120'>ENTRADA:</cell><cell><?php echo $entrada?></cell><br height='0.5cm' />
    <cell width='120'>SAIDA:</cell><cell><?php echo $saida?></cell><br height='0.5cm' />
<?php
	if(isset($desconto))
	{
		?>
    <cell width='120'>DESCONTO:</cell><cell><?php echo $desconto?></cell><br height='0.5cm' />
        <?php
	}
?>
    <cell width='120'>TOTAL DE HORAS:</cell><cell><?php echo $horas?></cell><br height='2cm' />
    <cell width='500' align='center'>DESCRIÇÃO DETALHADA DA ATIVIDADE</cell><br height='0.5cm' />
    <multicell width='500' align='center'><?php echo $descricao?></multicell><br height='8cm' />
	<cell align='center' width=250>____________________________</cell><cell align='center' width=250>_______________________________</cell><br height='0.5cm' />
    <cell align='center' width=250><?php echo $responsavel?></cell><cell align='center' width=250><?php echo $analista?></cell><br height='0.5cm' />
    <cell align='center' width=250><?php echo strtoupper(substr($empresa,0,1)).substr($empresa,1,strlen($empresa))?></cell><cell align='center' width=250>Orbital</cell>
</font>
</b>
</body>
</pdml>
</html>
