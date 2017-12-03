<?php


namespace App\Views;


use App\Traits\Magic;

class Author
{
    use Magic;

    public function render($template)
    {
        ob_start();
        foreach ($this->var_buffer as $item => $value) {
            $$item = $value;
        }
        include $template;
        $result_content = ob_get_contents();
        ob_end_clean();
        return $result_content;
    }

    public function display($template)
    {
        echo $this->render($template);
    }

}