<?php

/**
 *
 */

class VitalSignals
{
    private $table = "patient_vital_signals";
    private $id_column = "appointment_id";
    private $id_patient_column = "patient_id";

    public function __construct()
    {
    }
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
        if ($id == 0) {
            return false;
        }

        $sql = "SELECT {$this->id_column}, standing, lying_down, sitting, vars,created_at FROM {$this->table} WHERE patient_id = $id ORDER BY {$this->id_column} DESC";
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
        $standing = json_encode($standing);
        $lying_down = json_encode($lying_down);
        $sitting = json_encode($sitting);
        $takes = json_encode($takes);
        $sql = "INSERT INTO {$this->table} (appointment_id, standing, lying_down, sitting, takes, patient_id) VALUES($appointment_id, '$standing', '$lying_down', '$sitting', '$takes', $patient_id);";
        $result = execute_query($sql);
        return $result;
    }
    public function update($data = [])
    {
        if (empty($data)) {
            return false;
        }

        extract($data);
        $standing = json_encode($standing);
        $lying_down = json_encode($lying_down);
        $sitting = json_encode($sitting);
        $takes = json_encode($takes);
        $sql = "UPDATE {$this->table} SET standing = '$standing', lying_down = '$lying_down', sitting = '$sitting', takes = '$takes' WHERE {$this->id_column} = $appointment_id;";
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
