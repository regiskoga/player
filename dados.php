<?php
session_start();

require_once('banco/queries.php');
$video_id = $_GET['video_id'];
$result = q_dados($_GET['video_id']);
if ($result){
	$rows = array();
  	while($row = mysqli_fetch_array($result)){
    	$rows[] = $row;
  	}
} else {
  echo 'Erro na execução da consulta';
}
echo json_encode($rows);
?>