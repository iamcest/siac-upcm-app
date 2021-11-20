<?php
require DIRECTORY . '/controller/web/suite/Main.php';

class Updates extends Routes
{

    public function initView()
    {
        $suite = new SuiteSection();
        $this->styles = [['name' => 'updates']];
        $this->scripts = [
            ['name' => 'lib/moment.min'],
            ['name' => 'updates.min', 'version' => '1.0.0'],
        ];
        $this->content = new Template("updates", [
            'notifications' => $suite->total_views, 'access' => $this->get_permissions(),
            'can_manage_suite' => $this->is_user_type('coordinador'),
        ]);        
        $this->render();
    }

}
