<?php
require DIRECTORY . '/controller/web/suite/Main.php';

class PatientMaterial extends Routes
{

    public function initView()
    {
        !$this->has_access('patient_material_access') ? header("Location: " . SITE_URL . "/") : '';
        $suite = new SuiteSection();
        $this->scripts = [
            ['name' => 'lib/moment.min'],
            ['name' => 'patient-material.min', 'version' => '1.0.1'],
            ['name' => 'vue-components/vue2-editor.min'],
        ];
        $this->content = new Template("patient-material/patient-material", [
            'notifications' => $suite->total_views,
            'access' => $this->get_permissions(),
            'can_manage_suite' => $this->is_user_type('coordinador'),
        ]);
        $this->render();
    }
}
