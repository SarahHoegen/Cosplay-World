<!--LOGIN-->

<h3 id="tit_alterar">Quer dar dicas incríveis e ajudar a galera toda? Entre em sua conta!</h3>

<form method="post" action="?acao=executar_login" enctype="multipart/form-data">

    <?php if (isset($_GET['erro'])): ?>
        <?php if($_GET['erro'] == 1): ?>
            <div class="alert alert-danger" role="alert">
                Login ou Senha Incorretos!
            </div>
        <?php endif; ?>   
    <?php endif; ?>
    
    <div class="form-group">
        <label for="exampleInputEmail1">Email</label>
        <div class="inputs">
            <input type="text" name="email" class="form-control inputLogin" placeholder="Informe o seu email" required>
        </div>
    </div>

    <div class="form-group">
        <label for="exampleInputPassword1">Senha</label>
        <div  class="inputs">
            <input type="password" name="senha" class="form-control inputLogin" placeholder="Informe sua senha" required>
        </div>
    </div><br>

    <button type="submit" name="gravar" class="btn btn-success">Entrar</button>
</form>

<br><p>Ainda não tem uma conta? Cadastre-se aqui!</p>

<a href="../../controllers/usuario/usuarios.php?acao=inserir"> <button type="button"  class="btn btn-outline-success" >Cadastrar-se </button> </a> <br>
