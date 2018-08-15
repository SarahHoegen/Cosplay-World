<!--FORMULARIO-->

<h3>
    Alterar Canal
</h3>

<form method="post" action="?acao=alterar">

    <div class="form-group">

        <label for="exampleInputEmail1">Nome do canal (YouTube)</label>
        <div class="inputs">
            <input type="hidden" name="id" value="<?= $canal->getId(); ?>">
            <input type="text" name="nome" class="form-control inputLogin" id="exampleInputEmail1" value="<?= $canal->getNome(); ?>" >
        </div>

    </div>

    <div class="form-group">
        <label for="desc">Descrição</label>
        <div  class="inputs">
            <input type="text" name="descricao" class="form-control inputLogin" id="desc" value="<?= $canal->getDescricao(); ?>" >
        </div>
    </div>

    <div class="form-group">
        <label for="link">Link</label>
        <div  class="inputs">
            <input type="text" name="link" class="form-control inputLogin" id="link" value="<?= $canal->getLink(); ?>" >
        </div>
    </div><br>

    <div class="form-group">

        <label for="img">
            Altere a imagem do canal</label>
        <input type="file"  name="imagem" class="form-control-file"  id="img" value="<?= $canal->getImagem(); ?>"/>
    </div>
    <br>

    <button type="submit" name="gravar" class="btn btn-success">Alterar!</button>
</form>

<!--FORMULARIO-->

