<?php
  include("autentic/verifica.php");
  include("classes.php");
?>
<html>
<head>
   <link rel="stylesheet" href="css/stilo.css" type="text/css">
</head>
<body>
<form name='form1' action="nova_os2.php" method="post">
<br>
<table align="center" class='b_tab'>
<tr>
  <td colspan="2" align="center" class='titulo'><b>INCLUS&Atilde;O DE NOVA OS</b></td>
</tr>
<tr>
  <td><strong>ANALISTA:</strong></td>
    <td>&nbsp;<select name="analista" class="campo">
<?php
//conexao com o banco de dados
$conexaoMYSQL = new conexaoMYSQL;
$conexaoMYSQL->conexaoMYSQL();

$sql  = "SELECT * FROM tecnicos WHERE EXCLUIR=''";
$query = $conexaoMYSQL->query($sql);

  while ($linha = mysql_fetch_assoc($query))
  {
?>
  <option value="<?php echo $linha['nome']?>"><?php echo $linha['nome']?></option>
<?php
  }
?>
  </select>
  </td>
</tr>
<tr>
  <td><strong>RESPONSAVEL:</strong></td>
    <td>&nbsp;<input type='text' name='responsavel' class='campo' /></td>
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
                      <option value='DiarioAM'>Diario AM</option>
                      <option value='PoloNorte'>Polo Norte</option>
                      <option value='Cometais'>Cometais</option>
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
                      <option value='Tutiplast'>Tutiplast</option>
                      <option value='Sakura'>Sakura</option>
                      <option value='SenseBike'>SenseBike</option>
                      <option value='Diniz'>Diniz</option>  
                      <option value='Prospect'>Prospect</option></select></td>
</tr>
<tr>
    <td><strong>MODULO:</strong></td>
    <td>&nbsp;<input type='text' name='modulo' class='campo' maxlength='7' /></td>
</tr>
<tr>
    <td><strong>DATA:</strong></td>
    <td>&nbsp;<input type='text' name='data' value='<?php echo $datah?>' size='10' class='campo' /></td>
</tr>
<tr>
    <td><strong>ENTRADA:</strong></td>
    <td>&nbsp;<input type='text' name='entrada' size='5' class='campo' /></td>
</tr>
<tr>
    <td><strong>SAIDA:</strong></td>
    <td>&nbsp;<input type='text' name='saida' size='5' class='campo' /></td>
</tr>
<tr>
    <td><strong>DESCONTO:</strong></td>
    <td>&nbsp;<input type='text' name='desconto' size='5' class='campo' /></td>
</tr>
<tr>
    <td><strong>DESCRI&Ccedil;&Atilde;O:</strong></td>
    <td>&nbsp;<textarea name='descricao' class='area'></textarea></td>
</tr>
<tr>
    <td colspan='2' align="center"><input type='submit' class='botao' value=' SALVAR '></td>
</tr>
</table>
</form>
</body>
</html>
