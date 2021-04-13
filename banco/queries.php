<?php

require_once('db.class.php');
$db = Database::getInstance();
$link = $db->getConnection();


function login($nome, $email, $transmissao)
{
	global $link;
	$link;
	$sql = "INSERT INTO usuario (email, nome, transmissao) VALUES ('$email', '$nome', '$transmissao')";
	mysqli_query($link, $sql);
	$last_id = mysqli_insert_id($link);

	$sql_log = "INSERT INTO acesso (id_usuario) VALUES ('$last_id')";
	mysqli_query($link, $sql_log);

	mysqli_close($link);
	return $last_id;
}

function  mensagens($id_transmissao)
{
	global $link;
	$link;
	$sql = "SELECT * FROM mensagem AS msg
	LEFT JOIN usuario AS us ON msg.id_usuario = us.id
	WHERE msg.transmissao = '$id_transmissao' ORDER BY msg.criacao DESC";
	$resultado = mysqli_query($link, $sql);
	return $resultado;
}


function q_live($id_transmissao){
	global $link;
	$link;
	$sql = "SELECT * FROM lives lv WHERE lv.id_live = '$id_transmissao'";	
	$resultado = mysqli_query($link, $sql);

	if($resultado){
		$dados = array();
		while($linha = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
			$dados[] = $linha;
		}
	} else {
		echo 'Erro na execução da consulta, favor entrar em contato com o admin do site';
	}
	foreach ($dados as $dado) {
	}
	if (isset($dado)){
		return $dado;	
	}	
}
function  q_dados($id_transmissao)
{
	global $link;
	$link;
	$sql = "SELECT *,DATE_FORMAT(DATE_SUB(msg.criacao,INTERVAL 3 HOUR),'%d/%m/%Y às %Hh%i') as sent FROM mensagem AS msg
	LEFT JOIN usuario AS us ON msg.id_usuario = us.id
	WHERE msg.transmissao = '$id_transmissao' ORDER BY msg.criacao DESC";
	$resultado = mysqli_query($link, $sql);
	//$dados = mysqli_fetch_array($resultado);
	return $resultado; 
}
?>
