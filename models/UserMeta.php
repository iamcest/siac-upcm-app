<?php

/**
 *
 */
class UserMeta
{
    private $table = "user_meta";
    private $user_table = "users";
    private $id_column = "user_meta_id";
    private $user_column = "user_id";

    public function get($id = 0)
    {
        if (empty($id)) {
            return [];
        }

        $sql = "SELECT * FROM {$this->table} WHERE {$this->user_column} = $id";
        $result = execute_query($sql);
        $arr = [];
        while ($row = $result->fetch_assoc()) {
            $arr[] = $row;
        }
        return $arr;
    }

    public function get_user_last_update ($user_id) {
        if (empty($user_id)) {
            return [];
        }

        $sql = "SELECT updated_at FROM {$this->user_table} WHERE {$this->user_column} = $user_id";
        $result = execute_query($sql);
        if (empty($result)) {
            return [];
        }
        return $result->fetch_assoc();
    }

    public function get_meta($user_id = 0, $meta_name = '')
    {
        if (empty($meta_name) || empty($user_id)) {
            return [];
        }

        $sql = "SELECT * FROM {$this->table} WHERE {$this->user_column} = $user_id AND user_meta_name = '$meta_name'";
        $result = execute_query($sql);
        if (empty($result)) {
            return [];
        }
        return $result->fetch_assoc();
    }

    public function create($data = [])
    {
        if (empty($data)) {
            return false;
        }

        extract($data);
        $sql = "INSERT INTO {$this->table} (user_meta_name, user_meta_val, user_id) VALUES('$user_meta_name', '$user_meta_val', $user_id)";
        $result = execute_query_return_id($sql);
        return $result;
    }

    public function edit($id, $data = [])
    {
        if (empty($data) || empty($id)) {
            return false;
        }

        extract($data);
        $sql = "UPDATE {$this->table} 
        SET user_meta_val = '$user_meta_val' WHERE {$this->user_column} = $id 
        AND user_meta_name = '$user_meta_name'";
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
