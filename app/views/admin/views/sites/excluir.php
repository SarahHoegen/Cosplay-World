<!--FORMULÁRIO-->

<h3 class="box-title">Exclua o site</h3>
</div>

<form method="post" action="?acao=excluir" enctype="multipart/form-data">
    <div class="box-body">

        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="hidden" name="id" value="<?= $site->getId(); ?>" readonly/>
            <input type="text" name="nome" class="form-control" value="<?= $site->getNome(); ?>" readonly/>
        </div>

        <div class="form-group">
            <label for="descricao">Descrição</label>
            <textarea name="descricao" class="form-control" cols="50" rows="4" readonly> <?= $site->getDescricao(); ?> </textarea>
        </div>

        <div class="form-group">
            <label for="link">Link</label>
            <input type="url" name="link" class="form-control" value="<?= $site->getLink(); ?>" readonly/>
        </div>

        <div class="form-group">
            <label for="imgem">Imagem</label>
            <h2><img width="30%" src="<?= $baseURL ?>assets/imagens/<?= $site->imagem; ?>" /></h2>
            <input type="file" name="imagem" value="<?= $site->getImagem(); ?>" disabled/>
        </div>

        <div class="box-footer">
            <button type="submit" name="gravar" class="btn btn-primary">Excluir</button>
        </div>
</form>
</div>
</div>

</div>
</section>

<!--/FORMULÁRIO-->