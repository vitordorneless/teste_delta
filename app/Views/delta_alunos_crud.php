<div class="card">
    <div class="card-header">
        <h3 class="card-title">Incluir / Editar Aluno(a)</h3>
    </div>
    <div class="card-body">
        <form action="<?= 'salva_alunos' ?>" method="post" enctype="multipart/form-data">        
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Nome do Aluno</label>
                        <input type="text" id="delta_alunos_nome" name="delta_alunos_nome" class="form-control" required="required" value="<?= $delta_alunos_nome; ?>">
                        <input type="hidden" id="id_delta_alunos" name="id_delta_alunos" class="form-control" value="<?= $id_delta_alunos; ?>">
                        <input type="hidden" id="incluir" value="<?= $incluir; ?>" name="incluir">
                        <input type="hidden" id="delta_alunos_fotos" value="<?= $delta_alunos_foto; ?>" name="delta_alunos_fotos">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Foto do Aluno</label>
                        <input type="file" id="delta_alunos_foto" name="delta_alunos_foto" class="form-control">
                        <?php
                        if($incluir == 2 && $delta_alunos_foto !== 'sem foto')
                        {
                            echo "<img src='data:image/jpg;base64,$delta_alunos_foto' class='img-fluid col-md-2'>";                            
                        }
                        ?>
                    </div>
                </div>                
            </div>
            <div class="row">
                <div class="col-sm-3">
                    <div class="form-group">
                        <label>CEP</label>
                        <input type="text" id="delta_alunos_ende_cep" name="delta_alunos_ende_cep" class="form-control" required="required" value="<?= $delta_alunos_ende_cep; ?>">
                    </div>
                </div>
                <div class="col-sm-7">
                    <div class="form-group">
                        <label>Rua</label>
                        <input type="text" id="delta_alunos_ende_rua" name="delta_alunos_ende_rua" class="form-control" required="required" value="<?= $delta_alunos_ende_rua; ?>">
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="form-group">
                        <label>Número</label>
                        <input type="text" id="delta_alunos_ende_num" name="delta_alunos_ende_num" class="form-control" value="<?= $delta_alunos_ende_num; ?>" required="required">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Bairro</label>
                        <input type="text" id="delta_alunos_ende_bairro" name="delta_alunos_ende_bairro" class="form-control" required="required" value="<?= $delta_alunos_ende_bairro; ?>">
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Cidade</label>
                        <input type="text" id="delta_alunos_ende_cidade" name="delta_alunos_ende_cidade" class="form-control" required="required" value="<?= $delta_alunos_ende_cidade; ?>">
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="form-group">
                        <label>UF</label>
                        <input type="text" id="delta_alunos_ende_uf" name="delta_alunos_ende_uf" class="form-control" required="required" value="<?= $delta_alunos_ende_uf; ?>">
                    </div>
                </div>                
            </div>            
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <button class="btn btn-danger" type="submit">
                            <i class="fas fa-edit"></i>Atualizar Dados
                        </button>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <div class="alert alert-danger">
                            <?php echo anchor('delta_aluno', 'Voltar'); ?>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="card-footer" id="conteudo"></div>
</div>