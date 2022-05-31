<?php

namespace App\Controllers;

class Delta_Alunos extends BaseController {

    public function index() {

        $data = array(
            "scripts" => array(
                "delta_alunos.js",
                "util.js"
            )
        );
        echo view('template/header', $data);
        echo view('template/menu');
        echo view('template/content');
        echo view('delta_alunos');
        echo view('template/footer', $data);
        echo view('template/scripts', $data);
    }

    public function backpage() {

        $data = array(
            "scripts" => array(
                "delta_alunos.js",
                "util.js"
            )
        );
        echo view('template/header', $data);
        echo view('template/menu');
        echo view('template/content');
        echo view('delta_alunos');
        echo view('template/footer', $data);
        echo view('template/scripts', $data);
    }

    public function ajax_list_delta_alunos() {
        if ($this->request->isAJAX()) {
            $delta_alunos_model = new \App\Models\Delta_AlunosModel;
            $delta_alunos = $delta_alunos_model->orderBy('delta_alunos_nome', 'asc')->findAll();
            $data = array();
            $tt = 1; //mostra contagem na datatable
            $tb = 0; //carrega campos de footer do datatable
            foreach ($delta_alunos as $value) {
                $foto = $value->delta_alunos_foto == 'sem foto' ? $value->delta_alunos_foto : '<img src="data:image/jpg;base64,' . $value->delta_alunos_foto . '" alt="' . $value->delta_alunos_nome . '" width="29" height="29">';
                $row = array();
                $row[] = $tt;
                $row[] = $value->delta_alunos_nome;
                $row[] = $value->delta_alunos_ende_rua . ',' . $value->delta_alunos_ende_num;
                $row[] = $foto;
                $row[] = '<a class="btn btn-primary" href="' . base_url('redireciona_delta_alunos/?id=' . $value->id_delta_alunos) . '">Editar</a>' ;
                $row[] = anchor('delta_Alunos/delete/'.$value->id_delta_alunos,'Excluir', ['onclick' => 'return confirma()', 'class' => 'btn btn-danger']);                
                ++$tt;
                ++$tb;
                $data[] = $row;
            }
            $json = array(
                "recordsTotal" => $tb,
                "recordsFiltered" => $tb,
                "data" => $data
            );
            echo json_encode($json);
        } else {
            echo view('delta_alunos');
        }
    }

    public function redireciona_delta_alunos() {
        $incluir = NULL;
        $dados = array();
        if ($this->request->getGet('id') == '0') {
            $incluir = 1;
            $dados['id_delta_alunos'] = '';
            $dados['delta_alunos_nome'] = '';
            $dados['delta_alunos_ende_rua'] = '';
            $dados['delta_alunos_ende_num'] = '';
            $dados['delta_alunos_ende_cep'] = '';
            $dados['delta_alunos_ende_bairro'] = '';
            $dados['delta_alunos_ende_cidade'] = '';
            $dados['delta_alunos_ende_uf'] = '';
            $dados['delta_alunos_foto'] = '';
        } else {
            $delta_alunos_model = new \App\Models\Delta_AlunosModel;
            $incluir = 2;
            $dados_alunos = $delta_alunos_model->find($this->request->getGet('id'));
            $dados['id_delta_alunos'] = $dados_alunos->id_delta_alunos;
            $dados['delta_alunos_nome'] = $dados_alunos->delta_alunos_nome;
            $dados['delta_alunos_ende_rua'] = $dados_alunos->delta_alunos_ende_rua;
            $dados['delta_alunos_ende_num'] = $dados_alunos->delta_alunos_ende_num;
            $dados['delta_alunos_ende_cep'] = $dados_alunos->delta_alunos_ende_cep;
            $dados['delta_alunos_ende_bairro'] = $dados_alunos->delta_alunos_ende_bairro;
            $dados['delta_alunos_ende_cidade'] = $dados_alunos->delta_alunos_ende_cidade;
            $dados['delta_alunos_ende_uf'] = $dados_alunos->delta_alunos_ende_uf;
            $dados['delta_alunos_foto'] = $dados_alunos->delta_alunos_foto;
        }
        $data = array(
            "scripts" => array(
                "delta_alunos_crud.js",
                "sweetalert2.all.min.js",
                "jquery.mask.min.js",
                "jquery.validate.js",
                "util.js"
            ),
            "incluir" => $incluir,
            "id_delta_alunos" => $dados['id_delta_alunos'],
            "delta_alunos_nome" => $dados['delta_alunos_nome'],
            "delta_alunos_ende_rua" => $dados['delta_alunos_ende_rua'],
            "delta_alunos_ende_num" => $dados['delta_alunos_ende_num'],
            "delta_alunos_ende_cep" => $dados['delta_alunos_ende_cep'],
            "delta_alunos_ende_bairro" => $dados['delta_alunos_ende_bairro'],
            "delta_alunos_ende_cidade" => $dados['delta_alunos_ende_cidade'],
            "delta_alunos_ende_uf" => $dados['delta_alunos_ende_uf'],
            "delta_alunos_foto" => $dados['delta_alunos_foto']
        );
        echo view('template/header', $data);
        echo view('template/menu');
        echo view('template/content');
        echo view('delta_alunos_crud', $data);
        echo view('template/footer', $data);
        echo view('template/scripts', $data);
    }

