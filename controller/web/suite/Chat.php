<?php
require DIRECTORY . '/controller/web/suite/Main.php';

class Chat extends Routes 
{

    public function initView() 
    {
        $suite = new SuiteSection();
        $suite->checkAccess();
        $this->scripts = [
            ['name' => 'lib/lodash.min'],
            ['name' => 'lib/viewer.min'],
            ['name' => 'lib/moment.min'],
            ['name' => 'chat/main-v1.0.0.min', 'version' => '1.0.0'],
        ];
        $this->styles = [
            ['name' => 'viewer.min'],
            ['name' => 'chat/main.min'],
        ];
        $this->content = new Template("chat/chat");
        $this->title = 'Suite - Chat';
        
        $this->render();
    }
}
