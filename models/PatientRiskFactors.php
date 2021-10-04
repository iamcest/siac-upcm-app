<?php

/**
 *
 */

class PatientRiskFactors
{
    private $table = "patient_risk_factors";
    private $id_patient_column = "patient_id";
    private $id_column = "patient_risk_factor_id";
    private $id_appointment_column = "appointment_id";

    public function __construct()
    {
    }

    public function get($appointment_id = 0, $patient_id = 0)
    {
        if (empty($appointment_id) && empty($patient_id)) {
            return false;
        }

        $sql = empty($appointment_id)
        ? "SELECT * FROM {$this->table} WHERE {$this->id_patient_column} = $patient_id ORDER BY appointment_id ASC"
        : "SELECT * FROM {$this->table} WHERE {$this->id_appointment_column} = $appointment_id ORDER BY appointment_id ASC";
        $result = execute_query($sql);
        $arr = [];
        while ($row = $result->fetch_assoc()) {
            $arr[] = $row;
        }
        return $arr;
    }

    public function search($name = '', $appointment_id = 0)
    {
        if (empty($appointment_id) || empty($name)) {
            return false;
        }

        $sql = "SELECT * FROM {$this->table} WHERE {$this->id_appointment_column} = $appointment_id AND name = '$name'";
        $result = execute_query($sql);
        $arr = [];
        while ($row = $result->fetch_assoc()) {
            $arr[] = $row;
        }
        return $arr;
    }

    public function search_by_calc($name = '', $patient_id = 0)
    {
        if (empty($patient_id) || empty($name)) {
            return false;
        }

        $sql = "SELECT * FROM {$this->table} WHERE {$this->id_patient_column} = $patient_id AND name = '$name'";
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
        $vars = json_encode($vars, JSON_UNESCAPED_UNICODE);
        $sql = "INSERT INTO {$this->table} (name, results, nomenclature, vars, patient_id, appointment_id) VALUES('$name', '$results', '$nomenclature', '$vars', $patient_id, $appointment_id );";
        $result = execute_query($sql);
        return $result;
    }

    public function update($data = [])
    {
        if (empty($data)) {
            return false;
        }

        extract($data);
        $sql = "UPDATE {$this->table} SET results = '$results' WHERE {$this->id_appointment_column} = $appointment_id AND name = '$name'";
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
