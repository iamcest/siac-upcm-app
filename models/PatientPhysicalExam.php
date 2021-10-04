<?php

/**
 *
 */

class PatientPhysicalExam
{
    private $table = "patient_physical_exams";
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

    public function update($data = [])
    {
        if (empty($data)) {
            return false;
        }

        extract($data);
        $content = json_encode($content, JSON_UNESCAPED_UNICODE);
        $sql = "SELECT * FROM {$this->table} WHERE {$this->id_column} = $appointment_id LIMIT 1";
        $result = execute_query($sql);
        if (empty($result->fetch_object())) {
            $sql = "INSERT INTO {$this->table} (appointment_id, content, patient_id) VALUES($appointment_id, '$content', $patient_id)";
        } else {
            $sql = "UPDATE {$this->table} SET content = '$content' WHERE {$this->id_column} = $appointment_id";
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
