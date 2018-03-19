<?php
require 'src/config.php';

$sql = "SELECT * FROM usuarios";
$sql = $pdo->query($sql);


?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>
<body>
	<a href="src/adicionar.php">Adicionar Usuário...:</a>;

	<table class="listagem-dados">
		<th>Nome</th>
		<th>E-mail</th>
		<th>Senha</th>
		<th>Ações</th>
		<?php
		if ($sql->rowCount() > 0) {
			foreach ($sql->fetchAll() as $usuario) {
				echo '<tr>';
				echo '<td>'.$usuario['nome'].'</td>';
				echo '<td>'.$usuario['email'].'</td>';
				echo '<td>'.$usuario['senha'].'</td>';
				echo '<td><a href="src/editar.php?id='.$usuario['id'].'">Editar</a></td>';
				echo '<td><a href="src/excluir.php?id='.$usuario['id'].'">Excluir</a></td>';
				echo '<tr>';
			}
		}
		?>
	</table>
</body>
</html>