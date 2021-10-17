<?php
require DIRECTORY . '/controller/web/suite/Main.php';

class Profile extends Routes 
{

    public function initView() 
    {
        $suite = new SuiteSection();
        $this->scripts = [
            ['name' => 'vue-components/vue-tel-input-vuetify.min'],
            ['name' => 'settings/profile', 'version' => '1.0.0'],
        ];
        $this->content = new Template("settings/profile", [
            'notifications' => $suite->total_views, 'access' => $this->get_permissions(),
            'can_manage_suite' => $this->is_user_type('coordinador'),
        ]);
        $this->title = 'Perfil';

        $this->render();
    }
}
