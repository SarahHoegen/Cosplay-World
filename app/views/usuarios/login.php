
        <h3>
          Quer dar dicas incríveis e ajudar a galera toda? Entre em sua conta!
        </h3>

        <form method="post" action="?acao=executar_login" enctype="multipart/form-data">

          <div class="form-group">

            <label for="exampleInputEmail1">Email</label>
            <div class="inputs">
              <input type="text" name="email" class="form-control inputLogin" id="exampleInputEmail1" >
            </div>

          </div>


          <div class="form-group">
            <label for="exampleInputPassword1">Senha</label>
            <div  class="inputs">
              <input type="password" name="senha" class="form-control inputLogin" id="exampleInputPassword1" >
            </div>
          </div><br>

          <div class="checkbox">
            <label>
              <input type="checkbox"> Mantenha-me conectado
            </label>
          </div>
          <br>

          <button type="submit" name="gravar" class="btn btn-success">Entrar!</button>
          </form>

        </form>
        <p>
          Ainda não tem uma conta? Cadastre-se aqui!
        </p>


        <a href="../../app/controllers/usuarios.php?acao=inserir"> <button type="button"  class="btn btn-outline-success" >Cadastrar-se </button> </a>






  
