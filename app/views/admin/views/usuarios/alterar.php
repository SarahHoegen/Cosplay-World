<h3 class="box-title">Alterar usuário</h3>
</div>

<form method="post" action="?acao=alterar" enctype="multipart/form-data">
    <div class="box-body">

        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="hidden" name="id" value="<?= $usuario->getIdUsuario(); ?>">
            <input type="text" name="nome" class="form-control" value="<?= $usuario->getNome(); ?>">
        </div>

        <div class="form-group">
            <label for="apelido">Apelido</label>
            <input type="text" name="apelido" class="form-control" value="<?= $usuario->getApelido(); ?>">
        </div>

        <div class="form-group">
            <label for="data_nasc">Data de Nascimento</label>
            <input type="date" name="data_nasc" class="form-control" value="<?= $usuario->getDataNasc(); ?>">
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" value="<?= $usuario->getEmail(); ?>">
        </div>

        <div class="form-group">
            <label for="senha">Senha</label>
            <input type="password" name="senha" class="form-control" value="<?= $usuario->getSenha(); ?>">
        </div>

        <div class="form-group">
            <label for="senha2">Confirmar a Senha</label>
            <input type="password" name="senha2" class="form-control" placeholder="Confirme a senha">
        </div>

        <div class="form-group">
            <label for="exampleInputFile">Imagem</label>
            <h2><img width="30%" src="<?= $baseURL ?>assets/imagens/<?= $usuario->imagem; ?>" /></h2>
            <p class="help-block">Coloque a imagem desejada.</p>
            <input type="file" name="imagem" value="<?= $usuario->getImagem(); ?>">
        </div>

    <div class="box-footer">
        <button type="submit" name="gravar" class="btn btn-primary">Editar</button>
    </div>
</form>
</div>
</div>

</div>
</section>