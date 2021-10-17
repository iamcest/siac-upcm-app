<?php

class Tos extends Routes
{

    public function initView()
    {
        $this->scripts = [
            ['name' => 'agreement'],
        ];
        $this->content = new Template("agreement");
        $this->title = 'Suite - Política de Privacidad';

        $this->render();
        exit();
    }
}
