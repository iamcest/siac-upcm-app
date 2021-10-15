<?php
/**
 *
 */

class Routes extends AccessControl
{

    public function init()
    {
        $uri = $_SERVER['REQUEST_URI'];
        $route = explode("/", $uri);
        array_shift($route);
        if ($route[0] == "api") {
            $controller = $route[1];
            if (isset($controller) and $controller !== "") {
                $method = isset($route[2]) ? $route[2] : '';
                $query = isset($route[3]) ? $route[3] : '';
                require_once "controller/api/" . $controller . ".php";
            }
        } else {
            $header = true;
            $admin = false;
            $styles = [];
            $scripts = [];
            $footer = false;
            switch ($route[0]) {
                case '':
                    if (!$this->is_logged) {
                        header("Location: " . SITE_URL . "/login");
                    } else if (!$this->is_logged && !$this->is_user_type('administrador')) {
                        header("Location: " . SITE_URL . "/admin/");
                    } else {
                        header("Location: " . SITE_URL . "/suite/");
                    }

                    $styles = [['name' => 'full-calendar-5.4.0.min']];
                    $scripts = [
                        ['name' => 'lib/moment.min'],
                        ['name' => 'lib/full-calendar-5.4.0/lib/main.min'],
                        ['name' => 'lib/full-calendar-5.4.0/lib/locales/es'],
                        ['name' => 'vue-components/vue-tel-input-vuetify.min'],
                        ['name' => 'dashboard.min', 'version' => '1.0.0'],
                    ];
                    $content = new Template("home");
                    break;
                case 'admin':
                    if (!$this->is_logged) {
                        header("Location: " . SITE_URL . "/login");
                    } else if ($this->is_logged && $this->is_user_type('miembro') || $this->is_user_type('coordinador')) {
                        header("Location: " . SITE_URL . "/");
                    }

                    switch ($route[1]) {
                        case '':
                            $scripts = [
                                ['name' => 'roles/data.min'],
                                ['name' => 'admin/upcm.min']
                            ];
                            $content = new Template("admin/upcm");
                            break;

                        case 'upcm':
                            $scripts = [
                                ['name' => 'roles/data.min'],
                                ['name' => 'admin/upcm.min', 'version' => '1.0.0'],
                            ];
                            $content = new Template("admin/upcm");
                            break;

                        case 'members':
                            $scripts = [
                                ['name' => 'vue-components/vue-tel-input-vuetify.min'],
                                ['name' => 'roles/data.min'],
                                ['name' => 'admin/members.min', 'version' => '1.0.0'],
                            ];
                            $content = new Template("admin/members");
                            break;

                        case 'announcements':
                            $scripts = [
                                ['name' => 'lib/moment.min'],
                                ['name' => 'vue-components/vue2-editor.min'],
                                ['name' => 'admin/announcements.min', 'version' => '1.0.0'],
                            ];
                            $content = new Template("admin/announcements");
                            break;

                        case 'articles':
                            $scripts = [
                                ['name' => 'vue-components/vue2-editor.min'],
                                ['name' => 'admin/articles', 'version' => '1.0.0'],
                            ];
                            $content = new Template("admin/articles");
                            break;

                        case 'profile':
                            $scripts = [
                                ['name' => 'vue-components/vue-tel-input-vuetify.min'],
                                ['name' => 'admin/profile.min', 'version' => '1.0.0'],
                            ];
                            $content = new Template("admin/profile");
                            break;
                    }

                    break;

                case 'suite':
                    !$this->is_logged ? header("Location: " . SITE_URL . "/login") : '';

                    require_once "models/Announcements.php";

                    $announcement = new Announcements();

                    $total_views = 0;

                    $results = $announcement->get(0, $_SESSION['announcement_last_update']);

                    foreach ($results as $result) {
                        if ($result['user_id'] != $_SESSION['user_id']) {
                            switch ($result['send_to']) {
                                case 0:
                                    $total_views++;
                                    break;
                                case 1:
                                    if ($result['upcm_id'] == $_SESSION['upcm_id']) {
                                        $total_views++;
                                    }
                                    break;

                                case 2:
                                    if ($announcement->get_a_users($result['announcement_id'], $_SESSION['user_id']) > 0) {
                                        $total_views++;
                                    }
                                    break;

                                case 3:
                                    if ($announcement->get_a_upcms($result['announcement_id'], $_SESSION['upcm_id']) > 0) {
                                        $total_views++;
                                    }
                                    break;

                                case 4:
                                    if ($announcement->get_a_users($result['announcement_id'], $_SESSION['user_id']) > 0) {
                                        $total_views++;
                                    }
                                    break;
                            }
                        }
                    }
                    switch ($route[1]) {

                        case '':
                            $styles = [['name' => 'full-calendar-5.4.0.min']];
                            $scripts = [
                                ['name' => 'lib/moment.min'],
                                ['name' => 'lib/full-calendar-5.4.0/lib/main.min'],
                                ['name' => 'lib/full-calendar-5.4.0/lib/locales/es'],
                                ['name' => 'vue-components/vue-tel-input-vuetify.min'],
                                ['name' => 'dashboard.min', 'version' => '1.0.0'],
                            ];
                            $content = new Template("home", [
                                'notifications' => $total_views,
                                'access' => $this->get_permissions(),
                                'can_manage_suite' => $this->is_user_type('coordinador'),
                            ]);
                            break;

                        case 'patients-management':
                            !$this->has_access('patient_management_access') ? header("Location: " . SITE_URL . "/") : '';
                            switch ($route[2]) {
                                case 'patients':
                                    !$this->can_do('patient_management_access', 'patients', 'read') ? header("Location: " . SITE_URL . "/") : '';
                                    //calcs folder
                                    $cf = 'patients-management/calculations';
                                    $styles = [['name' => 'patient-management']];
                                    $scripts = [
                                        ['name' => 'lib/moment.min'],
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
                                        ['name' => 'patients-management/patients.min', 'version' => '1.12.7'],
                                    ];
                                    $content = new Template("patients-management/patients", [
                                        'notifications' => $total_views,
                                        'access' => $this->get_permissions(),
                                        'can_manage_suite' => $this->is_user_type('coordinador'),
                                    ]);
                                    break;

                                case 'appointments':
                                    !$this->can_do('patient_management_access', 'appointments', 'read') ? header("Location: " . SITE_URL . "/") : '';
                                    $styles = [['name' => 'full-calendar-5.4.0.min']];
                                    $scripts = [
                                        ['name' => 'lib/moment.min'],
                                        ['name' => 'lib/full-calendar-5.4.0/lib/main.min'],
                                        ['name' => 'lib/full-calendar-5.4.0/lib/locales/es'],
                                        ['name' => 'vue-components/vue-tel-input-vuetify.min'],
                                        ['name' => 'patients-management/appointments.min', 'version' => '1.0.0'],
                                    ];
                                    $content = new Template("patients-management/appointments", [
                                        'notifications' => $total_views,
                                        'access' => $this->get_permissions(),
                                        'can_manage_suite' => $this->is_user_type('coordinador'),
                                    ]);
                                    break;
                            }

                            break;

                        case 'updates':
                            $styles = [['name' => 'updates']];
                            $scripts = [
                                ['name' => 'lib/moment.min'],
                                ['name' => 'updates.min', 'version' => '1.0.0'],
                            ];
                            $content = new Template("updates", [
                                'notifications' => $total_views, 'access' => $this->get_permissions(),
                                'can_manage_suite' => $this->is_user_type('coordinador'),
                            ]);
                            break;

                        case 'patient-material':
                            !$this->has_access('patient_material_access') ? header("Location: " . SITE_URL . "/") : '';
                            $scripts = [
                                ['name' => 'lib/moment.min'],
                                ['name' => 'patient-material.min', 'version' => '1.0.1'],
                                ['name' => 'vue-components/vue2-editor.min'],
                            ];
                            $content = new Template("patient-material/patient-material", [
                                'notifications' => $total_views,
                                'access' => $this->get_permissions(),
                                'can_manage_suite' => $this->is_user_type('coordinador'),
                            ]);
                            break;

                        case 'chat':
                            $scripts = [
                                ['name' => 'lib/lodash.min'],
                                ['name' => 'lib/viewer.min'],
                                ['name' => 'lib/moment.min'],
                                ['name' => 'chat/main-v1.0.0.min', 'version' => '1.0.0'],
                            ];
                            $styles = [
                                ['name' => 'viewer.min'],
                                ['name' => 'chat/main.min'],
                            ];
                            $content = new Template("chat/chat");
                            break;

                        case 'notifications':
                            !$this->has_access('notifications_access') ? header("Location: " . SITE_URL . "/") : '';
                            $scripts = [
                                ['name' => 'lib/moment.min'],
                                ['name' => 'vue-components/vue2-editor.min'],
                                ['name' => 'notifications.min', 'version' => '1.0.0'],
                            ];
                            $content = new Template("notifications", [
                                'access' => $this->get_permissions(),
                                'can_manage_suite' => $this->is_user_type('coordinador'),
                            ]);
                            break;

                        case 'settings':
                            if ($route[2] == 'profile') {
                                $scripts = [
                                    ['name' => 'vue-components/vue-tel-input-vuetify.min'],
                                    ['name' => 'settings/profile', 'version' => '1.0.0'],
                                ];
                                $content = new Template("settings/profile", [
                                    'notifications' => $total_views, 'access' => $this->get_permissions(),
                                    'can_manage_suite' => $this->is_user_type('coordinador'),
                                ]);
                            } else if ($route[2] == 'email') {
                                $scripts = [
                                    ['name' => 'settings/email', 'version' => '1.0.0'],
                                ];
                                $content = new Template("settings/email");
                            }
                            break;

                        case 'forms':
                            !$this->has_access('calculations_and_algorithms_access') ? header("Location: " . SITE_URL . "/") : '';
                            switch ($route[2]) {
                                case 'body-mass-index':
                                    $scripts = [
                                        ['name' => 'calculations/body-max-index', 'version' => '1.0.0'],
                                    ];
                                    $content = new Template("calculations/body-max-index", [
                                        'notifications' => $total_views, 'access' => $this->get_permissions(),
                                        'can_manage_suite' => $this->is_user_type('coordinador'),
                                    ]);
                                    break;

                                case 'corporal-surface':
                                    $scripts = [
                                        ['name' => 'calculations/corporal-surface', 'version' => '1.0.0'],
                                    ];
                                    $content = new Template("calculations/corporal-surface", [
                                        'notifications' => $total_views, 'access' => $this->get_permissions(),
                                        'can_manage_suite' => $this->is_user_type('coordinador'),
                                    ]);
                                    break;

                                case 'crci-cockgroft-gault':
                                    $scripts = [
                                        ['name' => 'lib/moment.min'],
                                        ['name' => 'calculations/crci-cockgroft-gault', 'version' => '1.0.0'],
                                    ];
                                    $content = new Template("calculations/crci-cockgroft-gault", [
                                        'notifications' => $total_views, 'access' => $this->get_permissions(),
                                        'can_manage_suite' => $this->is_user_type('coordinador'),
                                    ]);
                                    break;

                                case 'average-blood-pressure':
                                    $scripts = [
                                        ['name' => 'calculations/average-blood-pressure', 'version' => '1.0.0'],
                                    ];
                                    $content = new Template("calculations/average-blood-pressure", [
                                        'notifications' => $total_views, 'access' => $this->get_permissions(),
                                        'can_manage_suite' => $this->is_user_type('coordinador'),
                                    ]);
                                    break;

                                case 'pulse-pressure':
                                    $scripts = [
                                        ['name' => 'calculations/pulse-pressure', 'version' => '1.0.0'],
                                    ];
                                    $content = new Template("calculations/pulse-pressure", [
                                        'notifications' => $total_views, 'access' => $this->get_permissions(),
                                        'can_manage_suite' => $this->is_user_type('coordinador'),
                                    ]);
                                    break;

                                case 'inter-heart-risk':
                                    $scripts = [
                                        ['name' => 'lib/moment.min'],
                                        ['name' => 'calculations/inter-heart', 'version' => '1.0.0'],
                                    ];
                                    $content = new Template("calculations/inter-heart");
                                    break;

                                case 'find-risk':
                                    $scripts = [
                                        ['name' => 'lib/moment.min'],
                                        ['name' => 'calculations/find-risk', 'version' => '1.0.0'],
                                    ];
                                    $content = new Template("calculations/find-risk", [
                                        'notifications' => $total_views, 'access' => $this->get_permissions(),
                                        'can_manage_suite' => $this->is_user_type('coordinador'),
                                    ]);
                                    break;

                                case 'oms-ops-risk':
                                    $scripts = [
                                        ['name' => 'lib/moment.min'],
                                        ['name' => 'calculations/oms-ops-risk/risk_vars'],
                                        ['name' => 'calculations/oms-ops-risk/calc', 'version' => '1.0.0'],
                                    ];
                                    $content = new Template("calculations/oms-ops-risk", [
                                        'notifications' => $total_views, 'access' => $this->get_permissions(),
                                        'can_manage_suite' => $this->is_user_type('coordinador'),
                                    ]);
                                    break;

                                case 'aha-acc-2013-risk':
                                    $scripts = [
                                        ['name' => 'lib/moment.min'],
                                        ['name' => 'calculations/aha-acc-2013-risk', 'version' => '1.0.0'],
                                    ];
                                    $content = new Template("calculations/aha-acc-2013-risk");
                                    break;

                                case 'unit-converter':
                                    $scripts = [
                                        ['name' => 'calculations/unit-converter', 'version' => '1.0.0'],
                                    ];
                                    $content = new Template("calculations/unit-converter", [
                                        'notifications' => $total_views, 'access' => $this->get_permissions(),
                                        'can_manage_suite' => $this->is_user_type('coordinador'),
                                    ]);
                                    break;

                                case 'colesterol-ldl':
                                    $scripts = [
                                        ['name' => 'calculations/colesterol-ldl', 'version' => '1.0.0'],
                                    ];
                                    $content = new Template("calculations/colesterol-ldl", [
                                        'notifications' => $total_views, 'access' => $this->get_permissions(),
                                        'can_manage_suite' => $this->is_user_type('coordinador'),
                                    ]);
                                    break;

                                case 'dx-ecg-cornell-sokolow':
                                    $scripts = [
                                        ['name' => 'calculations/dx-ecg-cornell-sokolow', 'version' => '1.0.0'],
                                    ];
                                    $content = new Template("calculations/dx-ecg-cornell-sokolow", [
                                        'notifications' => $total_views, 'access' => $this->get_permissions(),
                                        'can_manage_suite' => $this->is_user_type('coordinador'),
                                    ]);
                                    break;

                                default:
                                    # code...
                                    break;
                            }
                        case 'algorithms':
                            !$this->has_access('calculations_and_algorithms_access') ? header("Location: " . SITE_URL . "/") : '';
                            switch ($route[2]) {

                                case 'hta-statement-treatment':
                                    $scripts = [['name' => 'algorithms/hta-statement-treatment', 'version' => '1.0.0']];
                                    $content = new Template("algorithms/hta-statement-treatment", [
                                        'notifications' => $total_views,
                                        'access' => $this->get_permissions(),
                                        'can_manage_suite' => $this->is_user_type('coordinador'),
                                    ]);
                                    break;

                                case 'atherogenic-dyslipedimia-treatment':
                                    $scripts = [['name' => 'algorithms/atherogenic-dyslipedimia-treatment', 'version' => '1.0.0']];
                                    $content = new Template("algorithms/atherogenic-dyslipedimia-treatment", [
                                        'notifications' => $total_views,
                                        'access' => $this->get_permissions(),
                                        'can_manage_suite' => $this->is_user_type('coordinador'),
                                    ]);
                                    break;

                                case 'dyslipedimia-risk-treatment':
                                    $scripts = [['name' => 'algorithms/dyslipedimia-risk-treatment', 'version' => '1.0.0']];
                                    $content = new Template("algorithms/dyslipedimia-risk-treatment", [
                                        'notifications' => $total_views,
                                        'access' => $this->get_permissions(),
                                        'can_manage_suite' => $this->is_user_type('coordinador'),
                                    ]);
                                    break;

                                default:
                                    # code...
                                    break;
                            }
                            break;

                        case 'suite-management':
                            !$this->is_user_type('coordinador') ? header("Location: " . SITE_URL . "/") : '';
                            switch ($route[2]) {
                                case 'members':
                                    $styles = [['name' => 'table_nh']];
                                    $scripts = [
                                        ['name' => 'vue-components/vue-tel-input-vuetify.min'],
                                        ['name' => 'suite-management/members.min', 'version' => '1.0.0'],
                                    ];
                                    $content = new Template("suite-management/members", [
                                        'notifications' => $total_views,
                                        'can_manage_suite' => $this->is_user_type('coordinador'),
                                    ]
                                    );
                                    break;

                                case 'upcm-information':
                                    $scripts = [
                                        ['name' => 'suite-management/upcm-information.min', 'version' => '1.0.0'],
                                    ];
                                    $content = new Template("suite-management/upcm-information", [
                                        'notifications' => $total_views,
                                        'can_manage_suite' => $this->is_user_type('coordinador'),
                                    ]
                                    );
                                    break;

                                default:
                                    # code...
                                    break;
                            }
                            break;

                    }

                    break;

                case 'community':
                    $scripts = [
                        ['name' => 'lib/moment.min'],
                        ['name' => 'community', 'version' => '1.0.0'],
                    ];
                    $styles = [['name' => 'community']];
                    $content = new Template("community");
                    break;

                case 'article':
                    if (isset($route[1])) {
                        require_once "models/Articles.php";
                        $scripts = [
                            ['name' => 'lib/moment.min'],
                            ['name' => 'article', 'version' => '1.0.0'],
                        ];
                        $article = new Articles();
                        $vars = $article->get_article($route[1]);
                        $content = new Template("article", $vars);
                    }
                    break;

                case 'login':
                    $this->is_logged ? header("Location: " . $_SESSION['redirect_url']) : '';

                    $header = false;
                    $styles = [['name' => 'login']];
                    $scripts = [
                        ['name' => 'login', 'version' => '1.0.0'],
                    ];
                    $footer = false;
                    $content = new Template("login");
                    break;

                case 'register':
                    $this->is_logged ? header("Location: " . $_SESSION['redirect_url']) : '';

                    $header = false;
                    $styles = [['name' => 'login']];
                    $scripts = [
                        ['name' => 'roles/data.min'],
                        ['name' => 'vue-components/vue-tel-input-vuetify.min'],
                        ['name' => 'register', 'version' => '1.0.0'],
                    ];
                    $footer = false;
                    $content = new Template("register");
                    break;

                case 'reset':
                    $header = false;
                    $styles = [['name' => 'login']];
                    $scripts = [
                        ['name' => 'reset', 'version' => '1.0.0'],
                    ];
                    $footer = false;
                    $content = new Template("reset");
                    break;
            }
            if (!empty($_SESSION['user_id']) && empty($_SESSION['tos_accepted'])) {
                $scripts = [
                    ['name' => 'agreement'],
                ];
                $content = new Template("agreement");
            }
            $this->render($content, $header, $footer, $styles, $scripts);
        }
    }
    public function render($content, $header = true, $footer = true, $styles = [], $scripts = [])
    {
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
