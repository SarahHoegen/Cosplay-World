<h3 class="box-title">Cadastrar usuário</h3>
</div>

<form method="post" action="?acao=inserir" enctype="multipart/form-data">
    <div class="box-body">

        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" name="nome" class="form-control" placeholder="Digite o nome">
        </div>

        <div class="form-group">
            <label for="apelido">Apelido</label>
            <input type="text" name="apelido" class="form-control" placeholder="Digite o apelido">
        </div>

        <div class="form-group">
            <label for="data_nasc">Data de Nascimento</label>
            <input type="date" name="data_nasc" class="form-control" id="data_nasc" placeholder="Coloque a data de nascimento">
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" placeholder="Digite o email">
        </div>

        <div class="form-group">
            <label for="senha">Senha</label>
            <input type="password" name="senha" class="form-control" placeholder="Digite a senha">
        </div>

        <div class="form-group">
            <label for="senha2">Confirmar a Senha</label>
            <input type="password" name="senha2" class="form-control" placeholder="Confirme a senha">
        </div>

        <div class="form-group">
            <label for="exampleInputFile">Imagem</label>
            <p class="help-block">Coloque a imagem desejada.</p>
            <input type="file" name="imagem" id="exampleInputFile">
        </div>

        <div class="checkbox">
            <label><input type="checkbox"> Mantenha-me conectado</label>
        </div>
    </div>

    <div class="box-footer">
        <button type="submit" name="gravar" class="btn btn-primary">Enviar</button>
    </div>
</form>
