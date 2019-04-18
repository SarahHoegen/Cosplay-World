<!--FORMULÁRIO-->

<h3 id="tit_alterar">Exclua a dica!</h3>
<form method="post" action="?acao=excluir">

    <div class="form-group">
        <label for="exampleInputEmail1">Nome da dica</label>
        <div class="inputs">
            <input type="hidden" name="id" value="<?= $dica->getId(); ?>">
            <input type="text" name="nome" class="form-control inputLogin" value="<?= $dica->getNome(); ?>" readonly/>
        </div>
    </div>

    <div class="form-group">
        <label for="desc">Descrição</label>
        <div  class="inputs">
            <textarea name="descricao" class="form-control" cols="50" rows="4" readonly> <?= $dica->getDescricao(); ?> </textarea>
        </div>
    </div><br>

    <button type="submit" name="gravar" class="btn btn-success">Excluir</button>
</form>

<!--/FORMULÁRIO-->