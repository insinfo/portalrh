<?php
/**
 * Created by PhpStorm.
 * User: Isaque
 * Date: 14/07/2017
 * Time: 18:09
 */

namespace Portalrh\Util;
class DBConfig
{
    const DEFAULT_CONNECTION = 'laravel';    
    const DEFAULT_DATABASE_NAME = 'sistemas';
    const DEFAULT_SCHEMA_NAME = 'jubarte';

    public static function getConnections()
    {
        return $connections = [

            'connections' => [

                'sqlite' => [
                    'driver' => 'sqlite',
                    'database' => '',
                    'prefix' => '',
                ],

                'mysql' => [
                    'driver' => 'mysql',
                    'host' => 'localhost',
                    'port' => '3306',
                    'database' => 'api',
                    'username' => 'root',
                    'password' => '',
                    'unix_socket' => 'DB_SOCKET',
                    'charset' => 'utf8',
                    'collation' => 'utf8_unicode_ci',
                    'prefix' => '',
                    'strict' => true,
                    'engine' => null,
                ],
                'laravelMysql' => [
                    'driver' => 'mysql',
                    'host' => 'localhost',
                    'port' => '3306',
                    'database' => 'cep.gpbe.17.01.2014',
                    'username' => 'sisadmin',
                    'password' => 's1sadm1n',
                    'charset' => 'utf8',
                    'collation' => 'utf8_general_ci',
                    'prefix' => '',
                    'strict' => true,
                    'engine' => null,
                ],

                'laravel' => [
                    'driver' => 'pgsql',
                    'host' => DB_HOST_PORTALRH,//getenv('DB_HOST'),/*10.0.0.215 192.168.133.12*/
                    'port' => '5432',
                    'database' => 'sistemas',
                    'username' => 'sisadmin',
                    'password' => 's1sadm1n',
                    'charset' => 'utf8',
                    'prefix' => '',
                    'schema' => ['jubarte', 'ciente', 'pmro_padrao', 'portal_rh'],
                    'sslmode' => 'prefer',
                ],

                'pontoEletronicoPMRO' => [
                    'driver' => 'pgsql',
                    'host' => '179.233.129.76',
                    'port' => '5434',
                    'database' => 'vw_pmro',
                    'username' => 'vw_pmro',
                    'password' => 'newpmro@#100',
                    'charset' => 'utf8',
                    'prefix' => '',
                    'schema' => ['public'],
                    'sslmode' => 'prefer',
                ],

                'saliTeste' => [
                    'driver' => 'pgsql',
                    'host' => '192.168.66.19',
                    'port' => '5432',
                    'database' => 'siamweb',
                    'username' => 'sw.suporte',
                    'password' => 'suporte',
                    'charset' => 'utf8',
                    'prefix' => '',
                    'schema' => 'pmro_padrao',
                    'sslmode' => 'prefer',
                ],
                'saliProducao' => [
                    'driver' => 'pgsql',
                    'host' => '192.168.66.4',
                    'port' => '5432',
                    'database' => 'siamweb',
                    'username' => 'sw.suporte',
                    'password' => 'suporte',
                    'charset' => 'utf8',
                    'prefix' => '',
                    'schema' => 'public',
                    'sslmode' => 'prefer',
                ],
                'pgsql' => [
                    'driver' => 'pgsql',
                    'host' => 'localhost',
                    'port' => '5432',
                    'database' => 'sistemas',
                    'username' => 'postgres',
                    'password' => 's1sadm1',
                    'charset' => 'utf8',
                    'prefix' => '',
                    'schema' => 'public',
                    'sslmode' => 'prefer',
                ],

                'sqlsrv' => [
                    'driver' => 'sqlsrv',
                    'host' => 'DB_HOST',
                    'port' => 'DB_PORT',
                    'database' => 'DB_DATABASE',
                    'username' => 'DB_USERNAME',
                    'password' => 'DB_PASSWORD',
                    'charset' => 'utf8',
                    'prefix' => '',
                ],

            ],

        ];
    }

}