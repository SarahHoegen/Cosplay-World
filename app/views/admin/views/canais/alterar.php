<!--FORMULÁRIO-->

<h3 class="box-title">Edite o canal</h3>
</div>

<form method="post" action="?acao=alterar" enctype="multipart/form-data">
    <div class="box-body">

        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="hidden" name="id" value="<?= $canal->getId(); ?>">
            <input type="text" name="nome" class="form-control" value="<?= $canal->getNome(); ?>" required pattern="[a-zA-Z0-9 ]+">
        </div>

        <div class="form-group">
            <label for="descricao">Descrição</label>
            <textarea name="descricao" class="form-control" cols="50" rows="4" required pattern="[a-zA-Z0-9 ]+"> <?= $canal->getDescricao(); ?> </textarea>
        </div>

        <div class="form-group">
            <label for="link">Link</label>
            <input type="url" name="link" class="form-control" value="<?= $canal->getLink(); ?>" required>
        </div>

        <div class="form-group">
            <label for="exampleInputFile">Imagem</label>
            <h2><img width="30%" src="<?= $baseURL ?>assets/imagens/<?= $canal->imagem; ?>" required/></h2>
            <p class="help-block">Coloque a imagem desejada</p>
            <input type="file" name="imagem" value="<?= $canal->getImagem(); ?>">
        </div>

    <div class="box-footer">
        <button type="submit" name="gravar" class="btn btn-primary">Editar</button>
    </div>
</form>
</div>
</div>

</div>
</section>

<!--/FORMULÁRIO-->