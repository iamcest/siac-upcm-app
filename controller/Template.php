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
	static function material_template($data) {
		$template = "      
		<body class='' style='background-color: #f6f6f6; font-family: sans-serif; -webkit-font-smoothing: antialiased; font-size: 14px; line-height: 1.4; margin: 0; padding: 0; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;'>
		    <table border='0' cellpadding='0' cellspacing='0' class='body' style='border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%; background-color: #f6f6f6;'>
		      <tr>
		        <td style='font-family: sans-serif; font-size: 14px; vertical-align: top;'>&nbsp;</td>
		        <td class='container' style='font-family: sans-serif; font-size: 14px; vertical-align: top; display: block; Margin: 0 auto; max-width: 580px; padding: 10px; width: 580px;''>
		          <div class='content' style='box-sizing: border-box; display: block; Margin: 0 auto; max-width: 580px; padding: 10px;'>

		            <!-- START CENTERED WHITE CONTAINER -->
		            <img src='".SITE_URL."/public/img/upcms-logo/{$_SESSION['upcm_logo']}'></img>
		            <span class='preheader' style='color: transparent; display: none; height: 0; max-height: 0; max-width: 0; opacity: 0; overflow: hidden; mso-hide: all; visibility: hidden; width: 0;''>Material para el paciente {$data['full_name']}</span>
		            <table class='main' style='border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%; background: #ffffff; border-radius: 3px;''>

		              <!-- START MAIN CONTENT AREA -->
		              <tr>
		                <td class='wrapper' style='font-family: sans-serif; font-size: 14px; vertical-align: top; box-sizing: border-box; padding: 20px;'>
		                  <table border='0' cellpadding='0' cellspacing='0' style='border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%;'>
		                    <tr>
		                      <td style='font-family: sans-serif; font-size: 14px; vertical-align: top;'>
														{$data['message']}
		                      </td>
		                    </tr>
		                  </table>
		                </td>
		              </tr>

		            <!-- END MAIN CONTENT AREA -->
		            </table>

		          <!-- END CENTERED WHITE CONTAINER -->
		          </div>
		        </td>
		        <td style='font-family: sans-serif; font-size: 14px; vertical-align: top;'>&nbsp;</td>
		      </tr>
		    </table>
		  </body>";
 		return $template;
	}
}