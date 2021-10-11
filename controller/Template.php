<?php

/**
 *
 */
class Template
{
    private $content;
    public function __construct($path, $data = [])
    {
        extract($data);
        ob_start();
        include 'views/' . $path . '.php';
        $this->content = ob_get_clean();
    }
    public function __toString()
    {
        return $this->content;
    }
    public static function patient_tabs()
    {
        $tabs = [
            'tabs' =>
            [
                'general_information', 'appointments', 'history',
                'anthropometry', 'vitals_signs', 'physical_exam',
                'electro_cardiogram', 'echocardiogram', 'laboratory_exams',
                'risk_factors', 'life_style', 'plan'
            ],
        ];
        return $tabs;
    }
}
