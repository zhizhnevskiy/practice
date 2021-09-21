<?php

namespace StandardFlow\Application\View;

interface ViewInterface
{
    public function setLayout(string $layoutName): self;

    public function render(string $viewName, array $parameters = []): string;
}