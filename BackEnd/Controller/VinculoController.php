<?php
/**
 * Created by PhpStorm.
 * User: isaque
 * Date: 17/04/2018
 * Time: 18:36
 */

namespace Portalrh\Controller;

use \Slim\Http\Request;
use \Slim\Http\Response;
use \Exception;

use Portalrh\Util\DBLayer;
use Portalrh\Util\Utils;
use Portalrh\Util\StatusCode;
use Portalrh\Util\StatusMessage;

use Portalrh\Model\VO\Vinculo;

class VinculoController
{
    public static function getAll(Request $request, Response $response)
    {
        try {

            $params = $request->getParsedBody();
            $draw = isset($params['draw']) ? $params['draw'] : null;
            $limit = isset($params['length']) ? $params['length'] : null;
            $offset = isset($params['start']) ? $params['start'] : null;
            $search =  isset($params['search']) ? '%' . $params['search'] . '%' : null;

            DBLayer::Connect();
            $query = DBLayer::table(Vinculo::TABLE_NAME);

            $totalRecords = $query->count();

            if($limit && $offset)
            {
                $data = $query->limit($limit)->offset($offset)->get();
            }
            else
            {
                $data = $query->get();
            }

            $result['draw'] = $draw;
            $result['recordsFiltered'] = $totalRecords;
            $result['recordsTotal'] = $totalRecords;
            $result['data'] = $data;

            return $response->withStatus(StatusCode::SUCCESS)
                ->withJson($result);

        } catch (Exception $e) {
            return $response->withStatus(StatusCode::BAD_REQUEST)
                ->withJson((['message' => StatusMessage::MENSAGEM_ERRO_PADRAO,
                    'exception' => $e->getMessage(), 'line' => $e->getLine(), 'file' => $e->getFile()]));
        }


    }
}