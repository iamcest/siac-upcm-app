<?php

/**
 *
 */

class UPCMSInvitations
{
    private $table = "upcm_invitations";
    private $id_column = "upcm_invitation_id";

    public function __construct()
    {
    }

    public function get($id = 0)
    {
        if (empty($id)) {
            $sql = "SELECT * FROM {$this->table}";
        } else {
            $sql = "SELECT * FROM {$this->table} WHERE upcm_⁯id = $id";
        }
        $result = execute_query($sql);
        $arr = [];
        while ($row = $result->fetch_assoc()) {
            $arr[] = $row;
        }
        return $arr;
    }

    public function create($data = [])
    {
        if (empty($data)) {
            return false;
        }
        extract($data);
        $data['user_type'] = empty($data['user_type']) ? 'miembro' : $data['user_type'];
        $sql = "INSERT INTO {$this->table} (first_name, last_name, user_email, user_type, rol, access, upcm_⁯id, invitation_code) 
        VALUES('$first_name', '$last_name', '$user_email', '$user_type', '$rol', '$access', $upcm_id, '$invitation_code');";
        $result = execute_query_return_id($sql);
        return $result;
    }

    public function get_by_code($code = '')
    {
        if (empty($code)) {
            return [];
        }
        $sql = "SELECT * FROM {$this->table} WHERE invitation_code = '$code'";
        $result = execute_query($sql);
        $arr = [];
        while ($row = $result->fetch_assoc()) {
            $arr[] = $row;
        }
        return $arr;
    }

    public function mark_as_used($code = '')
    {
        if (empty($code)) {
            return false;
        }
        $sql = "UPDATE {$this->table} SET already_used = 1 WHERE invitation_code = '$code'";
        $result = execute_query($sql);
        return $result;
    }

    public function delete($id)
    {
        if (empty($id)) {
            return false;
        }

        $sql = "DELETE FROM {$this->table} WHERE {$this->id_column} = $id;";
        $result = execute_query($sql);
        return $result;
    }

}
