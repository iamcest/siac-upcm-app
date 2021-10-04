<?php

/**
 *
 */
class PatientMeta
{
    private $table = "patient_meta";
    private $id_column = "patien_meta_id";
    private $patient_column = "patient_id";

    public function get($id = 0)
    {
        if (empty($id)) {
            return [];
        }

        $sql = "SELECT * FROM {$this->table} WHERE {$this->patient_column} = $id";
        $result = execute_query($sql);
        $arr = [];
        while ($row = $result->fetch_assoc()) {
            $arr[] = $row;
        }
        return $arr;
    }

    public function get_meta($patient_id = 0, $meta_name = '')
    {
        if (empty($meta_name) || empty($patient_id)) {
            return [];
        }

        $sql = "SELECT * FROM {$this->table} WHERE {$this->patient_column} = $patient_id AND patient_meta_name = '$meta_name'";
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
        $sql = "INSERT INTO {$this->table} (patient_meta_name, patient_meta_val, patient_id) VALUES('$patient_meta_name', '$patient_meta_val', $patient_id)";
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
        SET patient_meta_val = '$patient_meta_val' WHERE {$this->patient_column} = $id 
        AND patient_meta_name = '$patient_meta_name'";
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
