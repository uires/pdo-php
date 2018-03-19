<?php
require 'config.php';
if (isset($_POST['nome']) AND empty($_POST['nome']) == false) {
	if (isset($_POST['email']) AND empty($_POST['email']) == false) {
		$sql = "UPDATE usuarios SET nome = '$nome', email = '$email' WHERE id = '$id'";
		$sql = $pdo->query($sql);
		header("Location: ../index.php");
	}
}

if (isset($_GET['id']) AND empty($_GET['id']) == false) {
	$id = addslashes($_GET['id']);
	echo $id;
	$sql = "SELECT * FROM usuarios WHERE id = '$id'";
	$sql = $pdo->query($sql);
	if ($sql->rowCount() > 0) {
		$usuario = $sql->fetch();
	}

}
?>

<head>
	<link rel="stylesheet" type="text/css" href="../assets/css/style.css">
</head>
<form method="POST">
	Nome...:<br/>
	<input type="text" name="nome" value="<?php $usuario['nome'];?>"><br/>
	E-mail...:<br/>
	<input type="email" name="email" value="<?php $usuario['email'];?>"><br/>
	<input type="submit" name="Enviar">

</form>


