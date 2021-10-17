<?php
require DIRECTORY . '/controller/web/admin/Main.php';

class Announcements extends Routes
{

    public function initView()
    {
        $panel = new AdminSection();
        $panel->checkAccess();
        $this->scripts = [
            ['name' => 'lib/moment.min'],
            ['name' => 'vue-components/vue2-editor.min'],
            ['name' => 'admin/announcements.min', 'version' => '1.0.0'],
        ];
        $this->content = new Template("admin/announcements");
        $this->title = 'Administración - Notificaciones';

        $this->render();
    }
}
