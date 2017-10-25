<?php
	include("autentic/verifica.php");
	include("classes.php");
?>
<html>
<head>
   <link rel='stylesheet' href='css/stilo.css' type='text/css'>
</head>
<body>
<form name='form1' action="novo_usuario2.php" method="post">
<br>
<table align="center" class='b_tab'>
<tr>
	<td colspan="2" align="center" class='titulo'><b>INCLUS&Atilde;O DE NOVO USUARIO</b></td>
</tr>
<tr>
	<td><strong>NOME:</strong></td>
    <td>&nbsp;<input type='text' name='nome' class='campo' /></td>
</tr>
<tr>
	<td><strong>LOGIN:</strong></td>
    <td>&nbsp;<input type='text' name='login2' class='campo' /></td>
</tr>
<tr>
	<td><strong>EMAIL:</strong></td>
    <td>&nbsp;<input type='text' name='email' class='campo' /></td>
</tr>
<tr>
    <td><strong>SETOR:</strong></td>
    <td>&nbsp;<input type='text' name='setor' class='campo' /></td>
</tr>
<tr>
    <td><strong>SENHA:</strong></td>
    <td>&nbsp;<input type='password' name='senha2' class='campo' /></td>
</tr>
<tr>
    <td><strong>ADMINISTRADOR:</strong></td>
    <td>&nbsp;<select name='admin' class='campo'><option value='N'>Nao</option><option value='S'>Sim</option></select></td>
</tr>
<tr>
    <td><strong>TECNICO:</strong></td>
    <td>&nbsp;<select name='tecnico' class='campo'>
<?php
//conexao com o banco de dados
$conexaoMYSQL = new conexaoMYSQL;
$conexaoMYSQL->conexaoMYSQL();

$sql   = "SELECT * FROM tecnicos WHERE EXCLUIR='' ORDER BY nome";
$query = $conexaoMYSQL->query($sql);
while($row=mysql_fetch_assoc($query))
{
 $id_tec   = $row['id'];
 $nome_tec = $row['nome'];
 echo "<option value='".$nome_tec."'>".$nome_tec."</option>";
}
?>
</select></td>
</tr>
</tr>
    <td><strong>CLIENTE:</strong></td>
    <td>&nbsp;<input type='text' name='cliente' class='campo' /></td>
</tr>
<tr>
    <td colspan='2' align="center"><input type='submit' class='botao' value=' SALVAR '></td>
</tr>
</table>
</form>
</body>
</html>
