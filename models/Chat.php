<?php

/**
 *
 */

class Chat
{
    private $table = "messages";
    private $users = "users";
    private $id_column = "message_id";
    private $user_id = "user_id";
    private $upcm_id = "upcm_id";

    public function __construct()
    {
    }
    public function get(int $id = 0, $upcm_id = 0, $columns = [], $upcm_members = false)
    {
        if ($id == 0) {
            return [];
        }

        $columns = empty($columns) ? '*' : implode(',', $columns);
        $sql = "SELECT $columns, (SELECT COUNT(message_id) FROM {$this->table} WHERE sender=U.user_id AND receiver=$id AND seen = 0) AS messages_unread, (SELECT COUNT(message_id) FROM {$this->table} WHERE sender IN (U.user_id, $id) AND receiver IN (U.user_id,$id)) AS total_messages FROM {$this->users} U LEFT JOIN users_contact UC ON UC.user_id = U.user_id WHERE user_type NOT IN ('administrador')";
        if ($upcm_members) {
            $sql .= " AND {$this->upcm_id} = $upcm_id";
        } else {
            $sql .= " AND {$this->upcm_id} NOT IN ($upcm_id) HAVING total_messages > 0";
        }

        $result = execute_query($sql);
        $arr = [];
        while ($row = $result->fetch_assoc()) {
            $arr[] = $row;
        }
        return $arr;
    }

    public function get_all_members($upcm_id, $user_id, $columns)
    {
        if ($upcm_id == 0 || $user_id == 0) {
            return [];
        }

        $columns = implode(',', $columns);
        $sql = "SELECT $columns FROM {$this->users} U LEFT JOIN users_contact UC ON UC.user_id = U.user_id WHERE NOT {$this->upcm_id} = $upcm_id";
        $result = execute_query($sql);
        $arr = [];
        while ($row = $result->fetch_assoc()) {
            $arr[] = $row;
        }
        return $arr;
    }

    public function get_group_chats(int $id = 0, $columns = [])
    {
        $columns = empty($columns) ? '*' : implode(',', $columns);
        if ($id != 0) {
            $sql = "SELECT $columns FROM {$this->table} WHERE {$this->id_column} = $id";
        } else {
            $sql = "SELECT $columns FROM {$this->table}";
        }
        $result = execute_query($sql);
        $arr = [];
        while ($row = $result->fetch_assoc()) {
            $arr[] = $row;
        }
        return $arr;
    }

    public function get_messages($receiver = 0, $sender = 0)
    {
        if (empty($receiver) || empty($sender)) {
            return [];
        }

        $sql = "SELECT * FROM {$this->table} WHERE receiver IN ($receiver, $sender) AND sender IN ($sender, $receiver)";
        $result = execute_query($sql);
        $arr = [];
        while ($row = $result->fetch_assoc()) {
            $arr[] = $row;
        }
        return $arr;
    }

    public function get_messages_unread($receiver = 0, $sender = 0)
    {
        if (empty($receiver) || empty($sender)) {
            return [];
        }

        $sql = "SELECT * FROM {$this->table} WHERE receiver IN ($receiver, $sender) AND sender IN ($sender, $receiver) AND seen = 0";
        $result = execute_query($sql);
        $arr = [];
        while ($row = $result->fetch_assoc()) {
            $arr[] = $row;
        }
        return $arr;
    }

    public function mark_messages_seen($receiver = 0, $sender = 0)
    {
        if (empty($receiver) || empty($sender)) {
            return false;
        }

        $sql = "UPDATE {$this->table} SET seen = 1 WHERE receiver = $receiver AND sender = $sender AND seen = 0";
        $result = execute_query($sql);
        return $result;
    }

    public function create_message($data = [], $columns = [])
    {
        if (empty($data)) {
            return false;
        }

        $columns = implode(',', $columns);
        extract($data);
        $sql = "INSERT INTO {$this->table} ($columns) VALUES($receiver, $sender, '$message', '$file');";
        $result = execute_query_return_id($sql);
        return $result;
    }

    public function edit($id, $data = [], $columns = [])
    {
        if (empty($data) or empty($id)) {
            return false;
        }

        extract($data);
        $sql = "UPDATE {$this->table} SET image = '$image', title = '$title', content = '$content', description = '$description' WHERE {$this->id_column} = $id;";
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
