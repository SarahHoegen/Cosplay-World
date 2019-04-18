<!--FORMULÁRIO-->

<h3 id="tit_alterar">Cadastre um cosmaker!</h3>
<form method="post" action="?acao=inserir" enctype="multipart/form-data">

<?php if (isset($_GET['msg'])): ?>

        <div class="alert alert-danger" role="alert">
            <?= $_GET['msg']?>
        </div>

    <?php endif; ?>

    <div class="form-group">
        <label for="exampleInputEmail1">Nome (cosmaker)</label>
        <div class="inputs">
            <input type="text" name="nome" class="form-control inputLogin" placeholder="Digite o nome do cosmaker" required pattern="[a-zA-Z0-9 ]+">
        </div>
    </div>

    <div class="form-group">
        <label for="desc">Descrição</label>
        <div  class="inputs">
            <textarea name="descricao" class="form-control" cols="50" rows="4" placeholder="Digite a descrição do cosmaker" required pattern="[a-zA-Z0-9 ]+"></textarea>
        </div>
    </div>

    <div class="form-group">
        <label for="funcao">Função</label>
        <div  class="inputs">
            <input type="text" name="funcao" class="form-control inputLogin" placeholder="Informe a função do cosmaker" required pattern="[a-zA-Z0-9 ]+">
        </div>
    </div>

    <div class="form-group">
        <label for="link">Link do Facebook</label>
        <div  class="inputs">
            <input type="url" name="link" class="form-control inputLogin" placeholder="Informe o link referente ao cosmaker" required>
        </div>
    </div>

    <div class="form-group">
        <label for="link">Link Secundário</label>
        <div  class="inputs">
            <input type="url" name="link2" class="form-control inputLogin" placeholder="Informe outro link referente ao cosmaker" required>
        </div>
    </div><br>

    <div class="form-group">
        <label for="exampleInputFile">Adicione uma imagem do cosmaker</label>
        <input type="file" class="form-control-file" name="imagem" required/>
    </div><br>

    <button type="submit" name="gravar" class="btn btn-success">Cadastrar</button>
</form>

<!--/FORMULÁRIO-->