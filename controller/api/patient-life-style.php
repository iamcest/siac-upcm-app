<?php
/*
 *    @var method
 * @var query
 */
if (empty($method)) {
    die(403);
}

require_once "models/PatientLifeStyle.php";
require_once "models/ActionsRecord.php";

$action = new ActionsRecord;
$patient_life_style = new PatientLifeStyle;
$helper = new Helper;

$data = json_decode(file_get_contents("php://input"), true);
$query = empty($query) ? 0 : $query;

switch ($method) {

    case 'get':
        $results = $patient_life_style->get(0, clean_string($query));
        echo json_encode($results);
        break;

    case 'get-by-list':
        if (empty($data)) {
            die(403);
        }
        $patients_life_style = [];
        foreach ($data as $patient_item) {
            $results = $patient_life_style->get_last($patient_item['patient_id']);
            if (count($results) > 0) {
                $patients_life_style[] = $results[0];
            }
        }
        echo json_encode($patients_life_style);
        break;

    case 'update':
        if (empty($data)) {
            $helper->response_message('Advertencia', 'Ninguna información fue recibida', 'warning');
        }

        $result = $patient_life_style->update($data);
        if (!$result) {
            $helper->response_message('Error', 'No se pudo actualizar el estilo de vida correctamente', 'error');
        }

        $record_action = $action->create('actualizó el estilo de vida del paciente', 'update', $_SESSION['user_id'], $data['patient_id'], $_SESSION['upcm_id'], ['action', 'action_type', 'user_id', 'patient_id', 'upcm_id']);
        $helper->response_message('Éxito', 'Se actualizó el estilo de vida correctamente');
        break;

}
