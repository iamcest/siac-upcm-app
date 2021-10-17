<?php
require DIRECTORY . '/controller/web/suite/Main.php';

class Appointments extends Routes
{

    public function initView()
    {
        $suite = new SuiteSection();
        !$this->can_do('patient_management_access', 'appointments', 'read') ? header("Location: " . SITE_URL . "/") : '';
        $this->styles = [['name' => 'full-calendar-5.4.0.min']];
        $this->scripts = [
            ['name' => 'lib/moment.min'],
            ['name' => 'lib/full-calendar-5.4.0/lib/main.min'],
            ['name' => 'lib/full-calendar-5.4.0/lib/locales/es'],
            ['name' => 'vue-components/vue-tel-input-vuetify.min'],
            ['name' => 'patients-management/appointments.min', 'version' => '1.0.0'],
        ];
        $this->content = new Template("patients-management/appointments", [
            'notifications' => $suite->total_views,
            'access' => $this->get_permissions(),
            'can_manage_suite' => $this->is_user_type('coordinador'),
        ]);
        $this->title = 'Suite - Citas';

        $this->render();
    }
}
