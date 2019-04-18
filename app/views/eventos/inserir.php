<!--FORMULÁRIO-->

<h3 id="tit_alterar">Cadastre um evento!</h3>
<form method="post" action="?acao=inserir" enctype="multipart/form-data">

<?php if (isset($_GET['msg'])): ?>

        <div class="alert alert-danger" role="alert">
            <?= $_GET['msg']?>
        </div>

    <?php endif; ?>

    <div class="form-group">
        <label for="nome">Nome do evento</label>
        <div class="inputs">
            <input type="text" name="nome" class="form-control inputLogin" placeholder="Informe o nome do evento" required pattern="[a-zA-Z0-9 ]+">
        </div>
    </div>

    <div class="form-group">
        <label for="desc">Descrição</label>
        <div  class="inputs">
            <textarea name="descricao" class="form-control inputLogin" cols="50" rows="4" placeholder="Digite uma breve descrição do evento" required pattern="[a-zA-Z0-9 ]+"></textarea>
        </div>
    </div>

    <div class="form-group">
        <label for="link">Link</label>
        <div  class="inputs">
            <input type="url" name="link" class="form-control inputLogin" placeholder="Informe o link do evento" required>
        </div>
    </div>

    <div class="form-group">
        <label for="datas">Quantos dias o evento possui?</label>
        <div class="inputs">
            <input type="number" name="datas" id="ndatas" class="form-control inputLogin" value="0" min="1" max="3" onchange="f_ndatas();" onkeyup="f_ndatas();">
        </div>
    </div>

    <div id="datas">
    </div>

    <div class="form-group">
        <label for="local">Local</label>
        <div class="inputs">
            <input type="text" name="local" class="form-control inputLogin" placeholder="Informe o local que ocorrerá o evento" required>
        </div>
    </div><br>

    <div class="form-group">
        <label for="exampleInputFile">Adicione uma imagem do logo do evento</label>
        <input type="file" class="form-control-file" name="imagem" required/>
    </div><br>

    <button type="submit" name="gravar" class="btn btn-success">Enviar</button>
</form>

<!--/FORMULÁRIO-->