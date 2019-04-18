<!--FORMULÁRIO-->

<h3 id="tit_alterar">Exclua um site!</h3>
<form method="post" action="?acao=excluir" enctype="multipart/form-data">

    <div class="form-group">
        <label for="exampleInputEmail1">Nome do site </label>
        <div class="inputs">
            <input type="hidden" name="id" value="<?= $site->getId(); ?>">
            <input type="text" name="nome" class="form-control inputLogin" value="<?= $site->getNome(); ?>" readonly/>
        </div>
    </div>

    <div class="form-group">
        <label for="desc">Descrição</label>
        <div  class="inputs">
            <textarea name="descricao" class="form-control" cols="50" rows="4" readonly> <?= $site->getDescricao(); ?> </textarea>
        </div>
    </div>

    <div class="form-group">
        <label for="link">Link</label>
        <div  class="inputs">
            <input type="url" name="link" class="form-control inputLogin" value="<?= $site->getLink(); ?>" readonly/>
        </div>
    </div><br>

    <div class="form-group">
        <label for="exampleInputFile">Adicione uma imagem de logo do site</label><br>
        <img width="30%" src="<?= $baseURL ?>assets/imagens/<?= $site->imagem; ?>" />
        <input type="file" class="form-control-file" name="imagem" value="<?= $site->getImagem(); ?>" disabled/>
    </div><br>

    <button type="submit" name="gravar" class="btn btn-success">Excluir</button>
</form>

<!--/FORMULÁRIO-->
