<?php
	//Iniciando uma sessão para o usuario
	session_start();
    $_SESSION["login"]   = $login;
    $_SESSION["senha"]   = $senha;
    $_SESSION["id"]      = $id;
    $_SESSION["cliente"] = $cliente;
    $_SESSION["setor"]   = $setor;
    $_SESSION["admin"]   = $admin;
    $_SESSION["tecnico"] = $tecnico;
    header("Location:../oss.php");
?>
