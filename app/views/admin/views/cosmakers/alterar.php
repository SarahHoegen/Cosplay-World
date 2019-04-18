<!--FORMULÁRIO-->

<h3 class="box-title">Edite o cosmaker</h3>
</div>

<form method="post" action="?acao=alterar" enctype="multipart/form-data">
    <div class="box-body">

        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="hidden" name="id" value="<?= $cosmaker->getId(); ?>">
            <input type="text" name="nome" class="form-control" value="<?= $cosmaker->getNome(); ?>" required pattern="[a-zA-Z0-9 ]+">
        </div>

        <div class="form-group">
            <label for="descricao">Descrição</label>
            <textarea name="descricao" cols="30" rows="3" class="form-control" required pattern="[a-zA-Z0-9 ]+"><?= $cosmaker->getDescricao(); ?></textarea>
        </div>

        <div class="form-group">
            <label for="funcao">Função</label>
            <input type="text" name="funcao" class="form-control" value="<?= $cosmaker->getFuncao(); ?>" required pattern="[a-zA-Z0-9 ]+">
        </div>

        <div class="form-group">
            <label for="link">Link</label>
            <input type="url" name="link" class="form-control" value="<?= $cosmaker->getLink(); ?>" required>
        </div>

        <div class="form-group">
            <label for="link2">Link Secundário</label>
            <input type="url" name="link2" class="form-control" value="<?= $cosmaker->getLink2(); ?>">
        </div>

        <div class="form-group">
            <label for="imagem">Imagem</label>
            <h2><img width="30%" src="<?= $baseURL ?>assets/imagens/<?= $cosmaker->imagem; ?>"/></h2>
            <p class="help-block">Coloque a imagem desejada</p>
            <input type="file" name="imagem" value="<?= $cosmaker->getImagem(); ?>">
        </div>

        <div class="box-footer">
            <button type="submit" name="gravar" class="btn btn-primary">Editar</button>
        </div>
</form>

<!--/FORMULÁRIO-->