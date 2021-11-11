<?php
/*
 *    @var method
 * @var query
 */
if (empty($method)) {
    die(403);
}

require_once "models/PatientRiskFactors.php";
require_once "models/ActionsRecord.php";

$action = new ActionsRecord();
$risk_factors = new PatientRiskFactors();
$helper = new Helper();

$data = json_decode(file_get_contents("php://input"), true);
$query = empty($query) ? 0 : $query;

switch ($method) {

    case 'get':
        $query = clean_string($query);
        $data = sanitize($data);
        if ($query == 'comparison') {
            
            if (empty($data)) {
                echo json_encode([]);
                die();
            }

            $current_patient_items = $risk_factors->get(0, $data['current_patient_id']);
            $patient_to_compare_items = $risk_factors->get(0, $data['patient_to_compare_id']);

            $results = [
                'current_patient_items' => $current_patient_items,
                'patient_to_compare_items' => $patient_to_compare_items,
            ];

            echo json_encode($results);
        } else {
            $currents = $risk_factors->get($data['current_appointment']);
            $previous = !empty($data['previous_appointment']) && $data['previous_appointment'] != $data['current_appointment'] ?
            $risk_factors->get($data['previous_appointment']) : [];
            $history = $risk_factors->get(0, $data['patient_id']);
            echo json_encode(['current_list' => $currents, 'previous_list' => $previous, 'items' => $history]);
        }
        break;

    case 'get-current-risk-factor':
        $data = sanitize($data);
        $result = $risk_factors->search($data['name'], $data['appointment_id']);
        $results = $risk_factors->search_by_calc($data['name'], $data['patient_id']);
        echo json_encode(["current_rf" => $result, 'risk_factors' => $results]);
        break;

    case 'update':
        if (empty($data)) {
            $helper->response_message('Advertencia', 'Ninguna información fue recibida', 'warning');
        }

        $data = sanitize($data);
        $check = $risk_factors->search($data['name'], $data['appointment_id']);
        $result = empty($check) ? $risk_factors->create($data) : $risk_factors->update($data);
        if (!$result) {
            $helper->response_message('Error', 'No se pudo actualizar el factor de riesgo correctamente', 'error');
        }

        $record_action = $action->create("actualizó factores de riesgo: " . $data['name'] . " del paciente", 'update', $_SESSION['user_id'], $data['patient_id'], $_SESSION['upcm_id'], ['action', 'action_type', 'user_id', 'patient_id', 'upcm_id']);
        $helper->response_message('Éxito', 'Se actualizó el factor de riesgo correctamente');
        break;

}
