<!--FORMULÁRIO-->

<h3 class="box-title">Cadastre o cosmaker</h3>
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
            <input type="text" name="nome" class="form-control" placeholder="Digite o nome do cosmaker" required pattern="[a-zA-Z0-9 ]+">
        </div>

        <div class="form-group">
            <label for="descricao">Descrição</label>
            <textarea name="descricao" class="form-control" cols="50" rows="4" placeholder="Digite uma breve descrição do cosmaker" required pattern="[a-zA-Z0-9 ]+"></textarea>
        </div>

        <div class="form-group">
            <label for="funcao">Função</label>
            <input type="text" name="funcao" class="form-control" placeholder="Digite a função" required pattern="[a-zA-Z0-9 ]+">
        </div>

        <div class="form-group">
            <label for="link">Link do Facebook</label>
            <input type="url" name="link" class="form-control" placeholder="Digite o link do Facebook cosmaker" required>
        </div>

        <div class="form-group">
            <label for="link2">Link Secundário</label>
            <input type="url" name="link2" class="form-control" placeholder="Digite o link secundário do cosmaker">
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

<!--/FORMULÁRIO-->