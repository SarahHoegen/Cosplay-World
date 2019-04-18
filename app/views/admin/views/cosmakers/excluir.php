<!--FORMULÁRIO-->

<h3 class="box-title">Excluir cosmaker</h3>
</div>

<form method="post" action="?acao=excluir" enctype="multipart/form-data">
    <div class="box-body">

        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="hidden" name="id" value="<?= $cosmaker->getId(); ?>"/>
            <input type="text" name="nome" class="form-control" value="<?= $cosmaker->getNome(); ?>" readonly/>
        </div>

        <div class="form-group">
            <label for="descricao">Descrição</label>
            <textarea name="descricao" class="form-control" cols="50" rows="4" readonly><?= $cosmaker->getDescricao(); ?> </textarea>
        </div>

        <div class="form-group">
            <label for="funcao">Função</label>
            <input type="text" name="funcao" class="form-control" value="<?= $cosmaker->getFuncao(); ?>" readonly/>
        </div>

        <div class="form-group">
            <label for="link">Link</label>
            <input type="url" name="link" class="form-control" value="<?= $cosmaker->getLink(); ?>" readonly/>
        </div>

        <div class="form-group">
            <label for="link2">Link Secundário</label>
            <input type="url" name="link2" class="form-control" value="<?= $cosmaker->getLink2(); ?>" readonly/>
        </div>

        <div class="form-group">
            <label for="imagem">Imagem</label>
            <h2><img width="30%" src="<?= $baseURL ?>assets/imagens/<?= $cosmaker->imagem; ?>" /></h2>
            <input type="file" name="imagem" value="<?= $cosmaker->getImagem(); ?>" disabled/>
        </div>

        <div class="box-footer">
            <button type="submit" name="gravar" class="btn btn-primary">Excluir</button>
        </div>
</form>

<!--/FORMULÁRIO-->