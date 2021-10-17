<?php
require DIRECTORY . '/controller/web/admin/Main.php';

class Articles extends Routes
{

    public function initView()
    {
        $panel = new AdminSection();
        $panel->checkAccess();
        $this->scripts = [
            ['name' => 'vue-components/vue2-editor.min'],
            ['name' => 'admin/articles', 'version' => '1.0.0'],
        ];
        $this->content = new Template("admin/articles");
        $this->title = 'Administración - Artículos';

        $this->render();
    }
}
