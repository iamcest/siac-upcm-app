<?php

/**
 *
 */

class PatientPlans
{
    private $table = "patient_plans";
    private $id_patient_column = "patient_id";
    private $id_column = "appointment_id";

    public function get($id = 0, $appointment_id = 0)
    {
        if ($id != 0) {
            $sql = "SELECT * FROM {$this->table} WHERE {$this->id_patient_column} = $id ORDER BY appointment_id DESC";
        } else {
            $sql = "SELECT * FROM {$this->table} WHERE {$this->id_column} = $appointment_id ";
        }
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
        $clinics_exams = json_encode($clinics_exams, JSON_UNESCAPED_UNICODE);
        $materials = json_encode($materials, JSON_UNESCAPED_UNICODE);
        $sql = "SELECT * FROM {$this->table} WHERE {$this->id_column} = $appointment_id LIMIT 1";
        $result = execute_query($sql);
        if (empty($result->fetch_object())) {
            $sql = "INSERT INTO {$this->table} (appointment_id, nutrition, exercise_plan, clinics_exams, materials, patient_id) 
			VALUES($appointment_id, '$nutrition', '$exercise_plan', '$clinics_exams', '$materials', $patient_id)";
        } else {
            $sql = "UPDATE {$this->table} SET nutrition = '$nutrition', exercise_plan = '$exercise_plan', 
			clinics_exams = '$clinics_exams', materials = '$materials'
			WHERE {$this->id_column} = $appointment_id";
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
