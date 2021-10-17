<?php

class Reset extends Routes
{

    public function initView()
    {
        $this->is_logged ? header("Location: " . $_SESSION['redirect_url']) : '';

        $this->header = false;
        $this->styles = [['name' => 'login']];
        $this->scripts = [
            ['name' => 'reset', 'version' => '1.0.0'],
        ];
        $this->footer = false;
        $this->content = new Template("reset");
        $this->title = 'Reestablecer Contraseña';

        $this->render();
    }
}
