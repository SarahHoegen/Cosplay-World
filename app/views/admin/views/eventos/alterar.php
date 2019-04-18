<!--FORMULÁRIO-->

<h3 class="box-title">Edite o evento</h3>
</div>

<form method="post" action="?acao=alterar" enctype="multipart/form-data">
    <div class="box-body">

        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="hidden" name="id" value="<?= $evento->getId(); ?>">
            <input type="text" name="nome" class="form-control" value="<?= $evento->getNome(); ?>" required pattern="[a-zA-Z0-9 ]+">
        </div>

        <div class="form-group">
            <label for="descricao">Descrição</label>
            <textarea name="descricao" class="form-control" cols="50" rows="4" required> <?= $evento->getDescricao(); ?> </textarea>
        </div>

        <div class="form-group">
            <label for="link">Link</label>
            <input type="url" name="link" class="form-control" value="<?= $evento->getLink(); ?>" required>
        </div>

        <div class="form-group">
            <label for="link">Data1</label>
            <input type="date" name="data1" class="form-control" value="<?= $evento->getData(); ?>" required>
        </div>

        <div class="form-group">
            <label for="link">Hora1</label>
            <input type="time" name="hora1" class="form-control" value="<?= $evento->getHora(); ?>" required>
        </div>
        <div class="form-group">
            <label for="link">HoraFim1</label>
            <input type="time" name="hora_fim1" class="form-control" value="<?= $evento->getHoraFim(); ?>" required>
        </div>
		<?php if($evento->getHora2() != null):?>
			<div class="form-group">
            <label for="link">Data2</label>
            <input type="date" name="data2" class="form-control" value="<?= $evento->getData2(); ?>" required>
        </div>

        <div class="form-group">
            <label for="link">Hora2</label>
            <input type="time" name="hora2" class="form-control" value="<?= $evento->getHora2(); ?>" required>
        </div>
        <div class="form-group">
            <label for="link">HoraFim2</label>
            <input type="time" name="hora_fim2" class="form-control" value="<?= $evento->getHoraFim2(); ?>" required>
        </div>
    <?php endif;?>
    <?php if($evento->getHora3()):?>
    	<div class="form-group">
            <label for="link">Data3</label>
            <input type="date" name="data3" class="form-control" value="<?= $evento->getData3(); ?>" required>
        </div>

        <div class="form-group">
            <label for="link">Hora3</label>
            <input type="time" name="hora3" class="form-control" value="<?= $evento->getHora3(); ?>" required>
        </div>
        <div class="form-group">
            <label for="link">HoraFim3</label>
            <input type="time" name="hora_fim3" class="form-control" value="<?= $evento->getHoraFim3(); ?>" required>
        </div>
    <?php endif;?>
        <div class="form-group">
            <label for="link">Local</label>
            <input type="text" name="local" class="form-control" value="<?= $evento->getLocal(); ?>" required pattern="[a-zA-Z0-9 ]+" >
        </div>

        <div class="form-group">
            <label for="imagem">Imagem</label>
            <h2><img width="30%" src="<?= $baseURL ?>assets/imagens/<?= $evento->imagem; ?>"/></h2>
            <p class="help-block">Coloque a imagem desejada</p>
            <input type="file" name="imagem" value="<?= $evento->getImagem(); ?>">
        </div>

    <div class="box-footer">
        <button type="submit" name="gravar" class="btn btn-primary">Editar</button>
    </div>
</form>
</div>
</div>

</div>
</section>

<!--/FORMULÁRIO-->