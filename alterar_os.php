<?php
	include("autentic/verifica.php");
	
//chamando arquivo de conexao
include("classes.php");

//instanciando classe para conexao local
$conexaoMYSQL = new conexaoMYSQL;
$conexaoMYSQL->conexaoMYSQL();

//	$conec	= mysql_connect("localhost","root","");
	$sql	= "SELECT * FROM os WHERE id='$idUp' AND EXCLUIR=''";
    $query = $conexaoMYSQL->query($sql);
	while ($linha = mysql_fetch_assoc($query))
	{
		$data 	   			= explode("-",$linha['data']);
		$data 	   			= $data[2]."/".$data[1]."/".$data[0];
		$analista  		= $linha['analista'];
		$responsavel	= $linha['responsavel'];
		$empresa   		= $linha['empresa'];
		$modulo					= $linha['modulo'];
		$entrada   		= $linha['entrada'];
		$saida	   			= $linha['saida'];
		$descricao 		= $linha['descricao'];
	}
?>
<html>
<head>
   <link rel="stylesheet" href="css/stilo.css" type="text/css">
</head>
<body>
<form name='form1' action="alterar_os2.php" method="post">
<br>
<table align="center" class='b_tab'>
<tr>
	<td colspan="2" align="center" class='titulo'><b>ALTERA&Ccedil;&Atilde;O DE OS</b></td>
</tr>
<tr>
	<td><strong>ANALISTA:</strong></td>
    <td>&nbsp;<select name="analistaUp" class="campo">
    	<option value='<?php echo $analista?>'><?php echo $analista?></option>
<?php
	$sql1	= "SELECT * FROM tecnicos WHERE EXCLUIR=''";
	$query1	= mysql_db_query("oos",$sql1,$conec);
	while ($linha1 = mysql_fetch_array($query1))
	{
?>
	<option value="<?php echo $linha1[1]?>"><?php echo $linha1[1]?></option>
<?php
	}
?>
	</select>
	</td>
</tr>
<tr>
	<td><strong>RESPONSAVEL:</strong></td>
    <td>&nbsp;<input type='text' name='responsavelUp' value='<?php echo $responsavel?>' class='campo' /></td>
</tr>
<tr>
    <td><strong>EMPRESA:</strong></td>
    <td>&nbsp;<select name='empresaUp' class='campo'><option value='<?php echo $empresa?>'><?php echo $empresa?></option><option value='lanaplast'>LanaPlast</option><option value='amazon'>Amazon</option><option value='springer'>Springer</option><option value='infocom'>InfoCom</option><option value='GD'>GD</option><option value='Marcodiesel'>Marcodiesel</option><option value='DiarioAM'>Diário AM</option><option value='PoloNorte'>Pólo Norte</option><option value='Cometais'>Cometais</option><option value='Roffor'>Roffor</option><option value='Prospect'>Prospect</option><option value='MotoNorte'>MotoNorte</option><option value='JetTech'>JetTech</option><option value='Norplast'>Norplast</option></select></td>
</tr>
<tr>
    <td><strong>MODULO:</strong></td>
    <td>&nbsp;<input type='text' name='moduloUp' class='campo' value="<?php echo $modulo?>" maxlength='7' /></td>
</tr>
<tr>
    <td><strong>DATA:</strong></td>
    <td>&nbsp;<input type='text' name='dataUp' value='<?php echo $data?>' size='10' class='campo' /></td>
</tr>
<tr>
    <td><strong>ENTRADA:</strong></td>
    <td>&nbsp;<input type='text' name='entradaUp' value='<?php echo $entrada?>' size='5' class='campo' /></td>
</tr>
<tr>
    <td><strong>SAIDA:</strong></td>
    <td>&nbsp;<input type='text' name='saidaUp' value='<?php echo $saida?>' size='5' class='campo' /></td>
</tr>
<tr>
    <td><strong>DESCONTO:</strong></td>
    <td>&nbsp;<input type='text' name='descontoUp' value='<?php echo $desconto?>' size='5' class='campo' />
    <input type='hidden' name='idUp2' value='<?php echo $idUp?>' /></td>
</tr>
<tr>
    <td><strong>DESCRI&Ccedil;&Atilde;O:</strong></td>
    <td>&nbsp;<textarea name='descricaoUp' class='area'><?php echo $descricao?></textarea></td>
</tr>
<tr>
    <td colspan='2' align="center"><input type='submit' class='botao' value=' ALTERAR '></td>
</tr>
</table>
</form>
</body>
</html>
