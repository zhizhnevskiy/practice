<?php

namespace Employee;

use Employee\Controller\ControllerIndex;
use Employee\Controller\ControllerBase;
use Employee\View\Router;

class Application
{
    private Router $router;

    private array $config;

    /**
     * Application constructor.
     * @param array $config
     */

    public function __construct(array $config)
    {
        $this->config = $config;
        $this->initialize();
    }

    public function initialize()
    {
        $this->router = new Router();

        $this->router
            ->addRoute('/', [
                'controller' => ControllerIndex::class,
                'action' => 'index'
            ]);
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