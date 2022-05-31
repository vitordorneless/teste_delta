<div class="card">
    <div class="card-header">
        <h3 class="card-title">Alunos</h3>
    </div>
    <div class="card-body">
        <div class="row">
            <a class="btn btn-primary" href="<?= base_url('redireciona_delta_alunos/?id=0'); ?>">Incluir</a><br><br>
        </div>
        <div class="container mt-5">
            <div class="alert alert-info">
                <?php echo $message; ?>
            </div>
            <div class="alert alert-danger">
                <?php echo anchor('delta_aluno', 'Voltar'); ?>
            </div>
        </div>
    </div>
</div>