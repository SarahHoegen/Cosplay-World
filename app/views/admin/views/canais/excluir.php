<h3 class="box-title">Excluir canal</h3>
</div>

<form method="post" action="?acao=excluir" enctype="multipart/form-data">
    <div class="box-body">

        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="hidden" name="id" value="<?= $canal->getId(); ?>" readonly/>
            <input type="text" name="nome" class="form-control" id="nome" value="<?= $canal->getNome(); ?>" readonly/>
        </div>

        <div class="form-group">
            <label for="descricao">Descriçao</label>
            <input type="text" name="descricao" class="form-control" id="descricao" value="<?= $canal->getDescricao(); ?>" readonly/>
        </div>

        <div class="form-group">
            <label for="link">Link</label>
            <input type="url" name="link" class="form-control" id="link" value="<?= $canal->getLink(); ?>" readonly/>
        </div>

        <div class="form-group">
            <label for="exampleInputFile">Imagem</label>
            <h2><img width="30%" src="<?= $baseURL ?>assets/imagens/<?= $canal->imagem; ?>" /></h2>
            <p class="help-block">Coloque a imagem desejada.</p>
            <input type="file" name="imagem" id="exampleInputFile" value="<?= $canal->getImagem(); ?>" disabled/>
        </div>

        <div class="box-footer">
            <button type="submit" name="gravar" class="btn btn-primary">Excluir</button>
        </div>
</form>
</div>
</div>

</div>
</section>

