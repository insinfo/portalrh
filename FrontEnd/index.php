<?php
/**
 * ARQUIVO DE BOOTSTRAP DO PORTALRH
 **/
$ini_array = parse_ini_file('../.env');
define('VIEWS_DIR_PORTALRH',$ini_array['VIEWS_DIR']);
define('DB_HOST_PORTALRH',$ini_array['DB_HOST']);
define('DB_NAME_PORTALRH',$ini_array['DB_NAME']);
define('DB_USERNAME_PORTALRH',$ini_array['DB_USERNAME']);
define('DB_PASSWORD_PORTALRH',$ini_array['DB_PASSWORD']);
define('BASE_DIR_PORTALRH',$ini_array['BASE_DIR']);
define('APP_DEPLOY_SECRET_PORTALRH',$ini_array['APP_DEPLOY_SECRET']);
define('PROXY_PORTALRH',$ini_array['PROXY']);
define('STORAGE_PATH_PORTALRH',$ini_array['STORAGE_PATH']);
define('WEB_ROOT_PATH_PORTALRH',$ini_array['WEB_ROOT_PATH']);

$BASE_DIR = dirname(__FILE__);
$VIEWS_DIR = $BASE_DIR.'/View';

require_once '../BackEnd/Util/Dotenv.php';
$dotenv = new Dotenv\Dotenv( dirname(dirname(__FILE__)) );
$dotenv->load();

require_once '../../pmroPadrao/src/start.php';
require_once '../BackEnd/vendor/autoload.php';

//use \Slim\Http\Request;
//use \Slim\Http\Response;
use Slim\Handlers\NotFound;
use Slim\Views\Twig;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;

//instancia o slim
//$app = new \Slim\App;
$app = new \Slim\App([
    'settings' => [
        // Only set this if you need access to route within middleware
        'determineRouteBeforeAppMiddleware' => true,
        'displayErrorDetails' => true
    ]
]);
// obtem um container
$container = $app->getContainer();
// Registra componente no container para abilitar o Twig html render
$container['view'] = function ($container) use ($VIEWS_DIR){
    $view = new \Slim\Views\Twig($VIEWS_DIR, [
        'cache' => false
    ]);
    // Instantiate and add Slim specific extension
    $basePath = rtrim(str_ireplace('index.php', '', $container['request']->getUri()->getBasePath()), '/');
    $view->addExtension(new Slim\Views\TwigExtension($container['router'], $basePath));

    return $view;
};
//manipulador de pagina de erro 404
class NotFoundHandler extends NotFound {
    private $view;
    private $templateFile;
    public function __construct(Twig $view, $templateFile) {
        $this->view = $view;
        $this->templateFile = $templateFile;
    }
    public function __invoke(ServerRequestInterface $request, ResponseInterface $response) {
        parent::__invoke($request, $response);
        $this->view->render($response, $this->templateFile);
        return $response->withStatus(404);
    }
}
$container['notFoundHandler'] = function ($c) {
    return new NotFoundHandler($c->get('view'), '404.php');
};

//REGISTRA O MIDDLEWARE IP_ADDRES
$checkProxyHeaders = false; // Note: Never trust the IP address for security processes!
$trustedProxies = ['192.168.66.111']; // Note: Never trust the IP address for security processes!
$app->add(new Portalrh\Middleware\IpAddressMiddleware($checkProxyHeaders, $trustedProxies));
// Render html em rota
// ROTAS DE WEBPAGES
require_once '../BackEnd/Routes/web.php';
// ROTAS DE WEBSERVICE REST
require_once '../BackEnd/Routes/webservice.php';
$app->run();