<div class="row">
	<div class="col-lg-8 offset-lg-2">
		<div class="card">
			<div class="card-header">
				<h2>Nova Discussão</h2>
			</div>
			<div class="card-body">
				<form action="?p=salvar" method="POST">
					<input type="hidden" name="acao" value="novo-ticket">
					<div class="form-group">
						<label>Assunto</label>
						<input type="text" name="assunto" class="form-control">
					</div>
					<div class="form-group">
						<label>Mensagem</label>
						<textarea rows="10" name="mensagem" class="form-control"></textarea>
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-primary">Enviar Ticket</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>