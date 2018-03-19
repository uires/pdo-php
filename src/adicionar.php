<?php
require 'config.php';

if((isset($_POST['nome']) AND empty($_POST['nome']) == false) AND (isset($_POST['email']) AND empty($_POST['email']) == false) AND isset($_POST['senha']) AND empty($_POST['senha']) == false){
	$nome = addslashes($_POST['nome']);
	$email = addslashes($_POST['email']);
	$senha = md5(addslashes($_POST['senha']));

	$queryAdicionar = "INSERT INTO usuarios (nome, email, senha) VALUES ('$nome', '$email', '$senha')";
	$queryAdicionar = $pdo->query($queryAdicionar);
	header("Location: ../index.php");
}else{
	echo '<div class="text-danger">Envie o formulário com os dados!</div>';	
}?>


<link rel="stylesheet" type="text/css" href="../assets/css/style.css">
<form method="POST">
	Nome:<br>
	<input type="text" name="nome" placeholder="Digite o nome"><br/>
	E-mail:<br/>
	<input type="email" name="email" placeholder="Digite seu e-mail"><br/>
	Senha<br/>
	<input type="password" name="senha" placeholder="Digite sua senha"><br/><br/>
	<input type="submit" name="enviar">	
</form>

<table>
	<th>Nome</th>
	<th>E-mail</th>

	<?php

	$sql = "SELECT * FROM usuarios";
	$sql = $pdo->query($sql);

	if ($sql->rowCount() > 0) {
		foreach ($sql->fetchAll() as $usuario) {
			echo '<tr class="tabela-ordenacao">';
			echo "<td>Nome: ".$usuario['nome']."</td>";
			echo "<td>E-mail: ".$usuario['email']."</td>";
			echo "</tr>";
		}
	}?>	
</table>