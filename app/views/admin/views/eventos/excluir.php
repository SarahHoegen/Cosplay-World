<h3 class="box-title">Excluir evento</h3>
</div>

<form method="post" action="?acao=excluir" enctype="multipart/form-data">
    <div class="box-body">

        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="hidden" name="id" value="<?= $evento->getId(); ?>" readonly/>
            <input type="text" name="nome" class="form-control" value="<?= $evento->getNome(); ?>" readonly/>
        </div>

        <div class="form-group">
            <label for="descricao">Descriçao</label>
            <textarea name="descricao" class="form-control" cols="50" rows="4" readonly> <?= $evento->getDescricao(); ?> </textarea>
        </div>

        <div class="form-group">
            <label for="link">Link</label>
            <input type="url" name="link" class="form-control" value="<?= $evento->getLink(); ?>" readonly/>
        </div>

        <div class="form-group">
            <label for="link">Data</label>
            <input type="date" name="data" class="form-control" value="<?= $evento->getData(); ?>" readonly/>
        </div>

        <div class="form-group">
            <label for="link">Hora</label>
            <input type="time" name="hora" class="form-control" value="<?= $evento->getHora(); ?>" readonly/>
        </div>

        <div class="form-group">
            <label for="link">Local</label>
            <input type="text" name="local" class="form-control" value="<?= $evento->getLocal(); ?>" readonly/>
        </div>

        <div class="form-group">
            <label for="imagem">Imagem</label>
            <h2><img width="30%" src="<?= $baseURL ?>assets/imagens/<?= $evento->imagem; ?>" /></h2>
            <p class="help-block">Coloque a imagem desejada.</p>
            <input type="file" name="imagem" value="<?= $evento->getImagem(); ?>" disabled/>
        </div>

        <div class="box-footer">
            <button type="submit" name="gravar" class="btn btn-primary">Excluir</button>
        </div>
</form>
</div>
</div>

</div>
</section>

