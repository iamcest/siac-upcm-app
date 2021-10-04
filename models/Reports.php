<?php

/**
 *
 */

class Reports
{
    private $table = "reports";
    private $id_column = "report_id";
    private $patient_id = "patient_id";

    public function get($id = 0, $report_id = 0)
    {
        if ($id != 0) {
            $sql = "SELECT * FROM {$this->table} WHERE {$this->patient_id} = $id";
        } else {
            $sql = "SELECT * FROM {$this->table}";
        }
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
        $sql = "INSERT INTO {$this->table} 
		(appointment_date, next_appointment, ecg, patient_id) 
		VALUES('$appointment_date', '$next_appointment', '$ecg', $patient_id);";
        $result = execute_query_return_id($sql);
        return $result;
    }

    public function update($data = [])
    {
        if (empty($data)) {
            return false;
        }

        extract($data);
        $sql = "UPDATE {$this->table} 
		SET appointment_date = '$appointment_date', next_appointment = '$next_appointment', ecg = '$ecg' 
		WHERE {$this->id_column} = $report_id";
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
