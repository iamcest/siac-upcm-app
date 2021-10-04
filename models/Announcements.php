<?php

/**
 *
 */

class Announcements
{
    private $table = "announcements";
    private $a_views_table = "announcement_views";
    private $a_upcms_table = "announcement_upcms";
    private $a_users_table = "announcement_users";
    private $id_column = "announcement_id";
    private $a_users_id_column = "announcement_user_id";
    private $a_upcms_id_column = "announcement_upcm_id";

    public function __construct()
    {
    }

    public function get($id = 0, $after_date = '')
    {
        $after_date = empty($after_date) ? '' : "WHERE published_at > '$after_date'";
        if ($id != 0) {
            $sql = "SELECT * FROM {$this->table} WHERE {$this->id_column} = $id ORDER BY published_at DESC";
        } else {
            $sql = "SELECT * FROM {$this->table} $after_date ORDER BY published_at DESC";
        }
        $result = execute_query($sql);
        $arr = [];
        while ($row = $result->fetch_assoc()) {
            $arr[] = $row;
        }
        return $arr;
    }

    public function get_general($user_id = 0, $upcm_id = 0)
    {
        if (empty($user_id) || empty($upcm_id)) {
            return [];
        }
        $sql = "SELECT * FROM {$this->table}
			WHERE send_to = 0 OR send_to = 1 AND upcm_id = $upcm_id OR user_id = $user_id
			ORDER BY published_at DESC;";
        $result = execute_query($sql);
        $arr = [];
        while ($row = $result->fetch_assoc()) {
            $arr[] = $row;
        }
        return $arr;
    }


    public function get_external($user_id = 0, $upcm_id = 0)
    {
        if (empty($user_id) || empty($upcm_id)) {
            return [];
        }
        $sql = "SELECT * FROM {$this->table}
			WHERE send_to = 2 OR send_to = 1 AND upcm_id = $upcm_id OR user_id = $user_id
			ORDER BY published_at DESC;";
        $result = execute_query($sql);
        $arr = [];
        while ($row = $result->fetch_assoc()) {
            $arr[] = $row;
        }
        return $arr;
    }

    public function get_a_upcms($id = 0, $upcm_id = 0)
    {
        if (empty($id)) {
            return [];
        }

        $sql = "SELECT * FROM {$this->a_upcms_table} WHERE {$this->id_column} = $id";
        $sql .= !empty($upcm_id) ? " AND upcm_id = $upcm_id" : "";
        $result = execute_query($sql);
        $arr = [];
        while ($row = $result->fetch_assoc()) {
            $arr[] = $row;
        }
        return $arr;
    }

    public function get_a_users($id = 0, $user_id = 0)
    {
        if (empty($id)) {
            return [];
        }

        $sql = "SELECT * FROM {$this->a_users_table} WHERE {$this->id_column} = $id";
        $sql .= !empty($user_id) ? " AND user_id = $user_id" : "";
        $result = execute_query($sql);
        $arr = [];
        while ($row = $result->fetch_assoc()) {
            $arr[] = $row;
        }
        return $arr;
    }

    public function get_view($id = 0)
    {
        if ($id != 0) {
            $sql = "SELECT * FROM {$this->a_views_table} WHERE user_id = $id";
        } 
        $result = execute_query($sql);
        $arr = [];
        while ($row = $result->fetch_assoc()) {
            $arr[] = $row;
        }
        return $arr;
    }

    public function create($id, $data)
    {
        if (empty($data) || empty($id)) {
            return false;
        }

        extract($data);
        $upcm_id = empty($upcm_id) ? 'NULL' : $upcm_id;
        $sql = "INSERT INTO {$this->table} (title, content, send_to, user_id, upcm_id, group_chat)
		VALUES('$title', '$content', $send_to, $id, $upcm_id, $group_chat)";
        $result = execute_query_return_id($sql);
        return $result;
    }

    public function create_a_upcm($data)
    {
        if (empty($data)) {
            return false;
        }

        extract($data);
        $sql = "INSERT INTO {$this->a_upcms_table} (announcement_id, upcm_id)
		VALUES($announcement_id, $upcm_id)";
        $result = execute_query_return_id($sql);
        return $result;
    }

    public function create_a_user($data)
    {
        if (empty($data)) {
            return false;
        }

        extract($data);
        $sql = "INSERT INTO {$this->a_users_table} (announcement_id, user_id)
		VALUES($announcement_id, $user_id)";
        $result = execute_query_return_id($sql);
        return $result;
    }

    public function create_view($id)
    {
        if (empty($id)) {
            return false;
        }
        $sql = "INSERT INTO {$this->a_views_table} (user_id) 
        VALUES($id)";
        $result = execute_query($sql);
        return $result;
    }

    public function edit($id, $data = [])
    {
        if (empty($data) || empty($id)) {
            return false;
        }

        extract($data);
        $sql = "UPDATE {$this->table} SET title = '$title', content = '$content' WHERE {$this->id_column} = $id;";
        $result = execute_query($sql);
        return $result;
    }

    public function update_view($id)
    {
        if (empty($id)) {
            return false;
        }

        $sql = "UPDATE {$this->a_views_table} SET last_update = CURRENT_TIMESTAMP() WHERE user_id = $id;";
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

    public function get_author($id, $group_id, $user_id)
    {
        if (empty($id)) {
            return false;
        }

        $sql = "SELECT avatar, first_name, last_name, rol, group_chat, (SELECT user_id FROM group_members GP WHERE GP.user_id = $user_id AND group_id = $group_id LIMIT 1) AS user_member FROM {$this->table} AS a INNER JOIN users AS u ON a.user_id = u.user_id WHERE {$this->id_column} = $id;";
        $result = execute_query($sql);
        $arr = [];
        while ($row = $result->fetch_assoc()) {
            $arr[] = $row;
        }
        return $arr;
    }

}
