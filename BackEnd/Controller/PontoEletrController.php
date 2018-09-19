<?php
/**
 * Created by PhpStorm.
 * User: isaque
 * Date: 17/08/2018
 * Time: 11:22
 */

namespace Portalrh\Controller;

use \Slim\Http\Request;
use \Slim\Http\Response;
use \Exception;

use Portalrh\Util\DBLayer;
use Portalrh\Util\Utils;
use Portalrh\Util\StatusCode;
use Portalrh\Util\StatusMessage;

use Portalrh\Model\VO\PontoEletronico;
use Portalrh\Model\VO\Token;
use Portalrh\Model\DAL\PontoEletronicoDAL;

class PontoEletrController
{
    //lista marcação de ponto eletronico do servidor logado
    public static function getMarcacaoOfUserLogged(Request $request, Response $response)
    {
        try {
            $tok = new Token($request);
            $params = $request->getParsedBody();
            $draw = isset($params['draw']) ? $params['draw'] : null;
            $limit = isset($params['length']) ? $params['length'] : null;
            $offset = isset($params['start']) ? $params['start'] : null;
            $search = isset($params['search']) ? '%' . $params['search'] . '%' : null;
            $ordering = isset($params['ordering']) ? $params['ordering'] : null;
            $date = isset($params['date']) ? $params['date'] : date('Y-m-d', time());

            $pontoEletronicoDAL = new PontoEletronicoDAL();
            $result = $pontoEletronicoDAL->getMarcacao($tok->getCpf(), $date, $limit, $offset, $ordering);

            return $response->withStatus(StatusCode::SUCCESS)->withJson($result);

        } catch (Exception $e) {
            return $response->withStatus(StatusCode::BAD_REQUEST)
                ->withJson((['message' => StatusMessage::MENSAGEM_ERRO_PADRAO, 'exception' => $e->getMessage(), 'line' => $e->getLine(), 'file' => $e->getFile()]));
        }

    }
}