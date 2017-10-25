<?php
$titulo  = "uma nova OS foi criada";
$email   = "verifique em <a href='splam.orbitalsolucoes.com.br/oos'>Orbital Service</a>";
$destino = "cayo.cesar@orbitalsolucoes.com.br";
// O remetente deve ser um e-mail do seu domínio conforme determina a RFC 822.
// O return-path deve ser ser o mesmo e-mail do remetente.
$headers = "MIME-Version: 1.1\r\n";
$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
$headers .= "From: cayo.cesar@orbitalsolucoes.com.br\r\n"; // remetente
//$headers .= "Return-Path: eu@seudominio.com\r\n"; // return-path
$envio = mail($destino, $titulo, $email, $headers);
 
if($envio)
 echo "Mensagem enviada com sucesso";
else
 echo "A mensagem não pode ser enviada";
?>