<?php

/**
 *
 */
class ReportMeta
{
    private $table = "reports_meta";
    private $id_column = "report_meta_id";
    private $report_column = "report_id";

    public function __construct()
    {
    }
    public function get($id = 0)
    {
        if (empty($id)) {
            return [];
        }

        $sql = "SELECT * FROM {$this->table} WHERE {$this->report_column} = $id";
        $result = execute_query($sql);
        $arr = [];
        while ($row = $result->fetch_assoc()) {
            $arr[] = $row;
        }
        return $arr;
    }

    public function get_meta($report_id = 0, $meta_name = '')
    {
        if (empty($meta_name) || empty($report_id)) {
            return [];
        }

        $sql = "SELECT * FROM {$this->table} WHERE {$this->report_column} = $report_id AND report_meta_name = '$meta_name'";
        $result = execute_query($sql);
        if (empty($result)) {
            return [];
        }
        return $result->fetch_assoc();
    }

    public function create($data = [])
    {
        if (empty($data)) {
            return false;
        }

        extract($data);
        $sql = "INSERT INTO {$this->table} (report_meta_name, report_meta_val, report_id) VALUES('$report_meta_name', '$report_meta_val', $report_id)";
        $result = execute_query_return_id($sql);
        return $result;
    }

    public function edit($id, $data = [])
    {
        if (empty($data) || empty($id)) {
            return false;
        }

        extract($data);
        $sql = "UPDATE {$this->table} 
        SET report_meta_val = '$report_meta_val' WHERE {$this->report_column} = $id 
        AND report_meta_name = '$report_meta_name'";
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
