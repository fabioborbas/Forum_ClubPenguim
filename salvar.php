<?php
	switch ($_REQUEST["acao"]) {
		case 'novo-ticket':
			$sql = "INSERT INTO mensagem (usuario_id_usuario, assunto_mensagem, texto_mensagem, data_mensagem, hora_mensagem
			) VALUES (
			".$_SESSION["id"].",
			 '".$_POST["assunto"]."',
			 '".$_POST["mensagem"]."',
			 '".date("Y-m-d")."', 
			 '".date("H:i:s")."'
			)";

			$res = $conn->query($sql) or die($conn->error);

			if($res==true){
				print "<div class='alert alert-success'>Forum aberto com sucesso. Aguarde nosso contato!</div>";
			}else{
				print "<div class='alert alert-danger'>Não foi possível abrir um novo grupo no forum.</div>";
			}//nao consegui fazer ir pra pagina
			print "<a href='dashboard.php' class='btn btn-primary'>Consultar Foruns</a>";
		break;

		case 'nova-resposta':
			$sql = "INSERT INTO `respostas` (`id_respostas`, `mensagem_id_mensagem`, `usuario_id_usuario`, `texto_respostas`, `data_respostas`, `hora_respostas`) VALUES (NULL, '".$_POST["id_mensagem"]."', '".$_SESSION["id"]."', '".$_POST["texto_respostas"]."', '".date("Y-m-d")."', '".date("H:i:s")."');";
			$res = $conn->query($sql) or die($conn->error);

			if($res==true){
				print "<div class='alert alert-success'>Resposta realizada!</div>";
			}else{
				print "<div class='alert alert-danger'>Não foi possível salvar a resposta.</div>";
			}//nao consegui fazer ir pra pagina


		break;

		case "novo-usuario":
			//upload da imagem para a pasta
			$pasta = "img/";

			$tmp_name = $_FILES["foto_usuario"]["tmp_name"];
			$nome = $_FILES["foto_usuario"]["name"];
			$cod = date("dmY-His") . "-" .  $_FILES["foto_usuario"]["name"];
			$uploadfile = $pasta . basename($cod);			
			if(move_uploaded_file($tmp_name, $uploadfile)){

				$sql = "INSERT INTO usuario (nome_usuario, email_usuario, senha_usuario, tipo_usuario, foto_usuario) VALUES ('".$_POST["nome_usuario"]."', '".$_POST["email_usuario"]."', '".md5($_POST["senha_usuario"])."', '".$_POST["tipo_usuario"]."', '".$cod."')";
				$res = $conn->query($sql) or die($conn->error);
				if($res==true){
					print "<script>alert('Usuário cadastrado com sucesso!');</script>";
					print "<script>location.href='?p=login-form';</script>";
				}else{
					print "<script>alert('Não foi possível cadastrar');</script>";
					print "<script>location.href='?p=novo-usuario';</script>";
				}
			}else{
				print "<script>alert('Não foi possível carregar a imagem.');</script>";
				print "<script>location.href=?p=novo-usuario';</script>";
			}
			

		break;

		case "status-usuario":
			if($_GET["status"]==1){
				$sql = "UPDATE usuario SET status_usuario='0' WHERE id_usuario=".$_GET["id_usuario"];
			}else{
				$sql = "UPDATE usuario SET status_usuario='1' WHERE id_usuario=".$_GET["id_usuario"];
			}
			$res = $conn->query($sql) or die($conn->error);
			if($res==true){
				print "<script>alert('Alterado com sucesso!');</script>";
				print "<script>location.href='?p=listar-usuarios';</script>";
			}else{
				print "<script>alert('Não foi possível alterar');</script>";
				print "<script>location.href='?p=listar-usuarios';</script>";
			}
		break;		
	}
?>