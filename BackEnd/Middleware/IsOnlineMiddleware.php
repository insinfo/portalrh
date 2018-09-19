<?php
/**
 * Created by PhpStorm.
 * User: isaque
 * Date: 31/07/2018
 * Time: 14:30
 */

namespace Portalrh\Middleware;

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Slim\Http\Response;

use \Firebase\JWT\ExpiredException;
use Portalrh\Util\JWTWrapper;
use \Exception;

use Portalrh\Util\StatusCode;
use Portalrh\Util\StatusMessage;
use Portalrh\Model\VO\Token;

class IsOnlineMiddleware
{
    public function __invoke(Request $request, Response $response, $next)
    {
        try{
        $bearer = $request->getHeader('Authorization');
        $ipClientVisibleByServer = $request->getAttribute('ip_address');
        $method = $request->getMethod();

        if ($bearer) {
            list($token) = sscanf($bearer[0], 'Bearer %s');
            $jwt = JWTWrapper::decode($token);
            $tokenInfo = new Token();
            $tokenInfo->fillFromJwt($jwt);

            $DB_DRIVER = 'pgsql';
            $DB_HOST = DB_HOST_JUBARTE;//'localhost';
            $DB_NAME = DB_NAME_JUBARTE;//'sistemas';
            $DB_USERNAME = DB_USERNAME_JUBARTE;//'sisadmin';
            $DB_PASSWORD = DB_PASSWORD_JUBARTE;//'s1sadm1n';
            $dsn = $DB_DRIVER . ':host=' . $DB_HOST . ';dbname=' . $DB_NAME;
            $connection = new \PDO($dsn, $DB_USERNAME, $DB_PASSWORD);
            $connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            //$connection->exec('SET search_path TO ' . DBConfig::DEFAULT_SCHEMA_NAME);
            $idPessoa = $tokenInfo->getIdPessoa();
            $query = '
            do $$
            begin 
              insert into jubarte.usuarios_online("idPessoa","dataAtividade") values('.$idPessoa.',now());
            exception when unique_violation then
              update jubarte.usuarios_online set "dataAtividade"=now() where "idPessoa"='.$idPessoa.';
            end $$;
            ';
            $statement = $connection->prepare($query);
            $statement->execute();
        }
        }catch (\Exception $e){
        }
        return $next($request, $response);
    }


}