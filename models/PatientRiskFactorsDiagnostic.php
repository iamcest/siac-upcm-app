<?php

/**
 *
 */

class PatientRiskFactorsDiagnostic
{
    private $table = "patient_risk_factors_diagnostic";
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

    public function get_last($patient_id)
    {
        if (empty($patient_id)) {
            return false;
        }

        $sql = "SELECT * FROM {$this->table} WHERE {$this->id_patient_column} = $patient_id ORDER BY appointment_id DESC";
        $result = execute_query($sql);
        $arr = [];
        while ($row = $result->fetch_assoc()) {
            $arr[] = $row;
        }
        return empty($arr) ? [] : end($arr);
    }

    public function create($data = [], $columns = [])
    {
        if (empty($data)) {
            return false;
        }

        extract($data);
        $risk_factors = json_encode($risk_factors, JSON_UNESCAPED_UNICODE);
        $sql = "INSERT INTO {$this->table} (appointment_id, risk_factors, patient_id) VALUES( $appointment_id, '$risk_factors', $patient_id );";
        $result = execute_query($sql);
        return $result;
    }

    public function update($data = [])
    {
        if (empty($data)) {
            return false;
        }

        extract($data);
        $risk_factors = json_encode($risk_factors, JSON_UNESCAPED_UNICODE);
        $sql = "UPDATE {$this->table} SET risk_factors = '$risk_factors' WHERE {$this->id_column} = $appointment_id";
        $result = execute_query($sql);
        return $result;
    }

    public function delete($id)
    {
        if (empty($id)) {
            return false;
        }

        $sql = "DELETE FROM {$this->table} WHERE {$this->id_column} = $appointment_id;";
        $result = execute_query($sql);
        return $result;
    }

}
