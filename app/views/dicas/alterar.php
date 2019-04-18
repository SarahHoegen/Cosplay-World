<!--FORMULÁRIO-->

<h3 id="tit_alterar">Edite uma dica!</h3>
<form method="post" action="?acao=alterar">

    <div class="form-group">
        <label for="exampleInputEmail1">Nome da dica</label>
        <div class="inputs">
            <input type="hidden" name="id" value="<?= $dica->getId(); ?>">
            <input type="text" name="nome" class="form-control inputLogin" value="<?= $dica->getNome(); ?>" required pattern="[a-zA-Z0-9 ]+">
        </div>
    </div>

    <div class="form-group">
        <label for="desc">Descrição</label>
        <div  class="inputs">
            <textarea name="descricao" class="form-control inputLogin" cols="50" rows="4" required pattern="[a-zA-Z0-9 ]+"> <?= $dica->getDescricao(); ?> </textarea>
        </div>
    </div><br>

    <button type="submit" name="gravar" class="btn btn-success">Editar</button>
</form>

<!--/FORMULÁRIO-->