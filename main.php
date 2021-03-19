<?php
	$sql = "SELECT * FROM mensagem";
	
	$res = $conn->query($sql) or die($conn->error);
	$qtd = $res->num_rows;

	if($qtd > 0){
		print "<p>Encontrou <b>$qtd</b> resultado(s)</p>";
		print "<div class='table-responsive'>";
		print "<table class='table table-bordered table-striped table-hover' style='background-color: rgba(255,255,255,0.5);'>";
		print "<tr>";
		print "<th width='100'>#</th>";
		print "<th>Assunto</th>";
		print "<th width='100'>Data</th>";
		print "<th width='100'>Hora</th>";
		print "</tr>";
		while($row = $res->fetch_object()){
			print "<tr>";
			print "<td>".str_pad($row->id_mensagem , 5 , '0' , STR_PAD_LEFT)."</td>";
			print "<td><a href='?p=mensagem&id_mensagem=".$row->id_mensagem."'>".$row->assunto_mensagem."</a></td>";
			print "<td>".ExibeData($row->data_mensagem)."</td>";
			print "<td>".$row->hora_mensagem."</td>";
			print "</tr>";
		}
		print "</table>";
		print "</div>";
	}else{
		print "<div class='alert alert-danger'>Não foi encontrado resultado.</div>";
	}


?>