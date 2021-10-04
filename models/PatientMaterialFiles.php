<?php

/**
 *
 */

class PatientMaterialFiles
{
    private $table = "patient_material_files";
    private $material_template_table = "materials_templates";
    private $id_column = "patient_material_file_id";
    private $patient_material_id_column = "patient_material_id";


    public function __construct()
    {
    }
    public function get($id = 0, $patient_material_id = 0)
    {
        if (!empty($id) && empty($patient_material_id)) {
            $sql = "SELECT PMF.patient_material_file_id, PMF.patient_material_id,
            PMF.material_template_id, PMF.file_name, PMF.material_type, MT.material_name
            FROM {$this->table} PMF RIGHT JOIN {$this->material_template_table} MT ON
            MT.material_template_id = PMF.material_template_id WHERE {$this->id_column} = $id";
            $result = execute_query($sql);
            $arr = [];
            while ($row = $result->fetch_assoc()) {
                $arr[] = $row;
            }
            return $arr;
        } else if (empty($id) && !empty($patient_material_id)) {
            $sql = "SELECT PMF.patient_material_file_id, PMF.patient_material_id,
            PMF.material_template_id, PMF.file_name, PMF.material_type, MT.material_name
            FROM {$this->table} PMF LEFT JOIN {$this->material_template_table} MT ON
            MT.material_id = PMF.material_template_id WHERE {$this->patient_material_id_column} = $patient_material_id";
            $result = execute_query($sql);
            $arr = [];
            while ($row = $result->fetch_assoc()) {
                $arr[] = $row;
            }
            return $arr;
        } else {
            return [];
        }
    }

    public function create($data = [])
    {
        if (empty($data)) {
            return false;
        }
        extract($data);
        $sql = $material_type == 'template'
        ? "INSERT INTO {$this->table} (file_name, material_type, patient_material_id, material_template_id)
        VALUES('$file_name', '$material_type', '$patient_material_id', '$material_template_id');"
        : "INSERT INTO {$this->table} (file_name, material_type, patient_material_id)
        VALUES('$file_name', '$material_type', '$patient_material_id');";
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
