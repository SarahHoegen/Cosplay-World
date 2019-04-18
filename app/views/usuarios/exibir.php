<!--FORMULÁRIO-->

<h3 id="tit_alterar">Informações do Usuário</h3>

<form method="post" action="?acao=alterar" enctype="multipart/form-data">

    <form role="form">

        <div class="form-group">
            <label for="nome1">Nome completo</label>
            <div class="inputs">
                <input type="hidden" name="id" value="<?= $usuario->getIdUsuario(); ?>">
                <input type="text" name="nome" value="<?= $usuario->getNome(); ?>" class="form-control inputLogin" required pattern="[a-zA-Z0-9 ]+">
            </div>
        </div>

        <div class="form-group">
            <label for="apelido1">Apelido</label>
            <div class="inputs">
                <input type="text" name="apelido" value="<?= $usuario->getApelido(); ?>" class="form-control inputLogin" required pattern="[a-zA-Z0-9 ]+">
            </div>
        </div>

        <div class="form-group">
            <label for="birth1">Data de nascimento</label>
            <div class="inputs">
                <input type="date" name="data_nasc" value="<?= $usuario->getDataNasc(); ?>" class="form-control inputLogin" required>
        </div>

        <div class="form-group">
            <label for="email1">Email</label>
            <div class="inputs">
                <input type="text" name="email" value="<?= $usuario->getEmail(); ?>" class="form-control inputLogin" required>
            </div>
        </div>

        <div class="form-group">
            <label for="password1">Senha</label>
            <div  class="inputs">
                <input type="password" name="senha" value="<?= $usuario->getSenha(); ?>" class="form-control inputLogin" required pattern="[a-zA-Z0-9 ]+">
            </div>
        </div><br>

        <div class="form-group">
            <label for="exampleInputFile">Adicione uma imagem de perfil</label><br>
            <img width="30%" src="<?= $baseURL ?>assets/imagens/<?= $usuario->imagem; ?>" />
            <input type="file" class="form-control-file" name="imagem" value="<?= $usuario->getImagem(); ?>"/>
        </div>
        <br>

        <button type="submit" name="gravar"  class="btn btn-success">Salvar alterações</button>

    </form>

    <!--/FORMULÁRIO-->