<!--FORMULÁRIO-->

<h3 id="tit_alterar">Exclua o Canal</h3>
<form method="post" action="?acao=excluir" enctype="multipart/form-data">

    <div class="form-group">
        <label for="exampleInputEmail1">Nome do canal (YouTube)</label>
        <div class="inputs">
            <input type="hidden" name="id" value="<?= $canal->getId(); ?>">
            <input type="text" name="nome" class="form-control inputLogin" value="<?= $canal->getNome(); ?>" readonly/>
        </div>
    </div>

    <div class="form-group">
        <label for="desc">Descrição</label>
        <div  class="inputs">
           <textarea name="descricao" class="form-control" cols="50" rows="4" readonly> <?= $canal->getDescricao(); ?> </textarea>
        </div>
    </div>

    <div class="form-group">
        <label for="link">Link</label>
        <div  class="inputs">
            <input type="url" name="link" class="form-control inputLogin" value="<?= $canal->getLink(); ?>"  readonly/>
        </div>
    </div><br>

    <div class="form-group">
        <label for="img">Exclua a imagem do logo do canal</label>
        <h2><img width="30%" src="<?= $baseURL ?>assets/imagens/<?= $canal->imagem; ?>" /></h2>
        <input type="file"  name="imagem" class="form-control-file" value="<?= $canal->getImagem(); ?>" disabled/>
    </div><br>

    <button type="submit" name="gravar" class="btn btn-success">Excluir</button>
</form>

<!--/FORMULÁRIO-->

