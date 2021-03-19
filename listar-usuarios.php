<?php

	$sql = "SELECT * FROM usuario";
	$res = $conn->query($sql) or die($conn->error);
	$qtd = $res->num_rows;

	if($qtd > 0){
		print "<p>Encontrou <b>$qtd</b> resultado(s)</p>";
		print "<div class='table-responsive'>";
		print "<table class='table table-bordered table-striped table-hover' style='background-color: rgba(255,255,255,0.5);'>";
		print "<tr>";
		print "<th width='100'>#</th>";
		print "<th>Nome</th>";
		print "<th>E-mail</th>";
		print "<th>Perfil</th>";
		print "<th width='50'>Status</th>";
		print "</tr>";
		while($row = $res->fetch_object()){
			print "<tr>";
			print "<td>".$row->id_usuario."</td>";
			print "<td>".$row->nome_usuario."</td>";
			print "<td>".$row->email_usuario."</td>";
			if($row->tipo_usuario==1){
				$tipo = "Administrador";
			}else{
				$tipo = "Usuário";
			}
			print "<td>".$tipo."</td>";
			if($row->status_usuario=='1'){
				$status = '<i class="fas fa-thumbs-up text-success"></i>';
			}else{
				$status = '<i class="fas fa-thumbs-down text-danger"></i>';
			}
			print "<td><a href='?p=salvar&acao=status-usuario&id_usuario=".$row->id_usuario."&status=".$row->status_usuario."'>".$status."</a></td>";
			print "</tr>";
		}
		print "</table>";
		print "</div>";
	}else{
		print "<div class='alert alert-danger'>Não foi encontrado resultado.</div>";
	}


?>