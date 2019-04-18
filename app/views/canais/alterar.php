<!--FORMULÁRIO-->

<h3 id="tit_alterar">Edite o canal</h3>
<form method="post" action="?acao=alterar" enctype="multipart/form-data">

    <div class="form-group">
        <label for="exampleInputEmail1">Nome do canal (YouTube)</label>
        <div class="inputs">
            <input type="hidden" name="id" value="<?= $canal->getId(); ?>">
            <input type="text" name="nome" class="form-control inputLogin" value="<?= $canal->getNome(); ?>" required pattern="[a-zA-Z0-9 ]+">
        </div>
    </div>

    <div class="form-group">
        <label for="desc">Descrição</label>
        <div  class="inputs">
            <textarea name="descricao" class="form-control inputLogin" cols="50" rows="4" required pattern="[a-zA-Z0-9 ]+"> <?= $canal->getDescricao(); ?> </textarea>
        </div>
    </div>

    <div class="form-group">
        <label for="link">Link</label>
        <div  class="inputs">
            <input type="url" name="link" class="form-control inputLogin" value="<?= $canal->getLink(); ?>" required>
        </div>
    </div><br>

    <div class="form-group">
        <label for="img">Altere a imagem do logo do canal</label>
        <h2><img width="30%" src="<?= $baseURL ?>assets/imagens/<?= $canal->imagem; ?>" /></h2>
        <input type="file"  name="imagem" class="form-control-file"  value="<?= $canal->getImagem(); ?>"/>
    </div><br>

    <button type="submit" name="gravar" class="btn btn-success">Editar</button>
</form>

<!--/FORMULÁRIO-->