
<h3>O que está esperando? Crie sua conta e venha curtir com a gente!</h3>

<form method="post" action="?acao=inserir" enctype="multipart/form-data">

    <form role="form">

        <div class="form-group">
            <label for="nome1">Nome completo</label>
            <div class="inputs">
                <input type="text" name="nome" class="form-control inputLogin" id="nome1" placeholder="Digite seu nome">
            </div>
        </div>

        <div class="form-group">
            <label for="apelido1">Apelido</label>
            <div class="inputs">
                <input type="text" name="apelido" class="form-control inputLogin" id="apelido1" placeholder="Digite seu apelido">
            </div>
        </div>

        <div class="form-group">
            <label for="birth1">Data de nascimento</label>
            <div class="inputs">
                <input type="date" name="data_nasc" class="form-control inputLogin" id="birth1" placeholder="Digite sua data de nascimento">
            </div>
        </div>

        <div class="form-group">
            <label for="email1">Email</label>
            <div class="inputs">
                <input type="email" name="email" class="form-control inputLogin" id="email1" placeholder="Digite seu email">
            </div>
        </div>


        <div class="form-group">
            <label for="password1">Senha</label>
            <div  class="inputs">
                <input type="password" name="senha" class="form-control inputLogin" id="password1" placeholder="Digite sua senha">
            </div>
        </div>

        <div class="form-group">
            <label for="password2">Confirmar senha</label>
            <div  class="inputs">
                <input type="password"  class="form-control inputLogin" id="password2" placeholder="Confirme sua senha">
            </div>
        </div><br>

        <div class="form-group">
            <label for="exampleInputFile">Adicionar uma imagem de perfil</label>
            <input type="file" class="form-control-file" name="imagem" id="exampleInputFile" />
        </div>
        <br>

        <div class="checkbox"><label><input type="checkbox"> Check me out</label>
        </div>

        <button type="submit" name="gravar"  class="btn btn-success">Cadastrar!</button>

    </form>
