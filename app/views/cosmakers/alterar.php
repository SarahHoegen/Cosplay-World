<!--FORMULÁRIO-->

<h3 id="tit_alterar">Edite um cosmaker!</h3>
<form method="post" action="?acao=alterar" enctype="multipart/form-data">

    <div class="form-group">
        <label for="exampleInputEmail1">Nome (cosmaker)</label>
        <div class="inputs">
            <input type="hidden" name="id" value="<?= $cosmaker->getId(); ?>">
            <input type="text" name="nome" class="form-control inputLogin" value="<?= $cosmaker->getNome(); ?>" required pattern="[a-zA-Z0-9 ]+">
        </div>
    </div>

    <div class="form-group">
        <label for="desc">Descrição</label>
        <div  class="inputs">
            <textarea name="descricao" class="form-control inputLogin" cols="50" rows="4" required pattern="[a-zA-Z0-9 ]+"> <?= $cosmaker->getDescricao(); ?> </textarea>
        </div>
    </div>

    <div class="form-group">
        <label for="funcao">Função</label>
        <div  class="inputs">
            <input type="text" name="funcao" class="form-control inputLogin" value="<?= $cosmaker->getFuncao(); ?>" required pattern="[a-zA-Z0-9 ]+">
        </div>
    </div>

    <div class="form-group">
        <label for="link">Link</label>
        <div  class="inputs">
            <input type="text" name="link" class="form-control inputLogin" value="<?= $cosmaker->getLink(); ?>" required>
        </div>
    </div>

    <div class="form-group">
        <label for="link2">Link Secundário</label>
        <div  class="inputs">
            <input type="text" name="link2" class="form-control inputLogin" value="<?= $cosmaker->getLink2(); ?>" required>
        </div>
    </div><br>

    <div class="form-group">
        <label for="exampleInputFile">Altere a imagem do cosmaker</label><br>
        <img width="30%" src="<?= $baseURL ?>assets/imagens/<?= $cosmaker->imagem; ?>" />
        <input type="file" class="form-control-file" name="imagem" value="<?= $cosmaker->getImagem(); ?>"/>
    </div><br>

    <button type="submit" name="gravar" class="btn btn-success">Editar</button>
</form>

<!--/FORMULÁRIO-->