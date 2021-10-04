<?php

/**
 *
 */

class PatientExams
{
    private $table = "patient_exams";
    private $exams_table = "medicals_exams";
    private $exam_files_table = "patient_exam_files";
    private $id_column = "patient_exam_id";
    private $id_appointment_column = "appointment_id";
    private $id_file_column = "patient_exam_file_id";

    public function __construct()
    {
    }
    public function get($id = 0)
    {
        if ($id != 0) {
            $sql = "SELECT * FROM {$this->table} WHERE patient_id = $id ORDER BY exam_date DESC";
        } else {
            $sql = "SELECT * FROM {$this->table} ORDER BY exam_date DESC";
        }
        $result = execute_query($sql);
        $arr = [];
        while ($row = $result->fetch_assoc()) {
            $arr[] = $row;
        }
        return $arr;
    }

    public function get_exams()
    {
        $sql = "SELECT exam_id, name, nomenclature FROM {$this->exams_table} ME ORDER BY ME.order ASC";
        $result = execute_query($sql);
        $arr = [];
        while ($row = $result->fetch_assoc()) {
            $arr[] = $row;
        }
        return $arr;
    }

    public function get_exam_results($id = 0, $exam_id = 0)
    {
        if (empty($id)) {
            return [];
        }

        $sql = "SELECT * FROM {$this->table} WHERE patient_id = $id AND exam_id = $exam_id ";
        $result = execute_query($sql);
        $arr = [];
        while ($row = $result->fetch_assoc()) {
            $arr[] = $row;
        }
        return $arr;
    }

    public function get_exam_results_by_appointment($appointment_id = 0)
    {
        if (empty($appointment_id)) {
            return [];
        }

        $sql = "SELECT patient_exam_id, name, nomenclature,
        results, exam_date, PE.exam_id, appointment_id
        FROM {$this->table} PE INNER JOIN {$this->exams_table} ME 
        ON ME.exam_id = PE.exam_id WHERE appointment_id = $appointment_id";
        $result = execute_query($sql);
        $arr = [];
        while ($row = $result->fetch_assoc()) {
            $arr[] = $row;
        }
        return $arr;
    }

    public function get_exam_file_results($id = 0)
    {
        if (empty($id)) {
            return [];
        }

        $sql = "SELECT {$this->id_file_column}, file_result, exam_date FROM {$this->exam_files_table} WHERE patient_id = $id ORDER BY exam_date DESC";
        $result = execute_query($sql);
        $arr = [];
        while ($row = $result->fetch_assoc()) {
            $arr[] = $row;
        }
        return $arr;
    }

    public function get_last_result($exam_name = '', $patient_id = 0)
    {
        if (empty($patient_id) || empty($exam_name)) {
            return [];
        }
        $sql = "SELECT name, results FROM {$this->table} PE 
        INNER JOIN {$this->exams_table} ME ON PE.exam_id = ME.exam_id
        WHERE patient_id = $patient_id AND ME.name = '$exam_name' ORDER BY {$this->id_column} DESC";
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
        $vars = empty($vars) ? '' : json_encode($vars, JSON_UNESCAPED_UNICODE);
        $sql = "INSERT INTO {$this->table} ($columns) VALUES ($appointment_id, $results, '$vars', '$exam_date', $exam_id, $patient_id);";
        $result = execute_query_return_id($sql);
        return $result;
    }

    public function create_file($data = [], $columns = [])
    {
        if (empty($data)) {
            return false;
        }

        $columns = implode(',', $columns);
        extract($data);
        $sql = "INSERT INTO {$this->exam_files_table} ($columns) VALUES('$file_result', '$exam_date', $patient_id);";
        $result = execute_query_return_id($sql);
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

    public function delete_file($id)
    {
        if (empty($id)) {
            return false;
        }

        $sql = "DELETE FROM {$this->exam_files_table} WHERE {$this->id_file_column} = $id";
        $result = execute_query($sql);
        return $result;
    }

}
