<!--FORMULARIO-->
<h3>Excluir cosmaker!</h3>

<form method="post" action="?acao=excluir" enctype="multipart/form-data">

    <div class="form-group">
        <label for="exampleInputEmail1">Nome (cosmaker)</label>
        <div class="inputs">
            <input type="hidden" name="id" value="<?= $cosmaker->getId(); ?>">
            <input type="text" name="nome" class="form-control inputLogin" id="exampleInputEmail1" value="<?= $cosmaker->getNome(); ?>" readonly/>
        </div>
    </div>

    <div class="form-group">
        <label for="desc">Descrição</label>
        <div  class="inputs">
            <input type="text" name="descricao" class="form-control inputLogin" id="desc" value="<?= $cosmaker->getDescricao(); ?>" readonly/>
        </div>
    </div>

    <div class="form-group">
        <label for="funcao">Função</label>
        <div class="inputs">
            <input type="text" name="funcao" class="form-control inputLogin" id="funcao" readonly/>
        </div>
    </div>

    <div class="form-group">
        <label for="link">Link</label>
        <div  class="inputs">
            <input type="url" name="link" class="form-control inputLogin" id="link" value="<?= $cosmaker->getLink(); ?>" readonly/>
        </div>
    </div><br>

    <div class="form-group">
        <label for="exampleInputFile">Alterar a imagem de perfil</label>
        <img width="30%" src="<?= $baseURL ?>assets/imagens/<?= $cosmaker->imagem; ?>" />
        <input type="file" class="form-control-file" name="imagem" id="exampleInputFile" value="<?= $cosmaker->getImagem(); ?>" disabled/>
    </div>
    <br>

    <button type="submit" name="gravar" class="btn btn-success">Excluir!</button>
</form>

<!--/FORMULARIO-->


