<?php
require_once "../../config.php";
include "../tool-config_dist.php";
require_once("../dao/D2L.php");

use \Tsugi\Core\LTIX;
use \Explorance\D2L\D2L;

// Retrieve the launch data if present
$LAUNCH = LTIX::requireData();

if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
    $result = ['success' => 0, 'msg' => 'invalid request method'];
    echo json_encode($result);
    exit;
}

$site_id = $LAUNCH->ltiRawParameter('context_id', 'none');
$path = isset($_GET['path']) ? trim(strtolower($_GET['path']), '/') : '';

if ($path === '') {
    echo json_encode(['success' => 0, 'msg' => 'missing path parameter']);
    exit;
}

$d2l = new D2L($tool, $site_id);

switch ($path) {
    case 'explorance/projects':
        // $result = $d2l->getExploranceProjects();
        break;

    case 'grades/categories':
        // $result = $d2l->getGradeCategories();
        break;

    case 'grades/items':
        // $result = $d2l->getGradesItems();
        break;

    default:
        $result = ['success' => 0, 'msg' => 'unsupported path'];
}

header('Content-Type: application/json');
echo json_encode($result);
exit;