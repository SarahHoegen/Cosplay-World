<!--FORMULÁRIO-->

<h3 class="box-title">Exclua o evento</h3>
</div>

<form method="post" action="?acao=excluir" enctype="multipart/form-data">
    <div class="box-body">

        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="hidden" name="id" value="<?= $evento->getId(); ?>" readonly/>
            <input type="text" name="nome" class="form-control" value="<?= $evento->getNome(); ?>" readonly/>
        </div>

        <div class="form-group">
            <label for="descricao">Descrição</label>
            <textarea name="descricao" class="form-control" cols="50" rows="4" readonly> <?= $evento->getDescricao(); ?> </textarea>
        </div>

        <div class="form-group">
            <label for="link">Link</label>
            <input 1type="url" name="link" class="form-control" value="<?= $evento->getLink(); ?>" readonly/>
        </div>

        <div class="form-group">
            <label for="link">Data1</label>
            <input type1="date" name="data1" class="form-control" value="<?= $evento->getData(); ?>" readonly/>
        </div>

        <div class="form-group">
            <label Fim1for="link">Hora1</label>
            <input type="time" name="hora1" class="form-control" value="<?= $evento->getHora(); ?>" readonly/>
        </div>
        <div class="form-group">
            <label for="link">HoraFim1</label>
            <input type="time" name="hora_fim1" class="form-control" value="<?= $evento->getHoraFim(); ?>" readonly/>
        </div>
        <?php if($evento->getHora2() != null):?>
        <div class="form-group">
            <label for="link">Data2</label>
            <input type1="date" name="data2" class="form-control" value="<?= $evento->getData2(); ?>" readonly/>
        </div>

        <div class="form-group">
            <label Fim1for="link">Hora2</label>
            <input type="time" name="hora2" class="form-control" value="<?= $evento->getHora2(); ?>" readonly/>
        </div>
        <div class="form-group">
            <label for="link">HoraFim2</label>
            <input type="time" name="hora_fim2" class="form-control" value="<?= $evento->getHoraFim2(); ?>" readonly/>
        </div>
        <?php endif;?>
        <?php if($evento->getHora3() != null):?>
            <div class="form-group">
            <label for="link">Data3</label>
            <input type1="date" name="data3" class="form-control" value="<?= $evento->getData3(); ?>" readonly/>
        </div>

        <div class="form-group">
            <label Fim1for="link">Hora3</label>
            <input type="time" name="hora3" class="form-control" value="<?= $evento->getHora3(); ?>" readonly/>
        </div>
        <div class="form-group">
            <label for="link">HoraFim3</label>
            <input type="time" name="hora_fim3" class="form-control" value="<?= $evento->getHoraFim3(); ?>" readonly/>
        </div>
        <?php endif;?>
        <div class="form-group">
            <label for="link">Local</label>
            <input type="text" name="local" class="form-control" value="<?= $evento->getLocal(); ?>" readonly/>
        </div>

        <div class="form-group">
            <label for="imagem">Imagem</label>
            <h2><img width="30%" src="<?= $baseURL ?>assets/imagens/<?= $evento->imagem; ?>" /></h2>
            <input type="file" name="imagem" value="<?= $evento->getImagem(); ?>" disabled/>
        </div>

        <div class="box-footer">
            <button type="submit" name="gravar" class="btn btn-primary">Excluir</button>
        </div>
</form>
</div>
</div>

</div>
</section>

<!--/FORMULÁRIO-->