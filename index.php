<?php
require_once "../config.php";
include 'tool-config_dist.php';
require_once("dao/ExploranceDAO.php");

// The Tsugi PHP API Documentation is available at:
// http://do1.dr-chuck.com/tsugi/phpdoc/

use \Tsugi\Util\Net;
use \Tsugi\Util\U;
use \Tsugi\Core\LTIX;
use \Tsugi\Core\Settings;
use \Tsugi\UI\SettingsForm;
use \Explorance\DAO\ExploranceDAO;

$LTI = LTIX::requireData();

// Handle the incoming post first
if ( $LTI->link && $LTI->link->id && SettingsForm::handleSettingsPost() ) {
    header('Location: '.addSession('index.php') ) ;
    return;
}

$site_id = $LAUNCH->ltiRawParameter('context_id','none');
$context_id = $LAUNCH->ltiRawParameter('context_id','none');

if ( $USER->instructor ) {
    // $explorance_obj = new ExploranceDAO($PDOX, $CFG->dbprefix, $tool, $LINK->id, $USER->id, $site_id);
    // if ($explorance_obj == null) {
    //     echo "Error: Could not create or retrieve course details, please contact your administrator.";
    // }

    header( 'Location: '.addSession('instructor.php') ) ;
} else {
    header( 'Location: '.addSession('student.php') ) ;
}
