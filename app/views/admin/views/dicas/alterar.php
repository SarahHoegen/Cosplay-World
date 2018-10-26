<h3 class="box-title">Alterar dica</h3>
</div>

<form method="post" action="?acao=alterar">
    <div class="box-body">

        <div class="form-group">
            <label for="nome">Título</label>
            <input type="hidden" name="id" value="<?= $dica->getId(); ?>">
            <input type="text" name="nome" class="form-control" value="<?= $dica->getNome(); ?>">
        </div>

        <div class="form-group">
            <label for="descricao">Descriçao</label>
            <textarea name="descricao" class="form-control" cols="50" rows="4"> <?= $dica->getDescricao(); ?> </textarea>
        </div>

        <div class="form-group">
            <input type="hidden" name="data" class="form-control" value="<?= $dica->getData(); ?>">
        </div>

    <div class="box-footer">
        <button type="submit" name="gravar" class="btn btn-primary">Editar</button>
    </div>
</form>
</div>
</div>

</div>
</section>