
<h3 id="tit_alterar">Excluir site!</h3>

<form method="post" action="?acao=excluir" enctype="multipart/form-data">

    <div class="form-group">
        <label for="exampleInputEmail1">Nome do site </label>
        <div class="inputs">
            <input type="hidden" name="id" value="<?= $site->getId(); ?>">
            <input type="text" name="nome" class="form-control inputLogin" id="exampleInputEmail1" value="<?= $site->getNome(); ?>" readonly/>
        </div>
    </div>

    <div class="form-group">
        <label for="desc">Descrição</label>
        <div  class="inputs">
            <input type="text" name="descricao" class="form-control inputLogin" id="desc" value="<?= $site->getDescricao(); ?>" readonly/>
        </div>
    </div>

    <div class="form-group">
        <label for="link">Link</label>
        <div  class="inputs">
            <input type="url" name="link" class="form-control inputLogin" id="link" value="<?= $site->getLink(); ?>" readonly/>
        </div>
    </div><br>

    <div class="form-group">
        <label for="exampleInputFile">Adicionar uma imagem de perfil</label>
        <img width="30%" src="<?= $baseURL ?>assets/imagens/<?= $site->imagem; ?>" />
        <input type="file" class="form-control-file" name="imagem" id="exampleInputFile" value="<?= $site->getImagem(); ?>" disabled/>
    </div>
    <br>

    <button id="gravar" type="submit" name="gravar" class="btn btn-success">Excluir!</button>
</form>

<!--/FORMULÁRIO-->
