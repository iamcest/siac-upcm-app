<?php

/**
 *
 */

class PatientLifeStyle
{
    private $table = "patient_life_style";
    private $id_patient_column = "patient_id";
    private $id_column = "appointment_id";

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
            return [];
        }

        $sql = "SELECT * FROM {$this->table} WHERE patient_id = $id ORDER BY appointment_id DESC LIMIT 1";
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
        $exercise = json_encode($exercise, JSON_UNESCAPED_UNICODE);
        $smoking = json_encode($smoking, JSON_UNESCAPED_UNICODE);
        $sql = "SELECT * FROM {$this->table} WHERE {$this->id_column} = $appointment_id LIMIT 1";
        $result = execute_query($sql);
        if (empty($result->fetch_object())) {
            $sql = "INSERT INTO {$this->table} (
            appointment_id, sedentary, physical_exercise, exercise, exercise_activity_before, exercise_start_date,
            aerobic_weekly_minutes, resistance_weekly_minutes, alcohol_consumption, smoking, alcohol_daily_consumption, patient_id)
            VALUES (
                $appointment_id, $sedentary, $physical_exercise, '$exercise',  
                $exercise_activity_before, '$exercise_start_date',
                $aerobic_weekly_minutes, $resistance_weekly_minutes, $alcohol_consumption, '$smoking',
                '$alcohol_daily_consumption', $patient_id
            )";
        } else {
            $sql = "UPDATE {$this->table} SET
            sedentary = $sedentary, physical_exercise = $physical_exercise, 
            exercise = '$exercise', exercise_activity_before = '$exercise_activity_before', 
            exercise_start_date = '$exercise_start_date', 
            aerobic_weekly_minutes = '$aerobic_weekly_minutes', 
            resistance_weekly_minutes = $resistance_weekly_minutes, 
            smoking = '$smoking', alcohol_consumption = $alcohol_consumption, 
            alcohol_daily_consumption = '$alcohol_daily_consumption'
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

        $sql = "DELETE FROM {$this->table} WHERE {$this->id_column} = $id";
        $result = execute_query($sql);
        return $result;
    }

}
