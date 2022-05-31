<script>
    function confirma(){
        if(!confirm('Realmente quer excluir este Aluno?')){
            return false;
        }
        return true;
    }
</script>
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Alunos</h3>
    </div>
    <div class="card-body">
        <div class="row">
            <a class="btn btn-primary" href="<?= base_url('redireciona_delta_alunos/?id=0'); ?>">Incluir</a><br><br>
        </div>
        <table id="table_delta_alunos" class="table table-responsive table-bordered table-hover">
            <thead>
                <tr>
                    <th>#</th>                    
                    <th>Nome</th>
                    <th>Endereço</th>
                    <th>Foto</th>                    
                    <th>Editar</th>
                    <th>Excluir</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>
</div>