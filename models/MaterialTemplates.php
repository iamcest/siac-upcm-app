<?php

/**
 *
 */

class MaterialTemplates
{
    private $table = "materials_templates";
    private $id_column = "material_id";
    private $id_upcm_column = "upcm_id";

    public function get($upcm_id = 0)
    {
        $sql = "SELECT * FROM {$this->table} WHERE {$this->id_upcm_column} IS NULL";
        $sql .= !empty($upcm_id) ? " OR {$this->id_upcm_column} = $upcm_id" : "";
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
        $type = empty($type) ? 'C' : $type;
        $sql = "INSERT INTO {$this->table} (material_name, source, type, upcm_id) 
        VALUES('$material_name', '$source', '$type', '$upcm_id');";
        $result = execute_query_return_id($sql);
        return $result;
    }

    public function delete($id)
    {
        if (empty($id)) {
            return false;
        }

        $sql = "DELETE FROM {$this->table} WHERE {$this->id_column} = $id AND type != 'S'";
        $result = execute_query($sql);
        return $result;
    }

}
