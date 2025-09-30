<?php

namespace Core\Mvc;

class View
{
    protected $templatePath;
    protected $layoutPath;

    public function __construct($templatePath = __DIR__ . '/../../templates', $layoutPath = __DIR__ . '/../../layouts')
    {
        $this->templatePath = $templatePath;
        $this->layoutPath = $layoutPath;
    }

    public function render($template, $data = [])
    {
        extract($data);
        ob_start();
        include $this->templatePath . '/' . $template;
        $content = ob_get_clean();

        include $this->layoutPath . '/layout.html.php';
    }
}