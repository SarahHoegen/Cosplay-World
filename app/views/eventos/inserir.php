
                        <h3>
                            Cadastre Eventos!
                        </h3>

                        <form method="post" action="?acao=inserir">

                            <div class="form-group">

                                <label for="exampleInputEmail1">Nome do evento</label>
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
                            </div>
                            <div class="form-group">
                                <label for="data">Data (Dia do acontecimento evento)</label>
                                <div  class="inputs">
                                    <input type="date" name="data" class="form-control inputLogin" id="data" >
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="hora">Hora em que começa</label>
                                <div  class="inputs">
                                    <input type="time" name="hora" class="form-control inputLogin" id="hora" >
                                </div>
                            </div><br>

                            <div class="form-group">
                                <label for="local">Local</label>
                                <div  class="inputs">
                                    <input type="text" name="local" class="form-control inputLogin" id="local" >
                                </div><br>

                            <div class="form-group">

                                <label for="exampleInputFile">
                                    Adicionar uma imagem de perfil</label>
                                <input type="file" class="form-control-file" name="imagem" id="exampleInputFile" />
                            </div>
                            <br>

                            <button type="submit" name="gravar" class="btn btn-success">Inserir!</button>
                        </form>


                        <!--FORMULARIO-->
