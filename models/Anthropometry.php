<?php

/**
 *
 */

class Anthropometry
{
    private $table = "patient_anthropometries";
    private $id_patient_column = "patient_id";
    private $id_column = "appointment_id";

    public function __construct()
    {
    }

    public function get($appointment_id = 0, $patient_id = 0)
    {
        if (empty($appointment_id) && empty($patient_id)) {
            return [];
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

    public function get_general_info($upcm_id)
    {
        if (empty($upcm_id)) {
            return [];
        }

        $sql = "SELECT CONCAT(first_name,' ', last_name) as full_name, birthdate, gender, weight, height, abdominal_waist, abdominal_waist_suffix, weight_suffix, height_suffix FROM {$this->table} as pa RIGHT JOIN patients as p ON pa.patient_id = p.patient_id WHERE p.patient_upcm = $upcm_id AND pa.created_at = (SELECT MAX(created_at) FROM {$this->table} pa2 WHERE pa2.patient_id = p.patient_id) GROUP BY p.patient_id; ";
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
        $sql = "INSERT INTO {$this->table} (appointment_id, weight, weight_suffix, height, height_suffix, abdominal_waist, abdominal_waist_suffix, patient_id) VALUES($appointment_id, $weight, '$weight_suffix', $height,'$height_suffix', $abdominal_waist, '$abdominal_waist_suffix', $patient_id);";
        $result = execute_query($sql);
        return $result;
    }

    public function edit($data = [])
    {
        if (empty($data)) {
            return false;
        }

        extract($data);
        $sql = "UPDATE {$this->table} SET weight = $weight, weight_suffix = '$weight_suffix', height = $height, height_suffix = '$height_suffix', abdominal_waist = $abdominal_waist, abdominal_waist_suffix = '$abdominal_waist_suffix' WHERE {$this->id_column} = $appointment_id;";
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
