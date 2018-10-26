<h3 class="box-title">Alterar evento</h3>
</div>

<form method="post" action="?acao=alterar" enctype="multipart/form-data">
    <div class="box-body">

        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="hidden" name="id" value="<?= $evento->getId(); ?>">
            <input type="text" name="nome" class="form-control" value="<?= $evento->getNome(); ?>">
        </div>

        <div class="form-group">
            <label for="descricao">Descriçao</label>
            <textarea name="descricao" class="form-control" cols="50" rows="4"> <?= $evento->getDescricao(); ?> </textarea>
        </div>

        <div class="form-group">
            <label for="link">Link</label>
            <input type="url" name="link" class="form-control" value="<?= $evento->getLink(); ?>">
        </div>

        <div class="form-group">
            <label for="link">Data</label>
            <input type="date" name="data" class="form-control" value="<?= $evento->getData(); ?>">
        </div>

        <div class="form-group">
            <label for="link">Hora</label>
            <input type="time" name="hora" class="form-control" value="<?= $evento->getHora(); ?>">
        </div>

        <div class="form-group">
            <label for="link">Local</label>
            <input type="text" name="local" class="form-control" value="<?= $evento->getLocal(); ?>">
        </div>

        <div class="form-group">
            <label for="imagem">Imagem</label>
            <h2><img width="30%" src="<?= $baseURL ?>assets/imagens/<?= $evento->imagem; ?>" /></h2>
            <p class="help-block">Coloque a imagem desejada.</p>
            <input type="file" name="imagem" value="<?= $evento->getImagem(); ?>">
        </div>

    <div class="box-footer">
        <button type="submit" name="gravar" class="btn btn-primary">Editar</button>
    </div>
</form>
</div>
</div>

</div>
</section>