<?php 
session_start();

require_once('banco/queries.php');
$video_id = $_GET['video_id'];
$executar = mensagens($_GET['video_id']);

foreach($executar as $dado) {?>
	<tr>
		<td><?=$dado['criacao']?></td>
		<td><?=$dado['nome']?></td>
		<td><?=$dado['email']?></td>
		<td style="width: 50%;"><?=$dado['mensagem']?></td>
	</tr>

<?php } ?>