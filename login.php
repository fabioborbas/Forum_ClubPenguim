<?php
	session_start();

	if(empty($_POST) or (empty($_POST["email"]) or (empty($_POST["senha"]) ) ) ){
		print "<script>location.href='login-form.php';</script>";
	}

	include("config.php");

	$email = $_POST["email"];
	$senha   = $_POST["senha"];

	$sql = "SELECT * FROM usuario WHERE email_usuario = '{$email}' AND senha_usuario  = '".md5($senha)."' AND status_usuario = '1' ";

	$res = $conn->query($sql) or die($conn->error);

	$row = $res->fetch_object();

	$qtd = $res->num_rows;

	if($qtd>0){
		$_SESSION["email"] = $email;
		$_SESSION["id"]    = $row->id_usuario;
		$_SESSION["foto"]  = $row->foto_usuario;
		$_SESSION["nome"]  = $row->nome_usuario;
		$_SESSION["tipo"]  = $row->tipo_usuario;
		print "<script>location.href='dashboard.php';</script>";
	}else{
		unset($email);
		print "<script>alert('Usuário e/ou senha incorretos ou usuário inativo.');</script>";
		print "<script>location.href='index.php';</script>";
	}
?>