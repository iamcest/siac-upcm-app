<?php
/*
 *    @var method
 * @var query
 */
if (empty($method)) {
    die(403);
}

require_once "models/Recipes.php";

use Dompdf\Dompdf;
use Dompdf\Options;

$recipe = new Recipes;
$helper = new Helper;

$data = json_decode(file_get_contents("php://input"), true);
$query = empty($query) ? 0 : $query;

switch ($method) {

    case 'get':
        $results = $recipe->get(clean_string($query));
        echo json_encode(!empty($results) ? $results : []);
        break;

    case 'create':
        if (empty($data)) {
            $helper->response_message('Advertencia', 'Ninguna información fue recibida', 'warning');
        }

        $result = $recipe->create($data);
        if (!$result) {
            $helper->response_message('Error', 'No se pudo crear el recipe correctamente', 'error');
        }

        $helper->response_message('Éxito', 'Se creó el recipe correctamente', 'success', ['recipe_id' => $result]);
        break;

    case 'update':
        if (empty($data)) {
            $helper->response_message('Advertencia', 'Ninguna información fue recibida', 'warning');
        }

        $result = $recipe->update($data);
        if (!$result) {
            $helper->response_message('Error', 'No se pudo actualizar el recipe correctamente', 'error');
        }

        $helper->response_message('Éxito', 'Se actualizó el recipe correctamente');
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
        $template = new Template('patients-management/recipes_and_reports/templates/recipe', $data);
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
        if (empty($data['recipe_id'])) {
            $helper->response_message('Advertencia', 'Ninguna información fue recibida', 'warning');
        }

        $result = $recipe->delete(intval($data['recipe_id']));
        if (!$result) {
            $helper->response_message('Error', 'No se pudo eliminar el recipe correctamente', 'error');
        }

        $helper->response_message('Éxito', 'Se eliminó el recipe correctamente');
        break;

}
