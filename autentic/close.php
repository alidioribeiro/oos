<?php
	include("../classes.php");
	
//finalizando sessão do usuario
session_start();

//conexao com o banco de dados
$conexaoMYSQL = new conexaoMYSQL;
$conexaoMYSQL->conexaoMYSQL();

$sql = "DELETE FROM online WHERE usuario='$_SESSION[login]' AND ip='$_SERVER[REMOTE_ADDR]'";
$query = $conexaoMYSQL->query($sql);

session_destroy();
?>
<script language="JavaScript">
location.href="../index.php";
</script>
