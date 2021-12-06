<?php

/**
 *
 */

class PatientMaterial
{
    private $table = "patient_materials";
    private $table_patients = "patients";
    private $table_material_files = "patient_material_files";
    private $id_column = "patient_material_id";
    private $patient_id = "patient_id";

    public function __construct()
    {
    }

    public function get($id = 0, $columns = [])
    {
        $columns = empty($columns) ? '*' : implode(',', $columns);
        if (empty($id)) {
            return false;
        }

        $sql = "SELECT $columns FROM {$this->table} WHERE {$this->patient_id} = $id";
        $result = execute_query($sql);
        $arr = [];
        while ($row = $result->fetch_assoc()) {
            $arr[] = $row;
        }
        return $arr;
    }

    public function get_sent($id = 0)
    {
        if (empty($id)) {
            return false;
        }

        $sql = "SELECT PM.registered_at, CONCAT(P.first_name, ' ', P.last_name) full_name, P.patient_id 
		FROM {$this->table_material_files} PMF
		INNER JOIN {$this->table} PM ON PM.patient_material_id = PMF.patient_material_id 
		INNER JOIN {$this->table_patients} P ON P.patient_id = PM.patient_id
		WHERE PMF.material_template_id = $id";
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
        $sql = "INSERT INTO {$this->table} ($columns) VALUES('$title', '$content', '$message', '$material', '$file', $patient_id);";
        $result = execute_query_return_id($sql);
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
