<?php

class AdminSection extends AccessControl
{

    public function checkAccess()
    {
        !$this->is_logged ? header("Location: " . SITE_URL . "/login") : '';
        $user_type = $_SESSION['user_type'];
        !$this->is_user_type($user_type, 'administrador') ? header("Location: " . $_SESSION['redirect_url']) : ''; 
    }

}
