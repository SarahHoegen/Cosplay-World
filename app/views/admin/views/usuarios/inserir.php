<!--FORMULÁRIO-->

<h3 class="box-title">Cadastrar usuário</h3>
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
            <input type="text" name="nome" class="form-control" placeholder="Digite o nome" required pattern="[a-zA-Z0-9 ]+">
        </div>

        <div class="form-group">
            <label for="apelido">Apelido</label>
            <input type="text" name="apelido" class="form-control" placeholder="Digite o apelido" required pattern="[a-zA-Z0-9]+">
        </div>

        <div class="form-group">
            <label for="data_nasc">Data de Nascimento</label>
            <input type="date" name="data_nasc" class="form-control" id="data_nasc" placeholder="Coloque a data de nascimento" required>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" placeholder="Digite o email" required>
        </div>

        <div class="form-group">
            <label for="senha">Senha</label>
            <input type="password" name="senha" class="form-control" placeholder="Digite a senha" required pattern="[a-zA-Z0-9 ]+">
        </div>

        <div class="form-group">
            <label for="senha2">Confirmar a Senha</label>
            <input type="password" name="senha2" class="form-control" placeholder="Confirme a senha" required pattern="[a-zA-Z0-9 ]+">
        </div>

        <div class="form-group">
            <label for="exampleInputFile">Imagem</label>
            <p class="help-block">Coloque a imagem desejada</p>
            <input type="file" name="imagem" id="exampleInputFile" required>
        </div>

    </div>

    <div class="box-footer">
        <button type="submit" name="gravar" class="btn btn-primary">Enviar</button>
    </div>
</form>

<!--/FORMULÁRIO-->