
<h3>
    Excluir site!
</h3>

<form method="post" action="?acao=excluir">

    <div class="form-group">

        <label for="exampleInputEmail1">Nome do site </label>
        <div class="inputs">
            <input type="hidden" name="id" value="<?= $site->getId(); ?>">
            <input type="text" name="nome" class="form-control inputLogin" id="exampleInputEmail1" value="<?= $site->getNome(); ?>" disabled/>
        </div>

    </div>

    <div class="form-group">
        <label for="desc">Descrição</label>
        <div  class="inputs">
            <input type="text" name="descricao" class="form-control inputLogin" id="desc" value="<?= $site->getDescricao(); ?>" disabled/>
        </div>
    </div>


    <div class="form-group">
        <label for="link">Link</label>
        <div  class="inputs">
            <input type="text" name="link" class="form-control inputLogin" id="link" value="<?= $site->getLink(); ?>" disabled/>
        </div>
    </div><br>

    <div class="form-group">

        <label for="exampleInputFile">
            Adicionar uma imagem de perfil</label>
        <input type="file" class="form-control-file" name="imagem" id="exampleInputFile" value="<?= $site->getImagem(); ?>"disabled/>
    </div>
    <br>

    <button type="submit" name="gravar" class="btn btn-success">Excluir!</button>
</form>


<!--FORMULARIO-->
