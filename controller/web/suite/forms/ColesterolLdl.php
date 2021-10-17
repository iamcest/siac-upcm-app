<?php
require DIRECTORY . '/controller/web/suite/Main.php';

class ColesterolLdl extends Routes
{
    
    public function initView()
    {
        $suite = new SuiteSection();
        !$this->has_access('calculations_and_algorithms_access') ? header("Location: " . SITE_URL . "/") : '';
        $this->scripts = [
            ['name' => 'calculations/dx-ecg-cornell-sokolow', 'version' => '1.0.0'],
        ];
        $this->content = new Template("calculations/dx-ecg-cornell-sokolow", [
            'notifications' => $suite->total_views, 'access' => $this->get_permissions(),
            'can_manage_suite' => $this->is_user_type('coordinador'),
        ]);
        $this->title = 'Suite - Fórmulas';

        $this->render();
    }
}
