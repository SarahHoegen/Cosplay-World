<!--FORMULÁRIO-->

<h3 class="box-title">Cadastre o canal</h3>
</div>

<form method="post" action="?acao=inserir" enctype="multipart/form-data">
    <div class="box-body">

    <?php if (isset($_GET['msg'])): ?>
        <div class="alert alert-danger" role="alert">
            <?= $_GET['msg']?>
        </div>
    <?php endif; ?>

        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" name="nome" class="form-control" placeholder="Digite o nome do canal" required pattern="[a-zA-Z0-9 ]+">
        </div>

        <div class="form-group">
            <label for="descricao">Descrição</label>
            <textarea name="descricao" class="form-control" cols="50" rows="4" placeholder="Digite a descrição de seu canal" required pattern="[a-zA-Z0-9 ]+"></textarea>
        </div>

        <div class="form-group">
            <label for="link">Link</label>
            <input type="url" name="link" class="form-control" placeholder="Insira o link do canal" required>
        </div>

        <div class="form-group">
            <label for="imagem">Imagem</label>
            <p class="help-block">Coloque a imagem desejada</p>
            <input type="file" name="imagem" required>
        </div>

        <div class="box-footer">
            <button type="submit" name="gravar" class="btn btn-primary">Enviar</button>
        </div>
</form>
</div>
</div>

</div>
</section>

<!--/FORMULÁRIO-->