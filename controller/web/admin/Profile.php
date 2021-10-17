<?php
require DIRECTORY . '/controller/web/admin/Main.php';

class Profile extends Routes
{

    public function initView()
    {
        $panel = new AdminSection();
        $panel->checkAccess();
        $this->scripts = [
            ['name' => 'vue-components/vue-tel-input-vuetify.min'],
            ['name' => 'admin/profile.min', 'version' => '1.0.0'],
        ];
        $this->content = new Template("admin/profile");
        $this->title = 'Perfil';

        $this->render();
    }
}
