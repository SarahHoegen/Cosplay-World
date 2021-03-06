<!--FORMULÁRIO-->
<h3 id="tit_alterar">Exclua um cosmaker!</h3>

<form method="post" action="?acao=excluir" enctype="multipart/form-data">

    <div class="form-group">
        <label for="exampleInputEmail1">Nome (cosmaker)</label>
        <div class="inputs">
            <input type="hidden" name="id" value="<?= $cosmaker->getId(); ?>">
            <input type="text" name="nome" class="form-control inputLogin" value="<?= $cosmaker->getNome(); ?>" readonly/>
        </div>
    </div>

    <div class="form-group">
        <label for="desc">Descrição</label>
        <div  class="inputs">
            <textarea name="descricao" class="form-control" cols="50" rows="4" readonly> <?= $cosmaker->getDescricao(); ?> </textarea>
        </div>
    </div>

    <div class="form-group">
        <label for="funcao">Função</label>
        <div class="inputs">
            <input type="text" name="funcao" class="form-control inputLogin" value="<?= $cosmaker->getFuncao(); ?>" readonly/>
        </div>
    </div>

    <div class="form-group">
        <label for="link">Link</label>
        <div class="inputs">
            <input type="url" name="link" class="form-control inputLogin" value="<?= $cosmaker->getLink(); ?>" readonly/>
        </div>
    </div>

    <div class="form-group">
        <label for="link">Link Secundário</label>
        <div  class="inputs">
            <input type="url" name="link2" class="form-control inputLogin" value="<?= $cosmaker->getLink2(); ?>" readonly/>
        </div>
    </div><br>

    <div class="form-group">
        <label for="exampleInputFile">Excluir a imagem de perfil</label><br>
        <img width="30%" src="<?= $baseURL ?>assets/imagens/<?= $cosmaker->imagem; ?>" />
        <input type="file" class="form-control-file" name="imagem" value="<?= $cosmaker->getImagem(); ?>" disabled/>
    </div><br>

    <button type="submit" name="gravar" class="btn btn-success">Excluir</button>
</form>

<!--/FORMULÁRIO-->