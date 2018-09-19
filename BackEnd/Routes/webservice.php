<?php

use \Slim\Http\Request;
use \Slim\Http\Response;

use Portalrh\Middleware\AuthMiddleware;
use Portalrh\Middleware\LogMiddleware;
use Portalrh\Middleware\IsOnlineMiddleware;
use Portalrh\Util\StatusCode;
use Portalrh\Util\StatusMessage;

use Portalrh\Controller\PessoasController;
use Portalrh\Controller\CargoController;
use Portalrh\Controller\ServidorController;
use Portalrh\Controller\FuncaoGratificadaController;
use Portalrh\Controller\VinculoController;
use Portalrh\Controller\JornadaTrabalhoController;
use Portalrh\Controller\LocalBiometriaController;
use Portalrh\Controller\EstatisticaBiometriaController;
use Portalrh\Controller\PontoEletrController;
use Portalrh\Controller\JustificaPontoController;

// ROTAS DE WEBSERVICE REST
$app->group('/api', function () use ($app) {

    //**************** ROTAS PESSOA ******************/

    //OBTEM UMA PESSOA
    $app->get('/pessoas/[{id}/{tipo}]', function (Request $request, Response $response, $args) use ($app) {
        return PessoasController::get($request, $response);
    });

    //CRIA E ATUALIZA PESSOA
    $app->put('/pessoas/[{id}]', function (Request $request, Response $response, $args) use ($app) {
        return PessoasController::save($request, $response);
    });
    //LISTA PESSOA
    $app->post('/pessoas', function (Request $request, Response $response, $args) use ($app) {
        return PessoasController::getAll($request, $response);
    });
    //DELETA PESSOAS {ids,tipoPessoa}
    $app->delete('/pessoas', function (Request $request, Response $response, $args) use ($app) {
        return PessoasController::delete($request, $response);
    });

    /** *************** ROTAS CADASTRO SERVIDOR BIOMETRIA ***************** **/
    //CRIA OU ATUALIZA SERVIDOR
    $app->put('/servidores', function (Request $request, Response $response, $args) use ($app) {
        return ServidorController::save($request, $response);
    });
    //rota de importação
    $app->put('/servidores/import', function (Request $request, Response $response, $args) use ($app) {
        return ServidorController::saveImport($request, $response);
    });
    //obtem um servidor por CPF
    $app->get('/servidores/cpf/[{cpf}]', function (Request $request, Response $response, $args) use ($app) {
        return ServidorController::getByCPF($request, $response);
    });
    //obtem um servidor por CPF
    $app->get('/servidores/token', function (Request $request, Response $response, $args) use ($app) {
        return ServidorController::getByToken($request, $response);
    });
    //lista servidores
    $app->post('/servidores', function (Request $request, Response $response, $args) use ($app) {
        return ServidorController::getAll($request, $response);
    });

    //gera um arquivo excel xlsx listando servidores que cadastraram a bimetria
    $app->get('/servidores/biometria/xlsx', function (Request $request, Response $response, $args) use ($app) {
        return ServidorController::genXlsxAllBio($request, $response);
    });

    //gera um arquivo excel xlsx listando todos servidores
    $app->get('/servidores/all/xlsx', function (Request $request, Response $response, $args) use ($app) {
        return ServidorController::genXlsxAll($request, $response);
    });

    //lista cargos
    $app->post('/cargos', function (Request $request, Response $response, $args) use ($app) {
        return CargoController::getAll($request, $response);
    });

    $app->get('/cargo/pessoa/{idPessoa}', function ($request, $response, $args) use ($app) {
        try {
            $result =  CargoController::cargoPorPessoa($args['idPessoa']);
            return $response->withStatus(StatusCode::SUCCESS)
                ->withJson($result);
        } catch (Exception $e) {
            return $response->withStatus(StatusCode::BAD_REQUEST)
            ->withJson((['message' => StatusMessage::MENSAGEM_ERRO_PADRAO,
                'exception' => $e->getMessage(), 'line' => $e->getLine(), 'file' => $e->getFile()]));
        }
    });

    //lista Funcao Gratificada
    $app->post('/funcoes', function (Request $request, Response $response, $args) use ($app) {
        return FuncaoGratificadaController::getAll($request, $response);
    });
    //lista Vinculos
    $app->post('/vinculos', function (Request $request, Response $response, $args) use ($app) {
        return VinculoController::getAll($request, $response);
    });
    //lista Jornada de Trabalho
    $app->post('/jornadas', function (Request $request, Response $response, $args) use ($app) {
        return JornadaTrabalhoController::getAll($request, $response);
    });
    //lista Locais da Biometria
    $app->post('/locais', function (Request $request, Response $response, $args) use ($app) {
        return LocalBiometriaController::getAll($request, $response);
    });
    /** *************** FIM ROTAS CADASTRO SERVIDOR BIOMETRIA ***************** **/

    /********************* ROTAS PONTO ELETRONICO (BIOMETRIA) *************************/
    //lista estrato ponto eletronico de um servidor logado
    $app->post('/ponto/eletronico/marcacao/token', function (Request $request, Response $response, $args) use ($app) {
        return PontoEletrController::getMarcacaoOfUserLogged($request, $response);
    });

    //lista estrato ponto eletronico de um servidor logado
    $app->post('/ponto/eletronico/marcacao/cpf', function (Request $request, Response $response, $args) use ($app) {
        return JustificaPontoController::getMarcacaoOfServidor($request, $response);
    });

    //lista todos os servidores de organograma
    $app->post('/ponto/eletronico/servidores/organograma', function (Request $request, Response $response, $args) use ($app) {
        return JustificaPontoController::getAllServidorOfOrganograma($request, $response);
    });

    //lista todos os grupos de relogios
    $app->post('/ponto/eletronico/grupo/rep', function (Request $request, Response $response, $args) use ($app) {
        return JustificaPontoController::getAllRep($request, $response);
    });

})->add(new AuthMiddleware())->add(new LogMiddleware())->add(new IsOnlineMiddleware());

//rotas publicas e livres
$app->group('/api', function () use ($app) {

    //lista de servidores COM e SEM Biometria
    $app->post('/estatisticas/biometria', function (Request $request, Response $response, $args) use ($app) {
        return EstatisticaBiometriaController::getServidoresBiometria($request, $response);
    });
    //lista de servidores COM e SEM Biometria
    $app->get('/estatisticas/biometria/cadastros', function (Request $request, Response $response, $args) use ($app) {
        return EstatisticaBiometriaController::getEstatisticaBiometria($request, $response);
    });

});

