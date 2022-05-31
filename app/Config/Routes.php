<?php

namespace Config;

$routes = Services::routes();

if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Delta_Alunos');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

$routes->add('delta_aluno', 'Delta_Alunos::backpage');
$routes->add('ajax_list_delta_alunos', 'Delta_Alunos::ajax_list_delta_alunos');
$routes->add('redireciona_delta_alunos', 'Delta_Alunos::redireciona_delta_alunos');
$routes->add('salva_alunos', 'Delta_Alunos::save_form');

if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
