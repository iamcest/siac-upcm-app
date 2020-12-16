<?php

/**
 * 
 */
class Template
{
	private $content;
	function __construct($path, $data = []) {
		extract($data);
		ob_start();
		include('views/'. $path . '.php');
		$this->content = ob_get_clean();
	}
	public function __toString() {
		return $this->content;
	}	
	static function patient_tabs() {
		$tabs = ['tabs' => ['general_information', 'appointments', 'anthropometry', 'vitals_signs','history', 'laboratory_exams', 'risk_factors']];
 		return $tabs;
	}
}