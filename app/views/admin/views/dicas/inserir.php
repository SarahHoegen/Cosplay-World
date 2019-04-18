<!--FORMULÁRIO-->

<h3 class="box-title">Cadastre uma dica</h3>
</div>

<form method="post" action="?acao=inserir">
    <div class="box-body">

        <div class="form-group">
            <label for="nome">Título da dica</label>
            <input type="text" name="nome" class="form-control" placeholder="Digite o título" required pattern="[a-zA-Z0-9 ]+">
        </div>

        <div class="form-group">
            <label for="descricao">Descrição</label>
            <textarea name="descricao" class="form-control" cols="50" rows="4" placeholder="Digite a descrição da sua dica" required pattern="[a-zA-Z0-9 ]+"></textarea>
        </div>

        <div class="form-group">
            <input type="hidden" name="data" class="form-control">
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