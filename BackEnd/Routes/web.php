<?php

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

// ROTAS DE WEBPAGES
$app->group('/', function () use ($app)
{
    $app->get('/extratoBiometria', function (Request $request, Response $response, $args) use ($app)
    {
        return $this->view->render($response, 'PontoEletronicoView.php');
    });
    //tela de gerenciamento de Justifica do Ponto Eletronico
    $app->get('/justificaPonto', function (Request $request, Response $response, $args) use ($app)
    {
        return $this->view->render($response, 'JustificaPontoView.php');
    });

    $app->get('/relogioBiometria', function (Request $request, Response $response, $args) use ($app)
    {
        return $this->view->render($response, 'RelogiosBiometriaView.php');
    });
    $app->get('/cadastroServidor', function (Request $request, Response $response, $args) use ($app)
    {
        return $this->view->render($response, 'CadastroServidorView.php');
    });
    $app->get('/dashboardBiometria', function (Request $request, Response $response, $args) use ($app)
    {
        return $this->view->render($response, 'DashboardBiometriaView.php');
    });

});