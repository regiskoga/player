<?php
session_start();
require "banco/queries.php";

$nome                    = $_POST['nome'];
$email                   = $_POST['email'];
$transmissao             = $_POST['video_id'];
//$_SESSION['transmissao'] = $transmissao;

if ($nome != 'admin') {

	$_SESSION['id_usuario'] = login($nome, $email, $transmissao);
	$_SESSION['nome']       = $nome;
	$_SESSION['email']      = $email;
	$_SESSION['transmissao']= $transmissao;
	
	
	header("location: transmissao.php?video_id=$transmissao");

} else {
	header("location: admin.php");
}
echo $transmissao. $_POST['video_id'];
?>