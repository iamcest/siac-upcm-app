<?php
require DIRECTORY . '/controller/web/admin/Main.php';

class Admin extends Routes
{

    public function initView()
    {
        $panel = new AdminSection();
        $panel->checkAccess();
        $this->scripts = [
            ['name' => 'roles/data.min'],
            ['name' => 'admin/upcm.min']
        ];
        $this->content = new Template("admin/upcm");
        $this->title = 'Administración - Dashboard';

        $this->render();
    }
}
