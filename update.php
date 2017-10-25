<?php
$conec = mysql_connect("localhost","root","");
$sql   = "UPDATE OS SET nome='Alidio Ribeiro' WHERE nome like '%ALIDIO%'";
$query = mysql_db_query("oos",$sql,$conec);
if($query)
{
	echo "<table style='border: 1px #050 solid' align='center' valign='middle'><tr style='background:#050;color:#fff'><td>Mensagem!</td></tr><tr><td>Alteração efetuada com sucesso.</td></tr><tr><td align='center'><input type='button' value='OK' onclick=location.href='oss.php' style='background:#050;	border: 1px #050 solid; color:#FFF; height: 25px; font-weight: bold;' /></td></tr></table>";
}
?>
