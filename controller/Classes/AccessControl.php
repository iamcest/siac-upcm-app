<?php
include_once "models/UserMeta.php";
class AccessControl extends UserMeta
{

    private $access_items = [
        'patient_management_access',
        'calculations_and_algorithms_access',
        'patient_material_access',
        'notifications_access',
    ];

    protected $permissions = [];

    protected $is_logged = false;

    public function __construct()
    {
        $this->is_logged = !empty($_SESSION['user_id']) ? true : false;
        if ($this->check_permissions_updates()) {
            if (!empty($_SESSION['meta'])) {
                foreach ($this->access_items as $item) {
                    $this->permissions[$item] = !empty($_SESSION['meta'][$item]) ? $_SESSION['meta'][$item] : [];
                }
            }
        } else {
            if (!empty($_SESSION['meta'])) {
                foreach ($this->access_items as $item) {
                    $this->permissions[$item] = !empty($_SESSION['meta'][$item]) ? $_SESSION['meta'][$item] : [];
                }
            }
        }
    }

    public function check_permissions_updates()
    {
        $updated = false;
        if (!empty($_SESSION['user_id'])) {
            $results = $this->get_user_last_update($_SESSION['user_id']);
            if (!empty($results['updated_at'])) {
                if (!empty($_SESSION['updated_at']) && $_SESSION['updated_at'] < $results['updated_at'] ) {
                    $meta = $this->get($_SESSION['user_id']);
                    foreach ($meta as $i => $e) {
                        $_SESSION['meta'][$e['user_meta_name']] = json_decode($e['user_meta_val'], true);
                    }
                    $updated = true;
                }
            }
        }
        return $updated;
    }

    public function get_permissions()
    {
        return $this->permissions;
    }

    public function is_user_type($type_selected = '', $user_type = '')
    {
        $user_type = empty($user_type) ? $_SESSION['user_type'] : $user_type;
        return $user_type == $type_selected ? true : false;
    }

    public function has_access($access = '')
    {
        if (!empty($_SESSION['user_type']) && $_SESSION['user_type'] == 'coordinador') {
            return true;
        }
        return empty($this->permissions[$access]['access'])
        ? false : $this->permissions[$access]['access'];
    }

    public function can_do($access = '', $section = '', $method = '')
    {
        if (!empty($_SESSION['user_type']) && $_SESSION['user_type'] == 'coordinador') {
            return true;
        } else if (empty($this->permissions[$access])) {
            return false;
        } else if (empty($method)) {
            return $this->permissions[$access];
        } else {

            $section_item = array_search($section, array_column($this->permissions[$access]['sections'], 'page'));
            if ($section_item === false) {
                return false;
            }
            return $this->permissions[$access]['sections'][$section_item]['permissions'][$method];
        }
    }

}
