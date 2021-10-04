<?php

/**
 *
 */

class GroupChat
{
    private $table = "group_chats";
    private $group_member_table = "group_members";
    private $group_messages_table = "group_messages";
    private $users = "users";
    private $id_column = "group_id";
    private $id_messages_column = "group_message_id";
    private $user_id = "user_id";
    private $upcm_id = "upcm_id";

    public function __construct()
    {
    }
    public function get($id = 0)
    {
        if ($id == 0) {
            return false;
        }

        $sql = "SELECT GC.group_id, GC.group_name FROM {$this->table} GC INNER JOIN {$this->group_member_table} GM ON GC.group_id = GM.group_id WHERE GM.user_id = $id";
        $result = execute_query($sql);
        $arr = [];
        while ($row = $result->fetch_assoc()) {
            $arr[] = $row;
        }
        return $arr;
    }

    public function get_raw($message_id = 0)
    {
        {
            if (empty($message_id)) {
                return false;
            }

            $sql = "SELECT * FROM {$this->group_messages_table} WHERE {$this->id_messages_column} = $message_id";
            $result = execute_query($sql);
            $arr = [];
            while ($row = $result->fetch_assoc()) {
                $arr[] = $row;
            }
            return $arr;
        }
    }

    public function get_messages($group_id = 0)
    {
        if (empty($group_id)) {
            return false;
        }

        $sql = "SELECT file, message, message_date, group_message_id, message_time, sender, U.first_name, U.last_name
		FROM {$this->group_messages_table} GCM INNER JOIN {$this->users} U
		ON U.user_id = GCM.sender WHERE GCM.group_id = $group_id";
        $result = execute_query($sql);
        $arr = [];
        while ($row = $result->fetch_assoc()) {
            $arr[] = $row;
        }
        return $arr;
    }

    public function get_unread_messages($group_id = 0, $sender = 0, $date = '', $time = '')
    {
        if (empty($group_id) || empty($sender) || empty($date) || empty($time)) {
            return false;
        }

        $sql = "SELECT file, message, message_date, group_message_id, message_time, sender, U.first_name, U.last_name
		FROM {$this->group_messages_table} GCM INNER JOIN {$this->users} U
		ON U.user_id = GCM.sender WHERE sender != $sender AND GCM.group_id = $group_id AND
		message_date = '$date' AND message_time > '$time'";
        $result = execute_query($sql);
        $arr = [];
        while ($row = $result->fetch_assoc()) {
            $arr[] = $row;
        }
        return $arr;
    }

    public function get_members($group_id)
    {
        if ($group_id == 0) {
            return false;
        }

        $sql = "SELECT U.user_id, avatar, first_name, last_name, GM.member_type FROM {$this->group_member_table} GM INNER JOIN {$this->users} U ON U.user_id = GM.user_id WHERE group_id = $group_id";
        $result = execute_query($sql);
        $arr = [];
        while ($row = $result->fetch_assoc()) {
            $arr[] = $row;
        }
        return $arr;
    }

    public function create_group($data)
    {
        if (empty($data)) {
            return false;
        }

        extract($data);
        $sql = "INSERT INTO {$this->table} (group_name) VALUES('$group_name')";
        $result = execute_query_return_id($sql);
        return $result;
    }

    public function add_member($group_id, $user_id, $member_type)
    {
        $sql = "INSERT INTO {$this->group_member_table} (group_id, user_id, member_type) VALUES($group_id, $user_id, '$member_type')";
        $result = execute_query_return_id($sql);
        return $result;
    }

    public function create_message($data = [], $columns = [])
    {
        if (empty($data)) {
            return false;
        }

        $columns = implode(',', $columns);
        extract($data);
        $sql = "INSERT INTO {$this->group_messages_table} (group_id, sender, message, file) VALUES($group_id, $sender, '$message', '$file');";
        $result = execute_query_return_id($sql);
        return $result;
    }

    public function edit_name($group_id, $group_name)
    {
        if (empty($group_id) or empty($group_name)) {
            return false;
        }

        $sql = "UPDATE {$this->table} SET group_name = '$group_name' WHERE {$this->id_column} = $group_id;";
        $result = execute_query($sql);
        return $result;
    }

    public function change_member_type($group_id, $user_id = [], $rol = '')
    {
        if (empty($rol) or $user_id == 0 or $group_id == '') {
            return false;
        }

        $sql = "UPDATE {$this->group_member_table} SET member_type = '$rol' WHERE user_id = $user_id AND group_id = $group_id";
        $result = execute_query($sql);
        return $result;
    }

    public function delete_member($group_id = 0, $user_id = 0)
    {
        if ($group_id == 0 or $user_id == 0) {
            return false;
        }

        $sql = "DELETE FROM {$this->group_member_table} WHERE user_id = $user_id AND group_id = $group_id";
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
