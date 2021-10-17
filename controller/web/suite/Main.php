<?php

require_once DIRECTORY . '/models/Announcements.php';

class SuiteSection extends AccessControl
{
    public $total_views = 0;

    public function validateAccess($mustBeCoordinador = false)
    {
        $this->checkAccess($mustBeCoordinador);
        $announcement = new Announcements;
        $results = $announcement->get(0, $_SESSION['announcement_last_update']);

        foreach ($results as $result) {
            if ($result['user_id'] != $_SESSION['user_id']) {
                switch ($result['send_to']) {
                    case 0:
                        $this->total_views ++;
                        break;
                    case 1:
                        if ($result['upcm_id'] == $_SESSION['upcm_id']) {
                            $this->total_views++;
                        }
                        break;

                    case 2:
                        if ($announcement->get_a_users($result['announcement_id'], $_SESSION['user_id']) > 0) {
                            $this->total_views++;
                        }
                        break;

                    case 3:
                        if ($announcement->get_a_upcms($result['announcement_id'], $_SESSION['upcm_id']) > 0) {
                            $this->total_views++;
                        }
                        break;

                    case 4:
                        if ($announcement->get_a_users($result['announcement_id'], $_SESSION['user_id']) > 0) {
                            $this->total_views++;
                        }
                        break;
                }
            }
        }
    }

    public function checkAccess($mustBeCoordinador = false)
    {
        !$this->is_logged ? header("Location: " . SITE_URL . "/login") : '';
        
        $user_type= $_SESSION['user_type'];
        $this->is_user_type($user_type, 'administrador') ? header("Location: " . $_SESSION['redirect_url']) : '';  
        
        if ($mustBeCoordinador) {
            !$this->is_user_type('coordinador') ? header("Location: " . $_SESSION['redirect_url']) : '';
        }
    }
}
