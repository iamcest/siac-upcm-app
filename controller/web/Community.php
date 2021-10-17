<?php

class Community extends Routes
{

    public function initView()
    {
        $this->scripts = [
            ['name' => 'lib/moment.min'],
            ['name' => 'community', 'version' => '1.0.0'],
        ];
        $this->styles = [['name' => 'community']];
        $this->content = new Template("community");
        $this->title = 'Comunidad';

        $this->render();
    }
}
