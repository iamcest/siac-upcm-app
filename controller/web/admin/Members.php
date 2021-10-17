<?php
require DIRECTORY . '/controller/web/admin/Main.php';

class Members extends Routes
{

    public function initView()
    {
        $panel = new AdminSection();
        $panel->checkAccess();
        $this->scripts = [
            ['name' => 'vue-components/vue-tel-input-vuetify.min'],
            ['name' => 'roles/data.min'],
            ['name' => 'admin/members.min', 'version' => '1.0.0'],
        ];
        $this->content = new Template("admin/members");
        $this->title = 'Administración - Miembros';

        $this->render();
    }
}
