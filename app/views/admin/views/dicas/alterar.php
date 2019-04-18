<!--FORMULÁRIO-->

<h3 class="box-title">Edite a dica</h3>
</div>

<form method="post" action="?acao=alterar">
    <div class="box-body">

        <div class="form-group">
            <label for="nome">Título</label>
            <input type="hidden" name="id" value="<?= $dica->getId(); ?>">
            <input type="text" name="nome" class="form-control" value="<?= $dica->getNome(); ?>" required pattern="[a-zA-Z0-9 ]+">
        </div>

        <div class="form-group">
            <label for="descricao">Descrição</label>
            <textarea name="descricao" class="form-control" cols="50" rows="4" required pattern="[a-zA-Z0-9 ]+"> <?= $dica->getDescricao(); ?> </textarea>
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

<!--/FORMULÁRIO-->