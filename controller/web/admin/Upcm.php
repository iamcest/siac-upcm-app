<?php
require DIRECTORY . '/controller/web/admin/Main.php';

class Upcm extends Routes
{

    public function initView()
    {
        $panel = new AdminSection();
        $panel->checkAccess();
        $this->scripts = [
            ['name' => 'roles/data.min'],
            ['name' => 'admin/upcm.min', 'version' => '1.0.0'],
        ];
        $this->content = new Template("admin/upcm");
        $this->title = 'Administración - UPCMS';

        $this->render();
    }
}
