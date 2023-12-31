<?php 
namespace app\core;
class Application {

    public Database $db;
    public Router $router;
    public Request $request;
    public Response $response;
    public Controller $controller;
    public static string $ROOT_DIR;
    public static Application $app;   

    public function __construct($rootPath, $config){
        self::$app = $this;
        $this->db = new Database($config['db']);
        self::$ROOT_DIR = $rootPath;
        $this->request = new Request();
        $this->response = new Response();
        $this->router = new Router($this->request, $this->response);
    }

    public function run() {
        echo $this->router->resolve();
    }

    public function getController(): \app\core\Controller {
        return $this->controller;
    }

    public function setController(\app\core\Controller $controller): void {
        $this->controller = $controller;
    }

}