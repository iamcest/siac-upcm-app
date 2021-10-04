<?php
/*
 *    @var method
 * @var query
 */
if (empty($method)) {
    die(403);
}

require_once "models/Reports.php";
require_once "models/ReportMeta.php";

use Dompdf\Dompdf;
use Dompdf\Options;

$report = new Reports;
$report_meta = new ReportMeta;
$helper = new Helper;

$data = json_decode(file_get_contents("php://input"), true);
$query = empty($query) ? 0 : $query;

switch ($method) {

    case 'get':
        $results = $report->get(clean_string($query));
        $reports = [];
        if (count($results) > 0) {
            foreach ($results as $result) {
                $meta = $report_meta->get($result['report_id']);
                $result['meta'] = [];
                foreach ($meta as $i => $e) {
                    $result['meta'][$e['report_meta_name']] = json_decode($e['report_meta_val']);
                }
                $reports[] = $result;
            }
        }
        echo json_encode($reports);
        break;

    case 'create':
        if (empty($data)) {
            $helper->response_message('Advertencia', 'Ninguna información fue recibida', 'warning');
        }
        $result = $report->create($data);
        if (!$result) {
            $helper->response_message('Error', 'No se pudo crear el reporte correctamente', 'error');
        }
        if (isset($data['meta']) && !empty($data['meta'])) {
            $data['meta'] = json_decode(json_encode($data['meta'], JSON_UNESCAPED_UNICODE), true);
            foreach ($data['meta'] as $meta_key => $meta_value) {
                $meta = [
                    'report_meta_name' => $meta_key,
                    'report_meta_val' => json_encode($meta_value, JSON_UNESCAPED_UNICODE),
                    'report_id' => $result,
                ];
                $report_meta->create($meta);
            }
        }

        $helper->response_message('Éxito', 'Se creó el reporte correctamente', 'success', ['report_id' => $result]);
        break;

    case 'update':
        if (empty($data)) {
            $helper->response_message('Advertencia', 'Ninguna información fue recibida', 'warning');
        }
        $result = $report->update($data);
        if (!$result) {
            $helper->response_message('Error', 'No se pudo actualizar el reporte correctamente', 'error');
        }

        if (isset($data['meta']) && !empty($data['meta'])) {
            $data['meta'] = json_decode(json_encode($data['meta'], JSON_UNESCAPED_UNICODE), true);
            $id = clean_string($data['report_id']);
            foreach ($data['meta'] as $meta_key => $meta_value) {
                $meta = ['report_meta_name' => $meta_key, 'report_meta_val' => json_encode($meta_value, JSON_UNESCAPED_UNICODE)];
                $check_meta = $report_meta->get_meta($id, $meta_key);
                if (empty($check_meta)) {
                    $meta_data = [
                        'report_meta_name' => $meta_key,
                        'report_meta_val' => json_encode($meta_value, JSON_UNESCAPED_UNICODE),
                        'report_id' => $id,
                    ];
                    $report_meta->create($meta_data);
                    continue;
                }
                $report_meta->edit($id, $meta);
            }
        }

        $helper->response_message('Éxito', 'Se actualizó el reporte correctamente');
        break;

    case 'download':
        if (empty($data)) {
            $helper->response_message('Advertencia', 'Ninguna información fue recibida', 'warning');
        }
        set_time_limit(1200);
        $dompdf = new Dompdf();
        $options = $dompdf->getOptions();
        $options->setIsPhpEnabled(true);
        $options->setIsRemoteEnabled(true);
        $template = new Template('patients-management/recipes_and_reports/templates/reports', $data);
        $dompdf->loadHtml($template);
        $dompdf->set_paper('letter', 'landscape');
        $dompdf->render();
        $data = array(
            'status' => true,
            'content' => "data:application/pdf;base64," . base64_encode($dompdf->output('', 'S')),
        );
        $helper->response_message('Éxito', '', 'success', $data);
        break;

    case 'delete':
        if (empty($data['report_id'])) {
            $helper->response_message('Advertencia', 'Ninguna información fue recibida', 'warning');
        }

        $result = $report->delete(clean_string($data['report_id']));
        if (!$result) {
            $helper->response_message('Error', 'No se pudo eliminar el reporte correctamente', 'error');
        }

        $helper->response_message('Éxito', 'Se eliminó el reporte correctamente');
        break;

}
