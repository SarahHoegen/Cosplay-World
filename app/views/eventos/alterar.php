<!--FORMULÁRIO-->

<h3 id="tit_alterar">Edite o evento!</h3>
<form method="post" action="?acao=alterar" enctype="multipart/form-data">

    <div class="form-group">
        <label for="exampleInputEmail1">Nome do evento</label>
        <div class="inputs">
            <input type="hidden" name="id" value="<?= $evento->getId(); ?>">
            <input type="text" name="nome" class="form-control inputLogin" value="<?= $evento->getNome(); ?>" required pattern="[a-zA-Z0-9 ]+">
        </div>
    </div>

    <div class="form-group">
        <label for="descricao">Descrição</label>
        <div  class="inputs">
            <textarea name="descricao" class="form-control inputLogin" cols="50" rows="4" required pattern="[a-zA-Z0-9 ]+"> <?= $evento->getDescricao(); ?> </textarea>
        </div>
    </div>

    <div class="form-group">
        <label for="link">Link</label>
        <div  class="inputs"> 
            <input type="url" name="link" class="form-control inputLogin" value="<?= $evento->getLink(); ?>" required>
        </div>
    </div>

    <div class="form-group">
        <label for="data">Data Inicial (Dia 1)</label>
        <div  class="inputs">
            <input type="date" name="data" class="form-control inputLogin" value="<?= $evento->getData(); ?>" required>
        </div>
    </div>

    <div class="form-group">
        <label for="hora">Hora em que começa (Dia 1)</label>
        <div  class="inputs">
            <input type="time" name="hora" class="form-control inputLogin" value="<?= $evento->getHora(); ?>" required>
        </div>
    </div>

    <div class="form-group">
        <label for="hora_fim">Hora em que termina (Dia 1)</label>
        <div  class="inputs">
            <input type="time" name="hora_fim" class="form-control inputLogin" value="<?= $evento->getHoraFim(); ?>" required>
        </div>
    </div>

    <div class="form-group">
        <label for="local">Local</label>
        <div  class="inputs">
            <input type="text" name="local" class="form-control inputLogin" value="<?= $evento->getLocal(); ?>" required">
        </div><br>

    <div class="form-group">
        <label for="exampleInputFile">Adicione uma imagem da logo do evento</label><br>
        <img width="30%" src="<?= $baseURL ?>assets/imagens/<?= $evento->imagem; ?>" /><br><br>
        <input type="file" class="form-control-file" name="imagem" value="<?= $evento->getImagem(); ?>"/>
    </div><br>

    <button type="submit" name="gravar" class="btn btn-success">Editar</button>
</form>

<!--/FORMULÁRIO-->