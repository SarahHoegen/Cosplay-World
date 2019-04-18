<!--FORMULÁRIO-->

<h3 id="tit_alterar">Cadastre um site!</h3>
<form method="post" action="?acao=inserir" enctype="multipart/form-data">

<?php if (isset($_GET['msg'])): ?>

        <div class="alert alert-danger" role="alert">
            <?= $_GET['msg']?>
        </div>

    <?php endif; ?>

    <div class="form-group">
        <label for="exampleInputEmail1">Nome do site </label>
        <div class="inputs">
            <input type="text" name="nome" class="form-control inputLogin" placeholder="Informe o nome do site" required pattern="[a-zA-Z0-9 ]+">
        </div>
    </div>

    <div class="form-group">
        <label for="desc">Descrição</label>
        <div  class="inputs">
            <textarea name="descricao" class="form-control inputLogin" cols="50" rows="4" placeholder="Digite uma breve descrição do site" required pattern="[a-zA-Z0-9 ]+"></textarea>
        </div>
    </div>

    <div class="form-group">
        <label for="link">Link</label>
        <div  class="inputs">
            <input type="url" name="link" class="form-control inputLogin" placeholder="Informe o link do site" required>
        </div>
    </div><br>

    <div class="form-group">
        <label for="exampleInputFile">Adicionar uma imagem de logo do site</label>
        <input type="file" class="form-control-file" name="imagem" required/>
    </div><br>

    <button type="submit" name="gravar" class="btn btn-success">Cadastrar</button>
</form>

<!--/FORMULÁRIO-->
