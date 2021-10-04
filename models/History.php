<?php

/**
 *
 */

class PatientHistory
{
    private $table = "patient_history";
    private $id_patient_column = "patient_id";
    private $id_column = "appointment_id";

    public function get($appointment_id = 0, $patient_id = 0)
    {
        if (empty($appointment_id) && empty($patient_id)) {
            return false;
        }

        $sql = empty($appointment_id)
        ? "SELECT * FROM {$this->table} WHERE {$this->id_patient_column} = $patient_id ORDER BY appointment_id"
        : "SELECT * FROM {$this->table} WHERE {$this->id_column} = $appointment_id";
        $result = execute_query($sql);
        $arr = [];
        while ($row = $result->fetch_assoc()) {
            $arr[] = $row;
        }
        return $arr;
    }

    
    public function get_last($id = 0)
    {
        if (empty($id)) {
            return false;
        }

        $sql = "SELECT * FROM {$this->table} WHERE patient_id = $id ORDER BY appointment_id DESC LIMIT 1";
        $result = execute_query($sql);
        $arr = [];
        while ($row = $result->fetch_assoc()) {
            $arr[] = $row;
        }
        return $arr;
    }

    public function create($data = [], $columns = [])
    {
        if (empty($data)) {
            return false;
        }

        $columns = implode(',', $columns);
        extract($data);
        $history_content = json_encode($history_content, JSON_UNESCAPED_UNICODE);
        $sql = "INSERT INTO {$this->table} ($columns) VALUES($appointment_id, '$history_content', $patient_id);";
        $result = execute_query($sql);
        return $result;
    }

    public function update($data = [])
    {
        if (empty($data)) {
            return false;
        }

        extract($data);
        $history_content = json_encode($history_content, JSON_UNESCAPED_UNICODE);
        $sql = "SELECT * FROM {$this->table} WHERE {$this->id_column} = $appointment_id LIMIT 1";
        $result = execute_query($sql);
        if (empty($result->fetch_object())) {
            $sql = "INSERT INTO {$this->table} (appointment_id, history_content, patient_id) VALUES ($appointment_id, '$history_content', $patient_id)";
        } else {
            $sql = "UPDATE {$this->table} SET history_content = '$history_content' WHERE {$this->id_column} = $appointment_id";
        }
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
