<?php
	include("autentic/verifica.php");
?>
<html>
<head>
   <link rel='stylesheet' href='css/stilo.css' type='text/css'>
</head>
<body>
<form name='form1' action="novo_tecnico2.php" method="post">
<br>
<table align="center" class='b_tab'>
<tr>
	<td colspan="2" align="center" class='titulo'><b>INCLUS&Atilde;O DE NOVO TECNICO</b></td>
</tr>
<tr>
	<td><strong>NOME:</strong></td>
    <td>&nbsp;<input type='text' name='nome' class='campo' /></td>
</tr>
<tr>
	<td><strong>COMPLETO:</strong></td>
    <td>&nbsp;<input type='text' name='nome_completo' class='campo' /></td>
</tr>
<tr>
	<td><strong>ADMISSAO:</strong></td>
    <td>&nbsp;<input type='text' name='admissao' class='campo'  /></td>
</tr>
<tr>
    <td><strong>FUNCAO:</strong></td>
    <td>&nbsp;<select name="funcao" class="campo">
    	<option value="analista">Analista</option>
        <option value="desenvolvedor">Desenvolvedor</option>
        <option value="consultor">Consultor</option>
    </select></td>
</tr>
<tr>
    <td><strong>CONTATO1:</strong></td>
    <td>&nbsp;<input type='text' name='contato1' class='campo' /></td>
</tr>
<tr>
    <td><strong>CONTATO2:</strong></td>
    <td>&nbsp;<input type='text' name='contato2' class='campo' /></td>
</tr>
<tr>
    <td><strong>EMAIL:</strong></td>
    <td>&nbsp;<input type='text' name='email' class='campo' /></td>
</tr>
<tr>
    <td colspan='2' align="center"><input type='submit' class='botao' value=' SALVAR '></td>
</tr>
</table>
</form>
</body>
</html>
