<?php
	include("autentic/verifica.php");
	include("classes.php");
?>
<html>
<head>
   <link rel='stylesheet' href='css/stilo.css' type='text/css'>
</head>
<body>
<form name='form1' action="grafico1.php" method="post">
<br>
<table align="center" class='b_tab'>
<tr>
	<td colspan="2" align="center" class='titulo'><b>PARAMETROS DE GR�FICO</b></td>
</tr>
<tr>
	<td><strong>ANALISTA:</strong></td>
    <td>&nbsp;<select name="analista" class="campo">
<?php
//conexao com o banco de dados
$conexaoMYSQL = new conexaoMYSQL;
$conexaoMYSQL->conexaoMYSQL();

$sql	= "SELECT * FROM tecnicos WHERE EXCLUIR=''";
$query = $conexaoMYSQL->query($sql);

	while ($linha = mysql_fetch_array($query))
	{
?>
	<option value="<?php echo $linha[1]?>"><?php echo $linha[1]?></option>
<?php
	}
?>
	</select>
	</td>
</tr>
<tr>
    <td><strong>INICIO:</strong></td>
    <td>&nbsp;<input type='text' name='dataini' size='10' class='campo' /></td>
</tr>
<tr>
    <td><strong>FIM:</strong></td>
    <td>&nbsp;<input type='text' name='datafim' size='10' class='campo' /></td>
</tr>
<tr>
    <td colspan='2' align="center"><input type='submit' class='botao' value=' GERAR '></td>
</tr>
</table>
</form>
</body>
</html>
