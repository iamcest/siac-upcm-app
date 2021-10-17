<?php
require DIRECTORY . '/controller/web/suite/Main.php';

class Notifications extends Routes 
{
    
    public function initView() 
    {
        !$this->has_access('notifications_access') ? header("Location: " . SITE_URL . "/") : '';
        $suite = new SuiteSection();
        $suite->checkAccess();
        $this->scripts = [
            ['name' => 'lib/moment.min'],
            ['name' => 'vue-components/vue2-editor.min'],
            ['name' => 'notifications.min', 'version' => '1.0.0'],
        ];
        $this->content = new Template("notifications", [
            'access' => $this->get_permissions(),
            'can_manage_suite' => $this->is_user_type('coordinador')
        ]);
        $this->title = 'Suite - Notificaciones';

        $this->render();
    }
}
