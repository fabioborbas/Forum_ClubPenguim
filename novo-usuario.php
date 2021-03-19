<div class="row">
	<div class="col-lg-8 offset-lg-2">
		<div class="card">
			<div class="card-header">
				<h2>Novo Usuário</h2>
			</div>
			<div class="card-body">
				<form action="?p=salvar" method="POST" enctype="multipart/form-data">
					<input type="hidden" name="acao" value="novo-usuario">
					<div class="form-group">
						<label>Nome</label>
						<input type="text" name="nome_usuario" class="form-control">
					</div>
					<div class="form-group">
						<label>E-mail</label>
						<input type="email" name="email_usuario" class="form-control">
					</div>
					<div class="form-group">
						<label>Senha</label>
						<input type="password" name="senha_usuario" class="form-control">
					</div>
					<div class="form-group">
						<label>imagem do usuario</label><br>
						<input type="file" name="foto_usuario" class="form-control-file">
					</div>
					<input type="hidden" name="tipo_usuario" value="2">
					<div class="form-group">
						<button type="submit" name="enviar" class="btn btn-primary">Cadastrar</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>