
<h3>
    Altere um cosmaker!
</h3>

<form method="post" action="?acao=alterar">

    <div class="form-group">

        <label for="exampleInputEmail1">Nome (cosmaker)</label>
        <div class="inputs">
            <input type="hidden" name="id" value="<?= $cosmaker->getId(); ?>">
            <input type="text" name="nome" class="form-control inputLogin" id="exampleInputEmail1" value="<?= $cosmaker->getNome(); ?>">
        </div>

    </div>

    <div class="form-group">
        <label for="desc">Descrição</label>
        <div  class="inputs">
            <input type="text" name="descricao" class="form-control inputLogin" id="desc" value="<?= $cosmaker->getDescricao(); ?>">
        </div>
    </div>

    <div class="form-group">
        <label for="link">Link</label>
        <div  class="inputs">
            <input type="text" name="link" class="form-control inputLogin" id="link" value="<?= $cosmaker->getLink(); ?>">
        </div>
    </div><br>

    <div class="form-group">

        <label for="exampleInputFile">
            Alterar a imagem de perfil</label>
        <input type="file" class="form-control-file" name="imagem" id="exampleInputFile" value="<?= $cosmaker->getImagem(); ?>"/>
    </div>
    <br>

    <button type="submit" name="gravar" class="btn btn-success">Alterar!</button>
</form>


<!--FORMULARIO-->

