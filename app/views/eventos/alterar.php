
<h3 id="tit_alterar">Altere o evento!</h3>

<form method="post" action="?acao=alterar" enctype="multipart/form-data">

    <div class="form-group">
        <label for="exampleInputEmail1">Nome do evento</label>
        <div class="inputs">
            <input type="hidden" name="id" value="<?= $evento->getId(); ?>">
            <input type="text" name="nome" class="form-control inputLogin" id="exampleInputEmail1"  value="<?= $evento->getNome(); ?>">
        </div>
    </div>

    <div class="form-group">
        <label for="desc">Descrição</label>
        <div  class="inputs">
            <input type="text" name="descricao" class="form-control inputLogin" id="desc"  value="<?= $evento->getDescricao(); ?>">
        </div>
    </div>

    <div class="form-group">
        <label for="link">Link</label>
        <div  class="inputs">
            <input type="url" name="link" class="form-control inputLogin" id="link"  value="<?= $evento->getLink(); ?>">
        </div>
    </div>

    <div class="form-group">
        <label for="data">Data (Dia do acontecimento evento)</label>
        <div  class="inputs">
            <input type="date" name="data" class="form-control inputLogin" id="data"  value="<?= $evento->getData(); ?>">
        </div>
    </div>

    <div class="form-group">
        <label for="hora">Hora em que começa</label>
        <div  class="inputs">
            <input type="time" name="hora" class="form-control inputLogin" id="hora"  value="<?= $evento->getHora(); ?>">
        </div>
    </div><br>

    <div class="form-group">
        <label for="local">Local</label>
        <div  class="inputs">
            <input type="text" name="local" class="form-control inputLogin" id="local" value="<?= $evento->getLocal(); ?>">
        </div><br>

    <div class="form-group">
        <label for="exampleInputFile">Adicionar uma imagem de perfil</label>
        <img width="30%" src="<?= $baseURL ?>assets/imagens/<?= $evento->imagem; ?>" />
        <input type="file" class="form-control-file" name="imagem" id="exampleInputFile"  value="<?= $evento->getImagem(); ?>"/>
    </div>
    <br>

    <button id="gravar" type="submit" name="gravar" class="btn btn-success">Alterar!</button>
</form>

<!--/FORMULARIO-->
