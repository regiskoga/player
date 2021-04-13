<?php 

session_start();
require_once('banco/db.class.php');
$db = Database::getInstance();
$link = $db->getConnection();

$txt_mensagem = $_POST['txt_mensagem'];
$transmissao  = $_SESSION['transmissao'];
$id_usuario   = $_SESSION['id_usuario'];

$sql = "INSERT INTO mensagem(id_usuario, transmissao, mensagem) VALUES('$id_usuario', '$transmissao', '$txt_mensagem')";

if (mysqli_query($link, $sql)) {
	echo "1";
} else {
	echo "0";
}

