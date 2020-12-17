<?php
/**
 * 
 */
class Routes
{
	
	function __construct() {
		$uri = $_SERVER['REQUEST_URI'];
		$route = explode("/", $uri);
		array_shift($route);
		if ($route[0] == "api") {
			$controller = $route[1];
			if (isset($controller) AND $controller !== "") {
				$method = isset($route[2]) ? $route[2] : '';
				$query = isset($route[3]) ? $route[3] : '';
				require_once("controller/api/". $controller. ".php");
			}
		}
		else{
			$header = true;
			$admin = false;
			$styles = [];
			$scripts = [];
			$footer = false;
			switch ($route[0]) {
				case '':
					if (!isset($_SESSION['user_id'])) header("Location: ".SITE_URL."/login");header("Locate");
					$styles = [['name' => 'full-calendar-5.4.0.min']];
					$scripts = [['name' => 'full-calendar-5.4.0.min'],['name' => 'full-calendar-5.4.0/lib/locales-all'], ['name' => 'dashboard']];
					$content = new Template("home");
				break;
				case 'admin':
					if (!isset($_SESSION['user_id'])) header("Location: ".SITE_URL."/login");header("Locate");
					switch ($route[1]) {
						case '':
							$scripts = [['name' => 'admin/upcm']];
							$content = new Template("admin/upcm");
							break;

						case 'upcm':
							$scripts = [['name' => 'admin/upcm']];
							$content = new Template("admin/upcm");
							break;

						case 'members':
							$scripts = [['name' => 'admin/members']];
							$content = new Template("admin/members");
							break;

						case 'announcements':
							$scripts = [['name' => 'admin/announcements']];
							$content = new Template("admin/announcements");
							break;

						case 'articles':
							$scripts = [['name' => 'admin/articles'], ['name' => 'vue-components/vue2-editor.min']];
							$content = new Template("admin/articles");
							break;

						case 'profile':
							$scripts = [['name' => 'admin/profile']];
							$content = new Template("admin/profile");
							break;
					}

					break;
				
				case 'suite':
					if (!isset($_SESSION['user_id'])) header("Location: ".SITE_URL."/login");header("Locate");

					switch ($route[1]) {
	
					case '':
						$styles = [['name' => 'full-calendar-5.4.0.min']];
						$scripts = [['name' => 'dashboard'], ['name' => 'full-calendar-5.4.0/lib/main.min']];
						$content = new Template("home");
					break;

					case 'patients-management':
						switch ($route[2]) {
							case 'patients':
								$scripts = [['name' => 'patients-management/patients']];
								$content = new Template("patients-management/patients");
								break;

							case 'appointments':
								$styles = [['name' => 'full-calendar-5.4.0.min']];
								$scripts = [['name' => 'full-calendar-5.4.0/lib/main.min'], ['name' => 'full-calendar-5.4.0/lib/locales/es'], ['name' => 'patients-management/appointments']];
								$content = new Template("patients-management/appointments");
								break;
						}

						break;

					case 'updates':
						$styles = [['name' => 'updates']];
						$scripts = [['name' => 'updates']];
						$content = new Template("updates");
						break;
									
					case 'patient-material':
						$scripts = [['name' => 'patient-material'], ['name' => 'vue-components/vue2-editor.min'] ];
						$content = new Template("patient-material/patient-material");
						break;
					
					case 'chat':
						$base_asset = [['name' => 'chat/main']];
						$scripts = [...$base_asset];
						$styles = [...$base_asset];
						$content = new Template("chat/chat");
						break;
					
					case 'notifications':
						$scripts = [['name' => 'notifications']];
						$content = new Template("notifications");
						break;
					
					case 'settings':
						if ($route[2] == 'profile') {
							$scripts = [['name' => 'settings/profile']];
							$content = new Template("settings/profile");
						}
						else if($route[2] == 'email'){
							$scripts = [['name' => 'settings/email']];
							$content = new Template("settings/email");
						}
					
					case 'forms':
						switch ($route[2]) {
							case 'body-mass-index':
								$scripts = [['name' => 'calculations/body-max-index']];
								$content = new Template("calculations/body-max-index");
								break;

							case 'corporal-surface':
								$scripts = [['name' => 'calculations/corporal-surface']];
								$content = new Template("calculations/corporal-surface");
								break;

							case 'crci-cockgroft-gault':
								$scripts = [['name' => 'calculations/crci-cockgroft-gault']];
								$content = new Template("calculations/crci-cockgroft-gault");
								break;

							case 'average-blood-pressure':
								$scripts = [['name' => 'calculations/average-blood-pressure']];
								$content = new Template("calculations/average-blood-pressure");
								break;
							
							case 'pulse-pressure':
								$scripts = [['name' => 'calculations/pulse-pressure']];
								$content = new Template("calculations/pulse-pressure");
								break;

							case 'inter-heart-risk':
								$scripts = [['name' => 'calculations/inter-heart']];
								$content = new Template("calculations/inter-heart");
								break;

							case 'find-risk':
								$scripts = [['name' => 'calculations/find-risk']];
								$content = new Template("calculations/find-risk");
								break;

							case 'oms-ops-risk':
								$scripts = [['name' => 'calculations/oms-ops-risk']];
								$content = new Template("calculations/oms-ops-risk");
								break;
								
							case 'aha-acc-2013-risk':
								$scripts = [['name' => 'calculations/aha-acc-2013-risk']];
								$content = new Template("calculations/aha-acc-2013-risk");
								break;

							case 'colesterol-ldl':
								$scripts = [['name' => 'calculations/colesterol-ldl']];
								$content = new Template("calculations/colesterol-ldl");
								break;

							case 'dx-ecg-cornell-sokolow':
								$scripts = [['name' => 'calculations/dx-ecg-cornell-sokolow']];
								$content = new Template("calculations/dx-ecg-cornell-sokolow");
								break;
							
							default:
								# code...
								break;
						}
					case 'algorithms':
						switch ($route[2]) {

							case 'hta-statement-treatment':
								$scripts = [['name' => 'algorithms/hta-statement-treatment']];
								$content = new Template("algorithms/hta-statement-treatment");
								break;

							case 'atherogenic-dyslipedimia-treatment':
								$scripts = [['name' => 'algorithms/atherogenic-dyslipedimia-treatment']];
								$content = new Template("algorithms/atherogenic-dyslipedimia-treatment");
								break;

							case 'dyslipedimia-risk-treatment':
								$scripts = [['name' => 'algorithms/dyslipedimia-risk-treatment']];
								$content = new Template("algorithms/dyslipedimia-risk-treatment");
								break;
							
							default:
								# code...
								break;
						}
						break;
					
					case 'suite-management':
						switch ($route[2]) {
							case 'members':
									$styles = [['name' => 'table_nh']];
									$scripts = [['name' => 'suite-management/members']];
									$content = new Template("suite-management/members");
								break;

							case 'upcm-information':
									$scripts = [['name' => 'suite-management/upcm-information']];
									$content = new Template("suite-management/upcm-information");
								break;
							
							default:
								# code...
								break;
						}
						break;	

					}

					break;
				
				case 'community':
					$scripts = [['name' => 'community']];
					$content = new Template("community");
					break;
					
				case 'login':
					$header = false;
					$styles = [['name' =>'login']];
					$scripts = [['name' => 'login']];
					$footer = false;
					$content = new Template("login");
					break;
			}
			$this->render($content, $header, $footer, $styles, $scripts);
		}
	}
	public function render($content, $header = true, $footer = true, $styles = [], $scripts = []) {
		$view = new Template("app", [
			"title" => PROJECT_NAME, 
			"content" => $content,
			"header" => $header,
			"styles" => $styles,
			"scripts" => $scripts,
			"footer" => $footer,
		]);
		echo $view;
	}
}