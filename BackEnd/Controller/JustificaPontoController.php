<?php
/**
 * Created by PhpStorm.
 * User: isaque
 * Date: 17/09/2018
 * Time: 11:16
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
use Portalrh\Model\VO\ViewServidores;

class JustificaPontoController
{
    //lista marcação de ponto eletronico
    public static function getMarcacaoOfServidor(Request $request, Response $response)
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
            $cpf = isset($params['cpf']) ? $params['cpf'] : $tok->getCpf();

            $pontoEletronicoDAL = new PontoEletronicoDAL();
            $result = $pontoEletronicoDAL->getMarcacao($cpf, $date, $limit, $offset, $ordering);

            return $response->withStatus(StatusCode::SUCCESS)->withJson($result);

        } catch (Exception $e) {
            return $response->withStatus(StatusCode::BAD_REQUEST)
                ->withJson((['message' => StatusMessage::MENSAGEM_ERRO_PADRAO, 'exception' => $e->getMessage(), 'line' => $e->getLine(), 'file' => $e->getFile()]));
        }
    }

    //lista todos servidores
    public static function getAllServidorOfOrganograma(Request $request, Response $response)
    {
        try {
            $params = $request->getParsedBody();
            $draw = isset($params['draw']) ? $params['draw'] : null;
            $limit = isset($params['length']) ? $params['length'] : null;
            $offset = isset($params['start']) ? $params['start'] : null;
            $search = isset($params['search']) ? $params['search'] : null;
            $ordering = isset($params['ordering']) ? $params['ordering'] : null;

            $idLotacao = isset($params['idLotacao']) ? $params['idLotacao'] : null;

            DBLayer::Connect();
            $query = DBLayer::table(ViewServidores::TABLE_NAME);
            //
            if ($idLotacao) {
                $query->where(ViewServidores::ID_LOTACAO, '=', $idLotacao);
            }

            if ($search) {
                $query->where(function ($query) use ($request, $search) {
                    $search = '%' . $search . '%';
                    $query->orWhere(ViewServidores::MATRICULA, 'ilike', $search);
                    $query->orWhere(ViewServidores::NOME, 'ilike', $search);
                    $query->orWhere(ViewServidores::CPF, 'ilike', $search);
                    $query->orWhere(ViewServidores::RG, 'ilike', $search);
                    $query->orWhere(ViewServidores::SIGLA_LOTACAO, 'ilike', $search);
                    $query->orWhere(ViewServidores::NOME_LOTACAO, 'ilike', $search);
                });
            }

            $totalRecords = $query->count();
            //implementação da ordenação do ModernDataTable
            if ($ordering != null && count($ordering) > 0) {
                foreach ($ordering as $item) {
                    $query->orderBy($item['columnKey'], $item['direction']);
                }
            }
            /*if ($limit != null && $offset != null) {
                $data = $query->limit($limit)->offset($offset)->get();
            } else {
                $data = $query->get();
            }*/
            $data = $query->limit($limit)->offset($offset)->get();

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

    //lista todos os grupos de relogios
    public static function getAllRep(Request $request, Response $response)
    {
        try {
            $params = $request->getParsedBody();
            $draw = isset($params['draw']) ? $params['draw'] : null;
            $limit = isset($params['length']) ? $params['length'] : null;
            $offset = isset($params['start']) ? $params['start'] : null;
            $search = isset($params['search']) ? $params['search'] : null;
            $ordering = isset($params['ordering']) ? $params['ordering'] : null;

            //  $idLotacao = isset($params['idLotacao']) ? $params['idLotacao'] : null;

            DBLayer::Connect();
            $query = DBLayer::table('gruporep');

            /*if ($idLotacao) {
                $query->where(ViewServidores::ID_LOTACAO, '=', $idLotacao);
            }*/

            /* if ($search) {
                 $query->where(function ($query) use ($request, $search) {
                     $search = '%' . $search . '%';
                     $query->orWhere(ViewServidores::MATRICULA, 'ilike', $search);

                 });
             }*/

            $totalRecords = $query->count();
           // $query->orderBy('', '');

            /*if ($limit != null && $offset != null) {
                $data = $query->limit($limit)->offset($offset)->get();
            } else {
                $data = $query->get();
            }*/
            $data = $query->limit($limit)->offset($offset)->get();

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