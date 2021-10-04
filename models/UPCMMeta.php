<?php

/**
 *
 */
class UPCMMeta
{
    private $table = "upcm_meta";
    private $id_column = "upcm_meta_id";
    private $upcm_column = "upcm_id";

    public function get($id = 0)
    {
        if (empty($id)) {
            return [];
        }

        $sql = "SELECT * FROM {$this->table} WHERE {$this->upcm_column} = $id";
        $result = execute_query($sql);
        $arr = [];
        while ($row = $result->fetch_assoc()) {
            $arr[] = $row;
        }
        return $arr;
    }

    public function get_meta($upcm_id = 0, $meta_name = '')
    {
        if (empty($meta_name) || empty($upcm_id)) {
            return [];
        }

        $sql = "SELECT * FROM {$this->table} WHERE {$this->upcm_column} = $upcm_id AND upcm_meta_name = '$meta_name'";
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
        $sql = "INSERT INTO {$this->table} (upcm_meta_name, upcm_meta_val, upcm_id) VALUES('$upcm_meta_name', '$upcm_meta_val', $upcm_id)";
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
        SET upcm_meta_val = '$upcm_meta_val' WHERE {$this->upcm_column} = $id 
        AND upcm_meta_name = '$upcm_meta_name'";
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
