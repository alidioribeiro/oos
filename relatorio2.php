<?php
	include("autentic/verifica.php");
?>
<html>
<head>
   <link rel='stylesheet' href='css/stilo.css' type='text/css'>
</head>
<body>
<form name='form1' action="relatorio2_pdf.php" method="post">
<br>
<table align="center" class='b_tab'>
<tr>
	<td colspan="2" align="center" class='titulo'><b>PARAMETROS DE RELATORIO</b></td>
</tr>
<tr>
    <td><strong>EMPRESA:</strong></td>
    <td>&nbsp;<select name='empresa' class='campo'>
                    <option value='WapKwj'>WapKwj</option>
                      <option value='Alianca'>Alianca</option>
                      <option value='lanaplast'>LanaPlast</option>
                      <option value='amazon'>Amazon</option>
                      <option value='springer'>Springer</option>
                      <option value='infocom'>InfoCom</option>
                      <option value='Veja'>Veja</option>
                      <option value='Marcodiesel'>Marcodiesel</option>
                      <option value='DiarioAM'>Diário AM</option>
                      <option value='PoloNorte'>Pólo Norte</option>
                      <option value='Roffor'>Roffor</option>
                      <option value='MotoNorte'>MotoNorte</option>
                      <option value='JetTech'>JetTech</option>
                      <option value='Batara'>Batara</option>
                      <option value='Trevo'>Trevo</option>
                      <option value='Powertech'>Powertech</option>
                      <option value='Marcolar'>Marcolar</option>
                      <option value='Qualifarma'>Qualifarma</option>
                      <option value='Pam'>Pam</option>
                      <option value='Norplast'>Norplast</option>
                      <option value='Avx'>Avx</option>
                      <option value='Prospect'>Prospect</option></select></td>
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
