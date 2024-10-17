<?php

namespace app\framework\classes;

class Engine
{
    private ?string $layout;
    private string $content;

    private function load()
    {

    }

    private function extends(string $view, array $data = [])
    {
        dd('chegou aqui');
    }

    public function render(string $view, array $data)
    {
        $view = dirname(__FILE__, 2) . "/resources/views/{$view}.php";

        if(!file_exists($view))
        {
            throw new \Exception("View:  {$view} not found");
        }

        ob_start();
        extract($data);
        require $view;
        $content = ob_get_contents();
        ob_end_clean();

        return $content;
    }
}
