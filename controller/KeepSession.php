<?php

class KeepSession
{
    public function __construct()
    {
        $isLoggedIn = false;
        if (!empty($_SESSION["user_id"])) {
            $isLoggedIn = true;
        } else if (!empty($_COOKIE["upcm_u"]) && !empty($_COOKIE["upcm_p"]) && !$isLoggedIn) {
            if (!empty($_COOKIE["upcm_u"]) && !empty($_COOKIE["upcm_p"])) {
                include_once 'models/Members.php';
                include_once "models/UserMeta.php";
                include_once "models/UPCMS.php";
                include_once "models/Announcements.php";

                $announcement = new Announcements;
                $member_meta = new UserMeta;
                $member = new Members;
                $upcms = new UPCMS;

                $result = $member->check_user($_COOKIE["upcm_u"], $_COOKIE["upcm_p"]);
                if (!empty($result)) {
                    $_SESSION['user_id'] = $result->user_id;
                    $_SESSION['avatar'] = $result->avatar;
                    $_SESSION['first_name'] = $result->first_name;
                    $_SESSION['last_name'] = $result->last_name;
                    $_SESSION['email'] = $result->email;
                    $_SESSION['gender'] = $result->gender;
                    $_SESSION['birthdate'] = $result->birthdate;
                    $_SESSION['user_type'] = $result->user_type;
                    $_SESSION['rol'] = $result->rol;
                    $_SESSION['tos_accepted'] = $result->tos_accepted;
                    $_SESSION['upcm_id'] = $result->upcm_id;
                    $_SESSION['upcm_name'] = '';
                    $_SESSION['meta'] = [];
                    $_SESSION['updated_at'] = $result->updated_at;
                    $meta = $member_meta->get($_SESSION['user_id']);
                    foreach ($meta as $i => $e) {
                        $_SESSION['meta'][$e['user_meta_name']] = json_decode($e['user_meta_val'], true);
                    }
                    $announcement_view = $announcement->get_view($result->user_id);
                    if (empty($announcement_view[0])) {
                        $announcement->create_view($result->user_id);
                        $_SESSION['announcement_last_update'] = $announcement->get_view($result->user_id)[0]['last_update'];
                    } else {
                        $_SESSION['announcement_last_update'] = $announcement_view[0]['last_update'];
                    }
                    if (!empty($_SESSION['upcm_id'])) {
                        $upcm_selected = $upcms->get($_SESSION['upcm_id']);
                        $_SESSION['upcm_name'] = !empty($upcm_selected[0]) ? $upcm_selected[0]['upcm_name'] : '';
                    }
                    if ($result->user_type !== 'administrador') {
                        $_SESSION['upcm_logo'] = $member->get_upcm_logo($result->user_id);
                    }

                    $_SESSION['telephone'] = $result->telephone;
                    $_SESSION['whatsapp'] = $result->whatsapp;
                    $_SESSION['telegram'] = $result->telegram;
                    $_SESSION['sms'] = $result->sms;
                    $_SESSION['redirect_url'] = $_SESSION['user_type'] == 'administrador' ? SITE_URL . '/admin/' : SITE_URL . '/';
                } else {
                    setcookie('upcm_u', "", time() - 1, '/');
                    setcookie('upcm_p', "", time() - 1, '/');
                }
            }
        }
    }
}
