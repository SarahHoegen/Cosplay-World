
<h3 id="tit_alterar">
    Excluir a dica!
</h3>

<form method="post" action="?acao=excluir">

    <div class="form-group">

        <label for="exampleInputEmail1">Título da Dica(Nome)</label>
        <div class="inputs">
            <input type="hidden" name="id" value="<?= $dica->getId(); ?>">
            <input type="text" name="nome" class="form-control inputLogin" id="exampleInputEmail1" value="<?= $dica->getNome(); ?>" readonly/>
        </div>

    </div>


    <div class="form-group">
        <label for="desc">Descrição</label>
        <div  class="inputs">
            <input type="text" name="descricao" class="form-control inputLogin" id="desc" value="<?= $dica->getDescricao(); ?>" readonly/>
        </div>
    </div><br>

    <br>

    <button id="gravar" type="submit" name="gravar" class="btn btn-success">Excluir!</button>
</form>


<!--FORMULARIO-->

