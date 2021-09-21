<?php

namespace StandardFlow\Application\View;

use Exception;

class Plain implements ViewInterface
{
    private array $parameters = [];

    private string $pathToLayout;

    private string $pathToView;

    /**
     * Каталог с лайаутами
     * @var string
     */
    private string $layoutsDir;

    /**
     * Каталог с вьюшками
     * @var string
     */
    private string $viewsDir;

    /**
     * Plain constructor.
     * @param string $layoutsDir
     * @param string $viewsDir
     * @throws Exception
     */
    public function __construct(string $layoutsDir, string $viewsDir)
    {

        if (!file_exists($layoutsDir)) {
            throw new Exception('Layout directory not found! ');
        }

        if (!file_exists($viewsDir)) {
            throw new Exception('Views directory not found! ');
        }

        $this->layoutsDir = $layoutsDir;
        $this->viewsDir = $viewsDir;
    }

    /**
     * @throws Exception
     */
    public function setLayout(string $layoutName): self
    {
        $path = implode(DIRECTORY_SEPARATOR, [$this->layoutsDir, $layoutName . '.php']);

        if (!file_exists($path)) {
            throw new Exception('Layout not found! ');
        }

        $this->pathToLayout = $path;

        return $this;
    }

    /**
     * @throws Exception
     */
    public function render(string $viewName, array $parameters = []): string
    {
        $path = implode(DIRECTORY_SEPARATOR, [$this->viewsDir, $viewName . '.php']);

        if (!file_exists($path)) {
            throw new Exception('View not found!');
        }

        $this->pathToView = $path;

        $this->parameters = $parameters;

        extract($parameters);

        ob_start();

        require $this->pathToLayout;

        return ob_get_clean();
    }

    private function renderView(): string
    {
        extract($this->parameters);

        ob_start();

        require $this->pathToView;

        return ob_get_clean();
    }
}