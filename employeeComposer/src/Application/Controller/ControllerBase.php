<?php

namespace StandardFlow\Application\Controller;

use StandardFlow\Application\View\Plain;
use StandardFlow\Application\View\ViewInterface;

abstract class ControllerBase
{
    protected ViewInterface $view;

    /**
     * ControllerBase constructor.
     */
    public function __construct()
    {
        $plain = new Plain(
            PROJECT_DIR . '/views/layouts',
            PROJECT_DIR . '/views',
        );

        $this->view = $plain->setLayout('base');
    }
}