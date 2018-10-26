<h3 class="box-title">Inserir cosmaker</h3>
</div>

<form method="post" action="?acao=inserir" enctype="multipart/form-data">
    <div class="box-body">

        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" name="nome" class="form-control" placeholder="Digite o nome do cosmaker">
        </div>

        <div class="form-group">
            <label for="descricao">Descriçao</label>
            <textarea name="descricao" class="form-control" cols="50" rows="4" placeholder="Digite a descrição do cosmaker"></textarea>
        </div>

        <div class="form-group">
            <label for="funcao">Função</label>
            <input type="text" name="funcao" class="form-control" placeholder="Digite a função">
        </div>

        <div class="form-group">
            <label for="link">Link</label>
            <input type="url" name="link" class="form-control" placeholder="Digite o link do cosmaker">
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
