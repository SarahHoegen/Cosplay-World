<!--FORMULARIO-->

                        <h3>
                            Insira um Canal do Youtube!
                        </h3>

                        <form method="post" action="?acao=inserir">

                            <div class="form-group">

                                <label for="exampleInputEmail1">Nome do canal (YouTube)</label>
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
                                <label for="link">Link</label>
                                <div  class="inputs">
                                    <input type="text" name="link" class="form-control inputLogin" id="link" >
                                </div>
                            </div><br>

                            <div class="form-group">

                                <label for="img">
                                    Adicionar uma imagem do canal</label>
                                <input type="file"  name="imagem" class="form-control-file"  id="img" />
                            </div>
                            <br>

                            <button type="submit" name="gravar" class="btn btn-success">Inserir!</button>
                        </form>

 <!--FORMULARIO-->

