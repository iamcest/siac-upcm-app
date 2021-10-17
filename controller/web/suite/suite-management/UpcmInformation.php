<?php
require DIRECTORY . '/controller/web/suite/Main.php';

class UpcmInformation extends Routes
{

    public function initView()
    {
        $suite = new SuiteSection(true);
        $this->scripts = [
            ['name' => 'suite-management/upcm-information.min', 'version' => '1.0.0'],
        ];
        $this->content = new Template("suite-management/upcm-information", [
            'notifications' => $suite->total_views,
            'can_manage_suite' => $this->is_user_type('coordinador'),
        ]);

        $this->render();
    }

}
