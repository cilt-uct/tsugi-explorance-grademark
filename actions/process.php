<?php
require_once "../../config.php";
include "../tool-config_dist.php";
require_once("../dao/ExploranceDAO.php");

use \Tsugi\Core\LTIX;
use \Explorance\DAO\ExploranceDAO;

// Retrieve the launch data if present
$LAUNCH = LTIX::requireData();

$result = ['success' => 0, 'msg' => 'no action specified'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $explorance_obj = new ExploranceDAO($PDOX, $CFG->dbprefix, $tool);
    // Save the values from the form to the database
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Retrieve the state and values from the database and return them as JSON
}

echo json_encode($result);
exit;