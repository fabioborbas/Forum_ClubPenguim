<div class="row">
	<div class="col-lg-12">
		<?php

			$sql = "SELECT * FROM mensagem as msg
					INNER JOIN usuario as usr
					ON msg.usuario_id_usuario = usr.id_usuario
					WHERE id_mensagem = ".$_GET["id_mensagem"];
			$res = $conn->query($sql) or die($conn->error);
			
			$row = $res->fetch_object();

			print "<h1>#".str_pad($row->id_mensagem , 5 , '0' , STR_PAD_LEFT)." ".$row->assunto_mensagem."</h1>";
			

			print '<div class="media mensagem">
					  <figure style="margin: 20px;">
					  <img src="img/'.$row->foto_usuario.'" class="align-self-start mr-3 rounded-circle" alt="..." width="80">
					  	  <figcaption>
					  	  	<b>'.$row->nome_usuario.'</b>
					  	  </figcaption>
					  </figure>
					  <div class="media-body">
					    <p><i>'.ExibeData($row->data_mensagem).' - '.$row->hora_mensagem.'</i></p>
					    <p>'.$row->texto_mensagem.'</p>
					  </div>
					</div>';

		?>
	</div>
</div>
<hr>
<?php
	$sql = "SELECT * FROM respostas as rsp
			INNER JOIN usuario as usr
			ON rsp.usuario_id_usuario = usr.id_usuario
			WHERE mensagem_id_mensagem = ".$_GET["id_mensagem"];
	$res = $conn->query($sql) or die($conn->error);

	while($row = $res->fetch_object()){
?>
<div class="row">
	<div class="col-lg-12">
		<?php						

			print '<div class="media mensagem">
					  <figure style="margin: 20px;">
					  <img src="img/'.$row->foto_usuario.'" class="align-self-start mr-3 rounded-circle" alt="..." width="80">
					  	  <figcaption>
					  	  	<b>'.$row->nome_usuario.'</b>
					  	  </figcaption>
					  </figure>
					  <div class="media-body">
					  	<p><i>'.ExibeData($row->data_respostas).' - '.$row->hora_respostas.'</i></p>
					    <p>'.$row->texto_respostas.'</p>
					  </div>
					</div>';

		?>
	</div>
</div>
<hr>
<?php } ?>
<div class="row">
	<div class="col-lg-12">		
		<form action="?p=salvar" method="POST">
			<input type="hidden" name="acao" value="nova-resposta">
			<input type="hidden" name="id_mensagem" value="<?php print $_GET["id_mensagem"]; ?>">
			<div class="form-group">
				<label>Mensagem:</label>
				<textarea rows="5" name="texto_respostas" class="form-control" required></textarea>
			</div>
			<div class="form-group">
			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-primary">Enviar</button>
			</div>
		</form>
	</div>	
</div>
