<?php
/*
 *    @var method
 * @var query
 */
if (empty($method)) {
    die(403);
}

require_once "models/PatientRiskFactorsDiagnostic.php";
require_once "models/ActionsRecord.php";

$action = new ActionsRecord();
$risk_factors = new PatientRiskFactorsDiagnostic();
$helper = new Helper();

$data = json_decode(file_get_contents("php://input"), true);
$query = empty($query) ? 0 : $query;

switch ($method) {

    case 'get':
        $query = clean_string($query);
        if ($query == 'comparison') {
            $data = sanitize($data);
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
            $data = sanitize($data);
            if (empty($data['current_appointment'])) {
                die();
            }

            $result = $risk_factors->get($data['current_appointment']);
            $results = $risk_factors->get(0, $data['patient_id']);
            echo json_encode(['current_risk_factors_diagnostics' => count($result) > 0 ? $result[0] : [], 'risk_factors_diagnostics' => $results]);
        }
        break;

    case 'update':
        if (empty($data)) {
            $helper->response_message('Advertencia', 'Ninguna información fue recibida', 'warning');
        }

        $data['appointment_id'] = clean_string($data['appointment_id']);
        $data['patient_id'] = clean_string($data['patient_id']);
        $check = $risk_factors->get($data['appointment_id']);
        $result = empty($check) ? $risk_factors->create($data) : $risk_factors->update($data);
        if (!$result) {
            $helper->response_message('Error', 'No se pudo actualizar los datos correctamente', 'error');
        }

        $record_action = $action->create('actualizó los diagnósticos del paciente', 'update', $_SESSION['user_id'], $data['patient_id'], $_SESSION['upcm_id'], ['action', 'action_type', 'user_id', 'patient_id', 'upcm_id']);
        $helper->response_message('Éxito', 'Se actualizaron los datos correctamente');
        break;
}
