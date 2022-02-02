<?php
require DIRECTORY . '/controller/web/suite/Main.php';

class Appointments extends Routes
{

    public function initView()
    {
        $suite = new SuiteSection();
        !$this->can_do('patient_management_access', 'appointments', 'read') ? header("Location: " . SITE_URL . "/") : '';
        $cf = 'patients-management/calculations';
        $this->styles = [
            ['name' => 'patient-management.min'],
            ['name' => 'full-calendar-5.4.0.min']
        ];
        $this->scripts = [
            ['name' => 'lib/moment.min'],
            ['name' => 'lib/full-calendar-5.4.0/lib/main.min'],
            ['name' => 'lib/full-calendar-5.4.0/lib/locales/es'],
            ['name' => 'vue-components/vue-tel-input-vuetify.min'],
            ['name' => 'lib/charts.min'],
            ['name' => 'vue-components/vue-chart.min'],
            ['name' => "$cf/find-risk.min", 'version' => '1.0.0'],
            ['name' => "$cf/aha-acc-2013-risk.min", 'version' => '1.0.0'],
            ['name' => 'calculations/oms-ops-risk/risk_vars', 'version' => '1.0.0'],
            ['name' => "$cf/oms-ops-risk.min"],
            ['name' => "$cf/crci-cockgroft-gault.min", 'version' => '1.0.0'],
            ['name' => "$cf/colesterol-ldl.min", 'version' => '1.0.0'],
            ['name' => "$cf/inter-heart.min", 'version' => '1.0.0'],
            ['name' => "$cf/heart-risk-framingham.min", 'version' => '1.0.0'],
            ['name' => "patients-management/Classes/AppointmentCalendar.min", 'version' => '1.0.0'],
            ['name' => 'patients-management/patients.min', 'version' => '1.16.10'],
        ];
        $this->content = new Template("patients-management/appointments", [
            'title' => 'Cita',
            'notifications' => $suite->total_views,
            'access' => $this->get_permissions(),
            'can_manage_suite' => $this->is_user_type('coordinador'),
        ]);
        $this->title = 'Suite - Citas';

        $this->render();
    }
}
