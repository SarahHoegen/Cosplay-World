<h3 class="box-title">Excluir dica</h3>
</div>

<form method="post" action="?acao=excluir">
    <div class="box-body">

        <div class="form-group">
            <label for="nome">Título</label>
            <input type="hidden" name="id" value="<?= $dica->getId(); ?>" />
            <input type="text" name="nome" class="form-control" id="nome" value="<?= $dica->getNome(); ?>" readonly/>
        </div>

        <div class="form-group">
            <label for="descricao">Descriçao</label>
            <textarea name="descricao" class="form-control" cols="50" rows="4" readonly> <?= $dica->getDescricao(); ?> </textarea>
        </div>


        <div class="form-group">
            <input type="hidden" name="data" class="form-control" value="<?= $dica->getData(); ?>" readonly/>
        </div>

        <div class="box-footer">
            <button type="submit" name="gravar" class="btn btn-primary">Excluir</button>
        </div>
</form>
</div>
</div>

</div>
</section>

