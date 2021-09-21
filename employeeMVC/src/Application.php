<?php

namespace StandardFlow;

use PDO;
use StandardFlow\Application\Controller\ControllerIndex;
use StandardFlow\Application\Controller\NotFoundController;
use StandardFlow\Application\Database\Connection;
use StandardFlow\Application\Router;

class Application
{
    private Router $router;

    private Connection $connection;

    private array $config;

    private static Application $instance;

    public function __construct(array $config)
    {
        $this->config = $config;
        $this->initialize();

        self::$instance = $this;
    }

    public static function getInstance(): Application
    {
        return self::$instance;
    }

    public function getConnection(): PDO
    {
        return $this->connection->getConnection();
    }

    public function initialize()
    {
        session_start();

        $this->router = new Router();

        $this->router
            ->addRoute('/', [
                'controller' => ControllerIndex::class,
                'action' => 'index',
            ])->addRoute('/add-employee', [
                'controller' => ControllerIndex::class,
                'action' => 'addEmployee',
            ]);

        $this->connection = new Connection($this->config['database']);
    }

    public function handle(string $path): string
    {
        $handler = $this->router->dispatch($path);

        $controller = $handler['controller'] ?? NotFoundController::class;
        $action = $handler['action'] ?? 'index';

        $class = new $controller();

        return $class->$action() ?? '';
    }
}