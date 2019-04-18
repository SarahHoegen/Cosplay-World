<!--FORMULÁRIO-->

<h3 id="tit_alterar">Quer dar dicas incríveis e ajudar a galera toda? Preencha os campos!</h3>

<form method="post" action="?acao=inserir">
    <div class="form-group">
        <label for="exampleInputEmail1">Nome da dica</label>
        <div class="inputs">
            <input type="text" name="nome" class="form-control inputLogin" placeholder="Digite o nome da dica" required pattern="[a-zA-Z0-9 ]+">
        </div>
    </div>

    <div class="form-group">
        <label for="desc">Descrição</label>
        <div  class="inputs">
            <textarea name="descricao" class="form-control" cols="50" rows="4" placeholder="Digite a descrição da dica" required pattern="[a-zA-Z0-9 ]+"></textarea>
        </div>
    </div><br>

    <button type="submit" name="gravar" class="btn btn-success">Cadastrar</button>
</form>

<!--/FORMULÁRIO-->