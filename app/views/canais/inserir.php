<!--FORMULÁRIO-->

<h3 id="tit_alterar">Cadastre um canal do YouTube!</h3>
<form method="post" action="?acao=inserir" enctype="multipart/form-data">

<?php if (isset($_GET['msg'])): ?>
        <div class="alert alert-danger" role="alert">
            <?= $_GET['msg']?>
        </div>
    <?php endif; ?>
    
    <div class="form-group">
        <label for="exampleInputEmail1">Nome do canal (YouTube)</label>
        <div class="inputs">
            <input type="text" name="nome" class="form-control inputLogin" placeholder="Digite o nome do canal" required pattern="[a-zA-Z0-9 ]+">
        </div>
    </div>

    <div class="form-group">
        <label for="desc">Descrição</label>
        <div  class="inputs">
            <textarea name="descricao" class="form-control" cols="50" rows="4" placeholder="Digite a descrição do canal" required pattern="[a-zA-Z0-9 ]+"></textarea>
        </div>
    </div>

    <div class="form-group">
        <label for="link">Link</label>
        <div  class="inputs">
            <input type="url" name="link" class="form-control inputLogin" placeholder="Informe o link do canal do YouTube" required>
        </div>
    </div><br>

    <div class="form-group">
        <label for="img">Adicione uma imagem do logo do canal</label>
        <input type="file"  name="imagem" class="form-control-file" required/>
    </div><br>

    <button type="submit" name="gravar" class="btn btn-success">Enviar</button>
</form>

<!--/FORMULÁRIO-->