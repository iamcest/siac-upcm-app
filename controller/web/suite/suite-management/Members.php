<?php
require DIRECTORY . '/controller/web/suite/Main.php';

class Members extends Routes
{

    public function initView()
    {
        $suite = new SuiteSection(true);
        $this->styles = [['name' => 'table_nh']];
        $this->scripts = [
            ['name' => 'vue-components/vue-tel-input-vuetify.min'],
            ['name' => 'suite-management/members.min', 'version' => '1.0.0'],
        ];
        $this->content = new Template("suite-management/members", [
            'notifications' => $suite->total_views,
            'can_manage_suite' => $this->is_user_type('coordinador'),
        ]);

        $this->render();
    }

}
