<?php

/**
 *
 */

class Patients
{
    private $table = "patients";
    private $contact_table = "patients_contact";
    private $id_column = "patient_id";
    private $upcm_id_column = "patient_upcm";

    public function __construct()
    {
    }
    public function get(int $id = 0, $upcm_id = 0, $exclude_upcm_id = 0)
    {
        if (!empty($id)) {
            $sql = "SELECT p.patient_id AS patient_id, avatar, first_name, last_name, CONCAT(first_name, ' ', last_name)
			AS full_name, document_id, document_type, birthdate, email, gender, address, entry_date, patient_upcm,
			pc.telephone, pc.whatsapp AS whatsapp, pc.telegram AS telegram, pc.sms AS sms FROM {$this->table} AS p LEFT JOIN {$this->contact_table}
			AS pc ON p.patient_id = pc.patient_id WHERE p.{$this->id_column} = $id";
        } else if (empty($id) && !empty($upcm_id)) {
            $sql = "SELECT
			p.patient_id AS patient_id, avatar, first_name, last_name, CONCAT(first_name, ' ', last_name) AS full_name, document_id, document_type, birthdate, email, gender, address,
			entry_date, patient_upcm, pc.telephone, pc.whatsapp AS whatsapp, pc.telegram AS telegram, pc.sms AS sms FROM {$this->table} as p
			LEFT JOIN {$this->contact_table} AS pc ON p.patient_id = pc.patient_id WHERE p.{$this->upcm_id_column} = $upcm_id";
        } else {
            $sql = "SELECT
			p.patient_id AS patient_id, avatar, first_name, last_name, CONCAT(first_name, ' ', last_name) AS full_name, document_id, document_type, birthdate, email, gender, address,
			entry_date, patient_upcm, pc.telephone, pc.whatsapp AS whatsapp, pc.telegram AS telegram, pc.sms AS sms FROM {$this->table} as p
			LEFT JOIN {$this->contact_table} AS pc ON p.patient_id = pc.patient_id";
            $sql .= !empty($exclude_upcm_id) ? " WHERE {$this->upcm_id_column} != ($exclude_upcm_id)" : "";
        }
        $result = execute_query($sql);
        $arr = [];
        while ($row = $result->fetch_assoc()) {
            $arr[] = $row;
        }
        return $arr;
    }

    public function get_list(int $id = 0)
    {
        if ($id == 0) {
            return false;
        }

        $sql = "SELECT patient_id, CONCAT(first_name, ' ', last_name) AS full_name FROM {$this->table} WHERE patient_upcm = $id";
        $result = execute_query($sql);
        $arr = [];
        while ($row = $result->fetch_assoc()) {
            $arr[] = $row;
        }
        return $arr;
    }

    public function get_general_info($id)
    {
        if ($id != 0) {
            $sql = "SELECT CONCAT(first_name,' ', last_name) as full_name, birthdate, gender FROM {$this->table} WHERE patient_upcm = $id ";
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
        $sql = "INSERT INTO {$this->table} (first_name, last_name, document_id, 
        document_type, birthdate, gender, address, email, entry_date, patient_upcm) 
        VALUES('$first_name', '$last_name', '$document_id', 
        '$document_type', '$birthdate', '$gender', 
        '$address', '$email','$entry_date', $patient_upcm)";
        $result = execute_query_return_id($sql);
        return $result;
    }
    public function create_contact($id, $data = [])
    {
        if (empty($data)) {
            return false;
        }

        extract($data);
        $sql = "INSERT INTO {$this->contact_table} 
        (patient_id, telephone, whatsapp, telegram, sms) 
        VALUES($id,'$telephone', $whatsapp, $telegram, $sms)";
        $result = execute_query($sql);
        return $result;
    }
    public function edit($id, $data = [])
    {
        if (empty($data) or empty($id)) {
            return false;
        }

        extract($data);
        $sql = "UPDATE {$this->table} SET first_name = '$first_name', last_name = '$last_name', document_id = '$document_id', document_type = '$document_type', birthdate = '$birthdate', gender = '$gender', address = '$address', email = '$email' WHERE {$this->id_column} = $id;";
        $result = execute_query($sql);
        return $result;
    }
    public function edit_contact($id, $data = [])
    {
        if (empty($data) or empty($id)) {
            return false;
        }

        extract($data);
        $sql = "UPDATE {$this->contact_table} SET telephone = '$telephone', whatsapp = '$whatsapp', telegram = '$telegram', sms = '$sms' WHERE {$this->id_column} = $id;";
        $result = execute_query($sql);
        return $result;
    }
    public function update_avatar($id, $file_name)
    {
        if (empty($file_name) or empty($id)) {
            return false;
        }

        $sql = "UPDATE {$this->table} SET avatar = '$file_name' WHERE {$this->id_column} = $id;";
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
