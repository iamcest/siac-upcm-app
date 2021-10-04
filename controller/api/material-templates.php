<?php
/*
 *    @var method
 * @var query
 */
if (empty($method)) {
    die(403);
}

require_once "models/MaterialTemplates.php";

$material_template = new MaterialTemplates;
$helper = new Helper();

$data = json_decode(file_get_contents("php://input"), true);
$query = empty($query) ? 0 : $query;

switch ($method) {

    case 'get':
        $upcm_id = !empty($_SESSION['upcm_id']) ? $_SESSION['upcm_id'] : 0;
        $results = $material_template->get($upcm_id);
        echo json_encode($results);
        break;

    case 'create':
        $data = $_POST;
        if (empty($data)) {
            $helper->response_message('Advertencia', 'Ninguna información fue recibida', 'warning');
        } else if (empty($_SESSION['upcm_id'])) {
            $helper->response_message('Advertencia', 'Debe pertenercer a una unidad para ejecutar esta acción', 'warning');
        }
        $data['upcm_id'] = $_SESSION['upcm_id'];
        $material_file = $_FILES['source'];
        $ext = explode(".", $material_file['name']);
        $file_name = $helper->convert_slug($data['material_name']) . '-' . time() . '.' . end($ext);
        $file_folder = "{$data['upcm_id']}";
        $path = "/public/material-template/$file_folder";
        if (!file_exists(DIRECTORY . $path)) {
            mkdir(DIRECTORY . $path, 0755, true);
        }
        if (!move_uploaded_file($material_file["tmp_name"], DIRECTORY . "$path/$file_name")) {
            $helper->response_message('Error', 'No se pudo guardar correctamente el material', 'error');
        }
        $data['source'] = "$path/$file_name";
        $result = $material_template->create(sanitize($data));
        $id = $result;

        if (!$result) {
            $helper->response_message('Error', 'No se pudo registrar el material correctamente', 'error');
        }

        $helper->response_message('Éxito', 'Se registró el material correctamente', 'success', ['material_id' => $id, 'source' => $data['source']]);
        break;

    case 'delete':
        if (empty($data['material_id']) || empty($data['source'])) {
            $helper->response_message('Advertencia', 'Ninguna información fue recibida', 'warning');
        }
        $data = sanitize($data); 
        if (unlink(DIRECTORY . $data['source'])) {
            $result = $material_template->delete($data['material_id']);
            if (!$result) {
                $helper->response_message('Error', 'No se pudo eliminar el registro del material correctamente', 'error');
            }
            $helper->response_message('Éxito', 'Se eliminó el material correctamente');
        }
        $helper->response_message('Error', 'No se pudo eliminar el archivo correctamente, intente de nuevo');
        break;

}
