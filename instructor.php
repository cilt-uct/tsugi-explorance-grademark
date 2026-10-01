<?php
require_once "../config.php";
include 'tool-config_dist.php';
include 'src/Template.php';

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
// stop PHP from automatically embedding PHPSESSID on local URLs
ini_set('session.use_trans_sid', false);
error_reporting(E_ALL);

use \Tsugi\Util\U;
use \Tsugi\Util\Net;
use \Tsugi\Core\LTIX;
use \Tsugi\Core\Settings;
use \Tsugi\UI\SettingsForm;

// Retrieve the launch data if present
$LAUNCH = LTIX::requireData();
$p = $CFG->dbprefix;

$menu = false; // We are not using a menu

// $postdata = LTIX::ltiRawPostArray();

$EID = $LAUNCH->ltiRawParameter('ext_d2l_username', $LAUNCH->ltiRawParameter('lis_person_sourcedid', $USER->id));
$context = [
    'context_id' => $CONTEXT->id, # Context ID - Tsugi identifier of site

    'instructor' => $USER->instructor, # is Lecturer/Instructor
    'EID'        => $EID, # Staff number
    'middleware_url'  => $tool['middleware_url'], # D2L Middleware URL
    'd2l_url'         => $tool['d2l_url'], # D2L URL

    'site_id'    => $LAUNCH->ltiRawParameter('context_id'), # Amathuba Site ID
    'site_title' => $LAUNCH->ltiRawParameter('context_title'), # Amathuba Site Title

    'styles'     => [ addSession('static/css/app.min.css') ],
    'component_scripts' => [ ],
    'scripts'    => [ addSession('static/js/size.controller.min.js') ],
    'process_url' => addSession( str_replace("\\","/",$CFG->getCurrentFileUrl('actions/process.php')) ),
    'get_url' => addSession( str_replace("\\","/",$CFG->getCurrentFileUrl('actions/fetch.php')) )
];

if (!$USER->instructor) {
    header('Location: ' . addSession('student.php'));
}

// Start of the output
$OUTPUT->header();

Template::view('templates/header.html', $context);

$OUTPUT->bodyStart();
$OUTPUT->topNav($menu);

if ($tool['debug']) {
    echo '<pre>'; print_r($context); echo '</pre>';
}

Template::view('templates/instructor-body.html', $context);

$OUTPUT->footerStart();

Template::view('templates/instructor-footer.html', $context);

$OUTPUT->footerEnd();
?>