    public function delete($id_delta_alunos){
        $delta_alunos_model = new \App\Models\Delta_AlunosModel;
        if($delta_alunos_model->delete($id_delta_alunos)){
            echo view('template/header');
            echo view('template/menu');
            echo view('template/content');
            echo view('messages', [
                'message' => 'Aluno Excluído'
            ]);
            echo view('template/footer');
            echo view('template/scripts');
        }
    }

    public function save_form() {

        $delta_alunos_model = new \App\Models\Delta_AlunosModel;
        $delta_alunos_model->set('delta_alunos_nome', $this->request->getPost('delta_alunos_nome'));
        $delta_alunos_model->set('delta_alunos_ende_rua', $this->request->getPost('delta_alunos_ende_rua'));
        $delta_alunos_model->set('delta_alunos_ende_num', $this->request->getPost('delta_alunos_ende_num'));
        $delta_alunos_model->set('delta_alunos_ende_cep', $this->request->getPost('delta_alunos_ende_cep'));
        $delta_alunos_model->set('delta_alunos_ende_bairro', $this->request->getPost('delta_alunos_ende_bairro'));
        $delta_alunos_model->set('delta_alunos_ende_cidade', $this->request->getPost('delta_alunos_ende_cidade'));
        $delta_alunos_model->set('delta_alunos_ende_uf', $this->request->getPost('delta_alunos_ende_uf'));
        $delta_alunos_model->set('delta_alunos_dt_ult_alteracao', date('Y-m-d H:i:s'));
        $image = $this->request->getFile('delta_alunos_foto');
        $validaimage = $this->validate([
            'delta_alunos_foto' => [
                'uploaded[delta_alunos_foto]',
                'mime_in[delta_alunos_foto,image/jpg,image/jpeg]',
                'max_size[delta_alunos_foto, 8192]'
            ]
        ]);

        if ($validaimage) {
            $imagem = base64_encode(file_get_contents(addslashes($image)));
        } else {
            $imagem = 'sem foto';
        }

        $delta_alunos_model->set('delta_alunos_foto', $imagem);
        $msgfoto = $imagem == 'sem foto' ? 'foto não cadastrada' : 'imagem aceita';

        if ($this->request->getPost('incluir') == '1') {
            $msg_save = $delta_alunos_model->insert() == true ? 1 : 0;
            $msg = $msg_save == 1 ? 'Salvo com sucesso ' . $msgfoto : 'erro';
        } else {
            if ($this->request->getPost('delta_alunos_fotos') == 'sem foto' && $imagem == 'sem foto') {
                $delta_alunos_model->set('delta_alunos_foto', 'sem foto');
            }
            $delta_alunos_model->set('id_delta_alunos', $this->request->getPost('id_delta_alunos'));
            $msg_save = $delta_alunos_model->update() == true ? 1 : 0;
            $msg = $msg_save == 1 ? 'Salvo/Editado com sucesso ' . $msgfoto : 'erro';
        }

        echo view('template/header');
        echo view('template/menu');
        echo view('template/content');
        echo view('messages', [
            'message' => $msg
        ]);
        echo view('template/footer');
        echo view('template/scripts');
    }

}
