<h3 class="box-title">Inserir evento</h3>
</div>

<form method="post" action="?acao=inserir" enctype="multipart/form-data">
    <div class="box-body">

        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" name="nome" class="form-control" placeholder="Digite o nome do evento">
        </div>

        <div class="form-group">
            <label for="descricao">Descriçao</label>
            <textarea name="descricao" class="form-control" cols="50" rows="4" placeholder="Digite a descrição do evento"></textarea>
        </div>

        <div class="form-group">
            <label for="link">Link</label>
            <input type="url" name="link" class="form-control" placeholder="Insira o link">
        </div>

        <div class="form-group">
            <label for="link">Data</label>
            <input type="date" name="data" class="form-control">
        </div>

        <div class="form-group">
            <label for="link">Hora</label>
            <input type="time" name="hora" class="form-control">
        </div>

        <div class="form-group">
            <label for="link">Local</label>
            <input type="text" name="local" class="form-control" placeholder="Digite o local do evento">
        </div>

        <div class="form-group">
            <label for="imagem">Imagem</label>
            <p class="help-block">Coloque a imagem desejada.</p>
            <input type="file" name="imagem">
        </div>

        <div class="box-footer">
            <button type="submit" name="gravar" class="btn btn-primary">Enviar</button>
        </div>
</form>
</div>
</div>

</div>
</section>