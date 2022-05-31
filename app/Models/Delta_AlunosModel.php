<?php

namespace App\Models;

use CodeIgniter\Model;

class Delta_AlunosModel extends Model {

    protected $table = 'delta_alunos';
    protected $primaryKey = 'id_delta_alunos';
    protected $allowedFields = [
                                'delta_alunos_nome', 
                                'delta_alunos_ende_rua', 
                                'delta_alunos_ende_num', 
                                'delta_alunos_ende_cep',
                                'delta_alunos_ende_bairro',
                                'delta_alunos_ende_cidade',
                                'delta_alunos_ende_uf',
                                'delta_alunos_foto',                                
                                'delta_alunos_dt_ult_alteracao'
                                ];
    protected $returnType = 'object';

}
