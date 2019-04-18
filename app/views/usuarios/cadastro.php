<!--FORMULÁRIO-->

<h3 id="tit_alterar">O que está esperando? Crie sua conta e venha curtir com a gente!</h3>
<form method="post" action="?acao=inserir" enctype="multipart/form-data">

    <?php if (isset($_GET['msg'])): ?>
        <div class="alert alert-danger" role="alert">
          <?= $_GET['msg']?>
        </div>
    <?php endif; ?>

    <div class="form-group">
        <label for="nome1">Nome completo</label>
        <div class="inputs">
            <input type="text" name="nome" class="form-control inputLogin" placeholder="Digite seu nome" required pattern="[a-zA-Z0-9 ]+">
        </div>
    </div>

    <div class="form-group">
        <label for="apelido">Apelido</label>
        <div class="inputs">
            <input type="text" name="apelido" class="form-control inputLogin" placeholder="Digite seu apelido" required pattern="[a-zA-Z0-9 ]+">
        </div>
    </div>

    <div class="form-group">
        <label for="birth">Data de nascimento</label>
        <div class="inputs">
            <input type="date" name="data_nasc" class="form-control inputLogin" placeholder="Digite sua data de nascimento" required>
        </div>
    </div>

    <div class="form-group">
        <label for="emai1">Email</label>
        <div class="inputs">
            <input type="email" name="email" class="form-control inputLogin" placeholder="Digite seu email" required>
        </div>
    </div>

    <div class="form-group">
        <label for="password">Senha</label>
        <div  class="inputs">
            <input type="password" name="senha" class="form-control inputLogin" placeholder="Digite sua senha" required pattern="[a-zA-Z0-9 ]+">
        </div>
    </div>

    <div class="form-group">
        <label for="password2">Confirme sua senha</label>
        <div  class="inputs">
            <input type="password" name="senha2" class="form-control inputLogin" placeholder="Confirme sua senha" required pattern="[a-zA-Z0-9 ]+">
        </div>
    </div><br>

    <div class="form-group">
        <label for="exampleInputFile">Adicione uma imagem de perfil</label>
        <input type="file" class="form-control-file" name="imagem" required/>
    </div><br>

    <button type="submit" name="gravar"  class="btn btn-success">Cadastrar</button>
</form>

<!--FORMULÁRIO-->