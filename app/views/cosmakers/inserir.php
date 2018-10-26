<!--FORMULARIO-->
<h3>Cadastre um cosmaker!</h3>

<form method="post" action="?acao=inserir" enctype="multipart/form-data">

    <div class="form-group">
        <label for="exampleInputEmail1">Nome (cosmaker)</label>
        <div class="inputs">
            <input type="text" name="nome" class="form-control inputLogin" id="exampleInputEmail1" >
        </div>
    </div>

    <div class="form-group">
        <label for="desc">Descrição</label>
        <div  class="inputs">
            <input type="text" name="descricao" class="form-control inputLogin" id="desc" >
        </div>
    </div>

    <div class="form-group">
        <label for="funcao">Função</label>
        <div  class="inputs">
            <input type="text" name="funcao" class="form-control inputLogin" id="funcao" >
        </div>
    </div>

    <div class="form-group">
        <label for="link">Link</label>
        <div  class="inputs">
            <input type="url" name="link" class="form-control inputLogin" id="link" >
        </div>
    </div><br>

    <div class="form-group">
        <label for="exampleInputFile">Adicionar uma imagem de perfil</label>
        <input type="file" class="form-control-file" name="imagem" id="exampleInputFile" />
    </div>
    <br>

    <button id="gravar" type="submit" name="gravar" class="btn btn-success">Inserir!</button>
</form>
<!--/FORMULARIO-->


