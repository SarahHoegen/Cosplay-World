<!--FORMULARIO-->
<h3 id="tit_alterar">Excluir Canal</h3>

<form method="post" action="?acao=excluir" enctype="multipart/form-data">

    <div class="form-group">
        <label for="exampleInputEmail1">Nome do canal (YouTube)</label>
        <div class="inputs">
            <input type="hidden" name="id" value="<?= $canal->getId(); ?>">
            <input type="text" name="nome" class="form-control inputLogin" id="exampleInputEmail1" value="<?= $canal->getNome(); ?>" readonly/>
        </div>
    </div>

    <div class="form-group">
        <label for="desc">Descrição</label>
        <div  class="inputs">
            <input type="text" name="descricao" class="form-control inputLogin" id="desc" value="<?= $canal->getDescricao(); ?>"  readonly/>
        </div>
    </div>

    <div class="form-group">
        <label for="link">Link</label>
        <div  class="inputs">
            <input type="url" name="link" class="form-control inputLogin" id="link" value="<?= $canal->getLink(); ?>"  readonly/>
        </div>
    </div><br>

    <div class="form-group">
        <label for="img">Excluir a imagem do canal</label>
        <h2><img width="30%" src="<?= $baseURL ?>assets/imagens/<?= $canal->imagem; ?>" /></h2>
        <input type="file"  name="imagem" class="form-control-file"  id="img" value="<?= $canal->getImagem(); ?>" disabled/>
    </div>
    <br>

    <button id="gravar" type="submit" name="gravar" class="btn btn-success">Excluir!</button>
</form>
<!--FORMULARIO-->

